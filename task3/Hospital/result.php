<?php
$title = "Result";
include "layouts/header.php";


// print_r($_SESSION['phoneNumber']);die;
// print_r($_POST['q1']);die;
// print_r($_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4'] + $_POST['q5']) ; die ;


define('lowReview', 25);

if ($_POST['q1'] + $_POST['q2'] + $_POST['q3'] + $_POST['q4'] + $_POST['q5'] < lowReview) {
    $totalReview = 'Bad';
} else {
    $totalReview = 'Good';
}

?>


<div class="contianter mt-5">
    <div class="row">

        <div class="col-12 offset-2 ">
            <h1 class="text-primary h1">Hospital Review</h1>
        </div>
        <div class="offset-2 col-8">
            <table class="table">
                <thead class="col-6 table-primary">

                    <tr>
                        <th scope="col">Questions</th>
                        <th scope="col">Review</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">Are you satisfied with the level of cleanliness?</th>
                        <td >
                            <div>
                                <?php
                                switch ($_POST['q1']) {
                                    case 0:
                                        echo 'Bad';
                                        break;
                                    case 3:
                                        echo 'Good';
                                        break;
                                    case 5:
                                        echo 'Very Good';
                                        break;
                                    case 10:
                                        echo  'Excellent';
                                        break;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Are you satisfied with the service prices?</th>
                        <td>
                            <div>
                            <?php
                                switch ($_POST['q2']) {
                                    case 0:
                                        echo 'Bad';
                                        break;
                                    case 3:
                                        echo 'Good';
                                        break;
                                    case 5:
                                        echo 'Very Good';
                                        break;
                                    case 10:
                                        echo  'Excellent';
                                        break;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Are you satisfied with the nursing services?</th>
                        <td>
                            <div>
                            <?php
                                switch ($_POST['q3']) {
                                    case 0:
                                        echo 'Bad';
                                        break;
                                    case 3:
                                        echo 'Good';
                                        break;
                                    case 5:
                                        echo 'Very Good';
                                        break;
                                    case 10:
                                        echo  'Excellent';
                                        break;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Are you satisfied with the level of the doctor?</th>
                        <td>
                            <div>
                            <?php
                                switch ($_POST['q4']) {
                                    case 0:
                                        echo 'Bad';
                                        break;
                                    case 3:
                                        echo 'Good';
                                        break;
                                    case 5:
                                        echo 'Very Good';
                                        break;
                                    case 10:
                                        echo  'Excellent';
                                        break;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Are you satisfied with the calmness in the hospital?</th>
                        <td>
                            <div>
                            <?php
                                switch ($_POST['q5']) {
                                    case 0:
                                        echo 'Bad';
                                        break;
                                    case 3:
                                        echo 'Good';
                                        break;
                                    case 5:
                                        echo 'Very Good';
                                        break;
                                    case 10:
                                        echo  'Excellent';
                                        break;
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="col-6 table-primary">

                    <tr>
                        <th scope="col">Total Review</th>
                        <th scope="col">
                            <?php
                                if(isset($totalReview)== 'Bad'){
                                    echo $totalReview ;
                                }
                                elseif(isset($totalReview)== 'Good'){
                                    echo $totalReview ;
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2" scope="row" class="text-center alert alert-secondary" >
                            
                            <?php

                                if(isset($totalReview)){
                                    if($totalReview == 'Bad'){
                                        echo "We will call you soon to find out the reason for the bad evaluation  +" .$_SESSION['phoneNumber'] ;
                                    }else{
                                    echo "Thank You "  ;
                                    }
                                }
                                
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<?php
include "layouts/footer.php";
?>