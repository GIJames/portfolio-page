<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/main.css">
		<script src="js/fhost.js.php"></script>
		<script src="js/swap.js"></script>
	</head>
	<body>
		
			<?php
				if (isset($_GET["s"])) {
					echo "<script>";
					echo "setTimeout(function(){fastSwap(";
					echo floor($_GET["s"]);
					echo ")}, 100);";
					echo "</script>\n";
				}
				elseif(isset($_GET["f"])){
					echo "<script>";
					echo "setTimeout(function(){fastEmbed(\"";
					echo $_GET["f"];
					echo "\", ";
					if(isset($_GET["w"])){
						echo $_GET["w"];
					}
					else{
						echo "1280";
					}
					echo ", ";
					if(isset($_GET["h"])){
						echo $_GET["h"];
					}
					else{ 
						echo "720";
					}
					echo ")}, 150);\n";
					echo "setTimeout(function(){fastSwap(2)}, 100);";
					echo "</script>\n";
				}
			?>
		<div class="maindiv">
			<div class="seconddiv">
				<div class="buttons">
						<span class="button-selected" id="home-button" onclick="swapTo(1)">
							<h1>home</h1>
						</span>
						<span class="button" id="flash-button" onclick="swapTo(2)">
							<h1>flash</h1>
						</span>
						<span class="button" id="music-button" onclick="swapTo(3)">
							<h1>music</h1>
						</span>
						<span class="button" id="contact-button" onclick="swapTo(4)">
							<h1>contact</h1>
						</span>
						<span class="button-hidden" id="embed-button" onclick="unEmbed()">
							<h1>return</h1>
						</span>
						<span class="button-hidden" id="title-button">
							<h1>Flash Embed</h1>
						</span>
						<span class="button-hidden" id="detail-button" onclick="linkToFlash()">
							<h1>link directly to this page</h1>
						</span>
				</div>
				<div class="box" id="box">
					<div class="initFull" id="loadArea">
							<div class="visibleSection" id="homeDiv">
								<iframe height="100%" width="100%" src="content_home.php" seamless></iframe>
							</div>
							<div class="invisibleSection" id="flashDiv">
								<iframe height="100%" width="100%" src="content_flash.php" seamless></iframe>
							</div>
							<div class="invisibleSection" id="musicDiv">
								<iframe height="100%" width="100%" src="content_music.php" seamless></iframe>
							</div>
							<div class="invisibleSection" id="contactDiv">
								<iframe height="100%" width="100%" src="content_contact.php" seamless></iframe>
							</div>
							<div class="invisibleSection" id="flashEmbedDiv">
								
							</div>
					</div>
					<div class="initClosed" id="background">
					</div>
				</div>
			</div>
		</div>
	</body>
</html>