<?php
        /*Template Name: Rehber Search */
        get_header();
        $kisi = get_query_var('s');
?>
<main id="rehber_search" class="rehber_search">  
    <section class="post_content">

        <article class="post_article">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="post_title">Rehber</h1>
                        </div>
                    </div>
                </div>
            </header>
            <main class="content">
                <section class="wysiwyg vanilla">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="rehber_search_wrapper">
                                    <form id="rehber_search_form" >
                                        <input type="search" class="search-field" placeholder="Ara …" value="<?php echo $kisi?>" name="s">
								        <button><i class="fa fa-search"></i></button>
                                    </form>
                                    <table id="rehber_table" class="tablepress eael-data-table">
                                        <thead>
                                            <tr class="table-header">
                                                
                                                <th style="background-color:#5f87a5">Adı Soyadı</th>
                                                <th>Ünvan</th>
                                                <th>Birim</th>
                                                <th>Telefon</th>
                                                <th>Oda No</th>
                                                <th>Fax</th>
                                                <th>Birim Telefon</th>
                                                <th>E-posta</th>
                                                <th>Web Sitesi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="row-hover">
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </article>
    </section>
</main>
<?php get_footer(); ?>