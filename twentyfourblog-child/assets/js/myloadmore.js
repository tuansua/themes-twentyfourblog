jQuery(document).ready(function($) {
	$('.tsloadmore').click(function(event) {
		var button = $(this);
		var  data = {
			'action': 'loadmorehome',
			'currentpaged' : ts_loadmore_params.currentpaged,
		};
		$.ajax({
			url : ts_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			success : function( data ){
				if( data ) { 
					$('.ul-first_dm').append(data);
					ts_loadmore_params.currentpaged++;
				} 
			}
		});
	});
});


