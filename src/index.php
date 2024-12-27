<?php
require __DIR__ . '/vendor/autoload.php';

use App\Config;
use App\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    $conn = Database::getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        $phone = htmlspecialchars($_POST['tel'] ?? '');

        // Validate input data
        if (empty($name) || empty($email) || empty($message)) {
            echo json_encode(['success' => false, 'message' => 'Toate câmpurile sunt obligatorii.']);
            exit;
        }

        // Save to the database
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
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Charset -->
    <meta charset="UTF-8">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta title & description -->
    <title>Raluca Radu | Psiholog și psihoterapeut | Educație pentru sine</title>
    <meta name="description" content="Depășește provocările vieții, descoperă-ti resursele și găsește-ți echilibrul interior. Sedințe de psihoterapie personalizate, adaptate nevoilor tale.">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/img/favicon/safari-pinned-tab.svg" color="#121425">
    <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#121425">
    <meta name="msapplication-config" content="/assets/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#121425">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Raluca Radu",
        "image": "https://www.educatiepentrusine.ro/assets/img/raluca-radu-psiholog-psihoterapeut.jpg",
        "jobTitle": "Psiholog clinician și psihoterapeut",
        "worksFor": {
            "@type": "Organization",
            "name": "Cabinet Individual Psihologie"
        },
        "url": "https://www.educatiepentrusine.ro",
        "sameAs": [
            "https://www.linkedin.com/in/raradu/",
            "https://www.facebook.com/EducatiePentruSine"
        ]
    }
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PVJPBMT69S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PVJPBMT69S');
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/styles.css?v=2024120801">
</head>

<body class="page-home">
    <div class="header">
        <div class="menu-container">
            <a class="logo" href="/"></a>
            <nav class="main-nav">
                <button class="burger-menu" data-role="burger-menu" aria-label="Toggle navigation" >
                    <span class="burger-bar"></span>
                    <span class="burger-bar"></span>
                    <span class="burger-bar"></span>
                </button>
                <ul class="menu" data-role="menu">
                    <li>
                        <a class="but-home" href="/">
                            <svg id="iconHome" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 30 32">
                                <path d="M15,3.6l12,8v17.4H3V11.6L15,3.6M15,0L0,10v22h30V10L15,0h0Z"/>
                            </svg>
                        </a>
                    </li>
                    <li><a href="/misiune.php">Misiune, viziune, valori</a></li>
                </ul>
            </nav>
        </div>
        <div class="content-container">
            <div class="col left photo">
                <div class="stripe"></div>
            </div>
            <div class="col right content">
                <div class="content-box">
                    <h1>Educație pentru sine. Stare de bine.</h1>
                    <hr class="hspacer" />
                    <h1 class="p">Bine ai venit! Sunt Raluca Radu, psiholog clinician și psihoterapeut.</h1>
                    <p>Te susțin în descoperirea resurselor interioare pentru o viață cu sens și echilibru.</p>
                    <p>Găsește drumul potrivit pentru tine!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <section>
            <div class="container">
                <div class="col left">
                    <div class="content-box">
                        <h2>Cine sunt eu?</h2>
                        <p>Sunt Raluca Radu, psiholog clinician și psihoterapeut, pasionată de a sprijini oamenii să depășească provocările vieții și să își regăsească echilibrul interior. Experiența mea combină cunoștințe din psihologie și business, într-un mod unic, adaptat fiecărui client.</p>
                    </div>
                </div>
                <div class="col right">
                    <div class="content-box">
                        <h2>Descoperă-ți potențialul</h2>
                        <p>Crede în potențialul tău! Misiunea mea este să te sprijin să descoperi și să-ți valorifici resursele interioare, să depășești obstacolele și să-ți construiești o viață echilibrată, plină de sens, bazată pe autenticitate, încredere și dezvoltare continuă, aliniată cu valorile tale.</p>
                    </div>
                </div>
            </div>
            <div class="container single">
                <div class="col">
                    <div class="content-box">
                        <h2>Terapie personalizată pentru tine</h2>
                        <p>Ședințe de psihoterapie individuală, la cabinet sau online, în funcție de nevoile și preferințele tale. Lucrăm împreună pe aspecte precum anxietatea, gestionarea conflictelor, stima de sine sau trauma de pierdere, într-un spațiu sigur și suportiv.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="footer">
        <div class="content-container">
            <div class="col left">
                <div class="content-box">
                    <div class="h1">Fă primul pas spre echilibru</div>
                    <p>Ești gata să începi o schimbare pozitivă în viața ta? Contactează-mă pentru a programa o ședință și pentru a descoperi cum te pot sprijini în călătoria ta spre echilibru.</p>
                    <div class="contact-info-container">
                        <a class="link-with-icon" href="tel:+40724 390 399">
                            <span class="icon tel-whatsapp"></span>
                            <span class="text">+40724 390 399</span>
                        </a>
                        <a class="link-with-icon" href="mailto:Raluca@EducatiePentruSine.ro">
                            <span class="icon email"></span>
                            <span class="text">Raluca@EducatiePentruSine.ro</span>
                        </a>
                        <a class="link-with-icon" href="https://www.facebook.com/EducatiePentruSine" target="_blank">
                            <span class="icon facebook"></span>
                            <span class="text"><span class="no-phone-portrait">Facebook.com/</span>EducatiePentruSine</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col right">
                <div class="content-box">
                    <div class="form-message" id="formFeedback"></div>
                    <form id="contactForm">
                        <div class="row">
                            <label for="name">Nume</label>
                            <input type="text" id="name" name="name" required />
                        </div>
                        <div class="row">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" required />
                        </div>
                        <div class="row">
                            <label for="tel">Telefon</label>
                            <input type="tel" id="tel" name="tel" />
                        </div>
                        <div class="row">
                            <label for="message">Mesaj</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <div class="row">
                            <button>Trimite</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="js/contact-form.js"></script>
</body>

</html>