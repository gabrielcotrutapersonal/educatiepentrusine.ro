<?php
define('BASE_PATH', __DIR__);

$pageTitle = "Raluca Radu | Psiholog și psihoterapeut | Educație pentru sine";
$metaDescription = "Depășește provocările vieții, descoperă-ti resursele și găsește-ți echilibrul interior. Sedințe de psihoterapie personalizate, adaptate nevoilor tale.";

// Handle form submission if needed
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require BASE_PATH . '/includes/handle-form-submission.php';
    handleFormSubmission();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ro">
    <?php include BASE_PATH . '/includes/header.php'; ?>

    <body class="page-home">
        <header>
            <?php include BASE_PATH . '/includes/navigation.php'; ?>

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
        </header>

        <main>
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
        </main>

        <?php include BASE_PATH . '/includes/footer.php'; ?>
    </body>
</html>