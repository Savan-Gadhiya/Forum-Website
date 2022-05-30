<?php
session_start();
 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/php/Forum Project">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./about.php">About</a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      $sql = "SELECT category_name,category_id FROM `categories` LIMIT 5"; // Only first 5 chategory j joti hoy to
      // $sql = "SELECT category_name,category_id FROM `categories`";
    $result  = mysqli_query($conn,$sql); // ahi badhi main file ma header ni uper dbconnect include kareli che atle chale
    if(!$result){
      die("Error " . mysqli_error($conn));
    }
    while($row = mysqli_fetch_assoc($result)){
      echo '<a class="dropdown-item" href="thread list.php?category='.$row['category_id'].'">' . $row['category_name'] . '</a>';
    }
      echo '</div>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php" >Contact</a>
        </li>
      </ul>
      <div class="row mx-2">
      <form class="form-inline my-2 my-lg-0" action="/php/Forum Project/search.php" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
    echo '
          <button class="btn btn-outline-success ml-2">'.$_SESSION['username'].'</button>
          <a href="partials/_logout.php" class="btn btn-outline-success mx-2">Logout</a>';
        }
  else{
    echo '
          <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
          <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>';

  }
  echo '
    </div>
  </div>
</nav>';

include './partials/_loginModal.php';
include './partials/_signupModal.php';
// Showes a different success and error massage for login and signup
if(isset($_GET['signupsuccess']) and $_GET['signupsuccess'] == 'true'){
  // echo "First metced";
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> Your Account has been created successfully click on login button to login your account
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'false'){
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  <strong>Error!</strong> ' . $_GET["error"] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
if(isset($_GET['loginSuccess']) and $_GET['loginSuccess'] == 'true'){
  // echo "First metced";
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> You are Successfully logged in as '. $_SESSION['username'] .'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
}
if(isset($_GET['loginSuccess']) && $_GET['loginSuccess'] == 'false'){
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  <strong>Error!</strong> ' . $_GET["error"] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
// Aa header mathi information lai levani and header ne index.php per redirect kari devanu pan aema error ave che Error is: Cannot modify header information - headers already sent by (output started at D:\Savan Program\Savan Program file\Xampp\htdocs\PHP\Forum Project\partials\_loginModal.php:1) in D:\Savan Program\Savan Program file\Xampp\htdocs\PHP\Forum Project\partials\_header.php on line 50


// if(isset($_GET['signupsuccess'])){
//   $ShowAlert = true;
//   $isSucess = $_GET['signupsuccess'];
//   if(isset($_GET['error'])){
//     $error = $_GET['error'];
//   }
//   header("Loaction: /php/Forum Project/index.php");
// }
// if($ShowAlert){
//   if($isSucess){
//       echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
//             <strong>Success!</strong> Your Account has been created successfully click on login button to login your account
//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//               <span aria-hidden="true">&times;</span>
//             </button>
//           </div>';
//   }
//   else{
//     echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
//           <strong>Error!</strong> ' . $error . '
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">&times;</span>
//           </button>
//         </div>';
//   }
// }
?>

