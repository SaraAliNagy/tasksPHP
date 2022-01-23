<?php



$title = "Register";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/requests/Validation.php";
include_once "app/models/User.php";
include_once "app/services/mail.php";
// include_once __DIR__ . "app/requests/Validation.php";

// if($_POST){
//     print_r($_POST);
// }; die ; 

if ($_POST) {

    $emailValidation = new Validation('email', $_POST['email']); // name , value
    $emailReqResult = $emailValidation->required();
    if (empty($emailReqResult)) {
        $emailRegExResult = $emailValidation->regEx('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
        if (empty($emailRegExResult)) {
            $emailUniquResult = $emailValidation->unique('users');
            // if(empty($emailUniquResult)){
            //     echo "hello email" ; //flag
            // }
        }
    }


    
    $phoneValidation = new Validation('phone', $_POST['number']); // name of column, value 
    $phoneReqResult = $phoneValidation->required();
    if (empty($phoneReqResult)) {
        $phoneRegExResult = $phoneValidation->regEx('/^01[0-2,5]{1}[0-9]{8}$/');
        if (empty($phoneRegExResult)) {
            $phoneUniqueResult = $phoneValidation->unique('users'); // error hena
            // if(empty($phoneUniqueResult)){
            //     echo "hello phone" ;
            // }
        }
    }


    $passwordValidation = new Validation('password', $_POST['password']); // name , value
    $passwordReqResult = $passwordValidation->required();
    if (empty($passwordReqResult)) {
        $passwordRegExResult = $passwordValidation->regEx('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/');
        if (empty($passwordRegExResult)) {
            $passwordConfResult = $passwordValidation->confirmation($_POST['password_confirm']);
            // if(empty($passwordConfResult)){
            //     echo "hello pass" ;
            // }
        }
    }

    if ((isset($emailUniquResult) && $emailUniquResult == '') &&
        (isset($phoneUniqueResult) && $phoneUniqueResult == '') &&
        (isset($passwordConfResult) && $passwordConfResult == '')
    ) {
        // echo "insert" ;die;

        $user = new User();
        $user->setFirst_name($_POST['fname']);
        $user->setLast_name($_POST['lname']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['number']);
        $user->setGender($_POST['gender']);
        $user->setPassword($_POST['password']);

        $codeRandom = rand(10000, 99999);
        $user->setCode($codeRandom);

        $result = $user->create();
        if ($result) {
            // echo "inserted" ;
            $subject = "Verification Code" ;
            $body = "Hello {$_POST['fname']} We Send {$codeRandom} For Verified Your Email" ; //{} => One Variable in string
            $mail = new mail($_POST['email'],$subject,$body);
            $resultMail= $mail->send();
            if ($resultMail) {
                $_SESSION['email'] = $_POST['email'] ; 
                header('location:check-code.php');  
            }
            else{
                $error = "<div class ='alert alert-danger'>TRY AGAIN</div>";
            }

        } else {
            $error = "<div class ='alert alert-danger'>TRY AGAIN</div>";
        }
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">

                                    <?php if (isset($error)) {
                                        echo $error;
                                    } ?>

                                    <form method="post">
                                        <input type="text" name="fname" placeholder="First Name" value="<?php if (isset($_POST['fname'])) {
                                                                                                            echo $_POST['fname'];
                                                                                                        } ?>">
                                        <input type="text" name="lname" placeholder="Last Name" value="<?php if (isset($_POST['lname'])) {
                                                                                                            echo $_POST['lname'];
                                                                                                        } ?>">

                                        <input name="email" placeholder="Email" type="email" value="<?php if (isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                    } ?>">
                                        <?= empty($emailReqResult) ? "" : "<div class ='alert alert-danger'>$emailReqResult</div>" ?>
                                        <?= empty($emailRegExResult) ? "" : "<div class ='alert alert-danger'>$emailRegExResult</div>" ?>
                                        <?= empty($emailUniquResult) ? "" : "<div class ='alert alert-danger'>$emailUniquResult</div>" ?>

                                        <input type="number" name="number" placeholder="Phone" value="<?php if (isset($_POST['number'])) {
                                                                                                            echo $_POST['number'];
                                                                                                        } ?>">
                                        <?= empty($phoneReqResult) ? "" : "<div class ='alert alert-danger'>$phoneReqResult</div>" ?>
                                        <?= empty($phoneRegExResult) ? "" : "<div class ='alert alert-danger'>$phoneRegExResult</div>" ?>
                                        <?= empty($phoneUniqueResult) ? "" : "<div class ='alert alert-danger'>$phoneUniqueResult</div>" ?>

                                        <input type="password" name="password" placeholder="Password">
                                        <?= empty($passwordReqResult) ? "" : "<div class ='alert alert-danger'>$passwordReqResult</div>" ?>
                                        <?= empty($passwordRegExResult) ? "" : "<div class ='alert alert-danger'>Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character</div>" ?>

                                        <input type="password" name="password_confirm" placeholder="Confirm Your Password">
                                        <?= empty($passwordConfResult) ? "" : "<div class ='alert alert-danger'>$passwordConfResult</div>" ?>
                                        <select name="gender" class="form-control">
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ? 'selected' : '' ?> value="m">Male</option>
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ? 'selected' : '' ?> value="f">Female</option>
                                        </select>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
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
include_once "layouts/footer.php";
include_once "layouts/scripts.php";

?>