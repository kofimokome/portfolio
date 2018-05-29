<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/9/17
 * Time: 11:57 AM
 */

include_once("header.php");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admins WHERE name='{$username}' AND password='{$password}'";
if ($result = $con->query($query)) {
    $result = $result->fetch_object();
    if (is_null($result)) {
        echo json_encode(
            array(
                'message' => 'Username and password combination does not match',
                'status' => false
            )
        );
    } else {
        if ($result->type == 'admin' || $result->type == 'moderator') {
            $_SESSION['loggedIn'] = 1;
            echo json_encode(
                array(
                    'message' => "success",
                    'status' => true
                )
            );
        }
    }
} else {
    echo json_encode(
        array(
            'message' => 'An Error Occured. Please try again',
            'status' => false
        )
    );
}