<?php

$conn = new mysqli('localhost','root','','hms');

if($conn->connect_error){

    die('Connection Failed: '.$conn->connect_error);

}

else{

    $Email = $_POST['Email'];

    $Password = $_POST['Password'];

     

    //to prevent from mysqli injection 

    $Email = stripcslashes($Email); 

    $Password = stripcslashes($Password); 

    $Email = mysqli_real_escape_string($conn, $Email); 

    $Password = mysqli_real_escape_string($conn, $Password); 

      

    $sql = "select * from admin where Email = '$Email' and Password = '$Password'"; 

    $result = mysqli_query($conn, $sql); 

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 

    $count = mysqli_num_rows($result); 

          

    if($count == 1){

        echo "<br><br><br><br><br><br>";

        echo "<h2><center> Login Successful </center></h2>";

        echo "<br><br><br><br><br>";

        echo "<a href=\Arogya\Admin\Admin_dashboard.html><center> <button>Go To Admin Dashboard</button> </center></a>";

        echo "<br>";

        echo "<a href=login.html><center> <button>Log Out</button> </center></a>";

    } 

    else{

        echo "<br><br><br><br><br><br>";

        echo "<h2><center> Login Failed, Invalid Email or Password </center></h2>";

        echo "<br><br><br><br><br>";

        echo "<a href=login.php><center> <button>Back To Login</button> </center></a>";

    }

}

?>