<!doctype html>
<html lang="en">

<head>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kofi Mokome</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/font-mfizz/font-mfizz.css">
    <link rel="stylesheet" href="css/jquery.fullpage.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="script/jquery-3.1.0.js"></script>
    <script src="script/bootstrap.js"></script>
    <script src="script/jquery.fullpage.js"></script>
</head>

<body data-spy="scroll" data-target="#nav-bar">
<div id="nav-bar">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="files/logo.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" style="color:#fff;">Home</a></li>
                    <li><a href="#portfolio" style="color:#fff;">Projects</a></li>
                    <li><a href="#contact" style="color:#fff;">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<div id="fullpage">
    <div class="section" id="home">
        <div id="particles-js"></div>
        <div id="welcome-text"></div>
        <img src="files/logo.png" alt="my logo" id="logo" class="img-responsive">
        <span class="fa-angle-double-down fa fa-4x" id="next"></span>

    </div>
</div>
<div id="page-loading" class="">
    <span class="fa fa-spinner fa-pulse fa-5x fa-fw" style="margin-left: 40%"></span> Loading...
</div>
<div id="page-loading-failed" class="text-center alert alert-danger hidden">
    <span class="fa fa-warning fa-4x"></span>
    <p><b>Error!!:</b> Please Try Again Later</p>
</div>
<div class="hidden" id="page-loaded">
    <div id="portfolio" class="row">

        <div class="container">
            <h1>Projects</h1>
            <div class="row" id="projects">
                <!- My Projects here-->
            </div>
            <div class="row">
                <div class="container">
                    <a href="#" id="morePortfolio">View More <span class="fa fa-plus"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div id="testimonial" class="row">
        <div class="container">
            <h1>Testimonials</h1>
            <div class="row" id="testimonials">
                <!- My Testimonials Here -->
            </div>
            <div class="row">
                <div class="container">
                    <a href="#" style="color:white" id="moreTestimonials">View More <span class="fa fa-plus"></span></a>
                </div>
            </div>

        </div>
    </div>
    <div id="skills" class="row">
        <div class="container">
            <h1>My Skills</h1>
            <div class="row">
                <div class="col-md-12" id="skill">

                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="row">
        <div class="container">
            <h1>Contact Me</h1>
            <div class="col-md-4 col-md-offset-1">
                <h3>
                    <span class="fas fa-envelope"></span> :
                    <a href="mailto:hire@kofimokome.ml">hire@kofimokome.ml</a>
                </h3>
                <p id="socials">
                    Loading...
                </p>
            </div>
            <div class="col-md-6">
                <form class="form-horizontal" id="contact-form">
                    <div class="form-group">
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-4 col-md-3">
                            <select name="" id="" class="form-control">
                                <option value="">+237</option>
                                <option value="">+236</option>
                                <option value="">+235</option>
                            </select>
                        </div>
                        <div class="col-xs-6 col-md-7 ">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-xs-10">
                            <textarea class="form-control" name="message" placeholder="Your Message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-10">
                            <button type="submit" class="btn btn-default btn-block disabled">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <div class="container">
        <div class="col-md-6 col-md-push-3 text-center">
            <h3>"You may never know what you have until you loose it"</h3>
            <hr>
            <span class="far fa-copyright "></span> <?php echo Date( "Y" ); ?> Kofi Mokome
        </div>
    </div>
</footer>
</body>

<script src="script/particles.min.js"></script>
<script src="script/scripts.js"></script>
<script src="script/typed.js"></script>
<script src="script/scrollreveal.js"></script>

</html>
