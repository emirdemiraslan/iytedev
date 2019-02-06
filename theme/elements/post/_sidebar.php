<aside>
<p>
    <?php Component_Newsbox::render('duyuru');?>
</p>
<?php if(get_locale()=="tr_TR"):?>
<p>
    <?php Component_Newsbox::render('haber'); ?>
</p>

<div class="newsbox etkinlikler">

    <div class="newsbox__header justify-content-between align-items-center">
        <h1 class="newsbox__header--title">
            Etkinlikler
        </h1>
        <a href="/etkinlik-takvimi" class="newsbox__header--link_all">Tüm Etkinlikler</a>
    </div>
    <?php echo do_shortcode( '[add_eventon_el event_order="DESC" hide_mult_occur="yes" number_of_months="12" event_count="4" event_type="24,38,39" etc_override="yes" hide_so="yes" ]');?>
</div>
<?php endif;?>

</aside>
