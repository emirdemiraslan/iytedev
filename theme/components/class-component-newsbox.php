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
class Component_Newsbox {


	/**
	 * Returns a newsbox element

	 *
	 * @param string $post_type   custom post types.
	 * @param array  $opts Html element attributes.
	 *
	 * @return string
	 */
	public static function get( $post_type = 'haber', $opts = array() ) {
        //check if post exists
        $pto = get_post_type_object( $post_type );
        if($post_type == "etkinlik"){
            $pto = new stdClass;
            $pto ->labels->name="Etkinlikler";
            $pto ->labels->singular_name="etkinlik-takvimi";//slug for archive
        }
        if(is_null($pto)){
            return "<div class='error'>No Post Type</div>";
        }
        $number_of_posts = 3;
        switch ($post_type){
            case 'duyuru':
                $number_of_posts=5;
                break;
            default:
                $number_of_posts=3;
                break;
        }

        $posts = get_posts( array(
            'numberposts'   =>  $number_of_posts,
            'post_type'     =>  $post_type,
            'orderby'       =>  'date',
            'order'         =>  'DESC'
        ) );



        $html = '
        <div class="newsbox '.strtolower($pto->labels->name).'">
                <div class="newsbox__header justify-content-between align-items-center">
                    <h1 class="newsbox__header--title">
                        '.$pto->labels->name.'
                    </h1>';
                if(get_locale()=="tr_TR"){
                    $html .='<a href="/'.strtolower($pto->labels->singular_name).'" class="newsbox__header--link_all">Tüm '.$pto->labels->name.'</a>';
                }  

                $html .='</div>
                <div class="newsbox__container">';
                if ($post_type == 'etkinlik'){
                    $html .= do_shortcode( '[add_eventon_el event_order="ASC" hide_mult_occur="yes" number_of_months="12" event_count="4" event_type="24,38,39" etc_override="yes" hide_so="yes" ]' );
                }
                else{
                    $html .='<ul class="newsbox__list">';
                    foreach($posts as $p){
                        $html .='
                        <li class="newsbox__list-item ">
                            <a class="newsitem" href="'.get_post_permalink($p->ID).'">
                                ';
                        if($post_type == 'haber'){
                            $html .='
                                <div class="newsitem__thumb">
                                    ';
                                    $html .= get_the_post_thumbnail( $p->ID, 'small-news-thumb');
                            $html .='</div>';
                        }
                        else if($post_type == 'duyuru'){
                            $icon = "fa fa-file-text";
                            $categories = get_the_terms( $p->ID, 'category' );
                            foreach( $categories as $category ) {
                                $icon = get_field('icon', $category);
                                
                            }
                            $html .='
                                <div class="newsitem__icon">
                                    <span class="'.$icon.'"></span>
                                </div>';
    
                        }
                        $html .='
                                <div class="newsitem__body">
                                ';
                        if($post_type == 'haber'){
    
                            $html .='<h3 class="newsitem__title">'.$p->post_title.'</h3>';
                            $html .='<p class="newsitem__excerpt">'.$p->post_excerpt.'</p>';
    
                        }
                        else if ($post_type =='duyuru'){
                            $html .='<p class="newsitem__excerpt">'.$p->post_title.'</p>';
                        }
    
                        $html .='
                                </div>
                            </a>
                        </li>
                        ';
    
                    }
                    $html .='</ul>';
                }

                        
                        
        $html .='
                </div>
            </div>
            ';
            
		

		return $html;
    }

    public static function render( $post_type = 'haber', $opts = array() ){
        echo wp_kses( self::get($post_type), wp_kses_allowed_html( 'post' ));
    }
}