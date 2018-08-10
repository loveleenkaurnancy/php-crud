<?php
$con=mysqli_connect("localhost","root","","test");

if(!$con)
{
	echo mysqli_error($con);
}