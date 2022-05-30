<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
        .carousel-item img{
            height: 400px;
            object-position: bottom;
            object-fit: cover;
        }
        .card .card-img-top{
            height: 175px;
            object-position: center;
            object-fit: cover;
        }
    </style>
    <title>iDiscuss - Coding Forums</title>


</head>

<body>
    <?php require './partials/_dbconnect.php' ?>
    <?php require './partials/_header.php' ?>

    <!-- Slider start from here -->
    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            
                <img src="./Images/Slider-1.jpg" class="d-block w-100" alt="Coding images" >
            </div>
            <div class="carousel-item">
                <img src="./Images/Slider-2.jpg" class="d-block w-100" alt="Coding images" >
            </div>
            <div class="carousel-item">
                <img src="./Images/Slider-3.jpg" class="d-block w-100" alt="Coding images" >
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Categories Container -->
    <div class="container">
        <h2 class="text-center my-3">Welcome to iDiscuss - Categories</h2>
        <div class="row">
            
            <!--  Fetch all Categories from  Data Base  and suer loop to itrrate  -->
                <?php 
                    $sql = "SELECT * FROM `categories`" ;
                    $result = mysqli_query($conn ,$sql);
                    $num=1;
                    while($row = mysqli_fetch_assoc($result)){
                        // echo $row['category_id'];
                        
                        $category =  $row['category_name'];
                        $categoryDesc = $row['category_description'];
                        $id = $row['category_id'];

                        echo "
                        <div class='col-md-4'>
                            <div class='card my-4 mx-1' style='width: 18rem;'>
                                <img src='./Images/card-".$num.".jpeg' class='card-img-top' alt='Redom images'>
                                <div class='card-body '>
                                    <h5 class='card-title'><a href = './thread list.php?category=".$id."'>$category</a></h5>
                                    <p class='card-text'>". substr($categoryDesc,0,100) ." ...</p>
                                    <a href='./thread list.php?category=".$id."' class='btn btn-primary'>View Threads</a>
                                </div>
                            </div>
                        </div>";
                            $num++;
                            // <img src='https://source.unsplash.com/500x400/?". $category .",coding' class='card-img-top' alt='Redom images'> aa rite pan image add kari sakay
                        }
                ?>
            
        </div>
    </div>

    <?php require './partials/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>