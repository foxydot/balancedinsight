jQuery(document).ready(function($) {	
	$('ul li:first-child').addClass('first-child');
	$('ul li:last-child').addClass('last-child');
	$('ul li:nth-child(even)').addClass('even');
	$('ul li:nth-child(odd)').addClass('odd');
	$('table tr:first-child').addClass('first-child');
	$('table tr:last-child').addClass('last-child');
	$('table tr:nth-child(even)').addClass('even');
	$('table tr:nth-child(odd)').addClass('odd');
	$('tr td:first-child').addClass('first-child');
	$('tr td:last-child').addClass('last-child');
	$('tr td:nth-child(even)').addClass('even');
	$('tr td:nth-child(odd)').addClass('odd');
	$('div:first-child').addClass('first-child');
	$('div:last-child').addClass('last-child');
	$('div:nth-child(even)').addClass('even');
	$('div:nth-child(odd)').addClass('odd');


	$('#footer-widgets div.widget:first-child').addClass('first-child');
	$('#footer-widgets div.widget:last-child').addClass('last-child');
	$('#footer-widgets div.widget:nth-child(even)').addClass('even');
	$('#footer-widgets div.widget:nth-child(odd)').addClass('odd');
	
	var numwidgets = $('#footer-widgets div.widget').length;
	$('#footer-widgets').addClass('cols-'+numwidgets);
	
	$("#notaccordion").addClass("ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
  .find("h4")
    .addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
    .hover(function() { $(this).toggleClass("ui-state-hover"); })
    .click(function() {
      $(this)
        .toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
        .next().toggleClass("ui-accordion-content-active").slideToggle();
      return false;
    })
    .next()
      .addClass("ui-accordion-content  ui-helper-reset ui-widget-content ui-corner-bottom")
      .hide();
    $("#notaccordion").find('h4:first-child').next('.ui-accordion-content').show();
    $(".expand").addClass('btnOrange').click(function(){
        $('.ui-accordion-content').show();
    });
    $(".collapse").addClass('btnOrange').click(function(){
        $('.ui-accordion-content').hide();
    });
});