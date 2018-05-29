/**
 * Created by kofi on 8/18/17.
 */
var morePortfolio = true;
var moreTestimonials = true;
var testimonials, portfolio, socials;
$(document).ready(function () {
    getData();

    //setInterval("animateNext()", 1800);


    /*$('a').on('click', function(event) {
     var $anchor = $(this);
     $('html, body').stop().animate({
     scrollTop: $($anchor.attr('href')).offset().top
     }, 1500, 'easeInOutExpo');
     event.preventDefault();
     });*/

    var options = {
        strings: ["Hi There !!!", "I Am Kofi Mokome", "I Am A Web Developer", "Welcome To My Portfolio", ""],
        loop: false,
        showCursor: true,
        cursorChar: '$',
        typeSpeed: 190,
        backSpeed: 150
    };
    var typed = new Typed('#welcome-text', options);
    typed.start();

    //window.sr = ScrollReveal();
    window.sr = ScrollReveal({
        reset: true
    });
    //sr.reveal('#portfolio');
    sr.reveal('#testimonial');
    sr.reveal('#contact');
    sr.reveal('#skills');
    sr.reveal('#footer');
    initFullPage();
});

function animateNext() {
    $("#next").animate({
        bottom: "20%"
    }, 500);
    $("#next").animate({
        bottom: "0%"
    }, 500);
}

function initFullPage() {
    $('#fullpage').fullpage({
        //Scrolling
        css3: true,
        scrollingSpeed: 700,
        autoScrolling: false,
        fitToSection: false,
        fitToSectionDelay: 1000,
        scrollBar: false,
        easing: 'easeInOutCubic',
        easingcss3: 'ease',
        loopBottom: false,
        loopTop: false,
        loopHorizontal: true,
        continuousVertical: false,
        continuousHorizontal: false,
        scrollHorizontally: false,
        interlockedSlides: false,
        resetSliders: false,
        fadingEffect: false,
        normalScrollElements: '#element1, .element2',
        scrollOverflow: false,
        scrollOverflowOptions: null,
        touchSensitivity: 15,
        normalScrollElementTouchThreshold: 5,
        bigSectionsDestination: null,
        //Accessibility
        keyboardScrolling: true,
        animateAnchor: true,
        recordHistory: true,
        //Design
        controlArrows: true,
        verticalCentered: true,
        sectionsColor: ['#ccc', '#fff'],
        paddingTop: '3em',
        paddingBottom: '10px',
        fixedElements: '#header, .footer',
        responsiveWidth: 0,
        responsiveHeight: 0,
        responsiveSlides: false
    });

    //$('body').scrollspy({target: '#nav-bar'})
    initParticles();

}

function initParticles() {
    /* ---- particles.js config ---- */

    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 50,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
}

function getData() {
    $.getJSON('api/getdata.php', function (data) {
        //console.log(data);

        // Portfolio
        portfolio = data.portfolio;
        showLessPortfolio();
        $("#morePortfolio").click(function (e) {
            e.preventDefault();
            if (morePortfolio) {
                showMorePortfolio();
            } else {
                showLessPortfolio();
            }
            morePortfolio = !morePortfolio;
        });

        // Testimonials
        testimonials = data.testimonials;
        showLessTestimonials();
        $("#moreTestimonials").click(function (e) {
            e.preventDefault();
            if (moreTestimonials) {
                showMoreTestimonials();
            } else {
                showLessTestimonials();
            }
            moreTestimonials = !moreTestimonials;
        });

        // Skills
        var skills = data.skills;
        $("#skill").html("");
        for (var i = 0; i < skills.length; i++) {
            $("#skill").append('<div class="col-md-2 skill col-sm-2 col-xs-3">'
                + '<span class="fa-5x ' + skills[i].icon + '"></span>'
                + '<p>' + skills[i].name + '</p>'
                + '</div>');
        }

        // Social Networks
        socials = data.socials;
        $("#socials").html("");
        for (var i = 0; i < socials.length; i++) {
            $("#socials").append('<a href="'+socials[i].link+'"><span class="'+socials[i].icon +' fa-3x"></span></a>');
        }

        $("#page-loading").addClass("hidden");
        $("#page-loaded").removeClass("hidden");
    }).fail(function () {
        $("#page-loading").addClass("hidden");
        $("#page-loading-failed").removeClass("hidden");
    });
}

function isTaken(num, arr) {
    for (var i = 0; i < arr.length; i++) {
        if (num === arr[i]) {
            return true;
        }
    }
    return false;
}

