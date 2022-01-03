<?php

if ($_POST) {
    if ($_POST['numOne'] > $_POST['numTwo']) {
        $Max =  $_POST['numOne'];
        $Min =  $_POST['numTwo'];

    } else {
        $Max =  $_POST['numTwo'];
        $Min =  $_POST['numOne'];
    }
    if($_POST['numThree'] > $Max){
        $Max =  $_POST['numThree'];
    }
    if($_POST['numThree'] < $Min){
        $Min =  $_POST['numThree'];
    }

    $message = "<div class='alert alert-success'>
    <ul>
    <li>
        Max Number: $Max 
    </li> 
    <li>
        Min Number: $Min 
    </li> 
</ul> 
    </div>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>MAX Number</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-primary text-center h1"> Max & Min Number </h1>
            </div>
            <div class="offset-4 col-5">
                <form method="post">
                    <div class="form-group">
                        <label for="numOne">Number One</label>
                        <input type="number" name="numOne" id="numOne" class="form-control" placeholder="Enter Number One">
                    </div>
                    <div class="form-group">
                        <label for="numTwo">Number Two</label>
                        <input type="number" name="numTwo" id="numTwo" class="form-control" placeholder="Enter Number Two">
                    </div>
                    <div class="form-group">
                        <label for="numThree">Number Three</label>
                        <input type="number" name="numThree" id="numThree" class="form-control" placeholder="Enter Number Three">
                    </div>
                    <div class="form-group">
                        <button name="max" class="btn btn-primary rounded">Get Max & Min Number!</button>
                    </div>
                </form>
                <?php if (isset($message)) {
                    echo $message;
                } ?>
            </div>


        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>