<?php
sleep(3);
include('dbb.php');
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Gender=$_POST['Gender'];
$Password=$_POST['Password'];
$sql='insert into loogin(Name,Email,Gender,Password)values("'.$Name.'","'.$Email.'","'.$Gender.'","'.$Password.'")';
$stmt=$con->prepare($sql);
$stmt->execute();
echo "Data Submit";

?>