<?php
// declartion of error variables here 
$errors = '';
$nameErr = ''; 
$emailErr = ''; 
$msgErr = ''; 
$thankYou=''; 

$myemail = 'tim.damour@timdamour.com';// email address for company or business here.

// test_input processed before it is called. 
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data); 
	return $data; 
}
// send request to the server 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// if name is empty 
	if(empty($_POST["name"]))
	{
		$nameErr = "\nError: Name is required";
	}	
	else 	// if name is filled in 
	{
		$name = test_input($_POST['name']); 
		// check if name only contains letters and whitespace 
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $nameErr = "Only letters and white space allowed"; 
		}
	}
	if(empty($_POST["email"]))	// if email is empty 
	{
		$emailErr = "\nError: Email is required"; 
	}
	else 	// if email is filled in 
	{
		$email_address = test_input($_POST['email']); 
		// check if email is well-formed 
		if(!filter_var($email_address,FILTER_VALIDATE_EMAIL)){
			$emailErr .= "\nError: Invalid email format"; 
		}
	} 
	if(empty($_POST["message"]))	// if message are empty 
	{
		$msgErr = "\nError: Please send a email with a message"; 
	}
	else	// if comments are filled in 
	{
		$message = $_POST["message"]; 
	} 
 
	// if no errors are detected send email to other server 
if(empty($errors) && empty($nameErr) && empty($emailErr)) 
{
	// email format 
	
		$to = $myemail;
		 
		$email_subject = "Contact form submission: $name";
		 
		$email_body = "You have received a new message. ".
		 
		" Here are the details:\n Name: $name \n ".
		 
		"Email: $email_address\n Message: \n $message";
		 
		$headers = "From: $myemail\n";
		 
		$headers .= "Reply-To: $email_address";
		 
		mail($to,$email_subject,$email_body,$headers);
		
		$thankYou= "\nThank you !"; 

}
}
?> 
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
	<meta name="keywords" content="tim damour, www.timdamour.com, tim damour homepage, web developer, information technology, detroit, michigan, job seeker, junior web developer " />
	<meta name="description" content="Tim DaMour's Offical Website. Tim DaMour is an aspiring web developer from the state of Michigan and is looking for a entry level position in the information technology industry." />
	<title>Tim DaMour</title>
	<meta name="robots" content="index,follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="img/favicon.ico"/>
