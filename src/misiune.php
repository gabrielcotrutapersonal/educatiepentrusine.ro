<?php
define('BASE_PATH', __DIR__);

$pageTitle = "Raluca Radu | Misiune, viziune, valori | Educație pentru sine";
$metaDescription = "Misiune, viziune și valori: dedicare, compasiune, educație continuă și creativitate pentru susținerea sănătății mintale și a echilibrului personal.";

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

    <body class="page-mission">
        <header>
            <?php include BASE_PATH . '/includes/navigation.php'; ?>

            <div class="container content-container">
                <div class="col content">
                    <div class="content-box">
                        <h1 class="text-align-center">Misiune, viziune, valori</h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
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
        </main>

        <?php include BASE_PATH . '/includes/footer.php'; ?>
    </body>
</html>