function showMoreTestimonials() {
    $("#testimonials").html("");
    for (var i = 0; i < testimonials.length; i++) {
        $("#testimonials").append('<div class="col-md-4 col-lg-3 col-xs-6">' +
            '<div class="user-img">' +
            '<img src="files/testimonials/' + testimonials[i].picture + '" alt="picture">' +
            '<p> ' + testimonials[i].name + ' <br> <i>' + testimonials[i].position + '</i><br>' +
            '<a href="' + testimonials[i].link + '">' + testimonials[i].company + '</a> </p> </div>' +
            '<div class="bubble-container">' +
            '<div class="talk-bubble tri-right left-top">' +
            '<div class="talktext"> <p>' + testimonials[i].testimonial +
            '</p> </div> </div> </div> </div>');
    }
    $("#moreTestimonials").html('View Less <span class="fa fa-minus"></span>');
}

function showLessTestimonials() {
    var taken = [];
    $("#testimonials").html("");
    for (var i = 0; i < 4; i++) {
        //console.log(Math.round(Math.random()*testimonials.length));
        var num = Math.round(Math.random() * (testimonials.length - 1));
        while (isTaken(num, taken)) {
            num = Math.round(Math.random() * (testimonials.length - 1));
        }
        taken.push(num);
        $("#testimonials").append('<div class="col-md-4 col-lg-3 col-xs-6">' +
            '<div class="user-img">' +
            '<img src="files/testimonials/' + testimonials[num].picture + '" alt="picture">' +
            '<p> ' + testimonials[num].name + ' <br> <i>' + testimonials[num].position + '</i><br>' +
            '<a href="' + testimonials[num].link + '">' + testimonials[num].company + '</a> </p> </div>' +
            '<div class="bubble-container">' +
            '<div class="talk-bubble tri-right left-top">' +
            '<div class="talktext"> <p>' + testimonials[num].testimonial +
            '</p> </div> </div> </div> </div>');
    }
    $("#moreTestimonials").html('View More <span class="fa fa-plus"></span>');
}

function showMorePortfolio() {
    $("#projects").html("");
    for (var i = 0; i < portfolio.length; i++) {
        $("#projects").append('<div class="col-md-3 col-xs-4">' +
            '<div class="thumbnail cursor" data-toggle="modal" data-placement="left" title="' + portfolio[i].name + '" data-target="#project' + portfolio[i].id + '">' +
            '<img src="files/portfolio/' + portfolio[i].picture + '" alt="Picture">' +
            '</div>' +
            '<div class="modal fade" id="project' + portfolio[i].id + '" tabindex="-1" role="dialog" aria-labelledby="project' + portfolio[i].id + '">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-body">' +
            '<div class="thumbnail">' +
            '<img src="files/portfolio/' + portfolio[i].picture + '" alt="Portfolio pic">' +
            '<div class="caption">' +
            '<h3><strong>Name: </strong>' + portfolio[i].name + '</h3>' +
            '<p><strong>Description: </strong>' + portfolio[i].description + '</p>' +
            '<p> <strong>Technologies used: </strong>' + portfolio[i].technology + '</p>' +
            '<p>' +
            '<a href="' + portfolio[i].link + '" class="btn btn-primary" role="button">Open</a> ' +
            '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>' +
            '</p>'

            +
            '</div> </div> </div> </div> </div> </div> </div>');
    }
    $("#morePortfolio").html('View Less <span class="fa fa-minus"></span>');
}

function showLessPortfolio() {
    $("#projects").html("");
    var taken = [];
    for (var num = 0; num < 4; num++) {
        var i = Math.round(Math.random() * (portfolio.length - 1));
        while (isTaken(i, taken)) {
            i = Math.round(Math.random() * (portfolio.length - 1));
        }
        taken.push(i);
        $("#projects").append('<div class="col-md-3 col-xs-4">' +
            '<div class="thumbnail cursor" data-toggle="modal" data-placement="left" title="' + portfolio[i].name + '" data-target="#project' + portfolio[i].id + '">' +
            '<img src="files/portfolio/' + portfolio[i].picture + '" alt="Picture">' +
            '</div>' +
            '<div class="modal fade" id="project' + portfolio[i].id + '" tabindex="-1" role="dialog" aria-labelledby="project' + portfolio[i].id + '">' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-body">' +
            '<div class="thumbnail">' +
            '<img src="files/portfolio/' + portfolio[i].picture + '" alt="Portfolio pic">' +
            '<div class="caption">' +
            '<h3><strong>Name: </strong>' + portfolio[i].name + '</h3>' +
            '<p><strong>Description: </strong>' + portfolio[i].description + '</p>' +
            '<p> <strong>Technologies used: </strong>' + portfolio[i].technology + '</p>' +
            '<p>' +
            '<a href="' + portfolio[i].link + '" class="btn btn-primary" role="button">Open</a> ' +
            '<a href="#" class="btn btn-default" role="button" data-dismiss="modal">Close</a>' +
            '</p>'

            +
            '</div> </div> </div> </div> </div> </div> </div>');
    }
    $("#morePortfolio").html('View More <span class="fa fa-plus"></span>');
}

$("#contact-form").submit(function (e) {
    e.preventDefault();
    $.getJSON('api/sendMail.php', function (data) {
        console.log(data);
    });
});
