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
});
