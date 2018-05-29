/**
 * Created by kofi on 9/21/17.
 */

$(document).ready(function () {
    getData();
});

$("#newSkill-form").submit(function (e) {
    e.preventDefault();
    var temp = $("#newSkill-form").serializeArray();
    $.post('../api/addSkill.php', {skill: temp}, function (response) {
        response = JSON.parse(response);
        // console.log(response);
        if (response.success) {
            $("#skills-view").append('<tr>'
                + '<td>' + response.skill.name + '</td>'
                + '<td>'
                + '<input type="text" class="form-control" placeholder="icon" name="' + response.skill.name + '" value="' + response.skill.icon + '">'
                + '</td>'
                + '</tr>');
            $("#skills-submit-success").removeClass('hidden');
            $("#skills-submit-failure").addClass('hidden');
        } else {
            $("#skills-submit-error").html(response.error);
            $("#skills-submit-failure").removeClass('hidden');
            $("#skills-submit-success").addClass('hidden');
        }
    }).fail(function () {
        $("#skills-submit-error").html("An Error Occured, please try again");
        $("#skills-submit-failure").removeClass('hidden');
        $("#skills-submit-success").addClass('hidden');
    });
});
$("#newSocial-form").submit(function (e) {
    e.preventDefault();
    var temp = $("#newSocial-form").serializeArray();
    $.post('../api/addSocial.php', {social: temp}, function (response) {
        response = JSON.parse(response);
        // console.log(response);
        if (response.success) {
            $("#socials-view").append('<tr>'
                + '<td>' + socials[i].name + '</td>'
                + '<td>'
                + '<input type="text" class="form-control" placeholder="link" name="' + socials[i].link + '" value="' + socials[i].link + '">'
                + '</td>'
                + '<td>'
                + '<input type="text" class="form-control" placeholder="icon" name="' + socials[i].icon + '" value="' + socials[i].icon + '">'
                + '</td>'
                + '</tr>');

            $("#socials-submit-success").removeClass('hidden');
            $("#socials-submit-failure").addClass('hidden');
        } else {
            $("#socials-submit-error").html(response.error);
            $("#socials-submit-failure").removeClass('hidden');
            $("#socials-submit-success").addClass('hidden');
        }
    }).fail(function () {
        $("#socials-submit-error").html("An Error Occured, please try again");
        $("#socials-submit-failure").removeClass('hidden');
        $("#socials-submit-success").addClass('hidden');
    });
});

$("#newPortfolio-form").submit(function (e) {
    e.preventDefault();
    var myForm = document.getElementById('newPortfolio-form');
    var temp = new FormData(myForm);

    $.ajax({
        url: '../api/addPortfolio.php',
        data: temp,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function (response) {
            response = JSON.parse(response);
            // console.log(response);
            if (response.success) {
                $("#portfolio-view").append('<div class="col-md-3 col-xs-4">'
                    + '<div class="thumbnail cursor" data-toggle="modal" data-placement="left" title="' + response.portfolio.name + '" data-target="#project' + response.portfolio.id + '">'
                    + '<img src="../files/portfolio/' + response.portfolio.picture + '" alt="Picture">'
                    + '</div>'
                    + '<div class="modal fade" id="project' + response.portfolio.id + '" tabindex="-1" role="dialog" aria-labelledby="project' + response.portfolio.id + '">'
                    + '<div class="modal-dialog" role="document">'
                    + '<div class="modal-content">'
                    + '<div class="modal-body">'
                    + '<div class="thumbnail">'
                    + '<img src="../files/portfolio/' + response.portfolio.picture + '" alt="Portfolio pic">'
                    + '<div class="caption">'
                    + '<form id="portfolio-form">'
                    + '<strong>Name: </strong><input type="text" class="form-control" name="name" value="' + response.portfolio.name + '">'
                    + '<p><strong>Description: </strong><input type="text" class="form-control" name="description" value="' + response.portfolio.description + '"></p>'
                    + '<p> <strong>Technologies used: </strong><input type="text" class="form-control" name="technology" value="' + response.portfolio.technology + '"></p>'
                    + '<p> <strong>Link: </strong><input type="text" class="form-control" name="link" value="' + response.portfolio.link + '"></p>'
                    + '<p> <strong>Picture: </strong><input type="file" class="form-control" name="picture"></p>'
                    + '<button class="btn btn-primary" role="button" type="submit" id="portfolio-button">Save</button> '
                    + '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>'
                    + '</form>'
                    + '</p>'

                    + '</div> </div> </div> </div> </div> </div> </div>');

                $("#portfolio-submit-success").removeClass('hidden');
                $("#portfolio-submit-failure").addClass('hidden');
            } else {
                $("#portfolio-submit-error").html(response.error);
                $("#portfolio-submit-failure").removeClass('hidden');
                $("#portfolio-submit-success").addClass('hidden');
            }
        },
        error: function () {
            $("#portfolio-submit-error").html("An Error Occured, please try again");
            $("#portfolio-submit-failure").removeClass('hidden');
            $("#portfolio-submit-success").addClass('hidden');
        }
    });
});

