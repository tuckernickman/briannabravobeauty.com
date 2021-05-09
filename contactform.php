<?php
		$nameErr = $phoneErr = $emailErr = $yesnoRadioErr = "";
		$name = $phone = $email = $yesnoRadio = $comment = "";
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

			if (empty($_POST["phone"])) {
				$phoneErr = "Phone Number is required.";
				$formErr = true;
			} else {
				$phone = cleanInput($_POST["phone"]);
				//Use REGEX to accept only phone numbers
				if (!preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/",$phone)) {
					$phoneErr = "Please enter your phone number";
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
					<h2 class="display-4 font-weight-bold dark-text">Contact Me</h2>
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
							<label for="name" class="dark-text">Full Name:</label>
							<span class="dark-text">*<?php echo $nameErr; ?></span>
							<input type="text" class="form-control dark-text" id="name" placeholder="Full Name" name="name" value="<?php if(isset($name)) {echo $name;}?>" />
						</div>
						
						<!-- Phone Field -->
						<div class="form-group">
							<label for="phone" class="dark-text">Phone Number:</label>
							<span class="dark-text">*<?php echo $nameErr; ?></span>
							<input type="phone" class="form-control dark-text" id="phone" placeholder="Phone Number" name="phone" value="<?php if(isset($phone)) {echo $phone;}?>" />
						</div>

						<!-- Email Field -->
						<div class="form-group">
							<label for="email" class="dark-text">Email address:</label>
							<span class="dark-text">*<?php echo $emailErr; ?></span>
							<input type="email" class="form-control dark-text" id="email" placeholder="name@example.com" name="email" value="<?php if(isset($email)) {echo $email;} ?>" />
						</div>
						
						<!-- Radio Button Field -->
						<div class="form-group" class="dark-text">
							<label class="control-label dark-text">Can we contact you back?</label>
							<span class="dark-text">*<?php echo $yesnoRadioErr; ?></span>
							<div class="form-check">
								<input type="radio" class="form-check-input dark-text" name="contact-back" id="yes" value="Yes"  <?php if ((isset($yesnoRadio)) && ($yesnoRadio == "Yes")) {echo "checked";}?>/>
								<label class="form-check-label dark-text" for="yes" >Yes</label>
							</div>
							<div class="form-check">
								<input type="radio" class="form-check-input dark-text" name="contact-back" id="no" value="No" <?php if ((isset($yesnoRadio)) && ($yesnoRadio == "No")) {echo "checked";}?>/>
								<label class="form-check-label dark-text" for="no" >No</label>
							</div>
						</div>
						
						
						<!-- Comments Field -->
						<div class="form-group">
							<label for="comments" class="dark-text">Comments:</label>
							<textarea id="comments" class="form-control dark-text" rows="3" name="comments"><?php if (isset($comment)) {echo $comment;} ?></textarea>
						</div>

						<!-- Required Fields Note-->
						<div class="dark-text text-right">* Indicates required fields</div>
						
						<!-- Submit Button -->
						<button class="btn btn-secondary mb-2 submit dark-text" type="submit" role="button" name="submit">Submit</button>
					</form>
					
				</div>
			</div>
		</div>
	</section>
	
	<?php
		function get_db_connection(){
			$ini_data = parse_ini_file("db.ini");
			print_r($ini_data);
			
			try {
			//Create new PDO Object with connection parameters
			$conn = new PDO("mysql:host=$ini_data[$hostname];dbname=$ini_data[$databasename]",$ini_data[$username],$ini_data[$password]);
			echo "Connected successfully";
			//Set PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			} catch(PDOException $e){
				echo "Connection failed: ". $e.getMessage();
			}
			return $conn;
		}

		if (($_SERVER["REQUEST_METHOD"] == "POST") && (!($formErr))){
		$conn = get_db_connection();

			//Variable containing SQL command
			$stmt = $conn->prepare("INSERT INTO bbeauty_table (name, phone, email, yesnoRadio, comments)
					VALUES (:name, :phone, :email, :yesnoRadio, :comment);");
			
			//Bind parameters
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':yesnoRadio', $yesnoRadio);
			$stmt->bindParam(':comment', $comment);

			//Execute SQL statement on server
			$stmt->execute();

			//Get the id of the last row added
			$last_id = $conn->lastInsertId();

			//Send success message to screen
			echo "A new record was added successfully. The last inserted ID is: " . $last_id;


		} 
	?>