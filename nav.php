<?php 
    echo (!isset($_SESSION['usuario']) ?
        '<a href="login.php"> Log In </a> | <a href="register.php"> Register </a>'
        :
        '<a href="comments.php"> Comments </a> | <a href="upload_file.php"> Upload FIle </a> | <a href="change_password.php"> Change Password </a> | <a href="log_out.php"> Log Out </a>'
); 
?>
    