$( document ).ready( function() {
	$( '.add-to-card' ).click(function(){
		var productID = $( this ).data( "key" );
		var csrfToken = $('#csrf_token')[0].content
		$.ajax({
		 	url: "/add-to-card", 
		 	method:"post",
 			data: {_token: csrfToken, productID:productID},
		 	success: function( result ){
		    	
		 	}});
	})
})