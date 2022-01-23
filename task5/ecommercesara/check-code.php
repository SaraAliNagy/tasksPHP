<?php
$title = "Check Code";
include_once "layouts/header.php";
include_once "app/models/User.php";

if($_POST){

    
//validation code
$errors = [];
if (empty($_POST['checkcode'])) {
    $errors['errorRequired'] = "<div class ='alert alert-danger'>Code Required</div>";
} elseif (strlen($_POST['checkcode']) != 5) {
        $errors['errorDigits'] = "<div class ='alert alert-danger'>Code Must Be 5 DIGITS</div>";
    }
}


if(empty($errors)){
$user = new User();
$user->setCode($_POST['checkcode']);
$user->setEmail($_SESSION['email']);
$resultCheck= $user->checkCode();
if($resultCheck){


}else{
    $errors['wrongCode'] = "<div class ='alert alert-danger'>Wrong Code</div>";
}

}

?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Check Code </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="number" name="checkcode" min="10000" max="99999" placeholder="Enter Verification Code">
                                        <?php
                                        if (!empty($errors)) {
                                            foreach ($errors as $key => $error) {
                                                echo $error;
                                            }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Check Code</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "layouts/scripts.php";
?>