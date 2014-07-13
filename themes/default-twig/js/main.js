$(document).ready(function() {

	$("a[rel=fancybox], a.fancybox").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
    
    /* responsive begin */
    
    $("<select />").appendTo("nav");

    $("<option />", {
        "selected": "selected",
        "value": "",
        "text": "Меню"
    }).appendTo("nav select");
    

    $("nav a").each(function() {
        var el = $(this);
        $("<option />", {
            "value": el.attr("href"),
            "text": el.text()
        }).appendTo($(el).parent().parent().parent().find("select"));
    });
    
    $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
    });
    
    /* responsive end */
});