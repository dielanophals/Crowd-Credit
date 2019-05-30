$(document).ready(function() {
    $(document).on("click", '.save_desc', function(e) {
        e.preventDefault();

        var description = $('.description').val();

        $.ajax({
            url: 'ajax/save_organisation.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'description': description
            },
            success: function (data) {
                alert(data);
            }
        });
    });
});
