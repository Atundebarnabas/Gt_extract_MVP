<?php
$servername = 'localhost';
$dbcutomer = 'root';
$dbpass = '';
$dbname = 'G_to_all';

$con = mysqli_connect($servername, $dbcutomer, $dbpass, $dbname);

if($con)
{
      //echo "Database connected successfuly-- ALL THANKS TO JESUS OUR LORD 😁😁😁";
}
else
{
      echo "Database not connected succesffuly";
}
?>