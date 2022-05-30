<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
    .adjust-footer {
        min-height: 78.1vh;
        /* border: 5px solid red; */
    }
    </style>

    <title>Search - iDiscuss</title>
</head>

<body>
    <?php require './partials/_dbconnect.php' ?>
    <?php require './partials/_header.php' ?>
    <div class="container my-3 adjust-footer">
        <h1 class="mb-3">Search results for <em>"<?php echo $_GET['query'] ?>"</em></h1>
        <div class="searchResult">
            <?php
        $query = $_GET['query'];
        $sql = "SELECT * FROM `threads` WHERE MATCH (thread_title,thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        $noData = true;
        if (!$result) {
            die('Error is: ' . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) { // ek var j chalaashe aa loop
                $threadTitle = $row['thread_title'];
                $threadDesc = $row['thread_desc'];
                $threadId = $row['thread_id'];
                $userid = $row['thread_user_id'];
            
                // Take username from userid
                $userNameSql = "SELECT `user_name` FROM `users` WHERE `user_id`=$userid";
                $userResult = mysqli_query($conn ,$userNameSql);
                if(!$userResult){
                    die('Fail to run query: ' . mysqli_error($conn));
                }
                $userRow = mysqli_fetch_assoc($userResult);
                $username = $userRow['user_name'];
                $commentTime = $row['Added time'];
                $formmetedTime = strtotime($commentTime);
                $Time = date('j F, Y g:i a',$formmetedTime);
                $noData = false;
                echo '<div class="media my-3">
                        <img src="./Images/user.jpg" class="mr-3" alt="user Image" style="width: 64px; height: 64px;">
                        <div class="media-body">
                        <p class="font-weight-bold my-0">' . $username . ' <span class = "font-weight-normal">at '. $Time . '</span></p>
                          <h5 class="mt-0"> <a href = "./thread.php?threadId='. $threadId .'" class="text-dark">' . $threadTitle . ' </a></h5>
                            ' . $threadDesc . '
                        </div>
                    </div>';
        }
        if ($noData) {
            echo '<div class="jumbotron jumbotron-fluid p-5">
                    <div class="container">
                    <p class="display-4">No Result Found</p>
                    Suggestions:
                    <p class="lead">
                        <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                            <li>Try fewer keywords.</li>
                        </ul>
                    </p> 
                    </div>
                </div>';
        }
        ?>
        </div>
    </div>

    
    <?php require './partials/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>