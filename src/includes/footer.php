<footer>
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
                <div class="form-message" id="formFeedback" data-role="form-feedback"></div>
                <form id="contactForm" data-role="contact-form">
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
</footer>

<script src="js/main.js?v=<?php echo getFileVersion(BASE_PATH . '/js/main.js'); ?>"></script>