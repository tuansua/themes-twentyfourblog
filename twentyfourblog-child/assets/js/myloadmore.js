jQuery(document).ready(function($) {
	$('.loadmore').click(function(event) {
		var button = $(this);
		var  data = {
			'action': 'loadmorehome',
			'currentpaged' : lionel_loadmore_params.currentpaged,
		};
		$.ajax({
			url : lionel_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			success : function( data ){
				if( data ) { 
					$('.ul-first_dm').append(data);
					lionel_loadmore_params.currentpaged++;
				} 
			}
		});
	});
});