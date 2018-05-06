(function ($) {
    $(document).on('click', '[data-toggle]', function () {
        var $this = $(this),
            target = $this.attr('data-target');

        if ('true' === $this.attr('aria-expanded')) {
            $(target).slideUp(400, function () { $this.attr('aria-expanded', 'false') });
        } else {
            $(target).slideDown(400, function () { $this.attr('aria-expanded', 'true') });
        }
    });
})(jQuery);