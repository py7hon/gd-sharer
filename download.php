<?php

error_reporting(0);
session_start();

include "system/function.php";

if($_GET[id]) {

	$share = json_decode(file_get_contents("base/data/main/share/$_GET[id].json"), true);
	$users = json_decode(file_get_contents("base/data/user/".$share[file][user_id].".json"),true);
	$kontol = $share[file][file_id];
	if(isset($share[file][title])) {

		$title = $share[file][title]." - ".formatBytes($share[file][size]);

	} else {

		$title = "File not found :(";

	}

	include "header.php";

	echo "<div class=\"container\"><div class=\"content-wrap\">";

	if($share[file][poster]) {

		$poster = $share[file][poster];

	}

	if($_GET[code] == true) {

		include "system/menu/code.php";

	} 

	else {

		if(isset($_POST[submit])) {

			$ruse = token("refresh",$_SESSION[email]);
			$copy = copyfile($share[file][file_id],$ruse[access_token]);
			anyone($copy[id],$ruse[access_token]);
							
			if($copy[id]) {
								
				echo "
					<meta http-equiv=\"refresh\" content=\"5;URL='https://drive.google.com/file/d/$copy[id]/view'\" />
					<div style=\"padding: 50px 15px;text-align: center;background-color: #fff;\">
						<h2>Thank you for downloading!</h2><br />
						If your download doesn't start automatically within a few seconds, <a href=\"https://drive.google.com/file/d/$copy[id]/view\">click here</a>.
					</div>";
								
			} else {

				echo "<div style=\"padding: 50px 15px;text-align: center;background-color: #fff;\">";

				if($copy[error][message] == "The user's Drive storage quota has been exceeded.") {

					echo "Your Google Drive account was full, please delete some files before genereate link download.";

				} else if($copy[error][message] == "User rate limit exceeded.") {

					echo "Your Google Drive account was limited, please login with another Google account.<br>
							The account will be returned to normal after 24 hours.";

				} else if($copy[error][message] == "Forbidden") {

					echo "File cannot be opened :(";
					
				} else {

					echo $copy[error][message];

				}

				echo "</div>";
			
			} 

		}

		else if($share[file][status] == "publish") {
					
			/*echo "
				<div style=\"background-color: #000;display: block;\">
				<div style=\"max-height:400px;max-width:800px;margin-left: auto; margin-right: auto;\">
				";

			if($poster) {

				echo "
					<div style=\"text-align: center;\">
						<img src=\"$poster\" width=\"400px\">
					</div>";

			} else {

				echo "
					<div style=\"color: #fff;text-align: center;padding: 30px 15px;\">
						No preview available
					</div>";

			}

			echo "</div></div>";*/
			$banner = config('banner.1');
			
			if(!empty($banner)) { 

				echo "<div style=\"text-align: center;\">$banner</div>";

			}

			echo "
				<center><iframe src='https://drive.0wo.me/player?id=$kontol'frameborder='0' width='480' height='240'></iframe></center>
				<textarea class=\"form-control\">&lt;iframe src=\"https://drive.0wo.me/player?id=$kontol\" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=\"640\" HEIGHT=\"350\" allowfullscreen=\"true\"&gt;&lt;/iframe&gt;
</textarea>
<style type=\"text/css\">
			.fileinfo {line-height: 21px;color:eee;font-weight: 700;padding: 10px;background-color:#ebebeb;border: 3px solid #eee;border-radius: 5px;margin: 10px 20px;}
			.fileinfo span{display: block;}
			.bysize{text-align: center;margin: 10px 20px;}
			</style>
				<div class=\"fileinfo\">
								<span>Filename	:".$share[file][title]." </span>
								<span>Format    :".$share[file][format]."</span>
								<span>Size		:".formatBytes($share[file][size])."</span>
					</div>
			";

			$banner = config('banner.2');
			
			if(!empty($banner)) { 

				echo "<div style=\"text-align: center;padding-bottom: 20px;\">$banner</div>";

			}


			if($_SESSION[email]) {

				echo "
					<div style=\"text-align: center;\">
						<form method=\"post\">
							<button class=\"btn btn-primary\" type=\"submit\" name=\"submit\">Download File</button>
						</form>
					</div>";
						
			} else {

				echo "
					<div class=\"alert alert-danger\" role=\"alert\">
						You Need to login first before start download file in this web.
					</div>";

				echo "
					<div style=\"text-align: center;\">
						<form action=\"/login.php\" method=\"GET\">
							<input name=\"r\" value=\"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]\" type=\"hidden\">
								<button class=\"btn btn-primary\" type=\"submit\">Login with Google</button>
						</form>
					</div>";

			}
					
		} else echo "
					<div style=\"padding: 50px 15px;text-align: center;background-color: #fff;\">
						<h2>File not found :(</h2>
					</div>";

	}


	echo "</div></div>";
	
}

include "footer.php";