$("#newTestimonial-form").submit(function (e) {
    e.preventDefault();
    var myForm = document.getElementById('newTestimonial-form');
    var temp = new FormData(myForm);

    $.ajax({
        url: '../api/addTestimonial.php',
        data: temp,
        type: 'POST',
        contentType: false,
        processData: false,
        success: function (response) {
            response = JSON.parse(response);
            // console.log(response);
            if (response.success) {
                $("#testimonial").append('<div class="col-md-4 col-lg-3 col-xs-6">'
                    + '<div class="user-img">'
                    + '<img src="../files/testimonials/' + response.testimonial.picture + '" alt="picture">'
                    + '<p> ' + response.testimonial.name + ' <br> <i>' + response.testimonial.position + '</i><br>'
                    + '<a href="' + response.testimonial.link + '">' + response.testimonial.company + '</a> </p> </div>'
                    + '<button class="btn btn-default" data-toggle="modal" data-target="#testimonial' + response.testimonial.id + '">Edit</button>'
                    + '</div>'
                    + '<div class="modal fade" id="testimonial' + response.testimonial.id + '" tabindex="-1" role="dialog" aria-labelledby="testimonial' + response.testimonial.id + '">'
                    + '<div class="modal-dialog" role="document">'
                    + '<div class="modal-content">'
                    + '<div class="modal-body">'
                    + '<div class="thumbnail">'
                    + '<img src="../files/testimonials/' + response.testimonial.picture + '" alt="picture">'
                    + '<div class="caption">'
                    + '<form id="testimonial-form">'
                    + '<p><strong>ID: </strong><input type="number" class="form-control disabled" name="id" value="' + response.testimonial.id + '" readonly></p>'
                    + '<p> <strong>Picture: </strong><input type="file" class="form-control" name="picture"></p>'
                    + '<strong>Name: </strong><input type="text" class="form-control" name="name" value="' + response.testimonial.name + '">'
                    + '<p><strong>Position: </strong><input type="text" class="form-control" name="position" value="' + response.testimonial.position + '"></p>'
                    + '<p> <strong>Link: </strong><input type="text" class="form-control" name="link" value="' + response.testimonial.link + '"></p>'
                    + '<p> <strong>Company: </strong><input type="text" class="form-control" name="company" value="' + response.testimonial.company + '"></p>'
                    + '<p> <strong>Testimonial </strong><textarea class="form-control" name="testimonial">' + response.testimonial.testimonial + '</textarea></p>'
                    + '<button class="btn btn-primary" role="button" type="submit" id="portfolio-button">Save</button> '
                    + '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>'
                    + '</form></div></div></div></div></div></div>');

                $("#testimonial-submit-success").removeClass('hidden');
                $("#testimonial-submit-failure").addClass('hidden');
            } else {
                $("#testimonial-submit-error").html(response.error);
                $("#testimonial-submit-failure").removeClass('hidden');
                $("#testimonial-submit-success").addClass('hidden');
            }
        },
        error: function () {
            $("#testimonial-submit-error").html("An Error Occured, please try again");
            $("#testimonial-submit-failure").removeClass('hidden');
            $("#testimonial-submit-success").addClass('hidden');
        }
    });
});

$('#logout').click(function (e) {
    e.preventDefault();
    $.getJSON('../api/logout.php', function (data) {
        if (data.status) {
            location.reload();
        }
    }).fail(function () {
        alert('An Error Has Occurred');
    });
});


