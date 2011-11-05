
(function($){ 
	    var $img = $("#img_player");
            var $a = $("#div_switch a");
            var i = 0;
	    Basket.play_interval = null;  
            function autoPlay(idx) {
                i = idx;
                clearInterval( Basket.play_interval);
                $a.removeClass("active").eq(i).addClass("active");
                $img.fadeOut(300, function () {
                    $img.attr("src", Basket.imgSrc[i]).fadeIn(800);
                });
                 Basket.play_interval = setInterval(function () {
                    var index = ++i % 3;
                    $img.fadeOut(800, function () {
                        $a.removeClass("active").eq(index).addClass("active");
                        $img.attr("src", Basket.imgSrc[index]).fadeIn(800);
                    });
                }, 6000);
            }
            //点击事件
            $a.click(function () {
                var index = $(this).data("index");
                autoPlay(index);
            }).focus(function () {
                $(this).blur();
            })
            //自动播放
            autoPlay(0);

            //SetCookie product
	    function toSendMail(){
	       var $p = $('.button-contact-now');
	       if($p){
	          $p.click(function(){
		    var contactsUrl = Basket.contactsUrl;
		     if($(this).data('select-product')){
			     var pl = $(this).data('select-product');
			     var productID = '';
			     var productName = '';
			     $('.' + pl + ' input:checkbox:checked').each(function(i){
				     productID+=$(this).val() + ',';
				     productName += $(this).attr('title') + ',';
				     //console.log(productName + productID);
			     })
			      //console.log('cookie' + Basket.Cookie.get('BasketFavProductName') + Basket.Cookie.get('BasketFavProductID'));
			      var and = (Basket.contactsUrl.indexOf('?') != -1)?'&':'?';
			       contactsUrl += and +'BasketFavProductID=' + productID + '&BasketFavProductName=' + productName;
		     }
		    location.href = contactsUrl ;
                     return false;
		  
		  })
	       
	       }
	   return  false; 
	    
	    }
	    toSendMail();
	    //发邮件

	    $('#menu-primay a[title="products_categories_menu"]').mouseenter(function(){
		    $(this).parent().addClass('current-menu-item');
		    var $s=  $('.menu-primay-container');
		    if($('#sub_menu_ct').length == 0){
                        var h = '<div id="sub_menu_ct"></div>';
		        $s.append(h);
  		        $('#sub_menu_ct').append($('#mycategoryorder-3').html());
			$('#sub_menu_ct *').attr('id','');

			$('#sub_menu_ct div').css('display','block');


		    }
	    })
	     $('#menu-primay a[title="products_categories_menu"]').click(function(){
	     return false;
	     })
	    $(document).click(function(){
	      $('#sub_menu_ct').remove();
	       $('#menu-primay a[title="products_categories_menu"]').parent().removeClass('current-menu-item');
	    })


	    
  })(jQuery)
