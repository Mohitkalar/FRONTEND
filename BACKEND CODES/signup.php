<?php
include_once('db_conn.php');

if (isset($_POST['submit'])) {

    $application_id = $_POST['application_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  //  $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Sorry, that email address is already taken.";
    } else {
        
        $sql = "INSERT INTO users (application_id, email, password) VALUES ('$application_id', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "Congratulations, you have successfully signed up!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form method="post" action="signup.php">
        <label for="application_id">Application ID:</label>
        <input type="text" id="application_id" name="application_id" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="submit" value="Sign Up"/>
        <a href="login.php">
  click here to login....
</a>
        
 
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
