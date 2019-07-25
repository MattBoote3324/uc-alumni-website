<?php
include_once 'php/db-connect.php';
include_once 'php/functions.php';
include_once 'php/generate-countries.php';

sec_session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>University of Canterbury Alumni Portal</title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="There was an error with the secure login." />
        <meta name="keywords" content="University of Canterbury, UC Alumni, Alumni" />

        <!-- Link to JQuery -->
        <script type="text/javascript" src="scripts/jquery-3.1.0.min.js"></script>

        <!-- Link to Bootstrap -->
        <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css" />
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>

        <!-- Link to my homepage stylesheet -->
        <link type="text/css" rel="stylesheet" href="styles/global-style.css" />
        <link rel="stylesheet" type="text/css" href="styles/portal.css" />

        <!-- Link to javascript form functions -->
        <script type="text/javascript" src="scripts/form.js"></script>
    </head>

    <body>
        <!-- Page Banner -->
        <div class="panel panel-default" id="banner">
            <div id="banner-content">
                <img id="banner-logo" src="img/shared/uc-banner-logo.png" alt="University of Canterbury"/>
                <h1 id="banner-heading">Alumni Portal</h1>
            </div>
        </div>

        <div class="row">
            <!-- Side Menu Column -->
            <div class="col-lg-2 col-md-12 col-sm-12 responsive-nav">
                <div id="nav-container">
                    <!-- Menu Header, Only visible when collapsed -->
                    <div class="navbar-header list-group-item-success">
                        <button type="button" class="navbar-toggle menu-btn" data-toggle="collapse" data-target="#MainMenu">
                            <span class="icon-bar menu-btn-bar"></span>
                            <span class="icon-bar menu-btn-bar"></span>
                            <span class="icon-bar menu-btn-bar"></span>
                        </button>

                        <div class = "navbar-toggle navbar-brand">
                            <img id = "nav-image" src = "img/shared/uc-alumni-logo-red.png"/>
                        </div>
                    </div>
                </div>

                <div class="side-nav collapse navbar-collapse" id="MainMenu">
                    <div class="list-group panel">
                        <!-- Page Links -->
                        <a href="home.html" class="title list-group-item list-group-item-success sm-padding-left" data-parent="#MainMenu">Home</a>

                        <a href="events.html" class="title list-group-item list-group-item-success sm-padding-left" data-parent="#MainMenu">Events</a>

                        <a href="#nav-benefits" class="title list-group-item list-group-item-success sm-padding-left" data-toggle="collapse" data-parent="#MainMenu">
                            <p class="reduce-width">Benefits</p>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div class="collapse" id="nav-benefits">
                            <a href="benefits.html" class="sub-menu list-group-item sm-padding-left">Networks</a>
                            <a href="benefits.html#publications" class="sub-menu list-group-item sm-padding-left">Publications</a>
                            <a href="benefits.html#gifts-div" class="sub-menu list-group-item sm-padding-left">Gifts and Memorabilia</a>
                            <a href="benefits.html#memberships" class="sub-menu list-group-item sm-padding-left">Memberships</a>
                        </div>

                        <a href="#nav-worldwide" class="title list-group-item list-group-item-success sm-padding-left" data-toggle="collapse" data-parent="#MainMenu">
                            <p class="reduce-width">Alumni Worldwide</p>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div class="collapse" id="nav-worldwide">
                            <a href="worldwide.html" class="sub-menu list-group-item sm-padding-left">Where Are They Now?</a>
                            <a href="worldwide.html#uc-legends" class="sub-menu list-group-item sm-padding-left">UC Legends</a>
                        </div>

                        <a href="#nav-about-us" class="title list-group-item list-group-item-success sm-padding-left" data-toggle="collapse" data-parent="#MainMenu">
                            <p class="reduce-width">About Us</p>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <div class="collapse" id="nav-about-us">
							<a href="about.html" class="sub-menu list-group-item sm-padding-left">Our Mission</a>
                            <a href="about.html#team-section" class="sub-menu list-group-item sm-padding-left">Our Team</a>
                            <a href="about.html#faq-section" class="sub-menu list-group-item sm-padding-left">FAQ</a>
                            <a href="about.html#contact-section" class="sub-menu list-group-item sm-padding-left">Contact Us</a>
                            <a href="about.html#find-us-section" class="sub-menu list-group-item sm-padding-left">Find Us</a>
                        </div>
						<a href="login.php" class="title list-group-item list-group-item-success sm-padding-left" data-parent="#MainMenu">Login</a>

                        <a href="portal.php" class="title list-group-item list-group-item-success sm-padding-left" data-parent="#MainMenu">Alumni Portal</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-md-12 col-sm-12 bg-white">
                <div class="section">
                    <!-- Only display the following if the user is logged in -->
                    <?php if (login_check($mysqli) == true) : ?>
                        <div class="panel panel-default">
                            <h1 class="text-center">Welcome <?php echo htmlentities($_SESSION['username']); ?>!</h1>
                            <p class="lrg-text text-center">
                                This is the secure Alumni Portal where you can keep us up to date by
                                updating your address details. Doing this will allow us to ensure we
                                can provide you with the best possible support and help us to
                                provide you with information relevant to you.
                            </p>
                        </div>

                        <div class="panel panel-default">
                            <h2 class="text-center">Update Your Address</h2>
                            <p class="text-center lrg-text">Complete the form below to update your address details.</p>

                            <!-- Update Details Form -->
                            <form action="php/process-address.php" method="post" name="address_form" id="address-form">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" name="city" id="city" />

                                    <label for="postcode">Postcode:</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode"/>

                                    <label for="country">Country:</label>
                                    <input list="countries" class="form-control" name="country" id="country"/>
                                    <?php generateCountries(); ?>
                                </div>

                                <p class="text-center"><input class="btn btn-default" type="button" value="Submit" onclick="checkAddress(this.form)"/></p>
                            </form>
                        </div>

                        <!-- Link to return to Log In page to log out -->
                        <div class="panel panel-default">
                            <p class="text-center lrg-text">Return to the login page to log out:</p>
                            <p class="text-center"><a class="btn btn-default" href="login.php">Login Page</a></p>
                        </div>
                    <?php else : ?>
                        <!-- Display if the user is not logged in to view the page -->
                        <div class="panel panel-default">
                            <h2 class="text-center">Unauthorised Access</h2>
                            <p class="lrg-text text-center">
                                <span class="error">You are not authorized to access this page.</span> Please <a href="login.php">login</a>.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>

    <footer>
		<div class="row text-center container-fluid footer-content">
            <!-- Alumni Site Page Links -->
			<div class="col-sm-3">
				<ul>
					<li>
						<h2><a href = "">Alumni</a></h2>
					</li>
					<li>
						<h4><a href="home.html">Home</a></h4>
					</li>
					<li>
						<h4><a href="benefits.html">Benefits</a></h4>
					</li>
					<li>
						<h4><a href="events.html">Events</a></h4>
					</li>
					<li>
						<h4><a href="worldwide.html">Worldwide</a></h4>
					</li>
				</ul>
			</div>

            <!-- Useful offsite links -->
			<div class="col-sm-3">
				<ul>
					<li>
						<h2>Useful Links</h2>
					</li>
					<li>
						<h4><a href="http://www.canterbury.ac.nz/">University of Canterbury</a></h4>
					</li>
					<li>
						<h4><a href="http://library.canterbury.ac.nz/">Library</a></h4>
					</li>
					<li>
						<h4><a href="https://www.keanewzealand.com/">KEA NZ</a></h4>
					</li>
				</ul>

			</div>

            <!-- Contact Links -->
			<div class="col-sm-3">
				<ul>
					<li>
						<h2><a href="about.html">About Us</a></h2>
					</li>
					<li>
						<h4><a href="about.html">What we do</a></h4>
					</li>
					<li>
						<h4><a href="about.html#team-section">Our People</a></h4>
					</li>
					<li>
						<h4><a href="about.html#contact-section">Contact Us</a></h4>
					</li>
				</ul>
			</div>

            <!-- Social Media Links -->
			<div class="col-sm-3">
				<ul>
					<li>
						<h2>Stay in Touch</h2>
					</li>
					<li class="social-icons-li flex-container">
						<ul class="social">
							<li>
								<a href="https://www.facebook.com/UCAlumniCommunity"><img class="social-icon" src="img/shared/facebook.png" alt="facebook-icon" /></a>
								<i class=" fa fa-facebook"></i>
							</li>
							<li>
								<a href="https://twitter.com/ucnz"><img class="social-icon" src="img/shared/twitter.png" alt="twitter-icon" /></a>
                                <i class="fa fa-twitter"></i>
                            </li>
							<li>
								<a href="https://www.youtube.com/user/UniversityCanterbury"><img class="social-icon" src="img/shared/youtube.png" alt="youtube-icon" /></a>
                                <i class="fa fa-youtube"></i>
                            </li>
							<li>
								<a href="http://www.linkedin.com/company/university-of-canterbury"><img class="social-icon" src="img/shared/linkedin.png" alt="linkedin-icon" /></a>
                                <i class="fa fa-linkedin"></i>
                            </li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

        <!-- Copyright Links -->
		<div id = "copyright-container">
			<div class = "row">
				<div class = "col-sm-6">
					<ul>
						<li id = "copyright-text">©University of Canterbury</li>
					</ul>
				</div>
				<div class = "col-sm-6">
					<ul class = "links">
						<li><a href = "http://www.canterbury.ac.nz/help/legal.shtml">Copyright and Disclaimer</a> | </li>
						<li><a href = "http://www.canterbury.ac.nz/privacy/">Privacy</a> | </li>
						<li><a href = "http://www.canterbury.ac.nz/help/contact/">Feedback</a> | </li>
						<li><a href = "http://www.canterbury.ac.nz/help/">Help and Accessibility</a> | </li>
						<li><a href = "http://www.canterbury.ac.nz/help/a-z.shtml">A-Z of University Websites</a></li>
					</ul>
				</div>
			</div>
		</div>
    </footer>
</html>
