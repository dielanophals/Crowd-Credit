$(document).ready(function() {
    $(document).on("click", '.number_page', function(e) {
    e.preventDefault();
    var page = $(this).data('page');

    var params = new URL(location.href).searchParams;
    var search = params.get('search');

    $.ajax({
        url: 'ajax/projects.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'page': page
        },
        success: function (data) {
          console.log(data);
          if(search == ""){
            window.history.pushState('page2', 'Title', 'index.php?page=' + data);
          }else{
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&page=' + data);
          }
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(document).keyup('.search_input',function() {
    var search = $('.search_input').val();
    window.history.pushState('page2', 'Title', 'index.php?search=' + search);
    $('.project_tiles').load(document.URL +  ' .project_tiles');
  });

  $('.search').submit(function () {
   return false;
  });
});
