$(document).ready(function () {
    const $burgerMenu = $('[data-role="burger-menu"]');
    const $menu = $('[data-role="menu"]');
    const $body = $('body');

    // Toggle the burger menu and the menu visibility
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
});