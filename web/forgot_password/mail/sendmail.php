<?php
// https://a1websitepro.com/data-encryption-php-mysql-methods-implementation-open-ssl-encrypt/
// Mã hoá Mat khau
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
function encryptthis($data, $key)
{
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptthis($data, $key)
{
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

include_once "PHPMailer/src/PHPMailer.php";
include_once "PHPMailer/src/Exception.php";
include_once "PHPMailer/src/OAuth.php";
include_once "PHPMailer/src/POP3.php";
include_once "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $connect = mysqli_connect("localhost", "root", "", "fptphp1");
    $email = $_POST['user_email'];
    $sql_user_email = "SELECT * FROM user WHERE user_email = '$email'";
    $query_user_email = mysqli_query($connect, $sql_user_email);

    // Mảng chứa lỗi
    $errors = [];
    $row_user = mysqli_fetch_assoc($query_user_email);
    if (!empty($row_user)) {
        if (isset($_POST['get_password'])) {
            // header('location: index.php?page_layout=testttt');

            try {
                //Server settings
                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'haubhpk02763@fpt.edu.vn';                 // SMTP username
                $mail->Password = 'wsemifyslzjuntsu';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('haubhpk02763@fpt.edu.vn', 'RESET PASSWORD');
                $mail->addAddress($email);     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('haubhpk02763@fpt.edu.vn');
                // $mail->addBCC('bcc@example.com');

                // //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'RESET PASSWORD';
                $mail->Body    = 'YOUR PASSWORD IS: ' . decryptthis($row_user['user_password'], $key);
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                header('location: index.php?page_layout=message');
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    } else {
        $errors['user_email'] = 'Email is incorrect';
    }





}

