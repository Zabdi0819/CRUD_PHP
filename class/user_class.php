<?php

include_once('connection_class.php');

class User
{

    private $db;

    public function __construct()
    {
        $con = new DBConnection();
        $this->db = $con->getConnection();
    }

    /**
     * Search for user with the entered credentials
     * @param string	$username		       	Username
	 * @param  string	$password       		Password
     * @return int	< 0 if no found, > 0 if found
     */
    public function fetch($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'";

        $resql = $this->db->query($sql);

        if ($resql->num_rows > 0) {
            return 1;
        } else {
            return -1;
        }
    }
}
