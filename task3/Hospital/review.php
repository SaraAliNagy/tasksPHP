<?php
$title = "Review";
include "layouts/header.php";

// print_r($_SESSION['phoneNumber']);die;

if(empty($_SESSION['phoneNumber'])){
    echo "Error Required Number";die;
}

?>



<div class="contianter mt-5">
    <div class="row">

        <div class="col-12 offset-2 ">
            <h1 class="text-primary h1">Hospital Review</h1>
        </div>
        <div class="offset-2 col-8">
            <form action="result.php" method="post">
                <table class="table">
                    <thead class="col-6">

                        <tr>
                            <th scope="col">Questions</th>
                            <th scope="col" value="0">Bad</th>
                            <th scope="col" value="3">Good</th>
                            <th scope="col" value="5">Very Good</th>
                            <th scope="col" value="10">Excellent</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <th scope="row" name="q1">Are you satisfied with the level of cleanliness?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="0">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q1" value="10">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" name="q2">Are you satisfied with the service prices?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="0">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q2" value="10">
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row" name="q3">Are you satisfied with the nursing services?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" value="0">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q3" value="10">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" name="q4">Are you satisfied with the level of the doctor?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" value="0">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q4" value="10">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row" name="q5">Are you satisfied with the calmness in the hospital?</th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" value="0">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" value="3">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" value="5">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="q5" value="10">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                <button  class="btn btn-primary rounded form-control"> Result </button>
                            </div>
            </form>
        </div>
    </div>
</div>



<?php
include "layouts/footer.php";
?>