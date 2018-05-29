<?php
$db=mysqli_connect('localhost','root','','test');
if(!$db)
{
	die("No DB COnnection..!");
}

$json1 = array();
$json2=array();
$query = mysqli_query($db,"select * from suppliers ");
$query2 = mysqli_query($db,"select * from category ");
while($q2=mysqli_fetch_array($query2))
{
	$json2[]=$q2;
}
while($q=mysqli_fetch_array($query))
{
	$json1[]=$q;
}
$response=[$json1,$json2];
echo json_encode($response);
?>