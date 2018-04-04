jQuery(document).ready(function ($) {
    $(document).on('click', '.bt-ajx', function () {
        $.ajax({
            url: $(this).attr('href') + '&ajx=1',
            success: function (d) {
                eval(d.js);
            }
        });
        return false;
    });
});