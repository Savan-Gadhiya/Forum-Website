<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>iDiscuss | Contact</title>
    <style>
        .container {
            min-height: 79.1vh;/* For footer setting */
            max-width: 600px;
        }
    </style>
</head>

<body>
    <?php require './partials/_dbconnect.php'; ?>
    <?php require './partials/_header.php' ?>
    <div class="container">
        <h1 class="text-center mt-4">Contact us</h1>
        <form>
            <input type="hidden" name="userid" value="<?php echo $_SESSION['userid'] ?>">
            <div class="form-group">
                <label for="fullname">Your Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname" require>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['useremail'] ?>" require>
            </div>
            <div class="form-group">
                <label for="email">Phone number</label>
                <input type="number" class="form-control" id="phone" name="phone" require>
            </div>
            <div class="form-group">
                <label for="massage">Your Massage</label>
                <textarea class="form-control" id="massage" rows="3" name=massage require></textarea>
            </div>
            <button class="btn btn-primary mb-4">Submit</button>
        </form>
    </div>


    <?php require './partials/_footer.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>