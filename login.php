<?php
session_start();
include 'Connection.php';
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) $_SESSION["user_id"] = $row['user_id'];
	 else $message = "Invalid Username or Password!";
	
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<style type="text/css">
  .st0{fill:none;}
  .st01{fill:#fff;}

  body 
	{
	  	margin: 0px;
	  	background-color: #00467F;
	  	background: linear-gradient(45deg, #49a09d, #5f2c82);
	  	background-attachment: fixed;
	}
</style>
<body>
	<div class="session">
	    <div class="left">
	 
	    </div>
	    <?php if(empty($_SESSION["user_id"])) { ?>
		    <form action="" method="post" id="frmLogin" class="log-in"> 
		    	<img src="img/logo.png" width="70" height="55" style="margin-left: 6.5cm; margin-top: -20px;">
		      	<h4 style="margin-top: -50px;">
		      		Wellcome <br>
		      		<span>Administrator</span>
		      	</h4>
		      	<p>Log in to view Today Cafe & Eatery clients order :</p>
		      	<div class="floating-label" style="margin-top: -30px;">
			        <input placeholder="Username" name="username" type="text">
			        <label for="login">Username:</label>
			        <div class="icon">
			          <?xml version="1.0" encoding="UTF-8"?>
			          <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
			            <g transform="translate(0 -952.36)">
			              <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z"/>
			            </g>
			            <rect class="st0" width="100" height="100"/>
			          </svg>
			        </div>
		      	</div>
			    <div class="floating-label">
			        <input placeholder="Password" name="password" type="password">
			        <label for="password">Password:</label>
			        <div class="icon">
			          <?xml version="1.0" encoding="UTF-8"?>
			          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
			        		<rect class="st0" width="24" height="24"/>
			        		<path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"/>
			        		<path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"/>
			        		<path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"/>
			          </svg>
			       	</div>
			    </div>
			    <div class="error-message" style="margin-left: 44px;">
			      	<?php if(isset($message)) { echo $message; } ?>
			    </div>
		      	<br>
		      	<center>
			      	<button type="submit" name="login" value="Login" class="form-submit-button" style="margin-left: 95px;">
			      		Log In
			  		</button>
		  		</center>
		    </form>
		<?php 
		} else { 
			echo'<script type = "text/javascript">';
			echo 'window.location="transaksi.php"';
			echo '</script>';
			?>
		<?php } ?>
	</div>
</body>
</html>