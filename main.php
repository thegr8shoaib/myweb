<?php
$con=mysqli_connect("localhost","shoaib","test1234test1","ninja_pizza");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="";
$result=mysqli_query($con,$sql);

// Fetch all
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

mysqli_close($con);
