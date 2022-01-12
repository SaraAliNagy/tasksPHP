<?php
$title = "Hospital";
include "layouts/header.php";

if($_POST){
    $_SESSION['phoneNumber'] = $_POST['phoneNumber']; 
    header('location:review.php');die;
}
?>

<div class="contianter mt-5">
    <div class="row">
        <div class="col-12 offset-2 ">
            <h1 class="text-dark h1">Hospital</h1>
        </div>
        <div class="offset-2 col-6">
            <form method="post">
                <div class="input-group flex-nowrap mt-2">
                    <span class="input-group-text" id="addon-wrapping">Phone Number</span>
                    <input type="number" class="form-control" name="phoneNumber" aria-label="phoneNumber" aria-describedby="addon-wrapping">
                </div>
                <div class="form-group mt-2 ">
                <button  class="btn btn-primary rounded form-control"> Survey </button>
                            </div>
            </form>
        </div>
    </div>
</div>

<?php
include "layouts/footer.php";
?>