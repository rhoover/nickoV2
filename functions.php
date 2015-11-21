<?php
/**
* nicko functions and definitions
*
* @package nicko
*/

/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) {
  $content_width = 640; /* pixels */
}

if ( ! function_exists( 'nicko_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function nicko_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on nicko, use a find and replace
   * to change 'nicko' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'nicko', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
      'primary' => esc_html__( 'Main Menu', 'nicko' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
      'aside', 'image', 'video', 'quote', 'link',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'nicko_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
  ) ) );
}
endif; // nicko_setup
add_action( 'after_setup_theme', 'nicko_setup' );

/**
* Register widget area.
*
* @link http://codex.wordpress.org/Function_Reference/register_sidebar
*/
function nicko_widgets_init() {
  register_sidebar( array(
      'name'          => esc_html__( 'Sidebar', 'nicko' ),
      'id'            => 'sidebar-1',
      'description'   => '',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
  ) );
}
add_action( 'widgets_init', 'nicko_widgets_init' );

/**
* Remove Extraneous Crap
*/
remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra');
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post._wp_head
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );

function rah_remove_version() {return '';}
add_filter('the_generator', 'rah_remove_version');

/**
* Enqueue scripts and styles.
*/
function nicko_styles() {
  wp_enqueue_style( 'nicko-style', get_stylesheet_uri(), false, null, 'screen, projection'  );
  $style_in_head_element = '.body{margin:0px;}.header{position:fixed;width:100%;z-index:50;padding-top:.5em;padding-bottom:.5em;background-color:transparent;background-image:-moz-linear-gradient(#708e4e,rgba(122,155,85,0.35));background-image:-webkit-linear-gradient(#708e4e,rgba(122,155,85,0.35));background-image:linear-gradient(#708e4e,rgba(122,155,85,0.35));border-bottom:0.1em solid rgba(63,80,44,0.15);-moz-box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);-webkit-box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);}@media(min-width:60em){.header-text{padding-left:3.1328320802%;}}.header-text{font-family: Roboto-Bold,Helvetica,Arial, sans-serif;text-decoration:none;font-size:2.5em;line-height:1.5231428571em;padding-left:14.2656641604%;color:whitesmoke;text-shadow:rgba(63,80,44,0.4)1px 1px 0px;}.header-logo{display:block;position:fixed;overflow:visible;margin-left:6.2656641604%}';
  wp_add_inline_style('nicko-style', $style_in_head_element);
}
add_action('wp_enqueue_scripts', 'nicko_styles');

