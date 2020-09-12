<?php

session_start();

$username = $_SESSION['username']; 
$conn = mysqli_connect('localhost','root','','project');

$get_id="select id from user where username='$username'";
$id_run=mysqli_query($conn,$get_id);
$id_array=mysqli_fetch_assoc($id_run);
$id=$id_array['id'];

$service_id=$_POST['service_id'];
$service_name=$_POST['service_name'];
$service_desc=$_POST['service_desc'];

$product_id=$_POST['product_id'];
$product_name=$_POST['product_name'];
$product_desc=$_POST['product_desc'];

$insert_sql="INSERT INTO feedback(id,service,food_quality,staff_feedback) VALUES ('$id','$food_msg','$service_msg','$staff_msg')";
mysqli_query($conn,$insert_sql);


header('location: change.php');
?>