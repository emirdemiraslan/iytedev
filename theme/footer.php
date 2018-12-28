<?php
/**
 * Footer file common to all
 * templates
 *
 * @package @@name
 */

?>

<?php // Common footer content goes here. ?>
<footer class="footer">
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <div class="footer__buttons">
                  <?php
                  $locations=get_nav_menu_locations();
                  if(isset($locations['footer'])  )
                  {
                    $menu = get_term( $locations['footer'], 'nav_menu' );
                    $menu_items = wp_get_nav_menu_items($menu->term_id);
                    foreach( $menu_items as $menu_item ):?>
                    
                    <div class="footer__buttons--item">
                        <a href="<?php echo $menu_item->url; ?>" class="btn bordered" <?php echo (($menu_item->target !=="") ? ("target='".$menu_item->target."'") : ""); ?>>
                            <span class="btn__tooltip"><?php echo $menu_item->title; ?></span>
                            <?php if(get_field('icon', $menu_item)):?>
                            <span class="btn__icon <?php echo get_field('icon', $menu_item); ?>"></span>
                            <?php endif;?>
                        </a>
                    </div>


                  <?php
                    endforeach;
                  }
                  ?>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <?php if(get_locale()=="tr_TR"):?>
                <div class="footer__contact">
                    <h4>İzmir Yüksek Teknoloji Enstitüsü</h4>
                    <p><span class="icon-location"></span> Gülbahçe Kampüsü 35430 Urla İzmir Türkiye</p>
                    <p><span class="icon-phone"></span> +90 232 750 60 00</p>
                    <p><span class="icon-mail"></span> <a href="mailto:info@iyte.edu.tr">info@iyte.edu.tr</a></p>
                </div>
                <?php else:?>
                <div class="footer__contact">
                    <h4>İzmir Institute of Technology</h4>
                    <p><span class="icon-location"></span> Gülbahçe Kampüsü 35430 Urla İzmir Türkiye</p>
                    <p><span class="icon-phone"></span> +90 232 750 60 00</p>
                    <p><span class="icon-mail"></span> <a href="mailto:info@iyte.edu.tr">info@iyte.edu.tr</a></p>
                </div>
                <?php endif;?>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="footer__map" id="footer_map">

                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer__copyright">
                  <?php if(get_locale()=="tr_TR"):?>
                    © Copyright İzmir Yüksek Teknoloji Enstitüsü - <?php echo date("Y"); ?>
                  <?php else:?>
                  © Copyright İzmir Institute of Technology - <?php echo date("Y"); ?>
                  <?php endif;?> 
                </div>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>

<?php // </body> opens in header.php ?>
</div>
<script>

function initFooterMap() {
    // Styles a map in night mode.
    var map = new google.maps.Map(document.getElementById('footer_map'), {
        center : {
            lat: 38.319095,
            lng : 26.643206
        },
        zoom: 16,
        disableDefaultUI: true,
        zoomControl:true,
        mapTypeControl:true,
        mapTypeControlOptions:{
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU

        },
        fullscreenControl:true,
        styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#4d4d4d"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ebebeb"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#515151"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#38414e"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#cbcbcb"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9ca5b3"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#746855"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#cbcbcb"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#f3d19c"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#cbcbcb"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#6a6cda"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#515c6d"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#17263c"
      }
    ]
  }
]
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE6-HSHGtlcPgl4YVAkzdAemgI9bwkWS4&callback=initFooterMap"
    async defer></script>
</body>
</html>
<?php
