<?php
require "../base/dbbase.php";
require "../base/validationsettings.php";

/** Add a username and initializing details into the table of awaiting registrees
 * 
 */
function register(string $newuserdata)
{
    class UsernameAlreadyTaken extends Exception
    {
        public function __construct($badusername)
        {
            parent::__construct("Username {$badusername} already exists.");
        }
    }
    /** exploded_data contains a delimited array of strings derived from received registration data from client.
     * 
     *  [0] = username
     *  [1] = salted + hashed passcode
     *  [2] = country
     *  [3] = region
     *  [4] = email
     */
    $exploded_data = explode(";", $newuserdata);

    #TEST 1: Check if username follows rules.
    checkusernamevalidity($exploded_data[0]);

    #TARGET 1 : Check new registeree info against other registrees
    if (!checkusernameavailability($exploded_data[0])) {
        throw new UsernameAlreadyTaken($exploded_data[0]);
    }

    #TARGET 3: Send to DB new information
    $conn = create_conn();

    $raw_addtodb_newregist = $conn->prepare("INSERT INTO waiting_regist VALUES (?,?,?,?,?)");

    $raw_addtodb_newregist->bind_param("sssss", $exploded_data[0], $exploded_data[1], $exploded_data[2], $exploded_data[3], $exploded_data[4]);

    $raw_addtodb_newregist->execute();

    $conn->close();

    return "INFO:RegSuccess:Registration Success for:" . $exploded_data[0];
}

/** Check if a registration link is valid and active. If so, move the linked registree to the table of users.
 * 
 */
function confirm_register(string $regist_ticket)
{

    class RegistrationNonexisting extends Exception
    {
        public function __construct($faultyregistlink, $code = 0, Throwable $previous = null)
        {
            parent::__construct("Registration link '" . $faultyregistlink . "' does not exist.", $code, $previous);
        }
    }

    class RegistrationExpired extends Exception
    {
        public function __construct($faultyregistlink, $expirydate = "unknown", $code = 0, Throwable $previous = null)
        {
            parent::__construct("Registration link '" . $faultyregistlink . "' has expired (Date: " . $expirydate . ").", $code, $previous);
        }
    }

    $conn = create_conn();

    $raw_checkregistration = $conn->prepare("SELECT COUNT(*) FROM waiting_regist WHERE regist_ticket = ?");
    $raw_checkregistration->bind_param("s", $regist_ticket);
    $raw_checkregistration->bind_result($validregistcount);

    $raw_checkregistration->execute();
    $raw_checkregistration->fetch();

    if ($validregistcount = 1) { //unsure if this is supposed to be here
        $raw_get_registree_details = $conn->prepare("SELECT * FROM waiting_regist WHERE regist_ticket = ?");
        $raw_get_registree_details->bind_param("s", $regist_ticket);
        $raw_get_registree_details->bind_result($registid, $username, $passhash, $country, $region, $email);
        $raw_get_registree_details->execute();
        $raw_get_registree_details->fetch();

        $raw_insert_newuser = $conn->prepare("INSERT INTO users (username, passhash, country, region, email) VALUES (?,?,?,?,?)");
        $raw_insert_newuser->bind_param($registid, $username, $passhash, $country, $region, $email);
        $raw_insert_newuser->execute();
        $conn->close();
        return "IFO: " . $username . " is now regular user.";
    } else if ($validregistcount = 0) {
        $conn->close();
        return "ERR: RegistrationID does not exists";
    }
}

/**Creates a new authkey instance for a user, and gives it to client browser.
 * 
 * @return string authkey for identity-sensitive operations
 */
function log_in(string $username, string $passhash)
{
    class BadCredentials extends Exception
    {
        public function __construct($username = "unknown username", $code = 0, Throwable $previous = null)
        {
            parent::__construct("Log-in attempt for " . $username . " failed: mismatched password.", $code, $previous);
        }
    }

    class IncompleteCredentials extends Exception
    {
        public function __construct(Throwable $previous = null)
        {
            parent::__construct("Log-in attempt failed due to missing password or username.", 0, $previous);
        }
    }

    class CredentialCollision extends Exception
    {
        public function __construct(string $username)
        {
            parent::__construct("Account holding username '" . $username . "' has collided with another!");
        }
    }

    $conn = create_conn();

    if (is_null($passhash) or is_null($username)) {
        throw new IncompleteCredentials();
    }

    $raw_check_credentials = $conn->prepare("SELECT COUNT(*), userid FROM users WHERE username = ? AND passhash = ?");
    $raw_check_credentials->bind_param($username, $passhash);
    $raw_check_credentials->bind_result($count, $userid);
    $raw_check_credentials->execute();
    $raw_check_credentials->fetch();

    if ($count > 1) {
        throw new CredentialCollision($username);
    }
    if ($count < 1) {
        throw new BadCredentials();
    }

    $raw_give_new_authkey = $conn->prepare("INSERT INTO authkeys (key, userid) VALUES (?, ?)");
    $datenow = date("YmdHis");
    $new_authkey = hash('sha512', "{$username}_{$passhash}_{$datenow}");
    $raw_give_new_authkey->bind_param("ss", $new_authkey, $userid);
    $raw_give_new_authkey->execute();

    $conn->close();

    return $new_authkey;
}

