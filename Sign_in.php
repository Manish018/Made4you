<?php

include "dbConnection.php";

 if(isset($_POST["email"]))
{
       $Email=$_POST["email"];
       $sql="SELECT COUNT(1) FROM `made4you`.`m4y_users` 
              WHERE upper(User_Email)= upper('$Email');";

       $result=mysqli_query($conn,$sql);
       $count= mysqli_fetch_row($result);

       if($count[0]==0)
       {
              echo "<script type='text/javascript'>
              alert('Not a Valid Email ID. If New User, Please Sign Up first');
              window.location.href='Sign_in.html';
              </script>";
              
              mysqli_close($conn);      
              exit();
       }
}

if(isset($_POST["password"]))
{
    $Password=$_POST["password"];

    $sql="SELECT COUNT(1) FROM `made4you`.`m4y_users`
    WHERE upper(User_Email)= upper('$Email') and User_Password = '$Password';";

    $result=mysqli_query($conn,$sql);
    $count= mysqli_fetch_row($result);
  
    if($count[0]==0)
    {
        echo "<script type='text/javascript'>
        alert('Invalid Password. Please Re-enter')
        window.location.href='Sign_in.html';
        </script>";
       
        mysqli_close($conn);
        exit();
    }

    mysqli_close($conn); 
    header("Location:deleteUserQuery.php");
 }
 
?>