<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/18/17
 * Time: 1:27 PM
 */

function isLogin()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
        return true;
    }else{
        return false;
    }
}