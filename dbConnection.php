<?php

$conn = mysqli_connect("localhost","root","","made4you");

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>