<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/07/14
 * Time: 14:39
 */
global $wp_query, $_query;
$page = (int) $_query->_page;
get_header();?>

    <section class="col-md-12 biblioteca publicacoes livros_section rm-border">
        <?php
        $args = array(
            'tax_query'  => array(
                array(
                    'taxonomy'         => 'categorias',
                    'field'            => 'slug',
                    'terms'            => 'series-e-livros',
                    'include_children' => true,
                ),
            ),
            'post_type' => 'publicacoes',
            'posts_per_page'   => 10,
            'paged'            => $page
        );
        $series = new WP_Query( $args ); ?>

        <header class="section-title">
            <h3>Séries e livros</h3>
            <a href="<?php echo home_url(); ?>/categoria/series-e-livros/" class="col-md-1 shape-todos">Ver todos</a>
        </header>

        <ul class="list_carousel publicacoes-slider">
            <?php while ( $series->have_posts() ) :
                $series->the_post();
	            $post_id = get_the_ID();
                $t = top_term('areas', 'return_slug');
                ?>

                <li class="item item-slider publicacoes" style="float:left;">
                    <div class="post_container">
                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } else {
                                    echo '<img src="' . theme() . '/img/thumb-equipe.png">';
                                } ?>
                            </a>
                        </div><!-- thumb -->
                        <div class="col-md-12 description">
                            <h3><?php the_title(); ?></h3>
                        </div><!-- .description -->
                        <div class="footer-item">
                            <?php
                            $download_id = get_field('publicacoes_download', $post_id);
                            if( !empty( $download_id ) ): ?>
                                <?php
                                $download_url = wp_get_attachment_url( $download_id );
                                $download_title = get_the_title( $download_id );
                                $file = substr( $download_url, strrpos( $download_url, '/' ) +1 );
                                $size = number_format( filesize( get_attached_file( $download_id ) ) / 1048576, 2 ) . "mb";
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="<?php echo $download_url; ?>" download="<?php echo $file; ?>">Download • <?php echo $size; ?></a>
                            <?php endif; ?>

                            <?php if( get_field('mgr_pub_download', $post_id) && empty( $download_id ) ): ?>
                                <?php
                                $mgr_download = get_campoPersonalizado('mgr_pub_download');
                                $explode_download = explode( '.', $mgr_download );
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="http://www.polis.org.br/uploads/<?php echo $explode_download[0] . "/" . $mgr_download; ?>" download="<?php echo $mgr_download; ?>">Download</a>
                            <?php endif; ?>
                            <a class="leia bg-<?php echo $t; ?>" href="<?php the_permalink(); ?>">Leia mais</a>
                        </div><!-- .footer-item -->
                    </div><!-- post_container .item-slider -->
                </li>

            <?php endwhile; ?>
        </ul>

        <div class="prev-slider" id="prev-biblioteca-series"></div>
        <div class="next-slider" id="next-biblioteca-series"></div>
        <div class="clear"></div>

    </section>
    <section class="col-md-12 publicacoes atividades biblioteca documentos_e_textos">
        <?php
        $args = array(
            'tax_query'  => array(
                array(
                    'taxonomy'         => 'categorias',
                    'field'            => 'slug',
                    'terms'            => 'documentos-e-textos',
                    'include_children' => true,
                ),
            ),
            'post_type' => 'publicacoes',
            'posts_per_page'   => 10,
            'paged'            => $page
        );
        $series = new WP_Query( $args ); ?>
        <header class="section-title">
            <h3>Documentos e textos</h3>
            <a href="<?php echo home_url(); ?>/publicacoes" class="col-md-1 shape-todos">Ver todos</a>
        </header>
        <ul class="list_carousel documentos-slider">
            <?php while ( $series->have_posts() ) :
                $series->the_post();
	            $post_id = get_the_ID();
	            $t = top_term('areas', 'return_slug');
                ?>

                <li class="item item-slider publicacoes" style="float:left;">
                    <div class="post_container">
                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } else {
                                    echo '<img src="' . theme() . '/img/thumb-equipe.png">';
                                } ?>
                            </a>
                        </div><!-- thumb -->
                        <div class="col-md-12 description">
                            <h3><?php the_title(); ?></h3>
                        </div><!-- .description -->
                        <div class="footer-item">
                            <?php
                            $download_id = get_field('publicacoes_download', $post_id);
                            if( !empty( $download_id ) ): ?>
                                <?php
                                $download_url = wp_get_attachment_url( $download_id );
                                $download_title = get_the_title( $download_id );
                                $file = substr( $download_url, strrpos( $download_url, '/' ) +1 );
                                $size = number_format( filesize( get_attached_file( $download_id ) ) / 1048576, 2 ) . "mb";
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="<?php echo $download_url; ?>" download="<?php echo $file; ?>">Download • <?php echo $size; ?></a>
                            <?php endif; ?>

                            <?php if( get_field('mgr_pub_download', $post_id) && empty( $download_id ) ): ?>
                                <?php
                                $mgr_download = get_campoPersonalizado('mgr_pub_download');
                                $explode_download = explode( '.', $mgr_download );
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="http://www.polis.org.br/uploads/<?php echo $explode_download[0] . "/" . $mgr_download; ?>" download="<?php echo $mgr_download; ?>">Download</a>
                            <?php endif; ?>
                            <a class="leia bg-<?php echo $t; ?>" href="<?php the_permalink(); ?>">Leia mais</a>
                        </div><!-- .footer-item -->
                    </div><!-- post_container .item-slider -->
                </li>

            <?php endwhile; ?>
        </ul>

        <div class="prev-slider" id="prev-biblioteca-documentos"></div>
        <div class="next-slider" id="next-biblioteca-documentos"></div>
        <div class="clear"></div>

    </section>
    <section class="col-md-12 publicacoes atividades biblioteca institucionais">
        <?php
        $args = array(
            'tax_query'  => array(
                array(
                    'taxonomy'         => 'categorias',
                    'field'            => 'slug',
                    'terms'            => 'institucionais',
                    'include_children' => true,
                ),
            ),
            'post_type' => 'publicacoes',
            'posts_per_page'   => 10,
            'paged'            => $page
        );
        $series = new WP_Query( $args ); ?>
        <header class="section-title">
            <h3>Institucionais</h3>
            <a href="" class="col-md-1 shape-todos">Ver todos</a>
        </header>
        <ul class="list_carousel institucionais-slider">
            <?php while ( $series->have_posts() ) :
                $series->the_post();
	            $post_id = get_the_ID();
	            $t = top_term('areas', 'return_slug');
                ?>

                <li class="item item-slider publicacoes" style="float:left;">
                    <div class="post_container">
                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } else {
                                    echo '<img src="' . theme() . '/img/thumb-equipe.png">';
                                } ?>
                            </a>
                        </div><!-- thumb -->
                        <div class="col-md-12 description">
                            <h3><?php the_title(); ?></h3>
                        </div><!-- .description -->
                        <div class="footer-item">
                            <?php
                            $download_id = get_field('publicacoes_download', $post_id);
                            if( !empty( $download_id ) ): ?>
                                <?php
                                $download_url = wp_get_attachment_url( $download_id );
                                $download_title = get_the_title( $download_id );
                                $file = substr( $download_url, strrpos( $download_url, '/' ) +1 );
                                $size = number_format( filesize( get_attached_file( $download_id ) ) / 1048576, 2 ) . "mb";
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="<?php echo $download_url; ?>" download="<?php echo $file; ?>">Download • <?php echo $size; ?></a>
                            <?php endif; ?>

                            <?php if( get_field('mgr_pub_download', $post_id) && empty( $download_id ) ): ?>
                                <?php
                                $mgr_download = get_campoPersonalizado('mgr_pub_download');
                                $explode_download = explode( '.', $mgr_download );
                                ?>
                                <a class="leia bg-<?php echo $t; ?>" href="http://www.polis.org.br/uploads/<?php echo $explode_download[0] . "/" . $mgr_download; ?>" download="<?php echo $mgr_download; ?>">Download</a>
                            <?php endif; ?>
                            <a class="leia bg-<?php echo $t; ?>" href="<?php the_permalink(); ?>">Leia mais</a>
                        </div><!-- .footer-item -->
                    </div><!-- post_container .item-slider -->
                </li>

            <?php endwhile; ?>
        </ul>

        <div class="prev-slider" id="prev-biblioteca-institucionais"></div>
        <div class="next-slider" id="next-biblioteca-institucionais"></div>
        <div class="clear"></div>

        <div class="container pagination">
            <div class="col-md-4 col-md-offset-4">
                <?php
                $total = $_query->total_pages;
                $big = 999999999; // need an unlikely integer
                if ($total > 1) {
                    if (!$current_page = $page)
                        $current_page = 1;
                    $format = 'page/%#%/';
                    echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => $format,
                        'current' => max(1, $page),
                        'total' => $total,
                        'mid_size' => 3,
                        'type' => 'list',
                        'prev_text' => '<',
                        'next_text' => '>',
                    ));
                }
                ?>
            </div>
        </div>

    </section>
<?php
get_footer();
?>