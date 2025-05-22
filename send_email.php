<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    $name = sanitize($_POST['name'] ?? '');
    $father_name = sanitize($_POST['father_name'] ?? '');
    $school = sanitize($_POST['school'] ?? '');
    $class = sanitize($_POST['class'] ?? '');
    $dob = sanitize($_POST['dob'] ?? '');
    $gender = sanitize($_POST['gender'] ?? '');
    $landline = sanitize($_POST['landline'] ?? '');
    $mobile = sanitize($_POST['mobile'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $address = sanitize($_POST['address'] ?? '');
    $po = sanitize($_POST['po'] ?? '');
    $injuries = sanitize($_POST['injuries'] ?? '');
    $treatment = sanitize($_POST['treatment'] ?? '');
    $jersey_size = sanitize($_POST['jersey_size'] ?? '');
    $covid = sanitize($_POST['covid'] ?? '');
    $covid_dates = sanitize($_POST['covid_dates'] ?? '');
    $fav_player = sanitize($_POST['fav_player'] ?? '');
    $fav_club = sanitize($_POST['fav_club'] ?? '');
    $fav_position = sanitize($_POST['fav_position'] ?? '');
    $player_reason = sanitize($_POST['player_reason'] ?? '');
    $guardian_name = sanitize($_POST['guardian_name'] ?? '');
    $relationship = sanitize($_POST['relationship'] ?? '');
    $profession = sanitize($_POST['profession'] ?? '');
    $emergency_no = sanitize($_POST['emergency_no'] ?? '');
    $guardian_mobile = sanitize($_POST['guardian_mobile'] ?? '');
    $guardian_email = filter_var(trim($_POST['guardian_email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $guardian_fav_player = sanitize($_POST['guardian_fav_player'] ?? '');
    $guardian_fav_club = sanitize($_POST['guardian_fav_club'] ?? '');
    $guardian_fav_pak_player = sanitize($_POST['guardian_fav_pak_player'] ?? '');
    $guardian_reason = sanitize($_POST['guardian_reason'] ?? '');
    $permission = sanitize($_POST['permission'] ?? '');
    $guardian_signature = sanitize($_POST['guardian_signature'] ?? '');
    $signature_date = sanitize($_POST['signature_date'] ?? '');
    $reg_no = sanitize($_POST['reg_no'] ?? '');
    $amount = sanitize($_POST['amount'] ?? '');
    $payment_date = sanitize($_POST['payment_date'] ?? '');
    $mode = sanitize($_POST['mode'] ?? '');
    $cheque_no = sanitize($_POST['cheque_no'] ?? '');
    $drawn_no = sanitize($_POST['drawn_no'] ?? '');
    $cheque_date = sanitize($_POST['cheque_date'] ?? '');

    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@rocketmonii.com'; // Your SMTP email
        $mail->Password = 'Rocketmonilc@1994';    // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('info@rocketmonii.com', 'KickOn Academy Website');
        $mail->addReplyTo($email, $name);
        $mail->addAddress('info@rocketmonii.com');

        $mail->isHTML(true);
        $mail->Subject = "New Academy Registration from $name";

        $mail->Body = "
            <h2>Kick On Football Academy Registration</h2>
            <h3>Player's General Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Father's Name:</strong> $father_name</p>
            <p><strong>School:</strong> $school</p>
            <p><strong>Class:</strong> $class</p>
            <p><strong>Date of Birth:</strong> $dob</p>
            <p><strong>Gender:</strong> $gender</p>

            <h3>Contact Details</h3>
            <p><strong>Landline:</strong> $landline</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Post Office:</strong> $po</p>

            <h3>Sport Related Details</h3>
            <p><strong>Past Injuries:</strong> $injuries</p>
            <p><strong>Treatment Taken:</strong> $treatment</p>
            <p><strong>Jersey Size:</strong> $jersey_size</p>
            <p><strong>Covid Vaccinated:</strong> $covid</p>
            <p><strong>Covid Dates:</strong> $covid_dates</p>
            <p><strong>Favourite Player:</strong> $fav_player</p>
            <p><strong>Favourite Club:</strong> $fav_club</p>
            <p><strong>Favourite Position:</strong> $fav_position</p>
            <p><strong>Reason to Join:</strong> $player_reason</p>

            <h3>Guardian Details</h3>
            <p><strong>Guardian Name:</strong> $guardian_name</p>
            <p><strong>Relationship:</strong> $relationship</p>
            <p><strong>Profession:</strong> $profession</p>
            <p><strong>Emergency Contact:</strong> $emergency_no</p>
            <p><strong>Guardian Mobile:</strong> $guardian_mobile</p>
            <p><strong>Guardian Email:</strong> $guardian_email</p>
            <p><strong>Guardian's Favourite Player:</strong> $guardian_fav_player</p>
            <p><strong>Favourite Club:</strong> $guardian_fav_club</p>
            <p><strong>Favourite Pakistani Player:</strong> $guardian_fav_pak_player</p>
            <p><strong>Reason to Join (Guardian):</strong> $guardian_reason</p>
            <p><strong>Photo Permission:</strong> $permission</p>

            <h3>Guardian Declaration</h3>
            <p><strong>Signature:</strong> $guardian_signature</p>
            <p><strong>Signature Date:</strong> $signature_date</p>

            <h3>Office Use Only</h3>
            <p><strong>Registration No:</strong> $reg_no</p>
            <p><strong>Amount:</strong> $amount</p>
            <p><strong>Payment Date:</strong> $payment_date</p>
            <p><strong>Payment Mode:</strong> $mode</p>
            <p><strong>Cheque No:</strong> $cheque_no</p>
            <p><strong>Drawn No:</strong> $drawn_no</p>
            <p><strong>Cheque Date:</strong> $cheque_date</p>
        ";

        $mail->send();
        header("Location: index.html?success=1");
        exit();
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request!";
}
?>
