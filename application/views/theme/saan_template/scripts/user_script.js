// JavaScript Document

function user_init()
{
	var submenuRows = $("tbody#submenu_body").find("tr:gt(-1)");
	submenuRows.hide();
}

$(document).ready(function(){
	user_init();
	
	var presentIdValue = "#" + controllerName;
	var presentSubMenuValue = "#row_" + controllerName;
	$(presentIdValue).removeClass().addClass('user_current');
	
	var submenuPresent = $(".menu_table > tbody > tr"+ presentSubMenuValue);
	submenuPresent.show();
	
	var currentSubMenu = "#" + actionName;
	$(currentSubMenu).removeClass().addClass('submenu_current');
});