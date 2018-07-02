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
                    
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">Bir Bakışta İYTE</span>
                            <span class="btn__icon icon-logo-white"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">Teknopark İzmir</span>
                            <span class="btn__icon icon-teknopark-logo"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">AKTS</span>
                            <span class="btn__icon icon-akts"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">Endüstriyel Hizmet Kataloğu</span>
                            <span class="btn__icon icon-factory"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">Uluslararası İlişkiler Ofisi</span>
                            <span class="btn__icon icon-globe-network"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">Kütüphane</span>
                            <span class="btn__icon icon-book3"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">İYTE Webmail</span>
                            <span class="btn__icon icon-mail"></span>
                        </a>
                    </div>
                    <div class="footer__buttons--item">
                        <a href="#" class="btn bordered">
                            <span class="btn__tooltip">ÖBS</span>
                            <span class="btn__icon icon-presentation2"></span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="footer__contact">
                    <h4>İzmir Yüksek Teknoloji Enstitüsü</h4>
                    <p><span class="icon-location"></span> Gülbahçe Kampüsü 35430 Urla İzmir Türkiye</p>
                    <p><span class="icon-phone"></span> +90 232 750 60 00</p>
                    <p><span class="icon-mail"></span> <a href="mailto:info@iyte.edu.tr">info@iyte.edu.tr</a></p>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="footer__map" id="footer_map">

                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer__copyright">
                    © Copyright İzmir Yüksek Teknoloji Enstitüsü - 2018
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
