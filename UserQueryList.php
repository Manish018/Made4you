<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>made4you</title>
    <link rel="stylesheet" href="UserQueryList.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,700;1,300;1,700&display=swap" rel="stylesheet">
</head>
<body>
<section>
        <nav>
            <img src="images/m4ylogo.png">
            <h1 class="head">Made4you Pvt Ltd</h1>
        </nav>
    </section>
    <h2><b>User Query List</b></h2>
    <div class="form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table align=center border = 5>
    <tr>
        <td align=right>
        <label for="search"><b>Search Based On:</b></label>
       </td>
        <td align=left>
        <select id="Searchby" name="Searchby">
            <option value="User_Name">Name</option>
            <option value="User_Email">Email</option>
            <option value="Contact_Number">Contact Number</option>
            <option value="User_Message">Message</option>
        </select>
       </td>
</tr>
        <br>
<tr>
         <td align=right>
        <label for="textsearch"><b>Enter Search Text:</b></label>
        </td>
        <td align=left>
        <input type="text" id="textsearch" name="textsearch">
        </td>
</tr>
<br>
    <tr>
        <td align=right>
        <label for="sortby"><b>Sort By:</b></label>
       </td>
       <td align=left>
        <select id="sortby" name="sortby">
           <option value="C.Service_ID">Service</option>
            <option value="User_Name">Name</option>
            <option value="Contact_Number">Contact Number</option>
            <option value="User_Email">Email</option>
            <option value="User_Message">Message</option>
        </select>
       </td>
</tr>
</table>
    <Button class="refreshbutton"type="submit">Refresh Data</Button>
</form>
 </div>
 <br>
<table id="table" class="table" width="100%" >    
        <tr>
            <th>Service</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Message</th>
            <th></th>
        </tr> 

        <?php
        $Searchby="User_Name";
        if(isset($_POST["textsearch"]))
        {
            $SearchText=$_POST["textsearch"];
            $Searchby=$_POST["Searchby"];
            $Where="and ". $Searchby . " like '%".$SearchText ."%'";
        }

        $Orderby = "C.Service_ID";
        if(isset($_POST["sortby"]))
            $Orderby = $_POST["sortby"];

       include "dbConnection.php";
        
        if(isset($Where))
        {
            $Where =" where C.Service_ID=S.Service_ID ".$Where;
        }
        else
            $Where =" where C.Service_ID=S.Service_ID ";

        $query = "SELECT ContactUS_ID,Service_Name,User_Name, Contact_Number, User_Email, User_Message
                 FROM ContactUs C,Service S ". $Where ."
                 Order by " . $Orderby;
        $result=$conn->query($query);
        if (!empty($result) && $result-> num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td width=10%>". $row["Service_Name"]."</td><td width=20%>". $row["User_Name"] . "</td><td width=10%>". $row["Contact_Number"] . "</td><td width=20%>" 
                . $row["User_Email"] ."</td><td width=35%>". $row["User_Message"] . "</td><td width=5%><a href=deleteUserQuery.php?id=".$row["ContactUS_ID"].">Delete</a>" ."</td></tr>";
            }
        }
        else{
            echo "<tr  width=100%> <b>No Records Found!</b></tr>";
        }
        mysqli_close($conn); 
        ?>
     </table>
     <br>
     <footer class="footer">
        <div class="ic">
          <img src="images/logo.png" style="height: 30px;">
          <i style="color: white;">Developed By Compsoft Technologies</i>
      </div> 
    </footer>
</body>
</html>