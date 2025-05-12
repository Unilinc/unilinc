<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UniLink Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/project/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/ico" href="/project/images/icon.JPG">
    <script type="text/javascript" src="/project/javascript/home.js"></script>
    <script type="text/javascript" src="/project/javascript/counter.js"></script>
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <link rel="manifest" href="/project/manifest.json" />
</head>
<body>
    <div class="navbar">
        <div class="nav-options-left">
            <a id="nav-img-link" href="home.php"><img id="nav-img" src="/project/images/my-brand.JPG" alt="nav_bar-logo" /></a>
        </div>
    
        <div class="nav-options-center">
            <a href="#home" data-target="#home">Home</a>
            <a href="#features" data-target="#features">App Features</a>
            <a href="#coverage" data-target="#coverage">Coverage</a>
            <a href="#about" data-target="#about">Our Team</a>
            <a href="#reviews" data-target="#reviews">Reviews</a>
            <a href="#contact" data-target="#contact">Contact</a>
        </div>
        
        <div class="nav-options-right">
            <a href="/project/dashboard/student/scanner.php">Dashboard</a>
            <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>
        </div>
    </div>

    <div class="Webcontainer">
        <div id="home">
            <div class="image-area">
                <img id="img-head" src="/project/images/img-head.png" alt="" />
            </div>

            <div class="text-area">
                <div id="big-text">
                    TEACH - LEARN -<br>CONNECT
                </div>
                <div id="small-text">
                    Campus in Sync
                </div>
                <div id="download-button">
                    <img src="/project/images/google.JPG" alt="google-app-download" width="224px" height="64px" />
                    <img src="/project/images/apple.JPG" alt="apple-app-download" width="224px" height="64px" />
                </div>
            </div>
        </div>

        <div id="features">
            <div class="feature-head">
                <p class="head-text">
                    App Features
                </p>

                <p class="body-text">
                    Inspired by the need to connect and thrive.<br>
                    Efficiently teaching and learning with ease while enjoying the <br> aura of social pleasure and it's charm.
                </p>
            </div>

            <div class="feature-tail">
                <div class="describe-left">
                    <div class="describe-box">
                       <span>
                        <img id="describe-img" src="/project/images/design.png" alt="design image" />
                        <p class="describe-text-box">INTUITIVE INTERFACE DESIGN</p>
                        <p class="body-text">
                            Inspired by the need to connect and thrive.<br>
                            Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                        </p>
                        </span>
                    </div>

                    <div class="describe-box">
                       <span>
                       <img id="describe-img" src="/project/images/rating.png" alt="rating image" />
                        <p class="describe-text-box">LECTURE RATING</p>
                        <p class="body-text">
                            Inspired by the need to connect and thrive.<br>
                            Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                        </p>
                        </span>
                    </div>
                </div>

                <div class="describe-center">
                    <div class="describe-box">
                        <span>
                        <img id="describe-img" src="/project/images/scanner.png" alt="scanning image" />
                        <p class="describe-text-box">ULTRA FAST SCANNING TECHNOLOGY</p>
                        <p class="body-text">
                            Inspired by the need to connect and thrive.<br>
                            Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                        </p>
                        </span>
                    </div>

                    <div class="image-area">
                        <img id="img-head" src="/project/images/img-head.png" alt="" />
                    </div>

                    <div class="describe-box">
                    <span>
                    <img id="describe-img" src="/project/images/marketplace.png" alt="marketplace image" />
                     <p class="describe-text-box">EVENTS & MARKETPLACE</p>
                     <p class="body-text">
                         Inspired by the need to connect and thrive.<br>
                         Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                     </p>
                     </span>
                    </div>
                </div>

                <div class="describe-right">
                    <div class="describe-box">
                        <span>
                        <img id="describe-img" src="/project/images/support.png" alt="customer support image" />
                        <p class="describe-text-box">24/7 CUSTOMER SUPPORT</p>
                        <p class="body-text">
                            Inspired by the need to connect and thrive.<br>
                            Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                        </p>
                        </span>
                    </div>

                    <div class="describe-box">
                        <span>
                        <img id="describe-img" src="/project/images/mobile-and-web.png" alt="mobile and web version image" />
                        <p class="describe-text-box">MOBILE & WEB VERSIONS</p>
                        <p class="body-text">
                            Inspired by the need to connect and thrive.<br>
                            Efficiently teaching and learning with ease while enjoying the aura of social pleasure and it's charm.
                        </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="coverage">
            <p class="head-text">
                Wide Coverage
            </p>

            <p class="body-text">
                Inspired by the need to connect and thrive.<br>
                Efficiently teaching and learning with ease while enjoying the <br> aura of social pleasure and it's charm.
            </p>
            <div class="coverage-details-top">
                <div class="coverage-details-box">
                    <span id="cover-text">More than</span>
                    <div id="download-counter">750K</div>
                    <span id="cover-text">Downloads</span>
                </div>

                <div class="coverage-details-box">
                    <span id="cover-text">We've covered</span>
                    <div id="universities-counter">5K</div>
                    <span id="cover-text">Universities</span>
                </div>

                <div class="coverage-details-box">
                    <span id="cover-text">with over</span>
                    <div id="departments-counter">120K</div>
                    <span id="cover-text">Departments</span>
                </div>
            </div>

            <div class="coverage-details-bottom">
                <div class="coverage-details-box">
                    <span id="cover-text">bearing</span>
                    <div id="staffs-counter">400K</div>
                    <span id="cover-text">Staffs</span>
                </div>

                <div class="coverage-details-box">
                    <span id="cover-text">reaching</span>
                    <div id="students-counter">1.2M</div>
                    <span id="cover-text">Students</span>
                </div>

                <div class="coverage-details-box">
                    <span id="cover-text">and maintaining</span>
                    <div id="accounts-counter">1.1M</div>
                    <span id="cover-text">Active Accounts</span>
                </div>
            </div>
        </div>

        <div id="about">
            <div class="about-head">
                <p class="head-text">
                    Our Creative Team
                </p>

                <p class="body-text">
                    Greatness is not an individual acomplishment. <br> 
                    The geeks who's desire for innovation will shape your view of <br>technology and automated systems.
                </p>
            </div>

            <div class="about-tail">
                <div class="box-top">
                    <div class="about-team-box">
                    <img id="about-head-img" src="/project/images/icon.JPG" alt="head-img" />
                    <p id="about-big-text">Debbie Lop</p>
                    <p id="about-small-text">Lead Developer</p>

                    <div class="social-handles">
                        <img id="social" alt="fb-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="x-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="li-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="ig-social" src="/project/images/icon.JPG" />
                    </div>
                    </div>

                    <div class="about-team-box">
                    <img id="about-head-img" src="/project/images/icon.JPG" alt="head-img" />
                    <p id="about-big-text">Johnny Rezz</p>
                    <p id="about-small-text">UI Designer</p>

                    <div class="social-handles">
                        <img id="social" alt="fb-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="x-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="li-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="ig-social" src="/project/images/icon.JPG" />
                    </div>
                    </div>
                </div>

                <div class="box-bottom">
                    <div class="about-team-box">
                    <img id="about-head-img" src="/project/images/icon.JPG" alt="head-img" />
                    <p id="about-big-text">Gift Monic</p>
                    <p id="about-small-text">Head of Ideas</p>

                    <div class="social-handles">
                        <img id="social" alt="fb-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="x-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="li-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="ig-social" src="/project/images/icon.JPG" />
                    </div>
                    </div>

                    <div class="about-team-box">
                    <img id="about-head-img" src="/project/images/icon.JPG" alt="head-img" />
                    <p id="about-big-text">Johnny Rezz</p>
                    <p id="about-small-text">UX Researcher</p>

                    <div class="social-handles">
                        <img id="social" alt="fb-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="x-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="li-social" src="/project/images/icon.JPG" />
                        <img id="social" alt="ig-social" src="/project/images/icon.JPG" />
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="reviews">
            <div class="reviews-top">
                <p class="head-text">
                    Reviews from Active Users
                </p>

                <p class="body-text">
                    Inspired by the need to connect and thrive.<br>
                    Efficiently teaching and learning with ease while enjoying the <br> aura of social pleasure and it's charm.
                </p>
            </div>

            <div class="reviews-bottom">
                <div class="reviews-container">
                    <button id="prev-post">&lt;</button>
                        <div class="post-container">
                            <div id="post-one">
                                <div class="review-content">
                                    <div class="name">
                                        HARRISON INDOMITABLE
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="HARRISON INDOMITABLE"/>
                                </div>
                            </div>

                            <div id="post-two">
                                <div class="review-content">
                                    <div class="name">
                                        MIRACLE KENNETH
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="MIRACLE KENNETH" />
                                </div>
                            </div>

                            <div id="post-three">
                                <div class="review-content">
                                    <div class="name">
                                        LILINA MARK
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="LILINA MARK" />
                                </div>
                            </div>

                            <div id="post-four">
                                <div class="review-content">
                                    <div class="name">
                                        HILLARY JUDE
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="HILLARY JUDE" />
                                </div>
                            </div>

                            <div id="post-five">
                                <div class="review-content">
                                    <div class="name">
                                        NONSO DIOBI
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="NONSO DIOBI" />
                                </div>
                            </div>

                            <div id="post-six">
                                <div class="review-content">
                                    <div class="name">
                                        GIFT CHIAMAKA
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="GIFT CHIAMAKA" />
                                </div>
                            </div>

                            <div id="post-seven">
                                <div class="review-content">
                                    <div class="name">
                                        GUY SOMADINA
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="GUY SOMADINA" />
                                </div>
                            </div>

                            <div id="post-eight">
                                <div class="review-content">
                                    <div class="name">
                                        EZIRIM CHIBUNNA
                                    </div>
                                    <div class="position">
                                        500 Level Information Technology Student
                                    </div>
                                    <div class="content">
                                        Inspired by the need to connect and thrive.
                                        Efficiently teaching  learning with ease while enjoying the aura of social pleasure and it's charm.
                                    </div>
                                    <div class="rating">
                                        <img id="rate" alt="fb-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="x-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="li-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                        <img id="rate" alt="ig-social" src="/project/images/icon.JPG" />
                                    </div>
                                </div>

                                <div class="review-image">
                                    <img id="review-img" src="/project/images/icon.JPG" alt="EZIRIM CHIBUNNA" />
                                </div>
                            </div>
                        </div>
                    <button id="next-post">&gt;</button>
                </div>
            </div>
        </div>

        <div id="contact">
            <div class="footer-body">
                <div class="container">
                    <p class="head-text">
                        Get In Touch
                    </p>
                    <div class="contact-container">
                        <div class="contact-info">
                            <h3>Let's Talk</h3>
                            <div class="contact-details">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span>Owerri, Nigeria</span>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <span>studentcare@unilink.ng</span>
                                </div>

                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <span>+234 708 607 0515</span>
                                </div>
                            </div>
                    
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-behance"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                
                        <div class="contact-form">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" required="">
                                </div>
                        
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" class="form-control" required="">
                                </div>
                        
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" required=""></textarea>
                                </div>
                                    
                                <button type="submit" class="btn">Send Message</button>
                            </form>
                        </div>
                    </div>

                    <div class="contact-container">
                        <div class="contact-top">
                            <img id="footer-img" src="/project/images/my-brand.JPG" alt="nav_bar-logo" />
                            <p id="footer-text-left">&copy;2025 UniLink Automated System | <b>All Rights Reserved</b><br> 
                                Get more out of <b>Vast Automation</b>
                            </p>
                            <br>
                            <p id="footer-text-left">&copy;2025 UniLink Automated System | <b>All Rights Reserved</b><br> 
                                Get more out of <b>Vast Automation</b>
                            </p>               
                        </div>

                        <div class="contact-bottom">
                            <div class="socials">
                                <div class="footer-social-handles">
                                    <img id="social" alt="fb-social" src="/project/images/icon.JPG" />
                                    <img id="social" alt="x-social" src="/project/images/icon.JPG" />
                                    <img id="social" alt="li-social" src="/project/images/icon.JPG" />
                                    <img id="social" alt="ig-social" src="/project/images/icon.JPG" />
                                </div>
                            </div>
                            <p id="footer-text-right">The Federal University of Technology, <br> FUTO ICT Centre, Owerri, <br> Imo State, Nigeria.<br> 
                                <br>
                                <b>https://www.unilink.com</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
    </div>
</body>
</html>