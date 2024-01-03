<?php

namespace MusMagTheme\Data_Generator;

defined('WPINC') || die;

class Pagination
{
  public function get_the_posts_pagination( $args = array() ) {
    global $wp_query;

    $navigation = '';

    // Don't print empty markup if there's only one page.
    if ( $wp_query->max_num_pages > 1 ) {
      // Make sure the nav element has an aria-label attribute: fallback to the screen reader text.
      if ( ! empty( $args['screen_reader_text'] ) && empty( $args['aria_label'] ) ) {
        $args['aria_label'] = $args['screen_reader_text'];
      }

      $args = wp_parse_args(
        $args,
        array(
          'mid_size'           => 1,
          'prev_text'          => _x( 'Previous', 'previous set of posts' ),
          'next_text'          => _x( 'Next', 'next set of posts' ),
          'screen_reader_text' => __( 'Posts navigation' ),
          'aria_label'         => __( 'Posts' ),
          'class'              => 'pagination-container',
        )
      );

      /**
       * Filters the arguments for posts pagination links.
       *
       * @since 6.1.0
       *
       * @param array $args {
       *     Optional. Default pagination arguments, see paginate_links().
       *
       *     @type string $screen_reader_text Screen reader text for navigation element.
       *                                      Default 'Posts navigation'.
       *     @type string $aria_label         ARIA label text for the nav element. Default 'Posts'.
       *     @type string $class              Custom class for the nav element. Default 'pagination'.
       * }
       */
      $args = apply_filters( 'the_posts_pagination_args', $args );

      // Make sure we get a string back. Plain is the next best thing.
      if ( isset( $args['type'] ) && 'array' === $args['type'] ) {
        $args['type'] = 'plain';
      }

      // Set up paginated links.
      $links = paginate_links( $args );

      // Set up paginated links with bootstrap markup.
      $links = $this->_navigation_markup_for_bootstrap($links);

      if ( $links ) {
        $navigation = $this->_navigation_markup( $links, $args['class'], $args['screen_reader_text'], $args['aria_label'] );
      }
    }

    return $navigation;
  }

  private function _navigation_markup( $links, $css_class = 'posts-navigation', $screen_reader_text = '', $aria_label = '' ) {
    if ( empty( $screen_reader_text ) ) {
      $screen_reader_text = /* translators: Hidden accessibility text. */ __( 'Posts navigation' );
    }
    if ( empty( $aria_label ) ) {
      $aria_label = $screen_reader_text;
    }

    $template = '
    <nav class="%1$s" aria-label="%4$s">
      <h2 class="screen-reader-text">%2$s</h2>
      <div class="nav-links pagination justify-content-center">%3$s</div>
    </nav>';

    /**
     * Filters the navigation markup template.
     *
     * Note: The filtered template HTML must contain specifiers for the navigation
     * class (%1$s), the screen-reader-text value (%2$s), placement of the navigation
     * links (%3$s), and ARIA label text if screen-reader-text does not fit that (%4$s):
     *
     *     <nav class="navigation %1$s" aria-label="%4$s">
     *         <h2 class="screen-reader-text">%2$s</h2>
     *         <div class="nav-links">%3$s</div>
     *     </nav>
     *
     * @since 4.4.0
     *
     * @param string $template  The default template.
     * @param string $css_class The class passed by the calling function.
     * @return string Navigation template.
     */
    $template = apply_filters( 'navigation_markup_template', $template, $css_class );

    return sprintf( $template, sanitize_html_class( $css_class ), esc_html( $screen_reader_text ), $links, esc_attr( $aria_label ) );
  }

  private function _navigation_markup_for_bootstrap($links)
  {
      $links_array = explode(PHP_EOL, $links);

      $links_manipulated_for_bootstrap = array_map(function($link) {
        $link = str_replace('page-numbers', 'page-numbers page-link', $link);
        $link = str_replace('current', 'current active', $link);
        $link = '<span class="page-item">'.$link.'</span>';

        return $link;
      }, $links_array);

      return implode(PHP_EOL, $links_manipulated_for_bootstrap);
  }
}