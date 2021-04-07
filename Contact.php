<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<link rel="stylesheet" href="mystyle.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
	<!-- Website Title -->
	<title>Contact Rachel Day</title>

	<div class=navmenu>
  <nav class="navbar fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img class="logo"       
       src="images/logo.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li> <li class="nav-item">
        <a class="nav-link" href="About.php">About</a>
      </li> 
     <li class="nav-item">
        <a class="nav-link" href="Testimonials.php">Testimonials</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="Contact.php">Contact</a>
      </li> 
    </div>
    </nav>

</div>
</head>
<body>
	<?php
		$nameErr = $emailErr = $yesnoRadioErr = "";
		$name = $email = $yesnoRadio = $comment = "";
		$formErr = false;

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["name"])) {
				$nameErr = "Name is required.";
				$formErr = true;
			} else {
				$name = cleanInput($_POST["name"]);
				//Use REGEX to accept only letters and white spaces
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					$nameErr = "Only letters and standard spaces allowed.";
					$formErr = true;
				}
			}
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required.";
				$formErr = true;
			} else {
				$email = cleanInput($_POST["email"]);
				// Check if e-mail address is formatted correctly
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Please enter a valid email address.";
					$formErr = true;
				}
			}
			
			if (empty($_POST["contact-back"])) {
				$yesnoRadioErr = "Please let us know if we can contact you back.";
				$formErr = true;
			} else {
				$yesnoRadio = cleanInput($_POST["contact-back"]);
			}
			
			$comment = cleanInput($_POST["comments"]);
		}

		function cleanInput($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<!-- Contact Form Section -->
	<section id="contact">
		<div class="container py-5">
			<!-- Section Title -->
			<div class="row justify-content-center text-center">
				<div class="col-md-6">
					<h2 class="display-4 font-weight-bold">Contact Me</h2>
					<hr />
				</div>
			</div>
			<!-- Contact Form Row -->
			<div class="row justify-content-center">
				<div class="col-6">
				
					<!-- Contact Form Start -->
					<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST" novalidate>
						
						<!-- Name Field -->
						<div class="form-group">
							<label for="name">Full Name:</label>
							<span class="text-white">*<?php echo $nameErr; ?></span>
							<input type="text" class="form-control" id="name" placeholder="Full Name" name="name" value="<?php if(isset($name)) {echo $name;}?>"" />
							
						</div>
						
						<!-- Email Field -->
						<div class="form-group">
							<label for="email">Email address:</label>
							<span class="text-white">*<?php echo $emailErr; ?></span>
							<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php if(isset($email)) {echo $email;} ?>" />
						</div>
						
						<!-- Radio Button Field -->
						<div class="form-group">
							<label class="control-label">Can we contact you back?</label>
							<span class="text-white">*<?php echo $yesnoRadioErr; ?></span>
							<div class="form-check">
								<input type="radio" class="form-check-input" name="contact-back" id="yes" value="Yes"  <?php if ((isset($yesnoRadio)) && ($yesnoRadio == "Yes")) {echo "checked";}?>/>
								<label class="form-check-label" for="yes" >Yes</label>
							</div>
							<div class="form-check">
								<input type="radio" class="form-check-input" name="contact-back" id="no" value="No" <?php if ((isset($yesnoRadio)) && ($yesnoRadio == "No")) {echo "checked";}?>/>
								<label class="form-check-label" for="no" >No</label>
							</div>
						</div>
						
						<!-- Comments Field -->
						<div class="form-group">
							<label for="comments">Comments:</label>
							<textarea id="comments" class="form-control" rows="3" name="comments"><?php if (isset($comment)) {echo $comment;} ?></textarea>
						</div>

						<!-- Required Fields Note-->
						<div class="text-white text-right">* Indicates required fields</div>
						
						<!-- Submit Button -->
						<button class="btn btn-secondary mb-2" type="submit" role="button" name="submit">Submit</button>
					</form>
					
				</div>
			</div>
		</div>
	</section>
	
	<?php if (($_SERVER["REQUEST_METHOD"] == "POST") && (!($formErr))) { ?>
	<?php
		 $hostname = "phponline2021.slccwebdev.com";
		 $username = "phponline2021";
		 $password = "k&UH8PaYKH@E7PZ53E^H";
		 $databasename = "phponline2021";
		
		
		try {
			//Create new PDO Object with connection parameters
			$conn = new PDO("mysql:host=$hostname;dbname=$databasename",$username, $password);
			
			//Set PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			
			//Variable containing SQL command
			$stmt = $conn->prepare("INSERT INTO rday_table (name, email, yesnoRadio, comments)
					VALUES (:name, :email, :yesnoRadio, :comment);");
			
			//Bind parameters
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':yesnoRadio', $yesnoRadio);
			$stmt->bindParam(':comment', $comment);

			//Execute SQL statement on server
			$stmt->execute();

			//Get the id of the last row added
			$last_id = $conn->lastInsertId();

			//Send success message to screen
			echo "A new record was added successfully. The last inserted ID is: " . $last_id;


		} catch (PDOException $error) {

			//Return error code if one is created
			echo "An error occurred: <br>" . $sql . "<br>" . $error->getMessage();
		}
	?>
	<section id="results" style="background-color: lightsteelblue;">
		<div class="container py-2" >
			<div class="row ">
				<h1>Form Entries:</h1>
			</div>
			<div class="row">				
				<ul>
					<?php
					if ($name !== "") { echo "<li>NAME: $name </li>"; } 
					if ($email !== "") { echo "<li>EMAIL: $email </li>"; }
					if ($yesnoRadio !== "") { echo "<li>CONTACT BACK: $yesnoRadio </li>"; }
					if ($comment !== "") { echo "<li>COMMENT: $comment </li>"; }
					?>
				</ul>		
			</div>
		</div>
	</section>
	
	<?php } ?>
</body>
<footer class="footer">
            
            <a href="mailto:rday37@bruinmail.slcc.edu" class="footer__link">rday37@bruinmail.slcc.edu</a>
            <ul class="social-list">
                <li class="social-list__item">
                    <a class="social-list__link" href="https://codepen.io">
                        <i class="fab fa-codepen"></i>
                    </a>
                </li>
                <li class="social-list__item">
                    <a class="social-list__link" href="http://dribbble.com">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </li>
                <li class="social-list__item">
                    <a class="social-list__link" href="https://twitter.com">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="social-list__item">
                    <a class="social-list__link" href="https://github.com">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
                <li class="social-list__item">
                    <a class="social-list__social-link" href="https://www.facebook.com" target="_blank">
                       <i class="fab fa-facebook"></i>
                   </a>
                </li>
                <li class="social-list__item">
                   <a class="social-list__social-link" href="https://www.youtube.com" target="_blank">
                     <i class="fab fa-youtube"></i>
                   </a>
                 </li>
                 <li class="social-list__item">
                    <a class="social-list__social-link" href="https://www.instagram.com" target="_blank">
                      <i class="fab fa-instagram"></i>
                   </a>
                 </li>
            </ul>
        </footer>
</html>