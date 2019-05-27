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
});
