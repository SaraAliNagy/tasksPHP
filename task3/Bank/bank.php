<?php
if ($_POST) {
    // print_r($_POST) ; die ;

    define('lowVat', 0.1);
    define('highVat', 0.15);
    $loanAmount = $_POST['loanamount'];
    $loanYear = $_POST['loanyears'];

    function vat($loanAmount, $loanYear)
    {
        if ($loanYear <= 3) {
            $vatperyear = $loanAmount * lowVat;
        } else {
            $vatperyear = $loanAmount * highVat;
        }
            $interestRate = $vatperyear * $loanYear;
            $loanAfterInterest = $loanAmount + $interestRate;
            $monthly =round( $loanAfterInterest /($loanYear*12),2) ;

        return array($interestRate, $loanAfterInterest, $monthly);
    }

    $arrayResult = vat($loanAmount, $loanYear);
    $interestRate = $arrayResult[0];
    $loanAfterInterest = $arrayResult[1];
    $monthly = $arrayResult[2];

    $result = "<div class='alert alert-danger'>
<ul>
    <li>
    Interest Rate: $interestRate
    </li> 
    <li>
    Loan After Interest : $loanAfterInterest
    </li> 
    <li>
    Monthly : $monthly
    </li> 
  
</ul> 
</div>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>BANK</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="contianter mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-danger h1">Bank</h1>
            </div>
            <div class="offset-4 col-4">
                <form method="post">
                    <div class="form-group">
                        <label for="username" class="text-danger">User Name</label>
                        <input type="username" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="loanamount" class="text-danger">Loan Amount</label>
                        <input type="loanamount" name="loanamount" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="loanyears" class="text-danger">Loan Years</label>
                        <input type="loanyears" name="loanyears" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger rounded"> Calculate </button>
                    </div>
                </form>
                <?php if (isset($result)) {
                    echo $result;
                } ?>
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