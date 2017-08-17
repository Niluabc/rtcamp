<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simple
 */

?>
<footer id="colophon" class="site-footer">
<div>
	<hr class="solid-line"/>
	<div class="col-xs-6 col-md-10">
		<div class="custom-menu-class">
			<?php wp_nav_menu(
				array(
					'container_class' => 'main-nav',
					'container' => 'nav'
				));?>
		</div>
		<div>
			<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '&copy; %s', 'demo' ), '2011 rtPanel. All Rights Reserved.' );
			?>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( ' %1$s by %2$s.', 'demo' ), 'Designed', '<a href="https:rtCamp.com">rtCamp</a>' );
			?>
	</div>
</div>
<div class="col-xs-6 col-md-2">
	<img src="<?php bloginfo('template_url');?>/images/footer-logo.png" title="bloginfo('title');">
</div>
</div>
<hr />
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' );?>/lib/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' );?>/lib/js/jquery.cycle.all.js" /></script>
	<script src="<?php echo get_bloginfo('template_directory'); ?>/lib/js/bootstrap.js"></script>
	<script src="<?php echo get_bloginfo('template_directory'); ?>/lib/js/bootstrap.min.js"></script>

<script type="text/javascript">
$('#slider').cycle({
    fx:      'scrollVert',
	pager:   '#pager',
    prev:    '#prev',
    next:    '#next',
	timeout:  0
});

$('#show-nav').click(function(){
	$('.main-nav').toggle("slow");
	$('#close-nav').show("slow");
});
$('#close-nav').click(function(){
	$('.main-nav').toggle("slow");
	$('#close-nav').hide("slow");
});

 $('#sub-page-link').find('a').mouseover(function()
    {
    var pagename=$(this).text();

    var ajaxurl='<?php echo esc_url( admin_url( 'admin-ajax.php', 'relative' ) ); ?>';
        $.ajax({
        type:'POST',
        url: ajaxurl,
        data: {
            'action': "hover_post",
            'page_name': pagename
        },
        dataType: 'html',
        success:function(data) {
            // This outputs the result of the ajax request
            $('#featuredpage').html(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });

});
  $('document').ready(function(){
    var pagename='FINDINGS';

    var ajaxurl='<?php echo admin_url( 'admin-ajax.php' ); ?>';
     console.log(ajaxurl);
        $.ajax({
        type:'POST',
        url: ajaxurl,
        data: {
            'action': "hover_post",
            'page_name': pagename
        },
        dataType: 'html',
        success:function(data) {
            // This outputs the result of the ajax request
            $('#featuredpage').html(data);
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });

});
</script>
<?php wp_footer(); ?>
</body>
</html>
