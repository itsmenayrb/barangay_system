<?php
    include 'dbh.inc.php';
    function generateNewString($len = 10){
        $token = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $token = str_shuffle($token);
        $token = substr($token, 0, $len);

        return $token;
    }

    function redirectToLoginPage(){
        header("Location: login.php");
        exit();
    }

    /**
     * Check if a string is a valid date(time)
     *
     * DateTime::createFromFormat requires PHP >= 5.3
     * 
     * Source: https://www.pontikis.net/tip/?id=21
     *
     * @param string $str_dt
     * @param string $str_dateformat
     * @param string $str_timezone (If timezone is invalid, php will throw an exception)
     * @return bool
     */
    function isValidDateTimeString($str_dt, $str_dateformat, $str_timezone) {
        $date = DateTime::createFromFormat($str_dateformat, $str_dt, new DateTimeZone($str_timezone));
        return $date && DateTime::getLastErrors()["warning_count"] == 0 && DateTime::getLastErrors()["error_count"] == 0;
    }
    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>