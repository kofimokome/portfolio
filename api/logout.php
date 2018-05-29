<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/18/17
 * Time: 4:17 AM
 */
include_once('header.php');
unset($_SESSION['loggedIn']);
echo json_encode(
    array(
        'message' => 'OK',
        'status' => true
    )
);