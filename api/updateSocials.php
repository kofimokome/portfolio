<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 10/28/17
 * Time: 1:04 PM
 */
include_once("header.php");
$error = false;
$skills = $_POST['socials'];
foreach ($skills as $skill) {
    $temp = (object)$skill;
    $query = "UPDATE social SET link = '{$temp->value}' WHERE name = '{$temp->name}'";
    if (!$con->query($query)) {
        $error = $con->error;
    }

}

if ($error) {
    $data = array(
        "success" => false,
        "status" => 200,
        "error" => $error
    );
    echo json_encode($data);
} else {
    $data = array(
        "success" => true,
        "status" => 200,
    );
    echo json_encode($data);
}


