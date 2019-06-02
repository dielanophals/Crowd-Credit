$(document).ready(function() {
	
	// OPEM MENU
	$(document).on("click", "#menu_open", function(e){
    	e.preventDefault();
    	$(".nav_mobile").toggleClass("hide");
    	$("#menu_close").toggleClass("hide");
		$("#menu_open").addClass("hide");
  	});
	
	// CLOSE MENU
	$(document).on("click", "#menu_close", function(e){
		e.preventDefault();
		$(".nav_mobile").addClass("hide");
		$("#menu_close").addClass("hide");
		$("#menu_open").toggleClass("hide");
	});
});