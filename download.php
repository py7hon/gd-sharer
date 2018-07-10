<!DOCTYPE html>
<html>
<head>
<?php 

if(!empty($title)) {
	
	echo "<title>$title</title>";
	
} else {
	
	echo "<title>404</title>";
}


echo "
<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
<link href=\"https://cdn.jsdelivr.net/npm/vuesax/dist/vuesax.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
<style media=\"screen\">.content-wrap{margin:0 auto;padding:2em 15px 5em;max-width:1000px}
	.page-header{margin:0 0 20px 0;}
	img {max-width: 100%;height: auto;}
	.navnav{background-color:#F8F8FF; border:none}
	.navnav a{color:black !important}
	.navnav a:hover{color:rgb(158, 158, 158) !important}
	.jumbotron{background-color:#F8F8FF;border:8px solid #eee}
body{background-color:#FFF}
.form-group {
margin-bottom: 0;
padding: 10px 0;
}
.form-group:first-child {
border-color: transparent;
}

.form-control {
-webkit-box-shadow: none;
box-shadow: none;
border-width: 2px;
min-height: 40px;
height: auto;
}
.form-control:focus {
-webkit-box-shadow: none;
box-shadow: none;
}

.form-vertical {
counter-reset: fieldset;
}
.form-vertical fieldset {
padding-top: 10px;
margin: 50px 0;
}
.form-vertical fieldset > legend:before {
content: counter(fieldset);
counter-increment: fieldset;
position: absolute;
left: -25px;
width: 30px;
height: 30px;
line-height: 30px;
border-radius: 15px;
text-align: center;
background: #428bca;
color: white;
font-size: 75%;
font-weight: bold;
}

label.checkbox {
margin-bottom: 15px;
position: relative;
}
label.checkbox .icheckbox_square-blue {
position: absolute;
top: 0;
left: 0;
}
label.checkbox input {
position: absolute;
left: 0;
top: 0;
}
label.checkbox span {
padding-left: 35px;
display: block;
}

.radio label {
padding-left: 0;
}
.radio span {
vertical-align: middle;
margin-left: 5px;
}

.btn {
height: 40px;
padding: 10px 16px;
border-radius: 3px;
min-width: 80px;
}

.btn-group.radio-group .btn {
height: 50px;
line-height: 22px;
padding: 12px 20px;
}
.btn-group.radio-group .btn span {
line-height: 22px;
vertical-align: middle;
margin-left: 5px;
}

/* bootstrap select styles */
.bootstrap-select .btn {
min-height: 40px;
border-width: 2px;
-webkit-box-shadow: none;
box-shadow: none;
outline: 0;
}
.bootstrap-select .btn:hover {
background: white;
}

.bootstrap-select .btn:focus,
.bootstrap-select.btn-group.open .dropdown-toggle {
border-color: #428bca;
background: white;
outline: 0;
}

.bootstrap-select .btn.bootstrap-select.btn-group.open .dropdown-toggle {
border-color: #428bca;
color: white;
-webkit-box-shadow: none;
box-shadow: none;
}

.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
background: #428bca;
color: white;
}

label {
cursor: pointer;
}

:-ms-input-placeholder {
color: #ccc;
}

::-moz-placeholder {
color: #ccc;
}

::-webkit-input-placeholder {
color: #ccc;
}

</style>
".head_content();

if($_GET[id]) {

	$headtag = config('head.tag');
	if(!empty($headtag)) {

		echo $headtag;

	}
	echo "<meta name=\"robots\" content=\"noindex\" />";

}

echo "
	</head>
	<body>
		<nav cclass=\"navbar navbar-default navbar-static-top navnav\">
			<div class=\"container\">
			<div class=\"navbar-header\">
				<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
					<span class=\"sr-only\">Toggle navigation</span>
					<span class=\"icon-bar\"></span>
					<span class=\"icon-bar\"></span>
					<span class=\"icon-bar\"></span>
				</button>
				<a class=\"navbar-brand\" href=\"http://".config('site.domain')."/\">".config('site.tag')."</a>
			</div>
			<div id=\"navbar\" class=\"navbar-collapse collapse\">";
		
if($_SESSION[email]) {

	$file = file_get_contents("base/data/user/$_SESSION[email].json");
	$user = json_decode($file, true);

	echo "<ul class=\"nav navbar-nav\">";
			
	if($user[role] == "admin") {
				
		echo "
			<li class=\"dropdown\">
				<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><span class=\"glyphicon glyphicon-cog\" aria-hidden=\"true\"></span> Setting <span class=\"caret\"></span></a>
				<ul class=\"dropdown-menu\">
					<li><a href=\"/menu.php?s=setting&a=site\">Site</a></li>
					<li><a href=\"/menu.php?s=setting&a=oauth\">OAuth 2.0</a></li>
					<li role=\"separator\" class=\"divider\"></li>
					<li class=\"dropdown-header\">Page</li>
					<li><a href=\"/menu.php?s=setting&a=page\">Index</a></li>
					<li role=\"separator\" class=\"divider\"></li>
					<li class=\"dropdown-header\">Advertisement</li>
					<li><a href=\"/menu.php?s=setting&a=ads&t=banner\">Banner</a></li>
					<li><a href=\"/menu.php?s=setting&a=ads&t=headtag\">Head Tag</a></li>
				</ul>
			</li>

			<li>
				<a href=\"/menu.php?s=backup\"><span class=\"glyphicon glyphicon-floppy-save\" aria-hidden=\"true\"></span> Backup</a>
			</li>";
				
	}
			
	echo "
		<li>
			<a href=\"/menu.php?s=share\"><span class=\"glyphicon glyphicon-link\" aria-hidden=\"true\"></span> Share</a>
		</li>
		<li>
			<a href=\"/menu.php?s=file\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span> File</a>
		</li>
		<li>
			<a href=\"/menu.php?s=account\"><span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></span> Account</a>
		</li>
		<li>
			<a href=\"/login.php?action=logout\"><span class=\"glyphicon glyphicon-log-out\" aria-hidden=\"true\"></span> Logout</a>
		</li>";
			
} else {

	echo "
		<ul class=\"nav navbar-nav navbar-right\">
		<li>
			<a href=\"/login.php\">Login</a>
		</li>
		<li>
		<a href=\"/https://accounts.google.com/SignUp?hl=in\">Register</a>
		</li>";

}

echo "</ul></div></div></nav>";

?>
