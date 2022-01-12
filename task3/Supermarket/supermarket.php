<?php

if (isset($_POST['enterNumProduct'])) {

    $table = "<table class='table col-12 text-danger'>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantities</th>
        </tr>
    </thead> ";
    $table .= "<tbody>";
    for ($count = 1; $count <= $_POST['numofproduct']; $count++) {
        $table .= "<tr>";
        $table .= "<td>
                        <div class='input-group flex-nowrap mt-2'>
                        <input type='text' class='form-control' name='productname$count' aria-label='productname' aria-describedby='addon-wrapping'>
                        </div>
                    </td>
                    <td>
                        <div class='input-group flex-nowrap mt-2'>
                        <input type='number' class='form-control' name='price$count' aria-label='price' aria-describedby='addon-wrapping'>
                        </div>
                    </td>
                    <td>
                        <div class='input-group flex-nowrap mt-2'>
                        <input type='number' class='form-control' name='quantity$count' aria-label='quantity' aria-describedby='addon-wrapping'>
                        </div>
                    </td>";
        $table .= "</tr>";
    }

    $table .= "</tbody>
                </table>";

    $table .=
        "<div class='form-group'>
                <button name='reciept' class='btn btn-danger rounded form-control'>Reciept</button>
                </div>";
}

if (isset($_POST['reciept'])) {

    // print_r($_POST) ; die ;
    $tableResult = "<table class='table col-12 table-bordered border-danger'>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantities</th>
            <th>Sub Total</th>
        </tr>
    </thead> ";
    $tableResult .= "<tbody>";
    $totalProduds = 0;
    for ($c = 1; $c <= $_POST['numofproduct']; $c++) {
        $totalPriceOfProduct = $_POST['price' . $c] * $_POST['quantity' . $c];
        $totalProduds += $totalPriceOfProduct;
        $tableResult .= "<tr>";
        $tableResult .= "<th>
                        <div class='input-group flex-nowrap mt-2'>{$_POST['productname' .$c]} </div>
                    </th>
                    <th>
                        <div class='input-group flex-nowrap mt-2'> {$_POST['price' .$c]}</div>
                    </th>
                    <th>
                        <div class='input-group flex-nowrap mt-2'> {$_POST['quantity' .$c]}</div>
                    </th>
                    <th>
                        <div class='input-group flex-nowrap mt-2'>$totalPriceOfProduct</div>
                    </th>";
        $tableResult .= "</tr>";
    }
    switch ($_POST['city']) {
        case 'Cairo':
            $delivery = 0;
            break;
        case 'Giza':
            $delivery = 30;
            break;
        case 'Alex':
            $delivery = 50;
            break;
        default:
            $delivery = 100;
    }
    if ($totalProduds >= 4500) {
        $discountVal = 0.2;
        $discount = $discountVal * $totalProduds;
        $totalAfterDIS = $totalProduds - $discount;
    } elseif ($totalProduds >= 3000 &&  $totalProduds < 4500) {
        $discountVal = 0.15;
        $discount = $discountVal * $totalProduds;
        $totalAfterDIS = $totalProduds - $discount;
    } elseif ($totalProduds >= 1000 &&  $totalProduds < 3000) {
        $discountVal = 0.1;
        $discount = $discountVal * $totalProduds;
        $totalAfterDIS = $totalProduds - $discount;
    } else {
        $discountVal = 0;
        $discount = $discountVal * $totalProduds;
        $totalAfterDIS = $totalProduds - $discount;
    }


    $finalPrice = $totalAfterDIS + $delivery;


    $tableResult .= "
                    <tr>
                        <th colspan=2>
                            Client Name
                        </th>
                        <td colspan=2>
                            {$_POST['username']}
                        </td>
                    </tr>
                    <tr>
                        <th colspan=2>
                            City
                        </th>
                        <td colspan=2>
                            {$_POST['city']}
                        </td>
                    </tr>
                    <tr>
                        <th colspan=2>
                            Total
                        </th>
                        <td colspan=2>
                            {$totalProduds}
                        </td>
                    </tr>
                    <tr>
                        <th colspan=2>
                            Discount
                        </th>
                        <td colspan=2>
                            {$discount}
                        </td>
                    </tr>
                    <tr>
                    <th colspan=2>
                        Total After DIS.
                    </th>
                    <td colspan=2>
                        {$totalAfterDIS}
                    </td>
                </tr>
                <tr>
                    <th colspan=2>
                        Delivary
                    </th>
                    <td colspan=2>
                        {$delivery}
                    </td>
                </tr>
                <tr>
                    <th colspan=2 class='text-danger'>
                        Net Total
                    </th>
                    <td colspan=2>
                        {$finalPrice}
                    </td>
                </tr>  
    
    ";
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Super Market</title>
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
                <h1 class="text-danger text-center h1"> Products </h1>
            </div>
            <div class="offset-4 col-6">
                <form method="post">
                    <div class="form-group">
                        <label for="username">Your Name</label>
                        <input type="text" name="username" id="username" value="<?php if (!empty($_POST['username'])) {
                                                                                    echo $_POST['username'];
                                                                                } ?>" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" class="form-control" id="city">
                            <option value="Cairo" <?php if (!empty($_POST['city']) && $_POST['city'] == 'Cairo') {
                                                        echo 'selected';
                                                    } ?>>Cairo</option>
                            <option value="Giza" <?php if (!empty($_POST['city']) && $_POST['city'] == 'Giza') {
                                                        echo 'selected';
                                                    } ?>>Giza</option>
                            <option value="Alex" <?php if (!empty($_POST['city']) && $_POST['city'] == 'Alex') {
                                                        echo 'selected';
                                                    } ?>>Alex</option>
                            <option value="Others" <?php if (!empty($_POST['city']) && $_POST['city'] == 'Others') {
                                                        echo 'selected';
                                                    } ?>>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numofproduct">Num Of Product</label>
                        <input type="text" name="numofproduct" id="numofproduct" value="<?php if (!empty($_POST['numofproduct'])) {
                                                                                            echo $_POST['numofproduct'];
                                                                                        } ?>" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button name="enterNumProduct" class="btn btn-danger rounded form-control">Enter Number Of Product</button>
                    </div>

                    <?php
                    if (isset($table))

                        echo $table;
                    if (isset($tableResult))

                        echo $tableResult;
                    ?>


                </form>
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