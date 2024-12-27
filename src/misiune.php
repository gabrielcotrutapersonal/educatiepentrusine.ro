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
    <title>Raluca Radu | Misiune, viziune, valori | Educație pentru sine</title>
    <meta name="description" content="Misiune, viziune și valori: dedicare, compasiune, educație continuă și creativitate pentru susținerea sănătății mintale și a echilibrului personal.">

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

<body class="page-mission">
    <div class="header">
        <div class="menu-container">
            <a class="logo" href="/"></a>
            <nav>
                <a href="/"><span class="icon home"></span></a>
                <a href="/misiune.php">Misiune, viziune, valori</a>
            </nav>
        </div>
        <div class="container content-container">
            <div class="col content">
                <div class="content-box">
                    <h1 class="text-align-center">Misiune, viziune, valori</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <section class="mission">
            <div class="container mission-container">
                <div class="col left content">
                    <div class="content-box">
                        <h2>Misiunea și abordarea mea</h2>
                        <p>Misiunea mea este de a-mi dedica cunoștințele și abilitățile pentru a contribui la îmbunătățirea vieții oamenilor prin conștientizarea propriilor resurse, prin creșterea capacității de a face față stresului și evenimentelor dificile din viață, pentru un plus de echilibru, o stare de bine și împlinire în viața personală și profesională.</p>
                        <p>Pentru a realiza acest deziderat:</p>
                        <ul>
                            <li><p>acord atenție și timp dezvoltării mele personale constante prin terapie individulă și de grup, precum și formării mele continue în profesia de psihoterapeut, prin participarea susținută la cursuri, conferințe și workshopuri în domeniul sănătății mintale;</p></li>
                            <li><p>susțin o abordare personalizată a ședințelor de psihoterapie în funcție de nevoile, ritmul și cu resursele clienților mei.</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col right photo">
                    <img alt="raluca-radu-psiholog-misiune" src="assets/img/raluca-radu-psiholog-misiune.jpg" />
                </div>
            </div>
        </section>
        <section class="background-alternative">
            <div class="container single vision-container">
                <h2 class="text-align-center">Viziunea</h2>
                <div class="container">
                    <div class="col left">
                        <div class="stripe"></div>
                        <div class="content-box">
                            <p>Imi doresc să devin un reper de încredere și compasiune în domeniul psihoterapiei, creând un spațiu sigur și inspirațional unde fiecare individ poate să-și descopere resursele interioare, să devină conștient de propriile abilități și să dezvolte capacitatea de a face față vieții.</p>
                        </div>
                    </div>
                    <div class="col middle">
                        <div class="stripe"></div>
                        <div class="content-box">
                            <p>Printr-o abordare centrată pe persoană, îmi propun să sprijin clienții în construirea rezilienței, astfel încât să poată trăi o viață echilibrată și cu sens, să poată lucra în mod productiv și să fie capabili să aducă o contribuție în comunitățile lor.</p>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="stripe"></div>
                        <div class="content-box">
                            <p>Aspirația mea este de a oferi oamenilor suportul necesar (prin psihoterapie, articole, studii, workshopuri)  pentru o stare autentică de bine și împlinire personală și profesională, oferind acces la cunoaștere și contribuind astfel la promovarea și dezvoltarea sănătății mintale din România.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container single values-intro-container">
                    <div class="col">
                        <div class="content-box">
                            <h2>Valorile care mă definesc</h2>
                            <p>Propriile valori de bază, alături de un cod de conduită și etică riguros, constituie esența fiecărei decizii pe care o iau.</p>
                        </div>
                    </div>
                </div>
                <div class="container values-container">
                    <div class="col left">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Libertate:</strong> Am încredere în potențialul fiecărui om cu care intru în contact și încerc să îl conectez și pe el cu resursele sale (cunoscute sau mai puțin cunoscute și folosite) pentru a ajunge să trăiască cât mai aproape de viața pe care și-o dorește.</p>
                                </li>
                                <li>
                                    <p><strong>Iubire:</strong> A pune oamenii pe primul loc este modul meu de a crea o relație terapeutică autentică și de încredere. Acceptarea oamenilor cu tot ceea ce sunt ei (lumină și umbră) și oferirea unui spațiu sigur le permite să exploreze fără teama de judecată, să se apropie de sine, de nevoile lor, și să fie autentici, blânzi, empatici, îndrăzneți, jucăuși.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Creativitate:</strong> Îmbin metode terapeutice diverse care permit oamenilor să exploreze diferit propriile experiențele, să se apropie de sine și să construiască noi moduri de a face față provocărilor din viață, adaptate personalității, nevoilor și contextului lor de viață.</p>
                                </li>
                                <li>
                                    <p><strong>Educație continuă:</strong> Consider că fiecare zi este o oportunitate de cunoaștere (cunoaștere de sine și a lumii din jur) ce ne încurajează adaptabilitatea, flexibilitatea și curiozitatea, stimulându-ne să rămânem conectați, sinceri cu noi înșine și relevanți într-o lume în continuă schimbare.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
    <script src="js/contact-form.js"></script>
</body>

</html>