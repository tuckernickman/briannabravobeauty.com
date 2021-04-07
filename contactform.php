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