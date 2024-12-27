$(document).ready(function () {
    const $body = $('body');
    const $burgerMenu = $('[data-role="burger-menu"]');
    const $menu = $('[data-role="menu"]');
    const $contactForm = $('[data-role="contact-form"]');
    const $formFeedback = $('[data-role="form-feedback"]');

    // --- Navigation Menu ---
    // Toggle the burger menu and menu visibility
    $burgerMenu.on("click", function () {
        $(this).toggleClass("open");
        $menu.toggleClass("open");
        $body.toggleClass("menu-open");
    });

    // Close the menu when clicking outside
    $(document).on("click", function (e) {
        const $target = $(e.target);
        if (!$target.closest('[data-role="burger-menu"]').length && !$target.closest('[data-role="menu"]').length) {
            $burgerMenu.removeClass("open");
            $menu.removeClass("open");
            $body.removeClass("menu-open");
        }
    });

    // Add or remove 'is-scrolled' class based on scroll position
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 10) {
            $body.addClass("is-scrolled");
        } else {
            $body.removeClass("is-scrolled");
        }
    });

    // --- Contact Form ---
    $contactForm.on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "index.php",
            type: "POST",
            data: $contactForm.serialize(),
            success: function (response) {
                try {
                    const res = JSON.parse(response);
                    $formFeedback.removeClass("success error");
                    if (res.success) {
                        $formFeedback.addClass("success");
                        $contactForm[0].reset();
                    } else {
                        $formFeedback.addClass("error");
                    }
                    $formFeedback.text(res.message);
                } catch (err) {
                    $formFeedback.removeClass("success").addClass("error");
                    $formFeedback.text("A apărut o eroare de server. Vă rugăm să încercați din nou.");
                }
            },
            error: function () {
                $formFeedback.removeClass("success").addClass("error");
                $formFeedback.text("A apărut o eroare. Vă rugăm să încercați din nou.");
            },
        });
    });
});