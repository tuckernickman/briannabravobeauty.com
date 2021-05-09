<section id="results" style="background-color: lightsteelblue;">
		<div class="container py-2" >
			<div class="row ">
				<h1>Form Entries:</h1>
			</div>
			<div class="row">				
				<ul>
					<?php
					if ($name !== "") { echo "<li>NAME: $name </li>"; } 
					if ($phone !== "") { echo "<li>PHONE: $phone </li>"; }
					if ($email !== "") { echo "<li>EMAIL: $email </li>"; }
					if ($yesnoRadio !== "") { echo "<li>CONTACT BACK: $yesnoRadio </li>"; }
					if ($comment !== "") { echo "<li>COMMENT: $comment </li>"; }
					?>
				</ul>		
			</div>
		</div>
</section>
