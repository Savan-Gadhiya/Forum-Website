<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <?php require './partials/_dbconnect.php' ?>
    <?php require './partials/_header.php' ?>
    <?php

    $id = $_GET['threadId'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`= $id";
    $result = mysqli_query($conn, $sql);

    // if(!$result){
    //     die('Error is : ' . mysqli_error($conn));
    // }
    while ($row = mysqli_fetch_assoc($result)) { // ek avr j loop chalshe karan ke  hamesha id uniqe j hoy atle
        $ThreadTitle = $row['thread_title']; // aa nicheni script ma thread is display karavava use kariyu che
        $ThreadDesc = $row['thread_desc'];
        $ThreadUserId = $row['thread_user_id'];
        // find the username from the user id
        $userNameSql = "SELECT `user_name` FROM `users` WHERE `user_id`=$ThreadUserId";
        $userResult = mysqli_query($conn ,$userNameSql);
        if(!$userResult){
            die('Fail to run query: ' . mysqli_error($conn));
        }
        $userRow = mysqli_fetch_assoc($userResult);
        $username = $userRow['user_name'];
        
    }
    ?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { // Jo koi direct aa file na url per aeni php script mathi post request mare to data add no thay atle aa if statement mukiyu che
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $isSucess = false;
            $comment = $_POST['comment'];
            $userid = $_SESSION['userid']; // aam no karavu hoy to form ma hidden input field banavi ne pan use kari sakau and aeni value ne $_SESSION['userid'] na barar kari devi
            // insert comm$comment into table

            // Replace a < to &lt; and > to &gd; bcz error ave jo '(' ke ')' lakhiyu hoy to error ape DATA base ma (jo koi aavu lakhe 	<script>alert\("HEloo"\)</script> to aa script tarike excecute thashe atle aeva attct ne stop karava mate aapade brakets ne replace kariya)
            $comment = str_replace("<","&lt;",$comment);
            $comment = str_replace(">","&gt;",$comment);
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('$comment', '$id', '$userid')"; // aa id url ma pass karelu che
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die('Error is Occured: ' . mysqli_error($conn));
            }
            $isSucess = true;
            if ($isSucess) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your comment has been added! Thankyou for supporting a community
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                    </div>';
            }
        }
    }
    ?>
    <div class="container my-4 ">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo "$ThreadTitle"; ?></h1>
            <p class="lead"><?php echo "$ThreadDesc"; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.Do not spam several topics with the
                same message. Include a signature tag on all messages. Only send a message to the entire forum when it
                contains information that can benefit everyone. Send messages such as “thanks for the information” or
                “me, too” to individuals – not to the entire forum.</p>
            <p>Posted By: <span style="font-weight: 500"><?php echo "$username"; ?></span></p>
        </div>
    </div>

    <?php
    // If user logged in than only show a post comm$comment form
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
        echo '<div class="container">
                <h1 class="my-2">Post a Comment</h1>
                <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="comment">Type your Comment</label>
                            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>';
    } else {
        echo '<div class="container">
                <h1 class="my-2">Post a Comment</h1>
                <p class="lead">You are not logged in Please logged in to take part in disscussion</p>
            </div>';
    }
    ?>

    <div class="container m-5">
        <h1 class="my-2">Start a Discussion</h1>
        <!-- Show a Comment come on that thread -->
        <?php
        $Tid = $_GET['threadId'];
        $sql = "SELECT * FROM `comments` WHERE `thread_id`= $Tid";
        $result = mysqli_query($conn, $sql);
        $noData = true;
        if (!$result) {
            die('Error is: ' . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) { // ek var j chalaashe aa loop
            $commentId = $row['comment_id'];
            $commentContent = $row['comment_content'];
            $userid = $row['comment_by'];
            $commentTime = $row['Added time'];

            $formmetedTime = strtotime($commentTime);
            $Time = date('j F, Y g:i a', $formmetedTime);
            $noData = false;

            
            // Take username from userid
            $userNameSql = "SELECT `user_name` FROM `users` WHERE `user_id`=$userid";
            $userResult = mysqli_query($conn ,$userNameSql);
            if(!$userResult){
                die('Fail to run query: ' . mysqli_error($conn));
            }
            $userRow = mysqli_fetch_assoc($userResult);
            $username = $userRow['user_name'];

            echo '<div class="media my-3">
                    <img src="./Images/user.jpg" class="mr-3" alt="user Image" style="width: 64px; height: 64px;">
                    <div class="media-body">
                    <p class="my-0" style="font-size: 14px; font-weight: 600;">'. $username .' <span class = "font-weight-normal">at ' . $Time . '</span></p>
                        ' . $commentContent . '
                    </div>
                </div>';
        }
        if ($noData) {
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <p class="display-4">No Comments Found</p>
                    <p class="lead">Be the first person for comment</p> 
                    </div>
                </div>';
        }
        ?>
    </div>

    <?php require './partials/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>