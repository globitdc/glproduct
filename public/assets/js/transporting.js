$( document ).ready( function() {
	

$( '.store' ).click(function(){
		const startingPoint = $('#startingPoint').val();
		const endingPoint   = $('#endingPoint').val();
		const pickUp        = $('#pickUp').val();
		const csrfToken     = $('#csrf_token')[0].content;
		$.ajax({
		 	url: "/store", 
		 	method:"POST",
 			data: {
 			 _token: csrfToken,
 			 startingPoint:startingPoint, 
 			 endingPoint:endingPoint,
 			 pickUp:pickUp
 			},

		 	success: function( result ){
		    	if(result === 'testStored') {
		    		$(".orderHeading").text('Ձեր պատվերը հաստատման փուլում է').css('display', 'none');  
		    	

		    		$(".success-box").css({"background-image":"url(assets/images/e80652af2c77e3a73858e16b2ffe5f9a.gif)","color":"red"});  
		    		$("body").append(`
		    			<div class='success-message'>
		    				<div  class="box20">
								 <h2 class="success-message-child-h2">Ձեր պատվերը մշակման փուլում է</h2>
		    				</div>
		    			</div>`)             

		    	}

		 	}});
	})

})


	









