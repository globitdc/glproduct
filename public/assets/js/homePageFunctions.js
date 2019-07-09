$( document ).ready( function() {


	///GLOBAL CSRFTOKEN////
	var csrfToken = $('#csrf_token')[0].content;


	function updateCountBaskets(){

		$.ajax({
			url:"/show_basket_count",
			type:"post",
			data:{_token:csrfToken},
			success: function( result ){

				$( '.basket-count' ).html(result)
			}

		})

	}
	updateCountBaskets()

	function allPriceBasket(){
		$.ajax({
			url:"/all_price_basket",
			type:'post',
			data:{_token:csrfToken},
			success: function( result ){
				var i  = $(".all_price_basket")
				i.html(result);

			}
		})

	}

function get_basket_items(){

			var di  = $(".basket-tools-children-div")
			di.html("")
		$.ajax({
			url:"/get-basket-items",
			type:"post",
			dataType:'json',
			data:{_token:csrfToken},
			success: function( result ){

				result.forEach(function( item ){
				var div = $(`<div class="single_basket_product"></div>`)
			 	di.append(div)
		    	div.append(`<h3>${item['name']}</h3>`)
		    	div.append(`<img class='basket-min-img' src="${productImagePath}${item['image']}">`)
		    	div.append(`<span>${item['price']}:դրամ</span>`)
			 	// div.append(``)
		    	div.append(`					
		    		<div style="border:1px solid grey;" class="qty mt-5">
		    			<label>քանակը</label><br>
                        <span data-key="${item['id']}" class="minus bg-dark">-</span>
                        <input min="1" type="number" class="count" name="qty" value="${item['count']}">
                        <span data-key="${item['id']}" class="plus bg-dark">+</span>
                        <img data-key="${item['id']}" style="width:40px; cursor:pointer;" class="delete-into-basket" src="${styleImagePath}delete-into-basket-icon.png" >
                    </div>`);
				});

					di.append(`<span>Ամբողջ գումարը:<i  class="all_price_basket"></i></span>`)
				
				updateCountBaskets();
				allPriceBasket();

				// div.append()

			}
		})
		}


	$( '.add-to-card' ).click(function(){

		var productID = $( this ).data( "key" );
		var _this = $(this)

		$.ajax({

		 	url: "/add-to-card", 
		 	method:"post",
 			data: {_token: csrfToken, productID:productID},
		 	success: function( result ){
		 		
		 		if(result!="Inserted"){
		 			// _this.after(`<span style="font-size:20px; color:green; "> քանակը ${result}</span>`);
		 			console.log("Տվյալ ապրանքի քանակը դարձավ "+result+"!")
		 		}else{
		 			console.log("Տվյալ ապրանքը ավելացավ զամբյուղ !");
		 		}

		 	}});
		if($('.basket-tools-children-div').html()!=''){
			get_basket_items()
		}else{
			$( ".basket-tools-children-div" ).html('')
		}

        	var data = sessionStorage.getItem('key');
        	updateCountBaskets();

	})

	$( '.basket-icon' ).click(function(){
		if ($( ".basket-tools-children-div" ).html()=="") {
		
		get_basket_items()
		}else{
			$( ".basket-tools-children-div" ).html('')
		}
	})

   	$( document ).on( 'click' ,' .plus ',function(){
		var inp = $(this).parents('.mt-5').children('.count')
		inp.val( Number(inp.val())+1 );
		var count = inp.val();
		var productID = $( this ).data( "key" );
		$.ajax({
			url:"/baskets-product-count-plus",
			type:"post",
			data:{_token:csrfToken,count:count,productID:productID},
			success: function(result){
				updateCountBaskets();
				allPriceBasket();
			}
		})
		
   	});

    $( document ).on( 'click' , '.minus' ,function(){
		var inp = $(this).parents( '.mt-5' ).children( '.count' )
		if (inp.val()!=1 || inp.val()>1) {

			inp.val( Number(inp.val())-1 );
			var count = inp.val();
			var productID = $( this ).data( "key" );
			$.ajax({
			url:"/baskets-product-count-plus",
			type:"post",
			data:{_token:csrfToken,count:count,productID:productID},
			success: function(result){
				updateCountBaskets();
				allPriceBasket();
			}
		})
		}else{
			inp.val(1)
		}
    });

    $( document ).on( 'click' , '.delete-into-basket' ,function(){
    	var productID = $( this ).data( "key" );
    	var _this = $(this);
    	$.ajax({
    		url:"/delete-into-basket",
    		type:"post",
    		data:{_token:csrfToken,productID:productID},
    		success: function(result){
    			_this.parents(".single_basket_product").remove()
    			updateCountBaskets();
    			allPriceBasket();
    		}
    	})
    })




})