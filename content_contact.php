<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/sub.css">
</head>
<body>
	<div id="container">
		<div id="intro">
			<p class="introp">
				Leave a message if you've got any questions, about my work or otherwise, and I'll get back to you as soon as possible.		
			</p>
		</div>
		<div>
			<?php
			function ipScan($ip) {
				$logfile = fopen("log/messages.html", "r") or die("Unable to open file!");
				$comp = "";
				$lastTime = -1;
				$readTime = false;
			while(!feof($logfile)) {
					$comp = trim(fgets($logfile) , "<br>\n" );
					if($readTime){
						$readTime = false;
						$lastTime = intval ( $comp );
					}
					if(strcmp( $comp , $ip ) === 0 ){
						$readTime = true;
						
					}
				}
				fclose($logfile);
				return $lastTime;
			}
			// define variables and set to empty values
			$name = $email = $message = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$name = test_input($_POST["name"]);
				$email = test_input($_POST["email"]);
				$emailConf = test_input($_POST["emailConf"]);
				$message = test_input($_POST["message"]);
				$noerr = true;
				$ipErr = "";
				$emailErr = "";
				$messageErr= "";
				$nameErr = "";
				$emailConfErr = "";
				if ( strcmp ( $email , $emailConf ) !== 0 ) {
					$emailConfErr = "Email confirmation did not match";
					$noerr = false;
				}
				$last = ipScan($_SERVER['REMOTE_ADDR']);
				if($last !== -1 && time() - $last < 86400){
					$secondsDiff = explode(":", gmdate ( "H:i:s" , time() - $last ));
					$ipErr = "<p class=\"error\">Your last message was " . $secondsDiff[0] . " hours, " . $secondsDiff[1] . " minutes, and " . $secondsDiff[2] . " seconds ago; please wait a day before sending more.</p>";
					$noerr = false;
				}
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format";
					$noerr = false;
				}
				if (empty($_POST["message"])) {
					$messageErr= "Message is a required field";
					$noerr = false;
				}
				if (empty($_POST["email"])) {
					$emailErr = "Email is a required field";
					$noerr = false;
				}
				if (empty($_POST["name"])) {
					$nameErr = "Name is a required field";
					$noerr = false;
				}
				if ($noerr){
				$file = fopen("log/messages.html", "a");
				$nline = "<br>\n";
				fwrite($file, "<p>\n");
				fwrite($file, $_SERVER['REMOTE_ADDR']);
				fwrite($file, $nline);
				fwrite($file, time());
				fwrite($file, $nline);
				fwrite($file, date(DATE_RSS));
				fwrite($file, $nline);
				fwrite($file, $name);
				fwrite($file, $nline);
				fwrite($file, $email);
				fwrite($file, $nline);
				fwrite($file, str_replace( "\r\n" , "<br>" , $message));
				fwrite($file, "</p>\n");
				fclose($file);
				echo "<p>Thank you for submitting your message! I will get back to you as soon as possible.<br>Your email address was recorded as: ";
				echo $email;
				echo "</p>";
				}
				else {
					echo "<p class=\"error\">The following errors were found in your submission:</p>";
					echo $ipErr;
				}
			}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}





			?>
			<br><span class="formLabel">Contact me:</span><br><br>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<span class="formLabel">Name:</span><input type="text" name="name" required><span class="error">* <?php echo $nameErr;?></span><br>
			<span class="formLabel">E-mail:</span><input type="text" name="email" required><span class="error">* <?php echo $emailErr;?></span><br>
			<span class="formLabel">Confirm E-mail:</span><input type="text" name="emailConf" required><span class="error">* <?php echo $emailConfErr;?></span><br>
			<span class="formLabel">Message:</span><textarea name="message" rows="5" cols="40" required><?php if( ! $noerr ) echo $_POST["message"];?></textarea><span class="error">* <?php echo $messageErr;?></span><br>
			<span class="formLabel"></span><input type="submit">
			<span class="error">* denotes required field</span>
			</form>
		</div>
	</div>
</body>
</html>