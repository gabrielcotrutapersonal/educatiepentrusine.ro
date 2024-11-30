$(document).ready(function () {
    $("#contactForm").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "index.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                const res = JSON.parse(response);
                const feedbackEl = $("#formFeedback");
                feedbackEl.removeClass("success error");
                if (res.success) {
                    feedbackEl.addClass("success");
                    $("#contactForm")[0].reset();
                } else {
                    feedbackEl.addClass("error");
                }
                feedbackEl.text(res.message);
            },
            error: function () {
                const feedbackEl = $("#formFeedback");
                feedbackEl.removeClass("success").addClass("error");
                feedbackEl.text("A apărut o eroare. Vă rugăm să încercați din nou.");
            },
        });
    });
});