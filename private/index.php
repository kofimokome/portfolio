<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 9/13/17
 * Time: 5:00 AM
 */
session_start();
include('../api/function.php');
if (!isLogin()) {
    echo "<script>window.location = 'login.php';</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private</title>
    <script src="../script/jquery-3.1.0.js"></script>
    <script src="../script/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
</head>
<style>

    body {
        overflow-x: hidden;
    }

    .cursor {
        cursor: pointer;
    }

    .user-img img {
        width: 80px;
        height: 80px;
        border-radius: 50px;
        vertical-align: top !important;
        margin-bottom: 20px;
    }
</style>
<body>
<h1 class="text-center">Admin Panel</h1>
<div class="container">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#portfolio" role="tab"
                                                      data-toggle="tab">Portfolio</a></li>
            <li role="presentation"><a href="#skills" role="tab" data-toggle="tab">Skills</a>
            </li>
            <li role="presentation"><a href="#testimonials" role="tab" data-toggle="tab">Testimonials</a>
            </li>
            <li role="presentation"><a href="#socials" role="tab" data-toggle="tab">Socials</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="portfolio">
                    <h1 class="text-center">Portfolio</h1>
                    <button class="btn btn-default" data-toggle="modal" data-target="#newPortfolio">New Portfolio
                    </button>
                    <div class="modal fade" id="newPortfolio" tabindex="-1"
                         role="dialog" aria-labelledby="newSkill">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title">New Portfolio</h1>
                                </div>
                                <div class="modal-body">
                                    <form id="newPortfolio-form" name="newPortfolio-form">
                                        <strong>Name: </strong><input type="text" class="form-control" name="name">
                                        <p><strong>Description: </strong><input type="text" class="form-control"
                                                                                name="description"></p>
                                        <p><strong>Technologies used: </strong><input type="text" class="form-control"
                                                                                      name="technology"></p>
                                        <p><strong>Link: </strong><input type="text" class="form-control" name="link">
                                        </p>
                                        <p><strong>Picture: </strong><input type="file" class="form-control"
                                                                            name="picture"></p>
                                        <button class="btn btn-primary" role="button" type="submit"
                                                id="newPortfolio-button">Save
                                        </button>
                                        <a href="#" class="btn btn-default" role="button"
                                           data-dismiss="modal">Close</a>
                                    </form>
                                    <hr>
                                    <p>
                                    <div class="alert-warning alert alert-dismissable text-center hidden"
                                         id="portfolio-submit-failure">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <span id="portfolio-submit-error"></span>
                                    </div>
                                    <div class="alert alert-success alert-dismissible text-center hidden"
                                         id="portfolio-submit-success">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Portfolio has been added
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="portfolio-view">
                        <!-- Portfolio will appear here -->
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="skills">
                    <h1 class="text-center">Skills</h1>
                    <div class="row container">
                        <div class="col-md-3">
                            <button class="btn btn-default" data-toggle="modal" data-target="#newSkill">New Skill
                            </button>
                            <div class="modal fade" id="newSkill" tabindex="-1"
                                 role="dialog" aria-labelledby="newSkill">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">New Skill</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form id="newSkill-form">
                                                <p>
                                                    <strong>Name: </strong><input type="text" class="form-control"
                                                                                  name="name"
                                                                                  placeholder="Skill Name">
                                                </p>
                                                <p><strong>Icon: </strong><input type="text" class="form-control"
                                                                                  name="icon"
                                                                                  placeholder="Skill Icon">
                                                </p>
                                                <button class="btn btn-primary" role="button" type="submit"
                                                        id="newSkill-button">Save
                                                </button>
                                                <a href="#" class="btn btn-default" role="button"
                                                   data-dismiss="modal">Close</a>
                                            </form>
                                            <hr>
                                            <p>
                                            <div class="alert-warning alert alert-dismissable text-center hidden"
                                                 id="skills-submit-failure">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <span id="skills-submit-error"></span>
                                            </div>
                                            <div class="alert alert-success alert-dismissible text-center hidden"
                                                 id="skills-submit-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Skill has been added
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form id="skills-form">
                                <table class="table table-bordered" id="skills-view">
                                    <tr>
                                        <td><b>Skill</b></td>
                                        <td><b>Icon</b></td>
                                    </tr>
                                    <!-- Skills will appear here -->
                                </table>
                                <button id="skills-button" class="btn btn-block btn-default" type="submit">Update
                                </button>
                                <br>
                                <div class="alert alert-success text-center hidden" id="skills-button-success"> Skills
                                    Updated
                                </div>
                                <div class="alert alert-danger text-center hidden" id="skills-button-error"></div>
                            </form>

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="testimonials">
                    <div class="container">
                        <h1 class="text-center">Testimonials</h1>
                        <button class="btn btn-default" data-toggle="modal" data-target="#newTestimonial">New
                            Testimonial
                        </button>
                        <div class="modal fade" id="newTestimonial" tabindex="-1"
                             role="dialog" aria-labelledby="newSkill">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title">New Testimonial</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form id="newTestimonial-form" name="newTestimonial-form">
                                            <strong>Picture: </strong><input type="file" class="form-control"
                                                                             name="picture">
                                            <strong>Name: </strong><input type="text" class="form-control" name="name">
                                            <p><strong>Position: </strong><input type="text" class="form-control"
                                                                                 name="position"></p>
                                            <p><strong>Link: </strong><input type="text" class="form-control"
                                                                             name="link"></p>
                                            <p><strong>Company: </strong><input type="text" class="form-control"
                                                                                name="company"></p>
                                            <p><strong>Testimonial </strong><textarea class="form-control"
                                                                                      name="testimonial"></textarea></p>
                                            <button class="btn btn-primary" role="button" type="submit"
                                                    id="newTestimonial-button">Save
                                            </button>
                                            <a href="#" class="btn btn-default" role="button"
                                               data-dismiss="modal">Close</a>
                                        </form>
                                        <hr>
                                        <p>
                                        <div class="alert-warning alert alert-dismissible text-center hidden"
                                             id="testimonial-submit-failure">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <span id="testimonial-submit-error"></span>
                                        </div>
                                        <div class="alert alert-success alert-dismissible text-center hidden"
                                             id="testimonial-submit-success">
                                            <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            Testimonial has been added
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="testimonial">
                            dsd
                            <!-- TODO: Code this section -->
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="socials">
                    <h1 class="text-center">Socials</h1>
                    <div class="row container">
                        <div class="col-md-3">
                            <button class="btn btn-default" data-toggle="modal" data-target="#newSocial">New Social Network
                            </button>
                            <div class="modal fade" id="newSocial" tabindex="-1"
                                 role="dialog" aria-labelledby="newSocial">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">New Social Network</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form id="newSocial-form">
                                                <p>
                                                    <strong>Name: </strong><input type="text" class="form-control"
                                                                                  name="name"
                                                                                  placeholder="Social Name">
                                                </p>
                                                <p>
                                                    <strong>Link: </strong><input type="text" class="form-control"
                                                                                  name="link"
                                                                                  placeholder="Social Link">
                                                </p>
                                                <p><strong>Icon: </strong><input type="text" class="form-control"
                                                                                 name="icon"
                                                                                 placeholder="Social Icon">
                                                </p>
                                                <button class="btn btn-primary" role="button" type="submit"
                                                        id="newSocial-button">Save
                                                </button>
                                                <a href="#" class="btn btn-default" role="button"
                                                   data-dismiss="modal">Close</a>
                                            </form>
                                            <hr>
                                            <p>
                                            <div class="alert-warning alert alert-dismissable text-center hidden"
                                                 id="socials-submit-failure">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <span id="socials-submit-error"></span>
                                            </div>
                                            <div class="alert alert-success alert-dismissible text-center hidden"
                                                 id="socials-submit-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Social Network has been added
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <form id="socials-form">
                                <table class="table table-bordered" id="socials-view">
                                    <tr>
                                        <td><b>Name</b></td>
                                        <td><b>Icon</b></td>
                                        <td><b>Link</b></td>
                                    </tr>
                                    <!-- Skills will appear here -->
                                </table>
                                <button id="socials-button" class="btn btn-block btn-default" type="submit">Update
                                </button>
                                <br>
                                <div class="alert alert-success text-center hidden" id="socials-button-success"> Links
                                    Updated
                                </div>
                                <div class="alert alert-danger text-center hidden" id="socials-button-error"></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<a href="#" id="logout">Logout</a>
</body>
<script src="../script/private.js">
</script>
</html>
