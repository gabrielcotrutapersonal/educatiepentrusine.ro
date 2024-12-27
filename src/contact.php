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

    <body class="page-contact">
        <header>
            <?php include BASE_PATH . '/includes/navigation.php'; ?>

            <div class="container content-container">
                <div class="col content">
                    <div class="content-box">
                        <h1 class="text-align-center">Contact</h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="contact">
                <div class="container single">
                    <div class="col">
                        <div class="content-box">
                            <h2 class="text-align-center">Localizare</h2>
                            <p class="text-align-center">Zona Piața Victoriei, București</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include BASE_PATH . '/includes/footer.php'; ?>
    </body>
</html>