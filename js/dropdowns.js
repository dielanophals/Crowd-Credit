$(document).ready(function() {
  $(document).on("click","body", function (event) {
    var target = event.target.id;
    if(target == ""){
      $(".nav_profile_dropdown").addClass("hide");
      $(".dropdown").addClass("hide");
    }
  });

  $(document).on("click", ".nav_profile_dropdown_btn", function(e) {
    e.preventDefault();
    $(".nav_profile_dropdown").toggleClass("hide");
  });

  $(document).on("click", '.filter_dropdown_btn', function(e) {
    e.preventDefault();
    $(this).next(".dropdown").toggleClass("hide");
    $('.project_tiles').load(document.URL +  ' .project_tiles');
  });

  $(".search_persons").keyup('.myInput',function() {
    $('.dropdown-content').css("max-height", "209px");

    var input, filter, a, i;

    input = document.querySelector(".myInput");
    filter = input.value.toUpperCase();
    div = document.querySelector(".myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  });

  $(document).on("click", ".name", function(e) {
    e.preventDefault();
    var name = $(this).text();
    var id = $(this).data('id');
    $('.myInput').attr("data-id", id)
    $('.myInput').val(name);
    $('.dropdown-content').css("max-height", "49px");
  });

  $(".search_project").keyup('.myInput',function() {
    $('.dropdown-project').css("max-height", "209px");

    var input, filter, a, i;

    input = document.querySelector(".myInput-project");
    filter = input.value.toUpperCase();
    div = document.querySelector(".myDropdown-project");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
  });

  $(document).on("click", ".pro", function(e) {
    e.preventDefault();
    var name = $(this).text();
    var id = $(this).data('id');
    $('.myInput-project').attr("data-id", id)
    $('.myInput-project').val(name);
    $('.dropdown-project').css("max-height", "49px");
  });

  $(document).on("click", ".transfer", function(e) {
    e.preventDefault();
    var userid = $('.myInput').data("id");
    var projectid = $('.myInput').data("id");
    var amount = $('.amount').val();
    if(userid != "" && projectid != "" && amount != ""){
      $.ajax({
        url: 'ajax/refund.php',
        type: 'POST',
        dataType: 'html',
        data: {
            'userid': userid,
            'projectid': projectid,
            'amount': amount
        },
        success: function (data) {
          window.location = "index.php";
        }
      });
    }else{
      alert("Please fill in all the fields.")
    }
  });
});
