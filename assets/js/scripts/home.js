/* eslint-disable */
import '../vendor/slippry';

(function($){
    $(document).ready(function(){
        jQuery('#featured_news').slippry({
            // general elements & wrapper
            slippryWrapper: '<div class="sy-box news-slider" />', // wrapper to wrap everything, including pager
            elements: 'article', // elments cointaining slide content
    
            // options
            adaptiveHeight: true, // height of the sliders adapts to current 
            captions: false,
            preload:'all',
    
            // pager
            //pagerClass: 'news-pager',
    
            // transitions
            transition: 'horizontal', // fade, horizontal, kenburns, false
            pause: 8000,
            easing:'easeInOutSine',
    
            // slideshow
            autoDirection: 'next'
        });
    });
})(jQuery);


(function($){
    $(document).ready(function(){
        $('#mobilemenu .menu__item--has-children>a').on('click',function(e){
            var target = e.currentTarget;
            e.preventDefault();
            $(target).parent().find('.menu__list--submenu').toggleClass('open');
        });

        $('.toggle-mobile-menu').on('click',function(e){
            $('#mobilemenu').toggleClass('hidden');
        })

    })
})(jQuery);