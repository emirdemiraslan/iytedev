<?php
/**
 * WordPress Newsbox Component
 *
 * @author Max G J Panas <http://maxpanas.com>
 * @package @@name
 */

/**
 * Class MOZ_Html
 */
class Content_Newsbox {


	/**
	 * Returns a newsbox element

	 *
	 * @param string $post_type   custom post types.
	 * @param array  $opts Html element attributes.
	 *
	 * @return string
	 */
	public static function get( $post_type = 'haber', $opts = array() ) {


        $html = '
        <div class="newsbox haberler">
                <div class="newsbox__header justify-content-between align-items-center">
                    <h1 class="newsbox__header--title">
                        haberler
                    </h1>
                    <a href="#" class="newsbox__header--link_all">Tüm Haberler</a>
                </div>
                <div class="newsbox__container">
                    <ul class="newsbox__list">
                        <li class="newsbox__list-item ">
                            <a class="newsitem" href="#">
                                
                                <div class="newsitem__thumb">
                                    <img src="/wp-content/uploads/2018/06/11A1941-70x70.jpg" alt="">
                                </div>
                                <div class="newsitem__body">
                                    <h3 class="newsitem__title">Bedenimizin Sessiz Dili</h3>
                                    <p class="newsitem__excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus neque sodales viverra porta. Cras cursus, nisl et semper tempus, ligula risus pulvinar risus, nec ultrices ligula nulla viverra orci. Nulla facilisi. Phasellus luctus ex at iaculis fringilla. Maecenas urna eros, mattis vel arcu at, sollicitudin dignissim est.</p>
                                </div>
                            </a>
                        </li>
                        <li class="newsbox__list-item ">
                            <a class="newsitem" href="#">
                                
                                <div class="newsitem__thumb">
                                    <img src="/wp-content/uploads/2018/06/11A1941-70x70.jpg" alt="">
                                </div>
                                <div class="newsitem__body">
                                    <h3 class="newsitem__title">Bedenimizin Sessiz Dili</h3>
                                    <p class="newsitem__excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus neque sodales viverra porta. Cras cursus, nisl et semper tempus, ligula risus pulvinar risus, nec ultrices ligula nulla viverra orci. Nulla facilisi. Phasellus luctus ex at iaculis fringilla. Maecenas urna eros, mattis vel arcu at, sollicitudin dignissim est.</p>
                                </div>
                            </a>
                        </li>
                        <li class="newsbox__list-item ">
                            <a class="newsitem" href="#">
                                
                                <div class="newsitem__thumb">
                                    <img src="/wp-content/uploads/2018/06/11A1941-70x70.jpg" alt="">
                                </div>
                                <div class="newsitem__body">
                                    <h3 class="newsitem__title">Bedenimizin Sessiz Dili</h3>
                                    <p class="newsitem__excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus neque sodales viverra porta. Cras cursus, nisl et semper tempus, ligula risus pulvinar risus, nec ultrices ligula nulla viverra orci. Nulla facilisi. Phasellus luctus ex at iaculis fringilla. Maecenas urna eros, mattis vel arcu at, sollicitudin dignissim est.</p>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            ';
		

		return $html;
    }

    public static function render( $post_type = 'haber', $opts = array() ){
        echo wp_kses( $self::get($post_type), wp_kses_allowed_html( 'post' ));
    }
}