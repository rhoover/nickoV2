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

<!-- Inline header style for improved time to first pixel -->
<style type="text/css">.body{margin:0px;}.header{position:fixed;width:100%;z-index:50;padding-top:.5em;padding-bottom:.5em;background-color:transparent;background-image:-moz-linear-gradient(#708e4e,rgba(122,155,85,0.35));background-image:-webkit-linear-gradient(#708e4e,rgba(122,155,85,0.35));background-image:linear-gradient(#708e4e,rgba(122,155,85,0.35));border-bottom:0.1em solid rgba(63,80,44,0.15);-moz-box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);-webkit-box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);box-shadow:0px 1px 5px 3px rgba(112,142,78,0.15);}@media(min-width:60em){.header-text{padding-left:3.1328320802%;}}.header-text{font-family: Roboto-Bold,Helvetica,Arial, sans-serif;text-decoration:none;font-size:2.5em;line-height:1.5231428571em;padding-left:16.2656641604%;color:whitesmoke;text-shadow:rgba(63,80,44,0.4)1px 1px 0px;}.header-logo{display:block;position:fixed;overflow:visible;margin-left:8.2656641604%}</style>

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
    // if (is_page( array('Home', 'Signup', 'Login', 'Details'))) {
    if (!is_page( array('Dashboard', 'Field'))) {
        echo "data-ng-app=\"nickoSite\"  ";
    }
    elseif (is_page('Dashboard') ) {
        echo "data-ng-app=\"nickoDash\"  ";
    } elseif (is_page('Field') ) {
        echo "data-ng-app=\"nickoField\"  ";
    }
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
            echo "data-ng-controller=\"DashCtrl as dash\"  ";
        }


        ?>
    >
