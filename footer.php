</div><!--end page-->	
<div id="footer-bottom">
	<div class="container2 center-bottom-footer">						
		<div class="bottom-footer-col left first">		
			<p>Digit Waves &copy;<?= date('Y');?></p>			
		</div>						
		<div class="bottom-footer-col">								
			<ul>									
				<li><a href="https://www.facebook.com/Digit-Waves-214232226044250/" target="_blank" ><i class="fab large-font fa-facebook-f"></i></a></li>									
				<li class="no-padding-right"><a href="https://twitter.com/DigitWaves" target="_blank" ><i class="fab large-font fa-twitter"></i></a></li>								
			</ul>											
		</div>					
	</div>				
</div><!--end bottom footer-->
	
</div><!--end wrapper-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		
<!-- Compiled and minified JavaScript -->		
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/js/materialize.min.js"></script>	
<!-- Compiled and minified CSS -->		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.2/css/materialize.min.css">		
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">			
<script>		 
	(function($){ 			
		$('#mobile-menu-toggle').on('click',function(){				
			$('#mobile-menu-overlay').css('display','block');				
			$(this).find('span').css('color','#fff');			
		});			
		
		$('.parallax').parallax();						
		
		if($(window).width() < 1000){				
			$('.offers .parallax img').prop('img','https://digitwaves.com/wp-content/uploads/2018/06/lady-1000.jpg')
		} else {				
			$('.offers .parallax img').prop('img','https://digitwaves.com/wp-content/uploads/2018/06/lady-1000.jpg');			
		}

        function getHeroBottomOffset() {
            var $hero = $('.home .elementor-top-section:first-of-type, .home .elementor-section-wrap > .elementor-top-section:first-of-type, .home .elementor-location-single .elementor-top-section:first-of-type, .home rs-module-wrap:first, .home .rev_slider_wrapper:first, .home .rev_slider:first').filter(':visible').first();

            if (!$hero.length) {
                return 80;
            }

            return Math.max(60, ($hero.offset().top + $hero.outerHeight()) - $('#wrapper > header').outerHeight());
        }

        function toggleHeaderState() {
            var threshold = getHeroBottomOffset();

            if ($(window).scrollTop() >= threshold) {
                $('body').addClass('dw-header-solid');
            } else {
                $('body').removeClass('dw-header-solid');
            }
        }

        toggleHeaderState();
        $(window).on('scroll resize', toggleHeaderState);
	})(jQuery);		 
</script>		 
<?php wp_footer(); ?>	
</body>
</html>
