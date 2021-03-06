<?php
/**
 * The template part for displaying Post
 *
 * @package VW Solar Energy 
 * @subpackage vw_solar_energy
 * @since VW Solar Energy 1.0
 */
?>
<?php 
  $vw_solar_energy_archive_year  = get_the_time('Y'); 
  $vw_solar_energy_archive_month = get_the_time('m'); 
  $vw_solar_energy_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box ">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_solar_energy_toggle_postdate',true) != '' || get_theme_mod( 'vw_solar_energy_toggle_author',true) != '' || get_theme_mod( 'vw_solar_energy_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_solar_energy_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_solar_energy_archive_year, $vw_solar_energy_archive_month, $vw_solar_energy_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_solar_energy_toggle_author',true)==1){ ?>
              <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_solar_energy_toggle_comments',true)==1){ ?>
              <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-solar-energy'), __('0 Comments', 'vw-solar-energy'), __('% Comments', 'vw-solar-energy') ); ?> </span>
          <?php } ?>
          <hr>
        </div> 
      <?php } ?>      
      <div class="entry-content">
        <p>
          <?php $vw_solar_energy_theme_lay = get_theme_mod( 'vw_solar_energy_excerpt_settings','Excerpt');
          if($vw_solar_energy_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($vw_solar_energy_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_solar_energy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_solar_energy_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_solar_energy_excerpt_suffix',''));?></p>
            <?php }?>
          <?php }?>
        </p>
      </div>
      <?php if( get_theme_mod('vw_solar_energy_button_text','READ MORE') != ''){ ?>
        <div class="content-bttn">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html(get_theme_mod('vw_solar_energy_button_text',__('READ MORE','vw-solar-energy')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_solar_energy_button_text',__('READ MORE','vw-solar-energy')));?></span></a>
        </div>
      <?php } ?>
    </div>
  </div>
</article>