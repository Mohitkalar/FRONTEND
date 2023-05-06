<?php
	include('db_conn.php');
    if (isset($_POST['submit'])) {
	$application_id = $_POST['application_id'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE application_id='$application_id' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['application_id'] = $application_id;
        echo "Logged in";
		header("Location: admission_proc.php");
	} else {	
		echo "Invalid application ID or password";
	}

	
	mysqli_close($conn);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PES</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
	<style>
		body{
    background-image: url(img.jpeg);
    background-size: cover;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
form{
    height: 520px;
    width: 430px;
    background: transparent;
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
}
form h3 span{
    display: block;
    font-size: 16px;
    font-weight: 600;
    color: #e5e5e5;
}
label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
	</style>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form>
        <h3>Welcome Back!
            <span>Login to your account.</span>
        </h3>

        <label for="username">Username</label>
        <input type="text" placeholder="For ex. abc" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Minimum 6 characters" id="password">

        <button>Sign In</button>
    </form>
</body>
</html>