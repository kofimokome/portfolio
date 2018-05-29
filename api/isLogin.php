<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/18/17
 * Time: 3:00 AM
 */

include_once('header.php');
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    echo json_encode(
        array(
            'message' => true,
            'status' => 200
        )
    );
} else {
    echo json_encode(
        array(
            'message' => false,
            'status' => 200
        )
    );
}