function getData() {
    $.getJSON('../api/getdata.php', function (data) {
        //console.log(data);

        // Portfolio
        var portfolio = data.portfolio;
        for (let i = 0; i < portfolio.length; i++) {
            $("#portfolio-view").append('<div class="col-md-3 col-xs-4">' +
                '<div class="thumbnail cursor" data-toggle="modal" data-placement="left" title="' + portfolio[i].name + '" data-target="#project' + portfolio[i].id + '">' +
                '<img src="../files/portfolio/' + portfolio[i].picture + '" alt="Picture">' +
                '</div>' +
                '<div class="modal fade" id="project' + portfolio[i].id + '" tabindex="-1" role="dialog" aria-labelledby="project' + portfolio[i].id + '">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-body">' +
                '<div class="thumbnail">' +
                '<img src="../files/portfolio/' + portfolio[i].picture + '" alt="Portfolio pic">' +
                '<div class="caption">' +
                '<form id="portfolio-form' + portfolio[i].id + '">' +
                '<p><strong>ID: </strong><input type="number" class="form-control disabled" name="id" value="' + portfolio[i].id + '" readonly></p>' +
                '<strong>Name: </strong><input type="text" class="form-control" name="name" value="' + portfolio[i].name + '">' +
                '<p><strong>Description: </strong><input type="text" class="form-control" name="description" value="' + portfolio[i].description + '"></p>' +
                '<p> <strong>Technologies used: </strong><input type="text" class="form-control" name="technology" value="' + portfolio[i].technology + '"></p>' +
                '<p> <strong>Link: </strong><input type="text" class="form-control" name="link" value="' + portfolio[i].link + '"></p>' +
                '<p> <strong>Picture: </strong><input type="file" class="form-control" name="picture"></p>' +
                '<button class="btn btn-primary" role="button" type="submit" id="portfolio-button' + portfolio[i].id + '">Save</button> ' +
                '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>' +
                '</form>' +
                '</p>'
                + '<div class="alert alert-success text-center hidden" id="portfolio-button-success' + portfolio[i].id + '"> Portfolio has been updated </div>'
                + '<div class="alert alert-danger text-center hidden" id="portfolio-button-error' + portfolio[i].id + '"> </div>'
                + '</div> </div> </div> </div> </div> </div> <button class="btn btn-danger">Delete</button></div>');

            $("#portfolio-form" + portfolio[i].id).submit(function (e) {
                e.preventDefault();
                var myForm = document.getElementById('portfolio-form' + portfolio[i].id);
                var temp = new FormData(myForm);
                $("#portfolio-button" + portfolio[i].id).addClass('disabled');
                $.ajax({
                    url: '../api/updatePortfolio.php',
                    data: temp,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#portfolio-button" + portfolio[i].id).removeClass('disabled');
                        response = JSON.parse(response);
                        if (response.success) {
                            $("#portfolio-button-success" + portfolio[i].id).removeClass('hidden');
                            $("#portfolio-button-error" + portfolio[i].id).addClass('hidden');
                        } else {
                            $("#portfolio-button-error" + portfolio[i].id).removeClass('hidden');
                            $("#portfolio-button-success" + portfolio[i].id).addClass('hidden');
                            $("#portfolio-button-error" + portfolio[i].id).html(response.error);
                        }
                    },
                    error: function () {
                        $("#portfolio-button" + portfolio[i].id).removeClass('disabled');
                        $("#portfolio-button-error" + portfolio[i].id).removeClass('hidden');
                        $("#portfolio-button-success" + portfolio[i].id).addClass('hidden');
                        $("#portfolio-button-error" + portfolio[i].id).html("An Error Occurred. Please try again later");
                    }
                });
            });
        }

        // Testimonials
        var testimonials = data.testimonials;
        for (let i = 0; i < testimonials.length; i++) {
            $("#testimonial").append('<div class="col-md-4 col-lg-4 col-xs-6">'
                + '<div class="user-img">'
                + '<img src="../files/testimonials/' + testimonials[i].picture + '" alt="picture">'
                + '<p> ' + testimonials[i].name + ' <br> <i>' + testimonials[i].position + '</i><br>'
                + '<a href="' + testimonials[i].link + '">' + testimonials[i].company + '</a> </p> </div>'
                + '<button class="btn btn-default" data-toggle="modal" data-target="#testimonial' + testimonials[i].id + '">Edit</button> <button class="btn btn-danger">Delete</button>'
                + '</div>'
                + '<div class="modal fade" id="testimonial' + testimonials[i].id + '" tabindex="-1" role="dialog" aria-labelledby="testimonial' + testimonials[i].id + '">'
                + '<div class="modal-dialog" role="document">'
                + '<div class="modal-content">'
                + '<div class="modal-body">'
                + '<div class="thumbnail">'
                + '<img src="../files/testimonials/' + testimonials[i].picture + '" alt="picture">'
                + '<div class="caption">'
                + '<form id="testimonial-form' + testimonials[i].id + '">'
                + '<p><strong>ID: </strong><input type="number" class="form-control disabled" name="id" value="' + testimonials[i].id + '" readonly></p>'
                + '<p> <strong>Picture: </strong><input type="file" class="form-control" name="picture"></p>'
                + '<strong>Name: </strong><input type="text" class="form-control" name="name" value="' + testimonials[i].name + '">'
                + '<p><strong>Position: </strong><input type="text" class="form-control" name="position" value="' + testimonials[i].position + '"></p>'
                + '<p> <strong>Link: </strong><input type="text" class="form-control" name="link" value="' + testimonials[i].link + '"></p>'
                + '<p> <strong>Company: </strong><input type="text" class="form-control" name="company" value="' + testimonials[i].company + '"></p>'
                + '<p> <strong>Testimonial </strong><textarea class="form-control" name="testimonial">' + testimonials[i].testimonial + '</textarea></p>'
                + '<button class="btn btn-primary" role="button" type="submit" id="portfolio-button' + testimonials[i].id + '">Save</button> '
                + '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>'
                + '</form><br>'
                + '<div class="alert alert-success text-center hidden" id="testimonial-button-success' + testimonials[i].id + '"> Testimonial has been updated </div>'
                + '<div class="alert alert-danger text-center hidden" id="testimonial-button-error' + testimonials[i].id + '"> </div>'
                + '</div></div></div></div></div></div>');

            $("#testimonial-form" + testimonials[i].id).submit(function (e) {
                e.preventDefault();
                var myForm = document.getElementById('testimonial-form' + testimonials[i].id);
                var temp = new FormData(myForm);
                $("#testimonial-button" + testimonials[i].id).addClass('disabled');
                $.ajax({
                    url: '../api/updateTestimonial.php',
                    data: temp,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $("#testimonial-button" + testimonials[i].id).removeClass('disabled');
                        response = JSON.parse(response);
                        if (response.success) {
                            $("#testimonial-button-success" + testimonials[i].id).removeClass('hidden');
                            $("#testimonial-button-error" + testimonials[i].id).addClass('hidden');
                        } else {
                            $("#testimonial-button-error" + testimonials[i].id).removeClass('hidden');
                            $("#testimonial-button-success" + testimonials[i].id).addClass('hidden');
                            $("#testimonial-button-error" + testimonials[i].id).html(response.error);
                        }
                    },
                    error: function () {
                        $("#testimonial-button" + testimonials[i].id).removeClass('disabled');
                        $("#testimonial-button-error" + testimonials[i].id).removeClass('hidden');
                        $("#testimonial-button-success" + testimonials[i].id).addClass('hidden');
                        $("#testimonial-button-error" + testimonials[i].id).html("An Error Occurred. Please try again later");
                    }
                });
            });
        }

        // Skills
        var skills = data.skills;
        for (let i = 0; i < skills.length; i++) {
            $("#skills-view").append('<tr>'
                + '<td>' + skills[i].name + '</td>'
                + '<td>'
                + '<input type="text" class="form-control" placeholder="icon" name="' + skills[i].name + '" value="' + skills[i].icon + '">'
                + '</td>'
                + '</tr>');
        }
        $("#skills-form").submit(function (e) {
            e.preventDefault();
            var myVar = $("#skills-form").serializeArray();
            /*for (let i = 0; i < myVar.length; i++) {
             console.log(myVar[i]);
             }*/
            $("#skills-button").addClass('disabled');
            $.post('../api/updateSkills.php', {skills: myVar}, function (response) {
                // console.log(response);
                $("#skills-button").removeClass('disabled');
                response = JSON.parse(response);
                if (response.success) {
                    $("#skills-button-success").removeClass('hidden');
                    $("#skills-button-error").addClass('hidden');
                } else {
                    $("#skills-button-error").removeClass('hidden');
                    $("#skills-button-success").addClass('hidden');
                    $("#skills-button-error").html(response.error);
                }
            }).fail(function () {
                $("#skills-button").removeClass('disabled');
                $("#skills-button-error").removeClass('hidden');
                $("#skills-button-success").addClass('hidden');
                $("#skills-button-error").html("An Error Occurred");
            })
        });

        // Socials
        var socials = data.socials;
        for (let i = 0; i < socials.length; i++) {
            $("#socials-view").append('<tr>'
                + '<td>' + socials[i].name + '</td>'
                + '<td>' + socials[i].icon
                + '</td>'
                + '<td>'
                + '<input type="text" class="form-control" placeholder="link" name="' + socials[i].name + '" value="' + socials[i].link + '">'
                + '</td>'
                + '</tr>');
        }
        $("#socials-form").submit(function (e) {
            e.preventDefault();
            var myVar = $("#socials-form").serializeArray();
            /*for (let i = 0; i < myVar.length; i++) {
             console.log(myVar[i]);
             }*/
            $("#socials-button").addClass('disabled');
            $.post('../api/updateSocials.php', {socials: myVar}, function (response) {
                console.log(response);
                $("#socials-button").removeClass('disabled');
                response = JSON.parse(response);
                if (response.success) {
                    $("#socials-button-success").removeClass('hidden');
                    $("#socials-button-error").addClass('hidden');
                } else {
                    $("#socials-button-error").removeClass('hidden');
                    $("#socials-button-success").addClass('hidden');
                    $("#socials-button-error").html(response.error);
                }
            }).fail(function () {
                $("#socials-button").removeClass('disabled');
                $("#socials-button-error").removeClass('hidden');
                $("#socials-button-success").addClass('hidden');
                $("#socials-button-error").html("An Error Occurred");
            })
        });

    }).fail(function () {
        alert('An error occured');
    });
}

/*$('#myTabs a').click(function (e) {
 e.preventDefault()
 $(this).tab('show')
 })*/