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
$('.nav--desktop>.menu--primary>.menu__list').slicknav({
    prependTo:'#mobilemenu'
});
})(jQuery);