function log_out(string $hashkey)
{
}

function convert_to_seller(string $username, string $authkey)
{
    $conn = create_conn();

    checkalive_authkey($authkey, $username); //If this fails, it throws an exception.
}

// VALIDATION AND INQUIRIES

function checkusernamevalidity(string $username)
{
    class BadUsername extends Exception
    {
        public function __construct($faultyusername, $code = 0, Throwable $previous = null)
        {
            parent::__construct("Username " . $faultyusername . " is not valid.", $code, $previous);
        }

        public function __toString(): string
        {
            return __CLASS__ . ": [{$this->code}]: {$this->message}. ";
        }
    }

    //Test 1: Check length
    if (strlen($username) < USERNAME_LENGTH_MIN or strlen($username) > USERNAME_LENGTH_MAX) {
        return false;
    }
    //Test 2: Deny symbols disallowed 
    if (preg_match("/^[a-zA-Z][a-zA-Z0-9]*[._-]?[a-zA-Z0-9]+$/", $username) < 1) {
        return false;
    }
    return true;
}

function checkusernameavailability(string $username)
{
    $conn = create_conn();

    $raw_checkagainstusers = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $raw_checkagainstusers->bind_param("s", $username);
    $raw_checkagainstusers->bind_result($usermatches);
    $raw_checkagainstregistrees = $conn->prepare("SELECT COUNT(*) FROM registrees WHERE username = ?");
    $raw_checkagainstregistrees->bind_param("s", $username);
    $raw_checkagainstregistrees->bind_result($regimatches);

    $raw_checkagainstusers->execute();
    $raw_checkagainstusers->fetch();
    $raw_checkagainstregistrees->execute();
    $raw_checkagainstregistrees->fetch();

    if ($usermatches > 0 or $regimatches > 0) {
        $conn->close();
        return false;
    }
    $conn->close();
    return true;
}

/** Get an user's id number or username, depending on parameter arguments
 *
 * @param string $usernameorid known user identifier
 * @return string|false userid or username, or `false` if none is found.
 * 
 */
function getuseralt(string $usernameorid)
{
    $conn = create_conn();

    if (ctype_digit($usernameorid)) {
        $raw_getusername = $conn->prepare("SELECT COUNT(username), username FROM users WHERE userid = ?");
        $raw_getusername->bind_param("s", $usernameorid);
        $raw_getusername->bind_result($username_count, $retrieved_username);
        $raw_getusername->execute();
        $raw_getusername->fetch();
        if ($username_count < 1) {
            return false;
        }
        return (string) $retrieved_username;
    } else {
        $raw_getuserid = $conn->prepare("SELECT COUNT(userid), userid FROM users WHERE username = ?");
        $raw_getuserid->bind_param("i", intval($usernameorid));
        $raw_getuserid->bind_result($userid_count, $retrieved_userid);
        $raw_getuserid->execute();
        $raw_getuserid->fetch();
        if ($userid_count < 1) {
            return false;
        }
        return (string) $retrieved_userid;
    }
}

/** Check if the authkey is still valid (alive). 
 * 
 * Important to call this if concerning changes to account (e.g. editing information, listings, etc.).
 * 
 */
function checkalive_authkey($hashkey, $userid)
{
    /**Exception for reporting dead/fake authkey
     * 
     * Codes:
     * 
     * 0 = Authkey non-existent
     * 
     * 1 = Authkey expired
     * 
     * 2 = Multiple authkey collision
     * 
     * 3 = authkey doesn't match owner
     * 
     */
    class BadAuthKey extends Exception
    {
        public function __construct($faultyauthkey, $code = 0, Throwable $previous = null)
        {
            parent::__construct("AuthKey " . $faultyauthkey . " is not valid", $code, $previous);
        }

        public function __toString(): string
        {
            return __CLASS__ . ": [{$this->code}]: {$this->message}. ";
        }
    }

    $conn = create_conn();

    $stmt_checkifexists = $conn->prepare("SELECT COUNT(*), UNIX_TIMESTAMP(active_until), UNIX_TIMESTAMP(NOW()), userid FROM hashkeys WHERE hashkey = ?");
    $stmt_checkifexists->bind_param("s", $hashkey);
    $stmt_checkifexists->bind_result($match_count, $active_until, $time_now, $ownerid);

    $stmt_checkifexists->execute();
    $stmt_checkifexists->fetch();

    //check if hashkey either collides with another or not
    if ($match_count > 1) {
        throw new BadAuthKey($hashkey, 2);
    }
    if ($match_count < 1) {
        throw new BadAuthKey($hashkey, 0);
    }
    //check if hashkey is still active
    if ($active_until < $time_now) {
        throw new BadAuthKey($hashkey, 1);
    }
    //check if hashkey belongs to rightful owner
    if ($userid != $ownerid) {
        throw new BadAuthKey($hashkey, 3);
    }
    return true;
}

function getlistofusers ($adminid, $hashkey) {

}
