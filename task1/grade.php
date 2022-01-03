<?php

if ($_POST) {
    $physicsMark = $_POST['Physics'];
    $chemistryMark = $_POST['Chemistry'];
    $biologyMark = $_POST['Biology'];
    $mathematicsMark = $_POST['Mathematics'];
    $computerMark = $_POST['Computer'];

    $sumSubjectMark = $physicsMark + $chemistryMark + $biologyMark + $mathematicsMark + $computerMark ; 
    $calculatePrecentage = ($sumSubjectMark / 250) * 100 ; 

    if($calculatePrecentage >= 90){
        $grade = 'A' ;
    }
    elseif($calculatePrecentage >= 80 && $calculatePrecentage < 90){
        $grade = 'B' ;
    }
    elseif($calculatePrecentage >= 70 && $calculatePrecentage < 80){
        $grade = 'C' ;
    }
    elseif($calculatePrecentage >= 60 && $calculatePrecentage < 70){
        $grade = 'D' ;
    }
    elseif($calculatePrecentage >= 40 && $calculatePrecentage < 60){
        $grade = 'E' ;
    }
    else{
        $grade = 'F' ;
    }



    $message = "<div class='alert alert-success'>
    <ul>
        <li>
            Precentage Is : $calculatePrecentage   <b>%</b> 
        </li> 
        <li>
            Grade Is : $grade   
        </li> 
    
    </ul>
    </div>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Grade</title>
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
                <h1 class="text-primary text-center h1"> Grade </h1>
            </div>
            <div class="offset-4 col-5">
                <form method="post">
                    <div class="form-group">
                        <label for="Physics">Physics</label>
                        <input type="number" name="Physics" id="Physics" class="form-control" placeholder="Enter Physics Mark">
                    </div>
                    <div class="form-group">
                        <label for="Chemistry">Chemistry</label>
                        <input type="number" name="Chemistry" id="Chemistry" class="form-control" placeholder="Enter Chemistry Mark">
                    </div>
                    <div class="form-group">
                        <label for="Biology">Biology</label>
                        <input type="number" name="Biology" id="Biology" class="form-control" placeholder="Enter Biology Mark">
                    </div>
                    <div class="form-group">
                        <label for="Mathematics">Mathematics </label>
                        <input type="number" name="Mathematics" id="Mathematics" class="form-control" placeholder="Enter Mathematics  Mark">
                    </div>
                    <div class="form-group">
                        <label for="Computer">Computer</label>
                        <input type="number" name="Computer" id="Computer" class="form-control" placeholder="Enter Computer Mark">
                    </div>
                    <div class="form-group">
                        <button name="grade" class="btn btn-primary rounded">Get Percentage & Grade!</button>
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