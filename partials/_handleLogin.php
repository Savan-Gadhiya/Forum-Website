<?php
$isError = false;
$isSuccess = false;
$error =  "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $email = $_POST['LoginEmail'];
    $password  = $_POST['LoginPassword'];

    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn , $sql);
    $numRow = mysqli_num_rows($result);
    if($numRow == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['userid'] = $row['user_id'];
            // echo "Logged in Success: " ; 
            header("location: /php/Forum Project/index.php?loginSuccess=true");
            exit();
        }
        else{
            $error = "Username and password are not matched";
        }
    }
    else{
        $error = "Account not Exits";
    }
    echo "$error";
    header("location: /php/Forum Project/index.php?loginSuccess=false&error=$error");
}
?>