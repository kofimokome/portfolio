<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 10/28/17
 * Time: 1:38 PM
 */
include_once("header.php");

$id = $_POST['id'];
$name = $_POST['name'];
$position = $_POST['position'];
$company = $_POST['company'];
$link = $_POST['link'];
$testimonial = $_POST['testimonial'];

if ($name == '' || $position == '' || $company == '' || $link == '' || $testimonial == '') {
    $data = array(
        'success' => false,
        'status' => 200,
        'error' => "Fill all required fields"
    );
    echo json_encode($data);
} else {

    $query = "UPDATE testimonials SET  name = '{$name}', position = '{$position}', company = '{$company}', testimonial = '{$testimonial}', link = '{$link}' WHERE id = {$id}";

    if (!file_exists($_FILES['picture']['tmp_name']) || !is_uploaded_file($_FILES['picture']['tmp_name'])) {
        if ($con->query($query)) {
            $data = array(
                'success' => true,
                'status' => 200
            );

            echo json_encode($data);
        } else {
            $data = array(
                'success' => false,
                'status' => 200,
                'error' => $con->error
            );
            echo json_encode($data);
        }
    } else {
        $target_dir = "../files/testimonials/";
        $real_file = $target_dir . basename($_FILES["picture"]["name"]);
        $imageFileType = pathinfo($real_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check) {
            // Allow certain file formats
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
                || $imageFileType == "gif" || $imageFileType == "JPG" || $imageFileType == "PNG" || $imageFileType == "JPEG"
                || $imageFileType == "GIF"
            ) {
                // if everything is ok, try to upload file
                $target_file = $target_dir . $id . ".png";
                $picture = $id . ".png";
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                    if ($con->query("UPDATE testimonials SET  name = '{$name}', position = '{$position}', company = '{$company}', testimonial = '{$testimonial}', picture = '{$picture}', link = '{$link}' WHERE id = {$id}")) {
                        $data = array(
                            'success' => true,
                            'status' => 200
                        );

                        echo json_encode($data);
                    } else {
                        $data = array(
                            'success' => false,
                            'status' => 200,
                            'error' => $con->error
                        );
                        echo json_encode($data);
                    }
                } else {
                    $data = array(
                        'success' => false,
                        'status' => 200,
                        'error' => "Sorry, there was an error uploading your file. Please try again"
                    );
                    echo json_encode($data);
                }

            } else {
                $data = array(
                    'success' => false,
                    'status' => 200,
                    'error' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."
                );
                echo json_encode($data);
            }
        } else {
            $data = array(
                'success' => false,
                'status' => 200,
                'error' => "File is not an image"
            );

            echo json_encode($data);
        }
    }
}