<?php
function GetImages()
{
	global $conn;
	$sql="select * from gallery";
	$result = $conn->query($sql);
	return $result;
}
function InsertImages($imgname,$title,$alttext)
{
	global $conn;
	$sql="insert into gallery values(null,'$imgname','$title','$alttext')";
	$result = $conn->query($sql);
	return $result;
}
function UpdateImages($id,$title,$alttext)
{
	global $conn;
	$sql="update gallery set title='$title', alttext='$alttext' where id='$id'";
	$result = $conn->query($sql);
	return $result;
}