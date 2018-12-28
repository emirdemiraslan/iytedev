<?php
/**
 * 404 Error page template
 *
 * @package @@name
 */

?>
<?php get_header(); ?>

<h1 style="text-align:center;padding:200px 0;color:#4d4d4d;">
<span style="font-size: 5em;margin-bottom: 50px;display: inline-block;">404</span><br/>
<span>
<?php if(get_locale()=="tr_TR"){
	echo "İçerik Bulunamadı";
}else{
	echo "Content Not Found";
}
?>
</span>
</h1>

<?php get_footer();
