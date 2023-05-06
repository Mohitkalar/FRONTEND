<?php
include('db_conn.php');

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $application_id = $_POST["application_id"];
  
  $Token_id = generateToken(); // Function to generate random token
  $Token_id = $_POST["token_id"];
  
  $Doc = $_FILES["Doc"]["name"]??null;
  $tmp_name = $_FILES["Doc"]["tmp_name"]??null;

  // Check if all required fields are present
  if ($application_id && $Token_id && $Doc) {
    // Insert data into database table
    
    
      // Move uploaded file to server directory
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($Doc);
      if(move_uploaded_file($tmp_name, $target_file)){
      $db = new mysqli('localhost', 'root', '', 'todo_manager');
      $sql = "INSERT INTO documents (application_id, token_id, Doc) VALUES ('$application_id', '$Token_id', '$target_file')";
      if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    $db->close();
} }else {
    echo "Sorry, there was an error uploading your file.";
}
// Function to generate random token

mysqli_close($conn);}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Documentation Page</title>
    <script>
		function generateToken() {
			var token = Math.floor(Math.random() * 1000000);
			document.getElementById("token_id").value = token;
		}
	</script>
</head>
<body>
	<h1>Documentation Page</h1>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		<label for="application_id">Application ID:</label>
		<input type="text" name="application_id"><br><br>
		<label for="token_id">Token ID:</label>
		<input type="text" name="token_id" id="token_id"><br><br>
		<button type="button" onclick="generateToken()">Generate Token</button><br><br>
		<label for="doc">Submit documentation in zip file:<br> [rank cards 10+2,degree marks card, adhaar card]</label>
		<input type="file" name="doc" id="doc"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>

	
</body>
</html>