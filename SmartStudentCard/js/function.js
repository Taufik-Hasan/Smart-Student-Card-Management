
$("#menuItemIssueBook").click(function(){
	$("#submenuItemIssueBook").slideToggle(100);
});

$(window).on("scroll resize load",function(e){
	$("#clearance_filter_dropdown_list").slideUp(100);
	$("#report_filter_dropdown_list").slideUp(100);
	$("#submenuItemIssueBook").slideUp(100);
	$("#LibRightPanel").css('min-height',$("#LibLeftPanel").height()+20);
});