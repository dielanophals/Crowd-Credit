$(document).ready(function() {
  $(document).on("click", '.number_page', function(e) {
    e.preventDefault();
    var page = $(this).data('page');

    var params = new URL(location.href).searchParams;
    var search = params.get('search');
    var continent = params.get('continent');

    $.ajax({
        url: 'ajax/projects.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'page': page
        },
        success: function (data) {
          if(search && continent){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + continent + '&page=' + data);
          }else if(search){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&page=' + data);
          }else if(continent){
            window.history.pushState('page2', 'Title', 'index.php?continent=' + continent + '&page=' + data);
          }else{
            window.history.pushState('page2', 'Title', 'index.php?page=' + data);
          }
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(document).on("click", '.check_continent', function(e) {
    var params = new URL(location.href).searchParams;
    var search = params.get('search');

    var continents = new Array();
    $('input[name="continent"]:checked').each(function() {
      continents.push(this.value);
    });

    $.ajax({
        url: 'ajax/filters.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'continents': continents
        },
        success: function (data) {
          if(search){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + data);
          }else{
            window.history.pushState('page2', 'Title', 'index.php?continent=' + data);
          }
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(document).keyup('.search_input',function() {
    var search = $('.search_input').val();

    var params = new URL(location.href).searchParams;
    var continent = params.get('continent');

    if(continent){
      window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + continent);
    }else{
      window.history.pushState('page2', 'Title', 'index.php?search=' + search);
    }
    $('.project_tiles').load(document.URL +  ' .project_tiles');
  });

  $('.search').submit(function () {
    return false;
  });
});
