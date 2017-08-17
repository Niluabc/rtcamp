<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simple
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
		<meta name="author" content="">

    <link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?> /favicon.ico">

    <title>
      <?php
      global $page, $paged;
      wp_title('|', true, 'right');
      // Add the blog name.
      bloginfo('name');
      // Add the blog description for the home/front page.
      $site_description = get_bloginfo('description', 'display');
      if ($site_description && ( is_home() || is_front_page() ))
          echo " | $site_description";
      // Add a page number if necessary:

      if ($paged >= 2 || $page >= 2)
          echo ' | ' . sprintf(__('Page %s', 'ps'), max($paged, $page));
      ?>
    </title>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#myCollapsible').on('hidden.bs.collapse',
        function(){
            alert('Collapsible element has been completely closed.');
          });
        });
      </script>

      <!-- Bootstrap core CSS -->
		  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">

      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		   <link href="<?php echo get_bloginfo('template_directory'); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

       <!-- Custom styles for this template -->
		   <link href="<?php echo get_bloginfo('template_directory'); ?>/css/navbar.css" rel="stylesheet">
       <link href="<?php echo get_bloginfo('template_directory'); ?>/lib/css/style.css" rel="stylesheet">
       <link href="<?php bloginfo('template_directory');?>/blog.css" rel="stylesheet">
		<?php wp_head();?>
  </head>

  <body class="content">
    <div class="container">
      <header class="colophon">

        <nav class="navbar nav" class="navbar navbar-default" style="display:inline-block, position:relative">
          <div id="navbar" class="five columns clearfix" class="navbar-collapse collapse">
            <a href="<?php echo get_option('Home');?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" title="bloginfo('title');"></a>
            <div style="display:inline-block" class="custom-menu-class" >
              <?php wp_nav_menu(
                array(
                  'container_class' => 'main-nav',
                  'container' => 'nav'
                ));?>
              </div>
          </div><!--/.nav-collapse -->
        </nav>
      </header>
