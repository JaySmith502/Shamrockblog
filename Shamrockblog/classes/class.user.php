<?php
include('class.password.php');
// class of user to determine if a current valid user and log them in
// credit to David Carr, I really wasn't planning to dig deep into hashing and password security, but after speaking with Mentor
// at Code Louisville it made sense to go ahead and do this right from the get go.  If not for David's excellent tutorial I
// likely never would have made this work correctly.  Check it out at www.daveismyname.com

class User extends Password
{

    private $db;

    function __construct($db)
    {
        parent::__construct();

        $this->db = $db;
    }

    public function is_logged_in()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }

    private function get_user_hash($username)
    {

        try {
            $statement = $this->db->prepare('SELECT password FROM tusers WHERE username = :username');
            $statement->execute(array(
                'username' => $username
            ));

            $row = $statement->fetch();
            return $row['password'];

        }
        catch (PDOException $e) {
            echo '<p class="error">' . $e->getMessage() . '</p>';
        }

    }

    public function login($username, $password)
    {

        $hashed = $this->get_user_hash($username);
        //verify the hash is correct
        if ($this->password_verify($password, $hashed) == 1) {
            //they match
            $_SESSION['loggedin'] = true;
            return true;
            //creating 'author' variable here doesn't work, put it in login.php instead.
            //$_SESSION['author'] = $username;
        }

    }

    public function logout()
    {
        session_destroy();
    }

}
?>