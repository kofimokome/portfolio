<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/9/17
 * Time: 11:56 AM
 */
include_once("header.php");

$query = "SELECT * FROM portfolio";
$result = $con->query($query);
$portfolio = [];
while ($row = $result->fetch_assoc()) {
    array_push($portfolio, $row);
}

$query = "SELECT * FROM testimonials";
$result = $con->query($query);
$testimonials = [];
while ($row = $result->fetch_assoc()) {
    array_push($testimonials, $row);
}

$query = "SELECT * FROM skills";
$result = $con->query($query);
$skills = [];
while ($row = $result->fetch_assoc()) {
    array_push($skills, $row);
}

$query = "SELECT * FROM social";
$result = $con->query($query);
$socials = [];
while ($row = $result->fetch_assoc()) {
    array_push($socials, $row);
}

$data = array(
    "portfolio" => $portfolio,
    "testimonials" => $testimonials,
    "skills" => $skills,
    "socials" => $socials,
    "status" => 200,
);

echo json_encode($data);
