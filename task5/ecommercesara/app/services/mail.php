<?php 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';

class mail{
    private $emailTo;
    private $subject;
    private $body;

    public function __construct($emailTo,$subject,$body)
    {
        $this->emailTo = $emailTo;
        $this->subject = $subject;
        $this->body = $body;
    }    
public function send() :bool
{
   //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'phpclassa22@gmail.com';                     //SMTP username
        $mail->Password   = 'php123456789';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients 
            $mail->setFrom('phpclassa22@gmail.com', 'Ecommerce');
            $mail->addAddress($this->emailTo);     //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body    = $this->body;
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
        
        }


    }
   
    ?>
