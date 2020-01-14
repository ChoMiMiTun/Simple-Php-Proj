<?php

include_once "views/top.php";
require_once "systemgem/database.php";

function registerUser($username, $email, $password){

    if(usernameCheck($username) && emailCheck($email) && passwordCheck($password)){
        return insertUser($username, $email, $password);
    }else{
        return "Auth Fail!";
    }

}

function loginUser ($email, $password){

    if(emailCheck($email) && passwordCheck($password)){
        return userLogin ($email, $password);
    }else{
        return "Auth Fail!";
    }

}

function usernameCheck($username) {
    # char > 6 
    # a-zA-Z0-9

    if(strlen($username) >= 6){
        $bol = preg_match('/^[\w]+$/', $username);
        return $bol;
    }else{
        return false;
    }
}

function emailCheck($email) {
    # aA@a.com 
    # at least 15 char

    if(strlen($email) >= 15){

    $bol = preg_match('/^[a-zA-Z0-9]+@[a-z]+\.[a-z]{2,4}+$/' , $email);
        return $bol;
    }else{
            return false;
        }
}

function passwordCheck($password) {
    # pas at least 6
    # small letter
    # capital letter
    # special char
    # digit num
    if(strlen($password) >= 6) {
        $bol = preg_match('/^[\w]+$/', $password);
        return $bol;
    }else{
            return false;
        }
}


// $bol = passwordCheck("asdfdfA1");
// echo $bol ? "True" : "False";