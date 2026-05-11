</div><!--end page-->	
<div id="footer-bottom">
	<div class="container2 center-bottom-footer">						
		<div class="bottom-footer-col bottom-footer-brand">		
			<span class="bottom-footer-eyebrow">Digit Waves</span>
			<p class="bottom-footer-title">Practical AI marketing, websites, and lead systems for local businesses.</p>
			<p class="bottom-footer-copy">&copy;<?= date('Y');?> Digit Waves. Built with strategy, design, and implementation in mind.</p>			
		</div>						
		<div class="bottom-footer-col bottom-footer-social">								
			<ul>									
				<li><a href="https://www.facebook.com/Digit-Waves-214232226044250/" target="_blank" rel="noopener noreferrer" aria-label="DigitWaves on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
				<li class="no-padding-right"><a href="https://x.com/DigitWaves" target="_blank" rel="noopener noreferrer" aria-label="DigitWaves on X"><i class="fa-brands fa-x-twitter"></i></a></li>
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
            var heroSelectors = [
                '.page-id-25 .dw-services-hero',
                '.dw-service-interior-hero',
                '.page-id-1024 .dw-work-hero',
                '.category-hero',
                '.articles-hero',
                '.home .dw-premium-hero',
                '.home .elementor-top-section:first-of-type',
                '.home .elementor-section-wrap > .elementor-top-section:first-of-type',
                '.home .elementor-location-single .elementor-top-section:first-of-type',
                '.home rs-module-wrap:first',
                '.home .rev_slider_wrapper:first',
                '.home .rev_slider:first'
            ];
            var $hero = $(heroSelectors.join(', ')).filter(':visible').first();

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
        $(window).on('load scroll resize', toggleHeaderState);
	})(jQuery);		 
</script>		 
<script>
    (function(){
        var links = ['/web-design/', '/ai-enabled-websites/', '/ugc-ads-short-videos/'];

        function visibleCards() {
            return Array.prototype.filter.call(
                document.querySelectorAll('.home .dw-premium-trust .dw-stat'),
                function(card) {
                    return card.offsetParent !== null;
                }
            );
        }

        function cardTarget(card) {
            if (!card) {
                return '';
            }

            var explicit = card.getAttribute('data-market-href');
            if (explicit) {
                return explicit;
            }

            var cards = visibleCards();
            var index = cards.indexOf(card);

            return links[index] || '';
        }

        function bindCards() {
            if (!document.body || !document.body.classList.contains('home')) {
                return;
            }

            visibleCards().forEach(function(card, index) {
                if (!links[index]) {
                    return;
                }

                card.setAttribute('data-market-href', links[index]);
                card.setAttribute('role', 'link');
                card.setAttribute('tabindex', '0');

                if (card.dataset.dwCardFallbackReady) {
                    return;
                }

                card.dataset.dwCardFallbackReady = 'true';
                card.addEventListener('click', function(event) {
                    if (event.target.closest('a, button, input, select, textarea')) {
                        return;
                    }

                    var target = cardTarget(card);
                    if (target) {
                        window.location.href = target;
                    }
                }, true);

                card.addEventListener('keydown', function(event) {
                    if (event.key !== 'Enter' && event.key !== ' ') {
                        return;
                    }

                    var target = cardTarget(card);
                    if (target) {
                        event.preventDefault();
                        window.location.href = target;
                    }
                }, true);
            });
        }

        bindCards();
        document.addEventListener('DOMContentLoaded', bindCards);
        window.addEventListener('load', bindCards);
        window.setTimeout(bindCards, 600);
        window.setTimeout(bindCards, 1600);
    })();
</script>
<?php wp_footer(); ?>	
</body>
</html>
