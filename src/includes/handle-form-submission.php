<?php

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

require BASE_PATH . '/vendor/autoload.php';

use App\Config;
use App\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function handleFormSubmission()
{
    try {
        error_log('Debug: Entered handleFormSubmission function.');

        $conn = Database::getConnection();
        error_log('Debug: Database connection established.');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and validate inputs
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');
            $phone = htmlspecialchars($_POST['tel'] ?? '');

            error_log("Debug: Form Data - Name: $name, Email: $email, Phone: $phone, Message: $message");

            // Validate required fields
            if (empty($name) || empty($email) || empty($message)) {
                error_log('Debug: Validation failed - Missing required fields.');
                echo json_encode(['success' => false, 'message' => 'Toate câmpurile sunt obligatorii.']);
                exit;
            }

            // Save to database
            $stmt = $conn->prepare("INSERT INTO contact_form_submissions (name, email, message) VALUES (?, ?, ?)");
            if (!$stmt) {
                error_log('SQL Error (prepare): ' . $conn->error);
                echo json_encode(['success' => false, 'message' => 'A apărut o eroare la salvarea mesajului.']);
                exit;
            }

            $stmt->bind_param("sss", $name, $email, $message);
            if (!$stmt->execute()) {
                error_log('SQL Error (execute): ' . $stmt->error);
                echo json_encode(['success' => false, 'message' => 'A apărut o eroare la salvarea mesajului.']);
                exit;
            }
            error_log('Debug: Data successfully saved to database.');

            // Send the email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = Config::get('email.smtpHost');
                $mail->SMTPAuth = true;
                $mail->Username = Config::get('email.smtpUser');
                $mail->Password = Config::get('email.smtpPass');
                $mail->SMTPSecure = Config::get('email.smtpSecure');
                $mail->Port = Config::get('email.smtpPort');

                $mail->setFrom(Config::get('email.smtpUser'), $name . ' (via Educație Pentru Sine)');
                $mail->addAddress(Config::get('email.recipient'));

                // Add Reply-To dynamically based on form submission
                $mail->addReplyTo($email, $name);

                // Set email encoding to UTF-8
                $mail->CharSet = 'UTF-8';

                $mail->isHTML(true);
                $mail->Subject = 'Cerere nouă din formularul de contact';
                $mail->Body = "
                    <h1>Cerere nouă din formularul de contact</h1>
                    <p><strong>Nume:</strong> $name</p>
                    <p><strong>E-mail:</strong> $email</p>" .
                    (!empty($phone) ? "<p><strong>Telefon:</strong> $phone</p>" : "") . "
                    <p><strong>Mesaj:</strong><br>$message</p>
                ";

                $mail->send();
                error_log('Debug: Email successfully sent.');
            } catch (Exception $e) {
                error_log('Email Error: ' . $mail->ErrorInfo);
                echo json_encode(['success' => false, 'message' => 'Mesajul nu a fost trimis: ' . $mail->ErrorInfo]);
                exit;
            }

            echo json_encode(['success' => true, 'message' => 'Vă mulțumim pentru mesaj. Vom lua legătura cu dumneavoastră în scurt timp.']);
            exit;
        }
    } catch (Exception $e) {
        error_log('General Error: ' . $e->getMessage());
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        exit;
    }}

handleFormSubmission();