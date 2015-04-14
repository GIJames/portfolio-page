<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/sub.css">
</head>
<body>
	<div id="container">
		<div id="intro">
			<p class="introp">
				If you're reading this, it means you've reached my site! Thanks for visiting. Try not to share it around too much though, since this will be undergoing a domain name change shortly.<br>
			</p>
		</div>
		<div>
			
			<p>James Jerram has been writing music since 2004 and programming since 2010, and is usually looking for ways to combine the two. Between web development, solo projects, Flash programming, visual novels, automations and plugins, and music collabs, there's a lot to do, but things still manage to get finished somehow.</p>
			<?php
			//note: the following is lazy and insecure; if you're running an important webpage this probably isn't the way to go about things
			if( strcmp ( $_SERVER['REMOTE_ADDR'] , "71.235.37.86" ) === 0 || strpos ( $_SERVER['REMOTE_ADDR'] , "192.168.1." ) === 0){
				echo readfile("log/messages.html");
			}
			?>
		</div>
	</div>
</body>
</html>