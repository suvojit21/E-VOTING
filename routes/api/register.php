<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$Password = $_POST['Password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if($Password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$address', '$Password', '$image', '$role', 0, 0)");
    if($insert){
        echo '
        <script>
            alert("Registration Successfull!");
            window.location = "../../index.html";
        </script> 
    
    ';  
    }
    else{
        echo '
        <script>
            alert("Some Error Occured!");
            window.location = "../register.html";
        </script>
    
    ';
    }
}
else{
    echo '
        <script>
            alert("Password and Confirm Password does not match!");
            window.location = "../register.html";
        </script>
    
    ';  
    
}

?>