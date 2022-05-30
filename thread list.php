<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Threads | </title>
</head>

<body>
    <?php require './partials/_dbconnect.php' ?>
    <?php require './partials/_header.php' ?>

    <?php
    $id = $_GET['category'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) { // only ek time j run thashe karan ke category id ae primary key che atle
        $categoryName = $row['category_name']; // This is user for diaplay categoty name and disc in jumbotron
        $categotyDesc = $row['category_description'];
    }
    ?>

    <!-- Add user's Question to data base -->
    <?php
    $method  = $_SERVER['REQUEST_METHOD'];
    $isSucess = false;

    // echo  var_dump(isset($_SESSION['loggedin']));
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true    ){ // Jo koi direct aa file na url per aeni php script mathi post request mare to data add no thay atle aa if statement mukiyu che
        if($method == 'POST'){
            $th_title = $_POST['problemTitle'];
            $th_desc = $_POST['problemDescription'];
            $userid = $_SESSION['userid'];
            
            // Replace a < to &lt; and > to &gd; bcz error ave jo '(' ke ')' lakhiyu hoy to error ape DATA base ma (jo koi aavu lakhe 	<script>alert\("HEloo"\)</script> to aa script tarike excecute thashe atle aeva attct ne stop karava mate aapade brakets ne replace kariya)
            $th_title = str_replace("<","&lt;",$th_title);
            $th_title = str_replace(">","&gt;",$th_title);

            $th_desc = str_replace("<","&lt;",$th_desc);
            $th_desc = str_replace(">","&gt;",$th_desc);

            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`) VALUES ( '$th_title', '$th_desc', '$userid', '$id')";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                die('Error Found: '.mysqli_error($conn));
            }
            $isSucess = true;
            if($isSucess){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your thread has been added! Please wait for community to response
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        }
    }
    else{
        echo '<p class = "container">You are not logged in please loged in for posting a Quesion</p>' ;
    }

    ?>
    <div class="container my-4 ">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo "$categoryName"; ?> Forum</h1>
            <p class="lead"><?php echo "$categotyDesc"; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.Do not spam several topics with the
                same message. Include a signature tag on all messages. Only send a message to the entire forum when it
                contains information that can benefit everyone. Send messages such as “thanks for the information” or
                “me, too” to individuals – not to the entire forum.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <!-- <form action="/php/Forum Project/thread list.php?category=<?php echo $id ?>" method="POST"> -->
    <!-- $_SERVER['PHP_SELF'] Same page per post request maravi hoy to pan e main URL j ape '?' Question mark pachi nu no ape -->
    <!-- Jayare $_SERVER['REQUEST_URI'] ae aakhi url ape '?' pachi nu pan -->
    <?php // If user loged in than only see a ask Question from
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
            echo '<div class="container">
                    <h1 class="my-2">Ask a Questions</h1>
                    <form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">
                        <div class="form-group">
                            <label for="ProblemTitle">Problem Title</label>
                            <input type="text" class="form-control" id="problemTitle" aria-describedby="emailHelp"
                                name="problemTitle">
                            <small id="emailHelp" class="form-text text-muted">Keep Your title as short and crisp as
                                possible</small>
                            <div class="form-group">
                                <label for="description">Ellabrate Your Concern</label>
                                <textarea class="form-control" id="description" rows="3" name="problemDescription"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>';
        }
        else{
            echo '<div class="container">
                    <h1 class="my-2">Ask a Questions</h1>
                    <p class="lead container">You are not logged in Please logged in to take part in disscussion</p>
                </div>';
        }
    ?>

    
    <div class="container m-5">
        <!-- <h1 class="my-2">Start a Discussion</h1> -->
        <h1 class="my-2">Browse Questions</h1>
        <?php
        $id = $_GET['category'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id";
        $result = mysqli_query($conn, $sql);
        $noData = true;
        if (!$result) {
            die('Error is: ' . mysqli_error($conn));
        }
        while ($row = mysqli_fetch_assoc($result)) {
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
            echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                    <p class="display-4">No Threads Found</p>
                    <p class="lead">Be the first person to ask the Question in ' . $categoryName . ' categoty</p>
                    </div>
                </div>';
        }
        ?>


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