$localConfig = $_SERVER['DOCUMENT_ROOT'] . '/production-checklist.txt';
if (file_exists($localConfig)) {
  add_action( 'wp_enqueue_scripts', 'nicko_angular' );
  add_action( 'wp_enqueue_scripts', 'nicko_third_party' );
  add_action( 'wp_enqueue_scripts', 'nicko_site_scripts' );
  add_action( 'wp_enqueue_scripts', 'nicko_dash_scripts' );

  function nicko_angular() {

      if( !is_admin() ) {

          //angular
          wp_enqueue_script('angularjs', get_template_directory_uri() . '/libs/angular/angular.js', array(), null, true);
          wp_enqueue_script('angularjs-touch', get_template_directory_uri() . '/libs/angular-touch/angular-touch.js', array(), null, true);
          wp_enqueue_script('angularjs-route', get_template_directory_uri() . '/libs/angular-route/angular-route.js', array(), null, true);
          wp_enqueue_script('angularjs-animate', get_template_directory_uri() . '/libs/angular-animate/angular-animate.js', array(), null, true);
          wp_enqueue_script('angularjs-messages', get_template_directory_uri() . '/libs/angular-messages/angular-messages.js', array(), null, true);
          wp_enqueue_script('angularjs-cookies', get_template_directory_uri() . '/libs/angular-cookies/angular-cookies.js', array(), null, true);

          if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
              wp_enqueue_script( 'comment-reply' );
          }
      } //end !admin
  } //end nicko_angular

  function nicko_third_party() {

      if( !is_admin() ) {
          wp_enqueue_script('firebase', get_template_directory_uri() . '/libs/firebase/firebase.js', array(), null, true);
          wp_enqueue_script('angularfire', get_template_directory_uri() . '/libs/angularfire/dist/angularfire.js', array(), null, true);
          wp_enqueue_script('moment', get_template_directory_uri() . '/libs/moment/moment.js', array(), null, true);
          wp_enqueue_script('pikaday', get_template_directory_uri() . '/libs/pikaday/pikaday.js', array(), null, true);
          wp_enqueue_script('pikaday-angular', get_template_directory_uri() . '/libs/pikaday-angular/pikaday-angular.js', array(), null, true);
      }

  } //end third_party

  function nicko_site_scripts() {
    if( !is_admin() && !is_page('Dashboard') ) {

        wp_enqueue_script('nicko', get_template_directory_uri() . '/app-site/nicko.js', array(), null, true);

        wp_enqueue_script('nickoBoot', get_template_directory_uri() . '/app-site/bootstrap/nickoSite.boot-module.js', array(), null, true);
        wp_enqueue_script('nickoConfig', get_template_directory_uri() . '/app-site/bootstrap/assortedConfigs-config.js', array(), null, true);
        wp_enqueue_script('nickoRouting', get_template_directory_uri() . '/app-site/bootstrap/viewRouting-config.js', array(), null, true);

        wp_enqueue_script('nickoUtilis', get_template_directory_uri() . '/app-site/utilities/nickoSite-utils-module.js', array(), null, true);

        wp_enqueue_script('nickoResponsive', get_template_directory_uri() . '/app-site/utilities/global/responsiveTrigger-directive.js', array(), null, true);
        wp_enqueue_script('nickoInputField', get_template_directory_uri() . '/app-site/utilities/global/inputFieldDisplay-directive.js', array(), null, true);
        wp_enqueue_script('nickoPreventEnter', get_template_directory_uri() . '/app-site/utilities/global/preventEnter-directive.js', array(), null, true);
        wp_enqueue_script('nickoButtonClick', get_template_directory_uri() . '/app-site/utilities/global/buttonClick-directive.js', array(), null, true);
        wp_enqueue_script('nickoFirebaseURL', get_template_directory_uri() . '/app-site/utilities/firebase/root-url-constant.js', array(), null, true);
        wp_enqueue_script('nickoCompanyStore', get_template_directory_uri() . '/app-site/utilities/stores/userCompanyMetaStore-factory.js', array(), null, true);
        wp_enqueue_script('nickoCrewStore', get_template_directory_uri() . '/app-site/utilities/stores/crewLeaderStore-factory.js', array(), null, true);

        wp_enqueue_script('nickoPages', get_template_directory_uri() . '/app-site/pages/nickoSite-pages-module.js', array(), null, true);

        wp_enqueue_script('nickoSignup', get_template_directory_uri() . '/app-site/pages/signup/SignupCtrl-controller.js', array(), null, true);
        wp_enqueue_script('nickoWait', get_template_directory_uri() . '/app-site/pages/signup/buttonWait-directive.js', array(), null, true);
        wp_enqueue_script('nickoLogin', get_template_directory_uri() . '/app-site/pages/login/LoginCtrl-controller.js', array(), null, true);
        wp_enqueue_script('nickoLoginFactory', get_template_directory_uri() . '/app-site/pages/login/logIn-factory.js', array(), null, true);
        wp_enqueue_script('nickoLoginRoles', get_template_directory_uri() . '/app-site/pages/login/roleTest-factory.js', array(), null, true);

        wp_enqueue_script('nickoDetails', get_template_directory_uri() . '/app-site/pages/details/DetailsCtrl-controller.js', array(), null, true);
        wp_enqueue_script('nickoDetailsFactory', get_template_directory_uri() . '/app-site/pages/details/details-factory.js', array(), null, true);

    } //end !admin
  } //nicko_site_scripts

