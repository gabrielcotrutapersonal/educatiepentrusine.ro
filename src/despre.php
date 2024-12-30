<?php
define('BASE_PATH', __DIR__);

$pageTitle = "Raluca Radu | Despre mine | Educație pentru sine";
$metaDescription = "Află cine sunt, abordarea mea terapeutică, formările și certificările care mă susțin în a oferi sprijin pentru o viață echilibrată și cu sens.";

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

    <body class="page-about">
        <header>
            <?php include BASE_PATH . '/includes/navigation.php'; ?>

            <div class="container content-container">
                <div class="col content">
                    <div class="content-box">
                        <h1 class="text-align-center">Despre mine</h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="about">
                <div class="container single photo-container">
                    <div class="col photo">
                        <img alt="raluca-radu-psiholog-despre" src="/assets/img/raluca-radu-psiholog-despre-mine.jpg" />
                    </div>
                </div>
                <div class="container single about-container">
                    <div class="col content">
                        <h3>Sunt Raluca Radu, psiholog clinician și psihoterapeut, iar misiunea mea este să însoțesc oamenii ce se confruntă cu blocaje și dificultăți individuale, profesionale sau relaționale pe drumul cunoașterii de sine și al refacerii relației dintre minte și propriul corp prin întelegerea și alinierea gandurilor, emoțiilor, senzațiilor și comportamentelor.</h3>
                    </div>
                </div>
                <div class="container about-more-container">
                    <div class="col left">
                        <div class="content-box">
                            <p>Sunt <strong>psiholog clinician, psihoterapeut</strong> cu formare în Psihoterapia Integrativă a Traumei la Institutul pentru Studiul și Tratamentul Traumei (ISTT) și <strong>membru al Colegiului Psihologilor</strong> din România. Sunt, de asemenea, coach și consilier dezvoltare personală acreditat de Ministerul Muncii.</p>
                            <p>Înainte de a mă dedica psihologiei, am lucrat 17 de ani în companii multinaționale unde am coordonat echipe și proiecte de Telecomunicații și IT&C, ceea ce îmi permite să îmbin în cabinetul de psihologie cunoștințele de business cu cele despre psihic spre o mai bună <strong>susținere a oamenilor</strong>.</p>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="content-box">
                            <p><strong>Pasiunea și curiozitatea</strong> pentru cunoașterea <strong>minții</strong> și a <strong>sufletului uman</strong> m-au condus către psihologie.</p>
                            <p>Sunt o <strong>femeie</strong> în continuă explorare și cunoaștere, iubită, parteneră, mamă, fiică, soră și prietenă. Sunt binecuvântată cu toate aceste <strong>roluri</strong> și sunt recunoscătoare pentru fiecare în parte și pentru toți oamenii din jurul meu alături de care mă simt liberă, neîngrădită, acceptată și care mă primesc cu bucurie.</p>
                            <p>Consider fiecare <strong>experiență</strong> prin care trec o oportunitate de învățare și dezvoltare către <strong>conștientizare, sănătate și o viață trăită cu sens</strong>.</p>
                        </div>
                    </div>
                </div>
                <div class="container single help-container">
                    <div class="col content">
                        <h3>Cu ce te pot ajuta?</h3>
                        <p>Rolul meu este de a facilita un spațiu de siguranță, vulnerabilitate, onestitate și lipsă de judecată care să susțină capacitatea ta de recuperare și de reconectare. Putem explora împreună tiparele de răspunsuri emoționale, cognitive și comportamentale, modul în care s-au format, cauzele și modalități de modificare a acestora pentru o viață mai sănătoasă, mai împlinită.</p>
                    </div>
                </div>
            </section>
            <section class="approach background-alternative">
                <div class="container single approach-intro-container">
                    <h2 class="text-align-center">Abordarea mea</h2>
                    <div class="col">
                        <div class="content-box">
                            <p>Specializarea mea de bază este <strong>terapia integrativă a traumei</strong>, pe care am studiat-o la una dintre cele mai cunoscute și riguroase școli de formare din România, <strong>Institutul pentru Studiul și Tratamentul Traumei (ISTT)</strong> alături de oamenii ce mi-au devenit mentori profesionali și ghizi interiori în cabinetul de psihoterapie.</p>
                        </div>
                    </div>
                </div>
                <div class="container approach-container">
                    <div class="col left">
                        <div class="stripe"></div>
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Schema Therapy</strong>: Utilizarea imageriei de rescriere pentru lucrul cu Trauma.</p>
                                </li>
                                <li>
                                    <p><strong>CBT</strong>: Aplicații din Psihoterapia Cognitiv Comportamentală în lucrul cu Sindromul de Stres Post-traumatic (PTSD).</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="stripe"></div>
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Teoria polivagală</strong>: Reglarea sistemului nervos autonom (SNA), a reintra în contact cu propriul corp,   cu efectele traumei asupra corpului și minții.</p>
                                </li>
                                <li>
                                    <p><strong>Practici de respirație</strong>: Activante când ai nevoie de energie sau liniștitoare cand simți multă agitație.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="certifications">
                <h2 class="text-align-center">Certificări</h2>
                <div class="container certifications-container">
                    <div class="col left">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Formare în Psihoterapia integrativă a traumei</strong>, Institutul pentru Studiul și Tratamentul Traumei (ISTT), 2022 – 2024</p>
                                </li>
                                <li>
                                    <p><strong>Atestat de liberă practică în psihologie clinică</strong> din partea Colegiului Psihologilor din România, 2021</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p><strong>Master în Psihologie clinică</strong>, Universitatea Spiru Haret, București, 2021 - 2023</p>
                                </li>
                                <li>
                                    <p><strong>Licență în Psihologie</strong>, Universitatea Titu Maiorescu, București, 2018 – 2021</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h2 class="text-align-center">Formări</h2>
                <div class="container formations-container">
                    <div class="col left">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p>Conferința internațională de psihotraumatologie - CINPT 2023 - ediția a VII-a: Traumă, sănătate mintală și comunitate – Care este contribuția noastră? București (10-12 noiembrie 2023)</p>
                                </li>
                                <li>
                                    <p>Diana Vasile: Intervenție în situații de criză, Somn și vise, Terapie de cuplu, Stres, Traumă și relaționare umană (2023)</p>
                                </li>
                                <li>
                                    <p>Celestina Dumitriu: Pierdere, Durere, Doliu (Mar - Apr 2023)</p>
                                </li>
                                <li>
                                    <p>Diana Vasile: Nevoia de mine, nevoia de tine – Traumele de relație (25 - 26 noiembrie 2022)</p>
                                </li>
                                <li>
                                    <p>Gabor Maté: Normal anormal, Cum să reechilibrăm balanța în relația adult-copil, Mitul normalității (16 – 17 octombrie 2022)</p>
                                </li>
                                <li>
                                    <p>Daniel David: Conferința Națională de Psihoterapie Cognitiv-Comportamentală, Cluj, ediția a VIII-a, cu tema Traumă și Reziliență (16-17 iunie 2022)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="content-box">
                            <ul>
                                <li>
                                    <p>Diana Vasile: Emoțiile (25 mai 2022)</p>
                                </li>
                                <li>
                                    <p>Monica Lespezeanu: Prin labirintul adolescenței, obstacole și provocări pentru părinți - Repere de psihoeducație și intervenție (18 mai 2022)</p>
                                </li>
                                <li>
                                    <p>Leslie Greenberg: Changing Emotion With Emotion (03 Mai 2022)</p>
                                </li>
                                <li>
                                    <p>Maria Macarenco: Maraton de Constelații ale Intenției bazat pe Terapia Orientată pe Identitate (IOPT) dezvoltată de Franz Ruppert (13-17 aprilie 2022)</p>
                                </li>
                                <li>
                                    <p>Fundația Estuar - Intervenția în criză (15 Mar 2022)</p>
                                </li>
                                <li>
                                    <p>Babette Rotschild: Revoluționarea terapiei traumei (16 – 18 Februarie 2022)</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include BASE_PATH . '/includes/footer.php'; ?>
    </body>
</html>