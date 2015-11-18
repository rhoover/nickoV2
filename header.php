<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nicko
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>

<!-- Generic -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="NickoLogistics">
<meta name="author" content="Robin Hoover - MooseDog Studios - Stowe, VT - robin.hoover@gmail.com">
<meta http-equiv="cleartype" content="on">
<meta name="referrer" content="always">
<base href="/">

<!-- Devices -->
<meta name="HandheldFriendly" content="True">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=yes">

<!-- Because Microsoft Exists, SAMF's -->
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="msapplication-TileImage" content="<?php  echo esc_url( get_template_directory_uri() . '/images/apple-touch-icon-144x144.png' ); ?>">
<meta name="msapplication-TileColor" content="#222222">

<!-- Apple iOS Add To Homescreen and StandAlone Mode -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="NickoLogistics">
<meta name='apple-touch-fullscreen' content='yes'>
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Chrome for Android Add To Homescreen -->
<meta name="mobile-web-app-capable" content="yes">

<!-- Chrome for Android Tool Bar Color -->
<meta name="theme-color" content="#56721C">

<!-- Apple Start-Up Image-->
<link rel="apple-touch-startup-image" href="<?php  echo esc_url( get_template_directory_uri() . '/images/startup-image.png' ); ?>">

<!-- Splash Image -->
<link rel="shortcut icon" sizes="512x512" href="<?php  echo esc_url( get_template_directory_uri() . '/images/nicko-splash.png' ); ?>" >

<!-- Icons -->
<link rel="apple-touch-icon" sizes="144x144" href="<?php  echo esc_url( get_template_directory_uri() . '/images/apple-touch-icon-144x144.png' ); ?>" >
<link rel="apple-touch-icon" sizes="114x114" href="<?php  echo esc_url( get_template_directory_uri() . '/images/apple-touch-icon-114x114.png' ); ?>" >
<link rel="apple-touch-icon" sizes="72x72" href="<?php  echo esc_url( get_template_directory_uri() . '/images/apple-touch-icon-72x72.png' ); ?>" >
<link rel="apple-touch-icon" sizes="57x57" href="<?php  echo esc_url( get_template_directory_uri() . '/images/apple-touch-icon-57x57.png' ); ?>" >

<!-- Icon actually for Android -->
<link rel="icon" type="image/png" sizes="192x192" href="<?php  echo esc_url( get_template_directory_uri() . '/images/android-chrome-192x192.png' ); ?>">

<link rel="author" href="http://www.moosedog.io">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body class="body" <?php
    // echo "data-ng-app=\"nickoSite\"  ";
    if (is_page( array('Home', 'Signup', 'Login', 'Details'))) {
        echo "data-ng-app=\"nickoSite\"  ";
    }
    elseif (is_page('Dashboard') ) {
        echo "data-ng-app=\"nickoDash\"  ";
    }// else {
        // echo "data-ng-app=\"nickoField\"  ";
    // }
    ?>

>

    <header class="header">
        <?php $theme_root = get_template_directory_uri(); ?>
        <img src="<?php echo $theme_root . '/images/logo.png' ?>" class="header-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-text"><?php bloginfo( 'name' ); ?></a>

<!--         <nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'nicko' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </nav> -->
    </header><!-- .header -->

    <main class="main"<?php
        if (is_page('Signup')) {
            echo "data-ng-controller=\"SignupCtrl as signup\"  ";
        } elseif (is_page('Login')) {
            echo "data-ng-controller=\"LoginCtrl as login\"  ";
        } elseif (is_page('Details')) {
            echo "data-ng-controller=\"DetailsCtrl as details\"  ";
        } elseif (is_page('Dashboard')) {
            echo "data-dash-init";
        }


        ?>
    >
