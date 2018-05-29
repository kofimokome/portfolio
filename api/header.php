<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/9/17
 * Time: 11:44 AM
 */
session_start();
error_reporting(false);
$server = 'localhost';//Set your server name here
$user = 'root';//Set your server user name here
$password = 'root';//Set your server password here
$dbname = 'kofi';// Set your database name here
$con = mysqli_connect($server, $user, $password);

if ($con->connect_errno) {
    $error = array("message" => "could not connect to server", "status" => false);
    //$con->connect_error;
    echo json_encode($error);
    die();
}
$query = "create database if not exists {$dbname}";
if (!$con->query($query)) {
    $error = array("message" => "could not create database", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}

if (!$con->select_db($dbname)) {
    $error = array("message" => "could not connect to database", "status" => false);
    //$con->connect_error;
    echo json_encode($error);
    die();
}

$query = "create table if not EXISTS admins(id int auto_increment primary key,name varchar(200) not null,type enum('admin', 'moderator') not null,password varchar(255) not null)";
if (!$con->query($query)) {
    $error = array("message" => "could not create users table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}

$query = "create table if not exists contacts
(
	id int auto_increment
		primary key,
	name varchar(200) not null,
	email varchar(200) null,
	subject varchar(200) not null,
	phone int(50) null,
	message text not null
)";
if (!$con->query($query)) {
    $error = array("message" => "could not create players table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}
$query = "create table if not exists portfolio
(
	id int auto_increment
		primary key,
	name varchar(200) not null,
	picture varchar(200) not null,
	description text not null,
	link varchar(200) null,
	technology varchar(200) not null
)";
if (!$con->query($query)) {
    $error = array("message" => "could not create sessions table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}
$query = "create table if not exists skills
(
	id int auto_increment
		primary key,
	name varchar(200) not null,
	icon varchar(255) not null
)";
if (!$con->query($query)) {
    $error = array("message" => "could not create sessions table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}
$query = "create table if not exists testimonials
(
	id int auto_increment
		primary key,
	name varchar(200) not null,
	position varchar(200) not null,
	company varchar(200) not null,
	testimonial text not null,
	picture varchar(200) not null,
	link varchar(200) null
)";
if (!$con->query($query)) {
    $error = array("message" => "could not create sessions table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}
$query = "create table if not exists social
(
	id int auto_increment primary key,
	name varchar(200) not null,
	link varchar(200) not null,
	icon varchar(200) not null
)";
if (!$con->query($query)) {
    $error = array("message" => "could not create social table", "status" => false);
    echo json_encode($error);
    //$con->error;
    die();
}