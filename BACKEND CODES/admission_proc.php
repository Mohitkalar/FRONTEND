<?php
include('db_conn.php');
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['photo'])) {
$application_id = $_POST['application_id'];
$name = $_POST['name'];
$pessat_rank = $_POST['pessat_rank'];
$puc_marks = $_POST['puc_marks'];
$mobile_no = $_POST['mobile_no'];
$dd_no = $_POST['dd_no'];
$dd_amt = $_POST['dd_amt'];
$branch = $_POST['branch'];
$appliedfor = $_POST['appliedfor'];

$file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_type = $_FILES['photo']['type'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file_size > 1100000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($file_type != "image/jpg" && $file_type != "image/jpeg" && $file_type != "image/png" && $file_type != "image/gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Here, you can insert the file path into the database
            $db = new mysqli('localhost', 'root', '', 'todo_manager');
            $sql = "INSERT INTO student_details (application_id,name, Pessat_rank, Puc_marks, Mobile_no, DD_no, DD_amt, Branch, photo, appliedfor) VALUES ('$application_id','$name', '$pessat_rank', '$puc_marks', '$mobile_no', '$dd_no', '$dd_amt', '$branch', '$target_file', '$appliedfor')";
            if ($db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
            $db->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
mysqli_close($conn);}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admission Form</title>
</head>
<body>
	<h2>Admission Form</h2>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
		<label>Application ID:</label>
		<input type="number" name="application_id"><br>

		<label>Name:</label>
		<input type="text" name="name"><br>

		<label>Pessat Rank:</label>
		<input type="number" name="pessat_rank"><br>

		<label>PUC Marks:</label>
		<input type="number" name="puc_marks"><br>

		<label>Mobile No:</label>
		<input type="phone" name="mobile_no"><br>

		<label>DD No:</label>
		<input type="number" name="dd_no"><br>

		<label>DD Amount:</label>
		<input type="number" name="dd_amt"><br>

		<label>Branch:</label>
		<select name="branch">
			<option value="RR">Ring Road</option>
			<option value="EC">Electronic City</option>
					</select><br>

			<label>Upload Photo:</label>
		<input type="file" name="photo"><br>

		<label>Applied For:</label>
		<input type="text" name="appliedfor"><br>

		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
