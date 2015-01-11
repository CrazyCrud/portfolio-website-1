<?php

function get_project($id, $ajax){
	$project_content_raw = file_get_contents('php/projects/project_'.$id.'.json');
	$project_content = json_decode($project_content_raw, true);
	if($ajax){
		echo $project_content_raw;
	}else{
		return $project_content;
	}
}

function get_max_projects(){
	$files = glob("php/projects/" . "*.json");
	if ($files){
		$filecount = count($files);
	}else{
		$filecount = 1;
	}
	return $filecount;
}

?>