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

<?php 
try {
    $conn = get_db_connection();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, name, phone, email, yesnoRadio, comment FROM bbeauty_table")

echo "table";
echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
<tr>
    <td><?php echo $row[id]; ?></td>
    <td><?php echo $row[name]; ?></td>
    <td><?php echo $row[phone]; ?></td>
    <td><?php echo $row[email]; ?></td>
    <td><?php echo $row[yesnoRadio]; ?></td>
    <td><?php echo $row[comment]; ?></td>
</tr>
<?php }
echo "</table>";
}
catch (PDOException $e) {
    echo "Error: " . $ee->getMessage();
}
$conn = null;
?>