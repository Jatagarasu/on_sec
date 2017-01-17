/**
 * @author Marcel Weber
 */
	
	$(function() {
   	/* Alle Span mit der Klasse .ausklappen verstecken*/
    $('span.ausklappen').next().hide();
	/* <span>+ </span> vor dem Ausgewälten Element einfügen*/
	$("span.ausklappen").before("<span>+ </span>");
	/* Den Mauszeiger ändern*/
	$("span.ausklappen").css("cursor", "pointer");
	
	$("span.ausklappen").click(function() {
		/*Ebene nach unten, oder oben gleiten lassen */
		$(this).next().slideToggle("slow");
		/*  Wenn das vorheirge elment + enthält, dann durch - ersetzen und umgekehrt*/
		if ($(this).prev(this).text() == "+ " )
			$(this).prev(this).replaceWith("<span>- </span>");
		else if ($(this).prev(this).text() == "- " )
			$(this).prev(this).replaceWith("<span>+ </span>");
	});
	
	});