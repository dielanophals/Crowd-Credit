$(document).ready(function() {
    $(document).on("click", '.save_desc', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        var description = $('.description').val();

        $.ajax({
            url: 'ajax/save_organisation.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'id': id,
                'description': description
            },
            success: function (data) {
                $('.save_desc').val("Saved!");
            }
        });
    });
});
