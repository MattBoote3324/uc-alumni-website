<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Login Error</title>
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
        <link rel="stylesheet" type="text/css" href="styles/error.css" />
    </head>

    <body class="bg-white">
        <!-- Page Banner -->
        <div class="panel panel-default" id="banner">
            <div id="banner-content">
                <img id="banner-logo" src="img/shared/uc-banner-logo.png" alt="University of Canterbury"/>
                <h1 id="banner-heading">Login Error</h1>
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
                <div class="panel panel-default content-panel">
                    <h1 class="text-center">Sorry There's Been a Problem</h1>
					<!-- Displays the error message given in the query string -->
                    <p class="error text-center lrg-text"><?php echo $error; ?> Navigate back to the previous page to try again.</p>
                </div>
            </div>
        </div>
    </body>

    <footer>
		<div class="row text-center container-fluid footer-content">
			<!-- Alumni Site Links -->
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

			<!-- Offsite Useful Links -->
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

			<!-- Contact Info Links -->
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
