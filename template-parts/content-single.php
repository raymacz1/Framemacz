<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FrameMacz
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php// framemacz_post_thumbnail(); ?>
          <header class="entry-header">
              <?php
                if (!is_active_sidebar('sidebar-1')):
                  framemacz_entry_footer();
                endif;
              ?>
              <?php
                if (is_singular()) :
                  the_title('<h1 class="entry-title">', '</h1>');
                else :
                  the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

              if ('post' === get_post_type())  : ?>
                <div class="entry-meta">
                  <?php framemacz_posted_on(); ?>
                </div> <!-- .entry-meta -->
                <?php endif; ?>
          </header><!-- .entry-header -->
        <div class="row">
          <?php if (is_active_sidebar('sidebar-1')): ?>
             <div class="entry-content col-lg-8 ">
          <?php else: ?>
             <div class="entry-content col-lg-12 ">
          <?php endif; ?>

            <?php
            the_content(sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'framemacz'),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              get_the_title()
            ));

            wp_link_pages(array(
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'framemacz'),
              'after'  => '</div>',
            ));
            framemacz_post_navigation();
            // If comments are open or we have at least one comment, load up the comment template.
            // TO DO: need alignment comments
            if (comments_open() || get_comments_number()) :
              comments_template();
            endif; ?>
          </div> <!-- entry-content -->
        <?php  get_sidebar(); ?>
        </div>  <!-- row -->
  </article>