function nicko_dash_scripts() {

  if( !is_admin() && is_page('Dashboard') ) {

    wp_enqueue_script('nickoDash', get_template_directory_uri() . '/app-dash/nickoDash.js', array(), null, true);

    wp_enqueue_script('nickoDashBoot', get_template_directory_uri() . '/app-dash/bootstrap/nickoDash-boot-module.js', array(), null, true);
    wp_enqueue_script('nickoDashConfig', get_template_directory_uri() . '/app-dash/bootstrap/assortedConfigs-config.js', array(), null, true);
    wp_enqueue_script('nickoDashRouting', get_template_directory_uri() . '/app-dash/bootstrap/viewRouting-config.js', array(), null, true);

    wp_enqueue_script('nickoDashUtilis', get_template_directory_uri() . '/app-dash/utilities/nickoDash-utils-module.js', array(), null, true);

    wp_enqueue_script('nickoDashResponsive', get_template_directory_uri() . '/app-dash/utilities/global/responsiveTrigger-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashInputField', get_template_directory_uri() . '/app-dash/utilities/global/inputFieldDisplay-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashPreventEnter', get_template_directory_uri() . '/app-dash/utilities/global/preventEnter-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashButtonClick', get_template_directory_uri() . '/app-dash/utilities/global/buttonClick-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashDataSort', get_template_directory_uri() . '/app-dash/utilities/global/dashDataSort-filter.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchClients', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchClients-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchInvoiceOptions', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchInvoiceOptions-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchJobFreqs', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchJobFreqs-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchJobTypes', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchJobTypes-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchStates', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchStates-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFetchJobs', get_template_directory_uri() . '/app-dash/utilities/global/fetch/fetchJobs-factory.js', array(), null, true);
    wp_enqueue_script('nickoDashFirebaseURL', get_template_directory_uri() . '/app-dash/utilities/firebase/root-url-constant.js', array(), null, true);
    wp_enqueue_script('nickoDashCrewStore', get_template_directory_uri() . '/app-dash/utilities/stores/crewLeaderStore-factory.js', array(), null, true);

    wp_enqueue_script('nickoDashModule', get_template_directory_uri() . '/app-dash/dashboard/nickoDash-dash-module.js', array(), null, true);


    wp_enqueue_script('nickoDashUCM', get_template_directory_uri() . '/app-dash/dashboard/global/userCompanyMeta-factory.js', array(), null, true);
    wp_enqueue_script('nickoCompanyHeader', get_template_directory_uri() . '/app-dash/dashboard/global/companyNameHeader-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashViewBtn', get_template_directory_uri() . '/app-dash/dashboard/global/subViewButton-directive.js', array(), null, true);

    wp_enqueue_script('nickoDashMenuNav', get_template_directory_uri() . '/app-dash/dashboard/menu/menuNavButton-directive.js', array(), null, true);
    wp_enqueue_script('nickoDashHomeCtrl', get_template_directory_uri() . '/app-dash/dashboard/home/DashHomeCtrl-controller.js', array(), null, true);

    wp_enqueue_script('nickoDashClientsCtrl', get_template_directory_uri() . '/app-dash/dashboard/clients/DashClientsCtrl-controller.js', array(), null, true);
    wp_enqueue_script('nickoDashAddClient', get_template_directory_uri() . '/app-dash/dashboard/clients/clientsAdd-factory.js', array(), null, true);

    wp_enqueue_script('nickoDashJobsCtrl', get_template_directory_uri() . '/app-dash/dashboard/jobs/DashJobsCtrl-controller.js', array(), null, true);

    wp_enqueue_script('nickoDashInvoicesCtrl', get_template_directory_uri() . '/app-dash/dashboard/invoices/DashInvoicesCtrl-controller.js', array(), null, true);
    wp_enqueue_script('nickoDashSettingsCtrl', get_template_directory_uri() . '/app-dash/dashboard/settings/DashSettingsCtrl-controller.js', array(), null, true);
    wp_enqueue_script('nickoDashHelpCtrl', get_template_directory_uri() . '/app-dash/dashboard/help/DashHelpCtrl-controller.js', array(), null, true);


  } //end !admin

} //end niko_dash_scripts

} //end if file_exists, ie add post-grunt concatenated files with else {} here

/**
*Add Template Scripts to Dashboard
*/
function dashboard_templates() {

  if( !is_admin() && is_page('Dashboard') ) {
    $server_path = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/nicko/templates-dashboard';
    $templates = array(
        $server_path . '/home.php',
        $server_path . '/clients.php',
        $server_path . '/jobs.php',
        $server_path . '/invoices.php',
        $server_path . '/settings.php',
        $server_path . '/help.php'
        );

    foreach ($templates as $template) {
        echo file_get_contents($template);
    }
  }
}
add_action('wp_footer', 'dashboard_templates');

/**
* Implement the Custom Header feature.
*/
//require get_template_directory() . '/inc/custom-header.php';

/**
* Custom template tags for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';

/**
* Custom functions that act independently of the theme templates.
*/
// require get_template_directory() . '/inc/extras.php';

/**
* Customizer additions.
*/
// require get_template_directory() . '/inc/customizer.php';

/**
* Load Jetpack compatibility file.
*/
// require get_template_directory() . '/inc/jetpack.php';
