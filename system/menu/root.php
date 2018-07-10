<div class="container">
<?php


if($_SESSION[email]) {

	$page = json_decode(file_get_contents("base/data/setting/page.json"),true);

	echo "
 		<div class=\"page-header\">
 			<h1>$page[title]</h1>
 		</div>
		<p class=\"lead\">$page[content]</p>";

} else {

	echo "
	<div class=\"jumbotron\">
			<center><img style=\"text-align:center\" src=\"\">
</center>		<h1 style=\"text-align:center;font-size:3em;font-weight:bold;text-transform:uppercase\">".config('site.title')."</h1>
		<p style=\"text-align:center;font-size:1em;font-weight:bold;text-transform:uppercase\">".config('site.description')."</p>
<br>
				  <p style=\"text-align:center\">

						<a href=\"http://blog.0wo.me\" class=\"btn btn-primary\">Cari file..</a>
				  </p>
		</div>

		
		";

}

?>
</div>
