<?php


session_start();
header('location:login.php');

$con=mysqli_connect("localhost","root","","inform");
if($con){
    echo "<h2>connection succesfull</h2>"."<br>";
}else{
    echo "no connection";
}

$name=$_POST['user'];
$pass=$_POST['password'];

$q="SELECT * FROM signin where name ='$name'&& password ='$pass'";
$result=mysqli_query($con,$q);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "duplicate data";
}else{
    $qy="INSERT INTO signin(name,password)values('$name','$pass')";
    mysqli_query($con,$qy);


    
}
?>