$(document).ready(function() {
  $(document).on("click", '.number_page', function(e) {
    e.preventDefault();
    var page = $(this).data('page');

    var params = new URL(location.href).searchParams;
    var search = params.get('search');
    var continent = params.get('continent');
    var category = params.get('category');

    $.ajax({
        url: 'ajax/projects.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'page': page
        },
        success: function (data) {
          var push_search = "";
          var push_continent = "";
          var push_category = "";

          if(search){
            push_search = 'search=' + search + '&';
          }
          if(continent){
            push_continent = 'continent=' + continent + '&';
          }
          if(category){
            push_category = 'category=' + category + '&';
          }

          window.history.pushState('page2', 'Title', 'index.php?' + push_search + push_continent + push_category + 'page=' + data);
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(document).on("click", '.check_continent', function(e) {
    var params = new URL(location.href).searchParams;
    var search = params.get('search');
    var category = params.get('category');

    var continents = new Array();
    $('input[name="continent"]:checked').each(function() {
      continents.push(this.value);
    });

    $.ajax({
        url: 'ajax/filter_continent.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'continents': continents
        },
        success: function (data) {
          if(search && category){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + data + '&category=' + category);
          }else if(search){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + data);
          }else if(category){
            window.history.pushState('page2', 'Title', 'index.php?continent=' + data + '&category=' + category);
          }else{
            window.history.pushState('page2', 'Title', 'index.php?continent=' + data);
          }
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(document).on("click", '.check_category', function(e) {
    var params = new URL(location.href).searchParams;
    var search = params.get('search');
    var continent = params.get('continent');

    var categories = new Array();
    $('input[name="category"]:checked').each(function() {
      categories.push(this.value);
    });

    $.ajax({
        url: 'ajax/filter_category.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'category': categories
        },
        success: function (data) {
          if(search && continent){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + continent + '&category=' + data);
          }else if(search){
            window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&category=' + data);
          }else if(continent){
            window.history.pushState('page2', 'Title', 'index.php?continent=' + continent + '&category=' + data);
          }else{
            window.history.pushState('page2', 'Title', 'index.php?category=' + data);
          }
          $('.project_tiles').load(document.URL +  ' .project_tiles');
        }
    });
  });

  $(".search").keyup('.search_input',function() {
    var search = $('.search_input').val();

    var params = new URL(location.href).searchParams;
    var continent = params.get('continent');
    var category = params.get('category');

    if(continent && category){
      window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + continent + '&category=' + category);
    }else if(continent){
      window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&continent=' + continent);
    }else if(category){
      window.history.pushState('page2', 'Title', 'index.php?search=' + search + '&category=' + category);
    }else{
      window.history.pushState('page2', 'Title', 'index.php?search=' + search);
    }
    $('.project_tiles').load(document.URL +  ' .project_tiles');
  });

  $('.search').submit(function () {
    return false;
  });

  $(document).on("click", '#fund', function(e) {
    e.preventDefault();
    var project_id = $(this).data('project');
    var amount = $('#amount').val();

    $.ajax({
        url: 'ajax/fund.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'project': project_id,
            'amount': amount
        },
        success: function (data) {
          if(data !== ""){
            alert(data);
          }
          window.location = "project.php?project=" + project_id;
        }
    });
  });
});
