<?php
/**
 * Class definition for dashboard widget showing recent blog feeds from https://themebeez.com..
 *
 * @since      1.0.0
 * @package    Themebeez_Toolkit
 * @subpackage Themebeez_Toolkit/includes
 * @author     themebeez <themebeez@gmail.com>
 */

if( ! class_exists( 'Themebeez_Toolkit_Admin_Dashboard_Widget' ) ) {

    /**
     * Wordpress Admin Dashboard Management
     *
     * @since 1.2.0
     */
    class Themebeez_Toolkit_Admin_Dashboard_Widget {

        /**
         * URLs
         *
         * @var string
         * @access protected
         * @since 1.2.0
         */
        static protected $blog_feeds = 'https://themebeez.com/blog/feed/';

        static protected $theme_archive_url = 'https://themebeez.com/themes/?utm_source=dashboard&utm_medium=widget&utm_campaign=userdashboard';

        static protected $blog_page_url = 'https://themebeez.com/blog/?utm_source=dashboard&utm_medium=widget&utm_campaign=userdashboard';

        static protected $themebeez_url = 'https://themebeez.com/?utm_source=dashboard&utm_medium=widget&utm_campaign=userdashboard';

        /**
         * Dashboard widget setup
         *
         * @return void
         * @since 1.2.0
         * @access public
         */
        public static function register_dashboard_widget() {

        	global $wp_meta_boxes;

            $widget_key = 'themebeez_toolkit_dashboard_blog_feeds';

            wp_add_dashboard_widget( 'themebeez_toolkit_dashboard_blog_feeds', __('Latest Posts From Themebeez', 'themebeez-toolkit'), 'Themebeez_Toolkit_Admin_Dashboard_Widget::dasboard_widget_template' );

            // Make to top
            $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
            $widget_instance = array($widget_key => $normal_dashboard[$widget_key]);
            unset($normal_dashboard[$widget_key]);
            $sorted_dashboard = \array_merge($widget_instance, $normal_dashboard);

            $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
        }

        /**
         * Blog Posts Widget
         *
         * @return void
         * @since 1.2.0
         * @access public
         */
        public static function dasboard_widget_template() {

            $args = array('show_author' => 0, 'show_date' => 1, 'show_summary' => 0, 'items' => 10);

            $feed = static::$blog_feeds;

            wp_widget_rss_output( $feed, $args );

            $urls = array(
                'theme_url' => array(
                    'text' => __('All Themes', 'themebeez-toolkit'),
                    'url' => static::$theme_archive_url,
                    'screen_reader_text' => __('Open in a new tab', 'themebeez-toolkit'),
                    'icon' => 'dashicons dashicons-external'
                ),
                'blog_url' => array(
                    'text' => __('Blog Posts', 'themebeez-toolkit'),
                    'url' => static::$blog_page_url,
                    'screen_reader_text' => __('Open in a new tab', 'themebeez-toolkit'),
                    'icon' => 'dashicons dashicons-external'
                ), 'main_site_url' => array(
                    'text' => __('Main Site', 'themebeez-toolkit'),
                    'url' => static::$themebeez_url,
                    'screen_reader_text' => __('Open in a new tab', 'themebeez-toolkit'),
                    'icon' => 'dashicons dashicons-external'
                )
            );

            echo '<p class="community-events-footer">';

            $total_url_count = count($urls);

            $url_index = 0;

            foreach ($urls as $url_content) {

                $url_index++;

                echo '<a href="' . $url_content['url'] . '" target="_blank">';

                echo esc_html($url_content['text']);

                echo '<span class="screen-reader-text">(' . esc_html($url_content['screen_reader_text']) . ')</span> <span aria-hidden="true" class="' . esc_attr($url_content['icon']) . '"></span>';

                echo '</a>';


                echo $url_index != $total_url_count ? ' | ' : '';
            }
            echo '</p>';

        }

    }
}