<?php

if($_POST){
    $firstNum = $_POST['firstNum'] ;
    $secNum = $_POST['secNum'] ;
    switch ($_POST['operator']) {
        case '+':
            $result = $firstNum + $secNum  ;
            break;
        case '-':
            $result = $firstNum - $secNum  ;
            break;   
        case '*':
            $result = $firstNum * $secNum  ;
            break;
        case '/':
            if($secNum == 0 && $firstNum == 0){
                $result = "Undefined" ; 
            }
            elseif($secNum == 0 ){
                $result = "INF" ; 
            }
            else{
                $result = $firstNum / $secNum  ;
            }
            break; 
        case '%':
            $result = $firstNum % $secNum  ;    
            break;
        case '**':
            $result = $firstNum ** $secNum  ;
            break; 
        default:
            break;
            
    }
    $message = "<div class='alert alert-success'>
        <ul>
            <li>
                Result : $result 
            </li> 
            
        </ul> 
    </div>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
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
                <h1 class="text-primary text-center h1"> Calculator </h1>
            </div>
            <div class="offset-4 col-4">
                <form method="post">
                    <div class="form-group">
                        <label for="firstNum">First Number</label>
                        <input type="number" name="firstNum" id="firstNum" class="form-control" placeholder="Enter First Number " >
                    </div>
                    <div class="form-group">
                        <label for="operator">Operator</label>
                        <input type="text" name="operator" id="operator" class="form-control" placeholder="Enter Operator (+, -, *, /, %, **)" >
                    </div>
                    <div class="form-group">
                        <label for="secNum">Second Number</label>
                        <input type="number" name="secNum" id="secNum" class="form-control" placeholder="Enter Second Number " >
                    </div>
                    <div class="form-group">
                        <button name="sale" class="btn btn-primary rounded">Calculate!</button>
                    </div>
                </form>
                <?php if(isset($message)){ echo $message;} ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>