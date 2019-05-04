$(document).ready(function() {
    $(document).on("click", '.number_page', function(e) {
    e.preventDefault();
    let page = $(this).data('page');

    $.ajax({
        url: 'ajax/projects.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'page': page
        },
        success: function (data) {
          console.log(data);
          window.history.pushState('page2', 'Title', 'projects.php?page=' + data);
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });
});
