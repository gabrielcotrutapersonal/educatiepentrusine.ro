<?php
define('BASE_PATH', __DIR__);

$pageTitle = "Raluca Radu | Servicii și tarife | Educație pentru sine";
$metaDescription = "Servicii de consiliere și psihoterapie individuală pentru adulți și adolescenți. Descoperă arii de lucru și tarife. Împlinire și echilibru pentru tine.";

// Handle form submission if needed
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require BASE_PATH . '/includes/handle_form_submission.php';
    handleFormSubmission();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ro">
    <?php include BASE_PATH . '/includes/header.php'; ?>

    <body class="page-services">
        <header>
            <?php include BASE_PATH . '/includes/navigation.php'; ?>

            <div class="container content-container">
                <div class="col content">
                    <div class="content-box">
                        <h1 class="text-align-center">Servicii și tarife</h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="services">
                <div class="container services-container">
                    <div class="col left content">
                        <div class="content-box">
                            <h2>Servicii</h2>
                            <p>În acest moment, lucrez <strong>în cabinet</strong> și <strong>online</strong> ședințe de <strong>consiliere și psihoterapie individuală cu adulți și adolescenți.</strong></p>
                            <p>Putem vorbi despre <strong>obiectivele</strong> tale personale și profesionale, provocări, <strong>probleme</strong>, simptome, tulburări sau afecțiuni sau despre cum să fii (mai) bine cu tine.</p>
                            <p>Putem explora împreună și aduce claritate asupra unor întrebări precum:</p>
                            <ul>
                                <li>
                                    <p>Cine sunt eu, cum m-am format, care este istoricul meu relațional  și cum mă influențează acesta în prezent prin tiparele de răspunsuri emoționale, cognitive și comportamentale?</p>
                                </li>
                                <li>
                                    <p>Ce pot face pentru a aduce un plus de bine în viața mea, de autogestionare emoțională, pentru a trăi mai sănătos, mai aproape de nevoile mele, mai aliniat cu valorile mele și pentru a simți mai multă libertate și împlinire?</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right photo">
                        <img alt="raluca-radu-psiholog-servicii-tarife" src="assets/img/raluca-radu-psiholog-servicii-tarife.jpg" />
                    </div>
                </div>
            </section>
            <section class="background-alternative">
                <div class="container single work-areas-container">
                    <h2 class="text-align-center">Arii de lucru</h2>
                    <div class="container">
                        <div class="col">
                            <div class="box anxiety">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Anxietate, atacuri de panică, anxietate socială</strong></p>
                                </div>
                            </div>
                            <div class="box relationships">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Dificultăți în relații</strong></p>
                                </div>
                            </div>
                            <div class="box loneliness">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Singurătate și izolare</strong></p>
                                </div>
                            </div>
                            <div class="box mourning">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Doliu</strong></p>
                                </div>
                            </div>
                            <div class="stripe"></div>
                        </div>
                        <div class="col">
                            <div class="box motivation">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Scăderea / lipsa motivației, dificultăți în luarea deciziilor</strong></p>
                                </div>
                            </div>
                            <div class="box self-esteem">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Stima de sine scăzută</strong></p>
                                </div>
                            </div>
                            <div class="box ptsd">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Tulburare de stres post-traumatic</strong></p>
                                </div>
                            </div>
                            <div class="stripe"></div>
                        </div>
                        <div class="col">
                            <div class="box conflicts">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Gestionarea conflictelor</strong></p>
                                </div>
                            </div>
                            <div class="box stress">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Gestionarea emoțiilor și a stresului</strong></p>
                                </div>
                            </div>
                            <div class="box sleep">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Tulburări ale somnului</strong></p>
                                </div>
                            </div>
                            <div class="box crisis">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Intervenții în situații de criză</strong></p>
                                </div>
                            </div>
                            <div class="stripe"></div>
                        </div>
                        <div class="col">
                            <div class="box loss">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Trauma de pierdere: a unui job, a unei persoane dragi, divorț</strong></p>
                                </div>
                            </div>
                            <div class="box balance">
                                <div class="stripe"></div>
                                <div class="content-box">
                                    <p><strong>Echilibrul între rolurile pe care le avem în viață: partener, părinte, angajat, manager, antreprenor, copil etc.</strong></p>
                                </div>
                            </div>
                            <div class="stripe"></div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="container single prices-container">
                        <div class="col">
                            <div class="content-box">
                                <h2>Tarife</h2>
                                <p>O sesiune de psihoterapie individuală durează 50 de minute și costă 250 lei.</p>
                                <p>Numărul de sesiuni variază deoarece fiecare dintre noi este unic, avem obiective diferite și avem un ritm personal, pe care este necesar să îl respectăm și în procesul terapeutic.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <?php include BASE_PATH . '/includes/footer.php'; ?>
    </body>
</html>