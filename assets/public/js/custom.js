$('#href-discover').click(function() {
    $('html, body').animate({ scrollTop: 700 }, 'slow');
    return false;
});

$('#reset-value-search').click(function() {
    location.reload();
});

$("#search-data").keyup(function(){
	$('#reset-value-search').show();
	if ($(this).val() != "") {
		$.ajax({
			method: "POST",
			url: "show/search",
			data: $("#search-data").serialize(),
			success : function(response){
				console.log(response);
				$( '#show-index' ).html(response);
			}
		});
	} else {
		location.reload();
	}
});