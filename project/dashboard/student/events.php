<?php
session_start();  
include "session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Feed</title>
    <link rel="stylesheet" href="/project/css/events.css">
    <script type="text/javascript" src="/project/javascript/loader.js"></script>
    <script type="text/javascript" src="/project/javascript/events.js"></script>
    <link rel="icon" type="image/ico" href="/project/images/icon.JPG">
    <link rel="manifest" href="/project/manifest.json" />
</head>
<body>
    <div class="navbar">
        <div id="navbar_img">
            <img src="/project/images/nav_bar-logo.png" alt="nav_bar-logo" width="42px" height="42px" />
        </div>
    
        <div id="nav-menu">
            <div id="menu-icon" onclick="toggleMenu()">☰</div>
            <div id="menu-options">
                <p style="text-align: center;">Welcome, <br><?php echo htmlspecialchars($student_name); ?>!</p>
                <a href="/project/dashboard/student/schedule.php">Schedule</a>
                <a href="/project/dashboard/student/profile.php">Profile</a>
                <a href="/project/dashboard/student/contact.php">FAQ</a>
                <a href="/project/dashboard/student/logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="Webcontainer" id="content-container">

<h2 style="text-align: center;">Wanna get juicy updates on the go? Check our feed!</h2>

<div class="filter-bar">
    <div id="academics">Academics</div>
    <div id="socials">Socials</div>
    <div id="music">Music</div>
    <div id="sports">Sports</div>
    <div id="fashion">Fashion</div>
    <div id="lifestyle">Lifestyle</div>
    <div id="travels">Travels</div>
    <div id="health">Health</div>
    <div id="news">News</div>
    <div id="trending">Trending</div>
</div>

<div class="event-body">
            <div class="event-body-content" data-category="academics">
                <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="academics-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="socials">
                <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for social wellbeing of the Senate president of the Federal University of Nigeria</p>
                    <div id="social-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                Social Wellbeing
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="music">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="music-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="sports">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="sports-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="fashion">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="fashion-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="lifestyle">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="lifestyle-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="travels">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="travels-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="health">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="health-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="news">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="news-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>

            <div class="event-body-content" data-category="trending">
            <div class="img-box"><img src="" height="" width="" alt="u" /></div>
                <p>This event is for increment of fees by the Senate president of the Federal University of Nigeria</p>
                    <div id="trending-content" class="event-content">
                        <div id="nav-back">
                            <div id="nav-back-button">
                                <span id="arrow">×</span>
                            </div>
                        </div>
                
                        <div id="note">
                            <h2 id="event-title">
                                New increment in School fees
                            </h2>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>

                            <div class="image-area">
                                <img id="img-head" src="/project/images/img-head.png" alt="" />
                            </div>

                            <p id="event-description">This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria.This event is academics by the Senate president of the Federal University of Nigeria</p>
                        </div>
                    </div>
                <button class="view-more">View more</button>
            </div>
        </div>

    <div class="footer">
        <div id="footer_content">
            <a href="home.php" class="footer_link">
                <span><img src="/project/images/home.png" alt="profile_img" width="24" height="24"/></span>
                <span>Home</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="scanner.php" class="footer_link">
                <span><img src="/project/images/scan.png" alt="scan_img" width="24" height="24"/></span>
                <span>Scan Code</span>
            </a>
        </div>

        <div id="footer_content" style="border-top: 1px solid black;">
            <a href="events.php" class="footer_link">
                <span><img src="/project/images/event.png" alt="event_img" width="24" height="24"/></span>
                <span>Events</span>
            </a>
        </div>

        <div id="footer_content">
            <a href="files.php" class="footer_link">
                <span><img src="/project/images/files.png" alt="files_img" width="24" height="24"/></span>
                <span>Files</span>
            </a>
        </div>
    </div>

    <div id="preloader">
        <img src="/project/images/nav_bar-logo.png" alt="Brand Logo" id="logo">
        <div id="loader-bar"></div>
    </div>
</body>
</html>


