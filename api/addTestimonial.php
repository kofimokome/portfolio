<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 11/9/17
 * Time: 8:59 AM
 */

include_once('header.php');

$name = $_POST['name'];
$position = $_POST['position'];
$company = $_POST['company'];
$link = $_POST['link'];
$Testimonial = $_POST['testimonial'];
$picture = "0.png";

if ($name == '' || $position == '' || $company == '' || $link == '' || $Testimonial == '') {
    $data = array(
        'success' => false,
        'status' => 200,
        'error' => "Fill all required fields"
    );
    echo json_encode($data);
} else {
    $testimonial = array(
        'name' => $name,
        'position' => $position,
        'company' => $company,
        'link' => $link,
        'picture' => $picture,
        'testimonial' => $Testimonial
    );
    $testimonial = (object)$testimonial;

    $query = $con->prepare("INSERT INTO testimonials(id, name, position, company, testimonial, picture, link) values (null, '{$name}', '{$position}', '{$company}', '{$Testimonial}', ?, '{$link}')");

    if (!file_exists($_FILES['picture']['tmp_name']) || !is_uploaded_file($_FILES['picture']['tmp_name'])) {
        $query->bind_param("s", $picture);
        if ($query->execute()) {
            $data = array(
                'success' => true,
                'status' => 200,
                'testimonial' => $testimonial
            );

            echo json_encode($data);
        } else {
            $data = array(
                'success' => false,
                'status' => 200,
                'error' => "The server encountered an error. Please try again"
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
                if ($result = $con->query("SELECT MAX(id) FROM testimonials")) {
                    $result = $result->fetch_assoc();
                    $last = $result['MAX(id)'];
                    $last = $last + 1;
                    $target_file = $target_dir . $last . ".png";
                    $picture = $last . ".png";

                    // if everything is ok, try to upload file
                    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                        $query->bind_param("s", $picture);
                        if ($query->execute()) {
                            $data = array(
                                'success' => true,
                                'status' => 200,
                                'testimonial' => $testimonial
                            );

                            echo json_encode($data);
                        } else {
                            $data = array(
                                'success' => false,
                                'status' => 200,
                                'error' => "The server encountered an error. Please try again"
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
                        'error' => "The server encountered an error. Please try again"
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