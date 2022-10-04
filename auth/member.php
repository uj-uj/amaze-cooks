<?php
namespace Phppot;

use Phppot\DataSource;

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM users WHERE id = ?";
        $paramType = "i";
        $paramArray = array(
            $memberId
        );
        $memberResult = $this->ds->select($query, $paramType, $paramArray);

        return $memberResult;
    }

    public function processLogin($username, $password)
    {
        
        $query = "select * FROM users WHERE name = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array(
            $username,
            $password
        );
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if (! empty($memberResult)) {
            $_SESSION["user_name"] = $memberResult[0]["name"];
            return true;
        }
        return false;
    }
}
?>