<?php
/**
 * The template used for displaying dashboard page content in page.php
 *
 Template Name: Dashboard
 * @package nicko
 */
 ?>

<?php get_header(); ?>

<nav class="dash-nav">
  <div data-menu-nav-button = "/dashboard/" class="dash-nav-item"><span class="dash-nav-item-home"></span>Home</div>
  <div data-menu-nav-button = "/dashboard/clients" class="dash-nav-item"><span class="dash-nav-item-clients"></span>Clients</div>
  <div data-menu-nav-button = "/dashboard/jobs" class="dash-nav-item"><span class="dash-nav-item-jobs"></span>Jobs</div>
  <div data-menu-nav-button = "/dashboard/invoices" class="dash-nav-item"><span class="dash-nav-item-invoice"></span>Invoices</div>
  <div data-menu-nav-button = "/dashboard/settings" class="dash-nav-item"><span class="dash-nav-item-settings"></span>Settings</div>
  <div data-menu-nav-button = "/dashboard/help" class="dash-nav-item"><span class="dash-nav-item-help"></span>Help</div>
</nav>

<h2 data-company-name-header class="dash-header"></h2>

<section data-no-eff-five data-ng-view="" class="dash dash-animate"></section>

<?php get_footer(); ?>