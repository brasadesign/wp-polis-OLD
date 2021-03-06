<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 27/05/14
 * Time: 11:41
 */
class widget_acervo extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_acervo', 'description' => 'Acervo');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Acervo','Acervo', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$text = apply_filters( 'widget_acervo', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$link = apply_filters( 'widget_acervo', empty( $instance['link'] ) ? '' : $instance['link'], $instance );?>
		<div class="col-md-12 acervo">
			<div class="col-md-6 description">
				<?php echo $text; ?>
			</div>
			<a class="btn-todos" href="<?php echo $link; ?>">VER TODOS</a>
		</div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['link'] = strip_tags($new_instance['link']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'link' => '', 'text' => '' ) );
		$link = strip_tags($instance['link']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Link:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}

class widget_midia extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_midia', 'description' => 'Midia');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Midia','Midia', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_midia', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$title = apply_filters( 'widget_midia', empty( $instance['title'] ) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'widget_midia', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$link = apply_filters( 'widget_midia', empty( $instance['link'] ) ? '' : $instance['link'], $instance );?>
		<div class="col-md-12 midia">
			<div class="col-md-12">
				<div class="title">
					<?php echo $title;?>
				</div>
				<div class="description">
					<?php echo $text; ?>
				</div>
			</div>
			<a class="btn-todos" href="<?php echo $link; ?>">VER TODOS</a>
		</div>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(  'title' => '', 'link' => '', 'text' => '') );
		$title = strip_tags($instance['title']);
		$link = strip_tags($instance['link']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Link:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}


class widget_projetos extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_projetos', 'description' => 'Projetos');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Projetos','Projetos', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_projetos', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$title = apply_filters( 'widget_projetos', empty( $instance['title'] ) ? '' : $instance['title'], $instance );
		$text = apply_filters( 'widget_projetos', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
		$link = apply_filters( 'widget_projetos', empty( $instance['link'] ) ? '' : $instance['link'], $instance );?>
			<div class="col-md-12 projetos">
				<div class="col-md-12">
					<div class="title">
						<?php echo $title;?>
					</div>
					<div class="description">
						<?php echo $text; ?>
					</div>
				</div>
				<a class="btn-todos" href="<?php echo $link; ?>">VER TODOS</a>
			</div>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(  'title' => '', 'link' => '', 'text' => '') );
		$title = strip_tags($instance['title']);
		$link = strip_tags($instance['link']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Link:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}

class widget_newsletter extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_newsletter', 'description' => 'Boletim/Newsletter/Form de Cadastro de Emails');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Newsletter','Newsletter', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_newsletter', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$title = apply_filters( 'widget_newsletter', empty( $instance['title'] ) ? '' : $instance['title'], $instance );
		$form_to = apply_filters( 'widget_newsletter', empty( $instance['form_to'] ) ? '' : $instance['form_to'], $instance );
		$form_method = apply_filters( 'widget_newsletter', empty( $instance['form_method'] ) ? '' : $instance['form_method'], $instance );
		$text = apply_filters( 'widget_newsletter', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
        $areas = apply_filters( 'widget_newsletter', empty( $instance['areas'] ) ? '' : $instance['areas'], $instance );
        $hidden = apply_filters( 'widget_newsletter', empty( $instance['hidden'] ) ? '' : $instance['hidden'], $instance );
        ?>

        <form class="col-md-12 newsletter" method="<?php echo $form_method; ?>" action="<?php echo $form_to ?>">
			<p><?php echo $title; ?></p>
			<?php echo $text; ?>
			<input type="text" placeholder="NOME" class="col-md-12" name="SMT_nome">
            <div class="clear-mob"></div>
			<select class="col-md-12" name="SMT_area">
                <option value="" disabled selected>Áreas de Interesse</option>
                <?php echo $areas; ?>
			</select>
			<input type="tel" placeholder="TEL: ( )" class="col-md-12" name="SMT_telefone_residencial">
			<input type="email" placeholder="Informe seu email" class="col-md-8" name="SMT_email">
            <?php echo $hidden; ?>
			<button class="col-md-3 pull-right">Enviar</button>
		</form>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['form_to'] = strip_tags($new_instance['form_to']);
		$instance['form_method'] = strip_tags($new_instance['form_method']);
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['areas'] =  $new_instance['areas'];
        $instance['hidden'] =  $new_instance['hidden'];

        if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(  'title' => '', 'form_to' => '', 'text' => '', 'form_method' => '') );
		$title = strip_tags($instance['title']);
		$form_to = strip_tags($instance['form_to']);
		$form_method = strip_tags($instance['form_method']);
		$text = esc_textarea($instance['text']);
        $areas = esc_textarea($instance['areas']);
        $hidden = esc_textarea($instance['hidden']);

        ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('form_to'); ?>"><?php echo 'Endereço de envio do formulario (A.K.A action=""):'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('form_to'); ?>" name="<?php echo $this->get_field_name('form_to'); ?>" type="text" value="<?php echo esc_attr($form_to); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Metodo de envio do formulario (GET/POST/etc):'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('form_method'); ?>" name="<?php echo $this->get_field_name('form_method'); ?>" type="text" value="<?php echo esc_attr($form_method); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('areas'); ?>"><?php echo 'Areas de interesse: (Em HTML)'; ?></label>
        <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('areas'); ?>" name="<?php echo $this->get_field_name('areas'); ?>"><?php echo $areas; ?></textarea>

        <p><label for="<?php echo $this->get_field_id('hidden'); ?>"><?php echo 'Campos adicionais ou escondidos:'; ?></label>
		<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('hidden'); ?>" name="<?php echo $this->get_field_name('hidden'); ?>"><?php echo $hidden; ?></textarea>

        <p><label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Texto:'; ?></label>
        <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
    <?php
	}
}


