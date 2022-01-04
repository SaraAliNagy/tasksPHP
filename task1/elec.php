<?php

define('surcharge',0.2);
if ($_POST) {
    $units = $_POST['unitsNum'] ;
    if($units <= 50){
        $pricePerUnit = "0.50 / unit" ;
        $calcCharge = $units * 0.5  ;
    }
    elseif($units > 50 && $units <= 150){
        $pricePerUnit = "0.75 / unit" ;
        $calcCharge = $units * 0.75  ;
    }
    elseif($units > 150 && $units <= 250){
        $pricePerUnit = "1.20 / unit" ;
        $calcCharge = $units * 1.20  ;
    }
    else{
        $pricePerUnit = "1.50 / unit"; 
        $calcCharge = $units * 1.50  ;
    }

    $vat = $calcCharge * surcharge ; 
    $totalCharge = $vat + $calcCharge; 


    $message = "<div class='alert alert-success'>
    <ul>
        <li>
            Price Per Unit : $pricePerUnit  
        </li>     
        <li>
            Charge Before VAT : $calcCharge <b>EGP</b>
        </li> 
        <li>
            VAT Is : $vat <b>EGP</b>
        </li>
        <li>
            Total Charge Including VAT : $totalCharge <b>EGP</b>
        </li> 
    
    </ul> 
    </div>";
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Calculate Elect.</title>
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
                <h1 class="text-primary text-center h1">Calculate Elect. </h1>
            </div>
            <div class="offset-4 col-5">
                <form method="post">
                    <div class="form-group">
                        <label for="unitsNum">Electricity Units</label>
                        <input type="number" name="unitsNum" id="unitsNum" class="form-control" placeholder="Enter Electricity Units">
                    </div>
                    <div class="form-group">
                        <button name="elec" class="btn btn-primary rounded">Calculate Elect.!</button>
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