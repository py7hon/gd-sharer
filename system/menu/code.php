<?php
if($_GET[id]) {
	$kontol = $share[file][file_id];
}

echo "
	<div class=\"page-header\"><h1>".$share[file][title]." - ".formatBytes($share[file][size])."</h1></div>

	<div class=\"form-horizontal\">

		<div class=\"form-group\">
			<label class=\"col-sm-2 control-label\" style=\"text-align: left;\">Direct Link</label>
			<div class=\"col-sm-10\">
				<input class=\"form-control\" value=\"http://".config('site.domain')."/file/$_GET[id]\">
			</div>
		</div>

		<div class=\"form-group\">
			<label class=\"col-sm-2 control-label\" style=\"text-align: left;\">BB Code</label>
			<div class=\"col-sm-10\">
				<input class=\"form-control\" value=\"[URL=http://".config('site.domain')."/file/".$_GET[id]."]".$share[file][title]." - ".formatBytes($share[file][size])."[/URL]\">
			</div>
		</div>

		<div class=\"form-group\">
			<label class=\"col-sm-2 control-label\" style=\"text-align: left;\">HTML Code</label>
			<div class=\"col-sm-10\">
				<input class=\"form-control\" value=\"&lt;a href=&quot;http://".config('site.domain')."/file/$_GET[id]&quot;&gt;".$share[file][title]." - ".formatBytes($share[file][size])."&lt;/a&gt;\">
			</div>
		
        <div class=\"form-group\">
			<label class=\"col-sm-2 control-label\" style=\"text-align: left;\">Embed Player</label>
			<div class=\"col-sm-10\">
				<input class=\"form-control\" value=\"&lt;iframe=&quot;https://drive.0wo.me/player?id=$kontol frameborder=&quot;0&quot; width=&quot;480&quot; height=&quot;240&quot;&lt;/frame&gt;\">
			</div>
		</div>
        </div>
	</div>

  ";