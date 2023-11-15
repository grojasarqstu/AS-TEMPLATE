<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  // Remember to include the Exception class

$status = '';
$msg = '';

if (array_key_exists('email', $_POST)) {
    require 'vendor/autoload.php';

    // Input sanitization
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $propertyType = filter_var($_POST['propertyType'], FILTER_SANITIZE_STRING);
    $constructionType = filter_var($_POST['constructionType'], FILTER_SANITIZE_STRING);
    $squareMeters = filter_var($_POST['squareMeters'], FILTER_SANITIZE_STRING);
    $acabados = filter_var($_POST['acabados'], FILTER_SANITIZE_STRING);
    $presupuesto = filter_var($_POST['presupuesto'], FILTER_SANITIZE_STRING);
    $message_area = filter_var($_POST['message_area'], FILTER_SANITIZE_STRING);

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = 'arquitectstudio@arquitectstudio.online';
    $mail->Password = 'Qov53685$';
    $mail->setFrom('arquitectstudio@arquitectstudio.online', $name);  //aqui llegan los correos
    $mail->addAddress('arquitectwebservices@arquitectstudio.com');

    if ($mail->addReplyTo($email, $name)) {
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = <<<EOT
        <table style="border: 1px solid black; border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Nombre</th>
                <td style="border: 1px solid black; padding: 8px;">$name</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Apellido</th>
                <td style="border: 1px solid black; padding: 8px;">$apellido</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Email</th>
                <td style="border: 1px solid black; padding: 8px;">$email</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Phone Number</th>
                <td style="border: 1px solid black; padding: 8px;">$phone</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Tipo de Propiedad</th>
                <td style="border: 1px solid black; padding: 8px;">$propertyType</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Tipo de Construccion</th>
                <td style="border: 1px solid black; padding: 8px;">$constructionType</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Cantidad de Metros Cuadros</th>
                <td style="border: 1px solid black; padding: 8px;">$squareMeters</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Tipo de Acabados</th>
                <td style="border: 1px solid black; padding: 8px;">$acabados</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Rango de Presupuesto</th>
                <td style="border: 1px solid black; padding: 8px;">$presupuesto</td>
            </tr>
            <tr>
                <th style="border: 1px solid black; padding: 8px; text-align: left;">Descripción del Proyecto</th>
                <td style="border: 1px solid black; padding: 8px;">$message_area</td>
            </tr>
        </table>
    EOT;

if ($mail->send()) {
            // Redirect immediately on success
            echo '<meta http-equiv="refresh" content="1;url=index.html">';
            exit();
        } else {
            // Set error status and message
            $status = 'error';
            $msg = 'There was a problem sending the email. Please try again later.';
        }
    } else {
        // Set error status and message for an invalid reply-to email
        $status = 'error';
        $msg = 'Invalid reply-to email.';
    }
}
?>