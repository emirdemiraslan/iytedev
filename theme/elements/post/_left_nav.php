
<aside class="page_sub_menu">
    <h2 class="parent_title">
    <?php
if($post->post_parent) {
$parent_title = get_the_title($post->post_parent);
echo $parent_title;
}
else {
echo get_the_title($post->ID);
}
?>
    </h2>
    
<?php MOZ_Menu::nav_menu('primary', array('selective_menu'=>'true')); ?>
    
</aside>