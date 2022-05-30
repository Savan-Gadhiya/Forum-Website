<?php
    // require './partials/_dbconnect.php';
    // echo "File called";
    $isError = false;
    $isSuccess = false;
    $showError = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include '_dbconnect.php';
        $username = $_POST['SignupUsername'];
        $email = $_POST['SignupEmail'];
        $password = $_POST['SignupPassword'];
        $cpassword = $_POST['SignupcPassword'];
        // echo "$email , $password ,$cpassword";
        $EmailexitsSql = "SELECT * FROM `users` WHERE `user_email` =  '$email'";
        $result = mysqli_query($conn,$EmailexitsSql);
        $numEmailRow = mysqli_num_rows($result);
        
        $UsernameExits = "SELECT * FROM `users` WHERE `user_name` =  '$username'";
        $result = mysqli_query($conn,$UsernameExits);
        $numUsernameRow = mysqli_num_rows($result);

        if($numEmailRow > 0 || $numUsernameRow > 0){
            $isError = true;
            if($numEmailRow > 0)
                $showError  ="Email is already exits Please login to access your account";
            else if($numUsernameRow > 0)
                $showError  ="This username is already taken please try with other userName";

            // echo "$showError";
        }
        else{
            if($password == $cpassword){
                $passwordHash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_name`,`user_email`,`user_password`) VALUES ('$username','$email','$passwordHash')";

                $result = mysqli_query($conn,$sql);
                if($result){
                    $isSuccess = true;
                    echo "success: ";
                    header("location: /php/Forum Project/index.php?signupsuccess=true");
                    exit();
                }

            }
            else{
                $isError = true;
                $showError = "Password and confirm password are not matched";
            }
        }
        header("location: /php/Forum Project/index.php?signupsuccess=false&error=$showError");
        // echo "$showError";
        // echo var_dump("$showError");

    }

?>