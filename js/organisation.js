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

    $(document).on("click", '.slider', function() {
        var id = $(this).data('id');
        var active = 0;

        if($(this).hasClass("checked")){
            $(this).removeClass("checked");
            active = 0;
        }else{
            $(this).addClass("checked");
            active = 1;
        }
        $.ajax({
            url: 'ajax/save_organisation.php',
            type: 'POST',
            dataType: 'html',
            data: {
                'project_id': id,
                'state': active
            },
            success: function (data) {
                setTimeout(function(){
                    $('.project_tiles').load(document.URL +  ' .project_tiles');
                }, 300);
            }
        });
        
    });
});