</head>
<body id="page-top" class="index">
<!--Navigation bar -->
		 <nav id="mainNav" class="navbar navbar-inverse navbar-fixed-top navbar-custom">
		  <div class="container">
			<div class="navbar-header page-scroll">
			    <button type="button" id="navMenuButton" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only" >Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" id="navLogo" href="#page-top">Tim DaMour </a>
			</div> 

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right" id="navLink">
			    <li class="hidden"><a href="#page-top"></a></li>
				<li class="page-scroll"><a href="#about">About</a></li>
				<li class="page-scroll"><a href="#portfolio">Portfolio</a></li>
				<li class="page-scroll"><a href="#contact">Contact</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	<!--introduction Header 'id as intro-->
	<header id="intro">
		<div class="container">
		  <div class="row">
			<div class="col-xs-12 col-md-6"> <img src="img/tdamour.jpg" class="img-responsive" id="intro_pic"> </div>
			<div class="col-xs-12 col-md-6">
			<h2>Web Developer & Designer</h2>
			<p>Hello, my name is Tim and I am an aspiring Web Developer. This is my website created for people who want to learn a bit more about me.</p>
			</div>
		  </div>
		</div>
	</header>
	<section id="about">
	<div class="container">
		  <div class="row">
			<div class="col-xs-12 col-md-6">
			<h2>About Me</h2>
			<p>I grew up in the city of Dearborn, in Southeast Michigan - Metro Detroit. Over the past two years, 
	I have gained a great deal of knowledge in the field of information technology, specifically, web development. Through my educational experience at Henry Ford College, 
	I have acquired additional skill sets by being exposed to various facets of the information technology industry, such as object-oriented programming, social media, and networking. During my time at Henry Ford College, I also gained experience in the industry through a co-op as a junior web developer.  
	My second co-op was in the summer of 2016 for a local voice over Internet protocol start-up that focused more on information technology. 
	Both opportunities have been extremely rewarding for me as I grew both personally and professionally.</p>
			</div>
			<div class="col-xs-12 col-md-6"> <img src="img/travel.jpg" class="img-responsive" id="about_pic"> </div>
		  </div>
		</div>
	</section>
	<section id="portfolio">
	<div class="container">
		  <div class="row">
			<div class="col-xs-12 col-md-6"><a target="_blank" href="https://github.com/tdamour"><img src="img/shore.jpg" class="img-responsive" id="port_pic"></a></div>
			<div class="col-xs-12 col-md-6">
			<h2>Portfolio</h2>
			<p>Despite my passion for the information technology industry, I do have a bit of an unusual background for someone going into the field. 
			Though this is true, my work and educational background give me insight on how to handle the future challenges. 
			I always try to keep my head down and focused on the task at hand. Most importantly, 
			I always venture out to try to learn something new, or different, even when it can be uncomfortable. The challenge is what I enjoy, 
			and what keeps me going.</p>
			  <p>If you want to download a copy of my resume and review it <br/> <br/><a href="file/TimDaMourResume.pdf" id="resumeButton" class="btn btn-lg btn-outline" download>DOWNLOAD RESUME &nbsp;<i class="fa fa-download"></i></a></p>
			  <br/> 
			<p>Press the picture of the Lake Michigan Shoreline or click the link to checkout my <a target="_blank" href="https://github.com/tdamour" id="github_text_link">Github</a>.</p>
			</div>
		  </div>
		</div>

	</section>
	<section id="contact">
	<div class="container">
		  <div class="row">
			<div class="col-xs-12 col-md-12"> <h2>Contact Me</h2> </div>
			<div class="col-xs-12 col-md-12"><p>If you're interested in recruiting, collaboration, or simply want to know more, Please reach out via email</p></div>
		  </div>
		   <div class="row">
		    <div class="col-lg-12" id="contact_form">
					<form method="post">
						<h4>Name :</h4><br/><input type="text" name="name" maxlength="50" size="25"><br/><br/>
						<h4>Email :</h4><br/> <input type="text" name="email" maxlength="50" size="25"> <br/><br/>
						<h4>Message :</h4><br/><textarea name="message" cols="20" rows="20"></textarea> <br/> <br/> 
						<input type="submit" value="Send" class="submit">
					</form> 
				</div> 
		   </div> 
		     <div class="row">
			 	<div class="col-lg-12" id="contact_form_reaction">
				<p> 
				<?php
					echo $nameErr;
					echo $emailErr;
					echo $msgErr;
					echo $thankYou; 
				?>
				</p> 
				</div>
			</div>
		</div>

	</section>

	<footer class="text-center" id="footer">
		<div class="footer-above">
		  <div class="container">
		  <div class="row">
		    <div class=" pull-left" id="copyright">
				<p>&nbsp;&nbsp;&copy; Tim DaMour</p>
			</div>
			<!-- Social Media -->
			<div class="pull-right">
				<ul class="list-inline" id="socialMedia">
				  <li>
				    <a target="_blank" href="https://github.com/tdamour"><i class="fa fa-github-square fa-2x" aria-hidden="true"></i></a>
				  </li>
				  <li>
				    <a target="_blank" href="https://www.linkedin.com/in/timothy-damour-a49b5866"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
				  </li>
				   <li>
				    <a target="_blank" href="https://www.instagram.com/tdamour76/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
				  </li>
				  <li>
				    <a target="_blank" href="https://www.facebook.com/profile.php?id=100005323184950"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
				  </li>
				  <li>
				    <a target="_blank" href="https://twitter.com/tim_damour76"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
				  </li>
				</ul>
			</div>
			</div>
		  </div>
		  </div>
	</footer>
	<!--jQuery and JavaScript Plugins as well as menu.js--> 
	<script src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="js/menu.js"></script>
</body>
</html>
