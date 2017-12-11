<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<title>SurveyMonkey</title>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="shortcut icon" href="logo.jpg">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="profile.html">
    <img src="logo.jpg" width="30" height="30" alt=""> SurveyMonkey</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"> <a class="nav-link" href="account.html">Account Information</a>
      <li class="nav-item">
        <a class="nav-link" href="about.html">About </a>
      </li>
	  <li class = "nav-item">
	    <a class="nav-link" href="index.html">Exit</a>
	  </li>
    </ul>
  </div>
</nav>
<!-- Need to change the database connection info for other usage other than WAMP/MAMP -->
<?php

		 $db = @mysqli_connect(localhost, "root", "root")
         Or die("<div><p>ERROR: Unable to connect to database server.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		 
         @mysqli_select_db($db, "surveymonkey")
         Or die("<div><p>ERROR: The database is not available. </p>" . "<p>Error Code" . mysqli_errno() . ": " . mysqli_error() . "</p></div>");
		 
		 if($_POST['submit'] !== '' && isset($_POST['submit'])){
			 	$password = $_POST['password'];
				$email = $_POST['email'];
				$city = $_POST['city'];
				$first = $_POST['fname'];
				$last = $_POST['lname'];
				$address = $_POST['address'];
				$address2 = $_POST['address2'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
						
				$SQLstring = "SELECT email FROM users WHERE email = '$email'";
				$q = @mysqli_query($db, $SQLstring)
				Or die("<div><p>ERROR: Unable to execute query.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");	
				
				if(mysqli_num_rows($q) != 0){
					
					$selectPass = "SELECT password, email FROM users WHERE email = '$email'";
					$result = mysqli_query($db, $selectPass);
					$row = mysqli_fetch_row($result);
					$pass = $row[0];
					$mail = $row[1];
					
					if($pass == $password && $mail == $email){	
					$query = "UPDATE users SET fname = '$first', lname = '$last', address = '$address',
						address2 = '$address2', city = '$city', state = '$state', zip = '$zip' WHERE email = '$email'";
					$q = mysqli_query($db, $query)
					Or die("<div><p>ERROR: Unable to execute query.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
			
					echo "<p> Your information has been updated! </p>";
					}
					else{
						echo "<p> Your username or password does not match what we have on record. Go back and try again! </p>";
					}
				}
				else{ 
					echo "<p>Oops, something went wrong. Go back and try again!</p>";} 
				}
		 mysqli_close($db);

		 
?>
<br />
<br />
      <div class="col-md-4 center-block">
	  <a href="profile.html" class="btn btn-primary btn-lg active" style="width:100%"role="button" aria-pressed="true"> Return to profile </a>

</body>
</html>