class widget_home_footer extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_home_footer', 'description' => 'Home');
		$control_ops = array('width' => 400, 'height' => 350);
		parent::__construct('Home','Home', $widget_ops, $control_ops);
	}

	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_home_footer', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		/**
		 * Filter the content of the Text widget.
		 *
		 * @since 2.3.0
		 *
		 * @param string    $widget_text The widget content.
		 * @param WP_Widget $instance    WP_Widget instance.
		 */
		$title = apply_filters( 'widget_home_footer', empty( $instance['title'] ) ? '' : $instance['title'], $instance );
		$link = apply_filters( 'widget_home_footer', empty( $instance['link'] ) ? '' : $instance['link'], $instance );
		$text_link = apply_filters( 'widget_home_footer', empty( $instance['text_link'] ) ? '' : $instance['text_link'], $instance );
		$css_class = apply_filters( 'widget_home_footer', empty( $instance['css_class'] ) ? '' : $instance['css_class'], $instance );
		$text = apply_filters( 'widget_home_footer', empty( $instance['text'] ) ? '' : $instance['text'], $instance );?>
		<?php echo $args['before_widget']; ?>
		<i class="col-md-3 icon <?php echo $css_class;?>"></i>
		<p class="col-md-9 title"><?php echo $title;?></p>
		<div class="col-md-12 description">
			<?php echo $text; ?>
		</div>
		<a href="<?php echo $link ?>"><?php echo $text_link;?></a>
		<?php echo $args['after_widget']; ?>
	<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['text_link'] = strip_tags($new_instance['text_link']);
		$instance['css_class'] = strip_tags($new_instance['css_class']);
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(  'title' => '', 'text' => '',  'link' => '',  'text_link' => '',  'css_class' => '') );
		$title = strip_tags($instance['title']);
		$link = strip_tags($instance['link']);
		$css_class = strip_tags($instance['css_class']);
		$text_link = strip_tags($instance['text_link']);
		$text = esc_textarea($instance['text']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Titulo:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php echo 'Endereço do Link'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('text_link'); ?>"><?php echo 'Frase do Link'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text_link'); ?>" name="<?php echo $this->get_field_name('text_link'); ?>" type="text" value="<?php echo esc_attr($text_link); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('css_class'); ?>"><?php echo 'Classe CSS do Icone:'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('css_class'); ?>" name="<?php echo $this->get_field_name('css_class'); ?>" type="text" value="<?php echo esc_attr($css_class); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php echo 'Texto:'; ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
	<?php
	}
}


class widget_noticias extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'widget_noticias', 

			// Widget name will appear in UI
			__('Outras Notícias', 'widget_domain'), 

			// Widget description
			array( 'description' => __( 'Adiciona uma listagem com Outras Notícias', 'widget_domain' ), ) 
			);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

	
		$args_noticias = array(
					'posts_per_page'   => 3,
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'noticias',
					'post_status'      => 'publish',
				);
		// the query
		$posts_noticias = new WP_Query( $args_noticias );

		if ( $posts_noticias->have_posts() ) : ?>

			<div class='col-md-12 noticias'>
		    <ul>

			<!-- the loop -->
			<?php while ( $posts_noticias->have_posts() ) : $posts_noticias->the_post(); ?>
				<li>
					<div class="desc">
						<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
				</li>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

			<a class="btn-todos" href="<?php echo $link; ?>">Ver todas</a>
		    </ul>
			</div>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

		<?php 
		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}



function theme_register_widgets() {
	register_widget( 'widget_acervo' );
	register_widget( 'widget_midia' );
	register_widget( 'widget_projetos' );
	register_widget( 'widget_newsletter' );
	register_widget( 'widget_home_footer' );
	register_widget( 'widget_noticias' );
}

add_action( 'widgets_init', 'theme_register_widgets' );
