<?php get_header(); ?>

<!-- slider-->

<div id="wrap1" >
      <div id="controller">
    <div id="pager"> </div>
  <div id="prev"> </div>
  <div id="next"> </div>
</div>

<div id="slider">
       <?php
                 query_posts(array( 'category_name' => 'featured' , 'posts_per_page'=>5 ));
                 if ( have_posts() ): while( have_posts() ): the_post();
             ?>
    <div id="items">
                      <?php global $post_id; if ( get_the_post_thumbnail($post_id) != '' ) { the_post_thumbnail('featured'); }
                      else {

echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
echo '<img src="';
echo catch_that_image();
echo '" alt="" />';
echo '</a>';

}?>
      <div class="info">
        <p class="game-title"><?php the_title();?></p>
        <?php if ( $post->post_excerpt ) {
           the_excerpt();
         } else {
           the_content();
         }
         ?>
      </div><!--End caption-->
      </div>
      <?php
                      endwhile;
                      endif;
                      wp_reset_query();
                  ?>

</div><!--End slider-->
</div><!--End Wrap-->

<!-- slider part complete-->

		<div id="Wrap2">
				<div id="featured-Page">
					<div class="row">
						<div class="col-md-3" id="sub-page-link" style="padding-left:5px">    <!--shalmon  -->
							<ul>
                                <?php
                                $children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&=0&depth=1' );
                                if ( $children ) { ?>
                                <?php echo $children; ?>
                                <?php } ?>
							</ul>
						</div><!--End Sub age Links-->
						<div class="col-xs-9" id="featuredpage">

						</div><!--End col-xs 9 -->
					</div><!--End Featured-rows-->
				</div><!--End Featured-Page-->
			</div><!--End Wrap2-->

			<div class="row" style="background-color:#f7f7f7;">
			  <div class="col-xs-6 col-sm-3">
			    <h5 class="textset">LATEST NEWS</h5>
			    <hr class="dash" />
			    <?php
			    query_posts(array(
			      'post_type' => 'news',
			      'showposts' => 3
			    )); ?>
			    <?php
			      while (have_posts()) : the_post();
			    ?>

			  <p class="news" class="latestnews"><a href="<?php the_permalink() ?>"> <?php the_excerpt(); ?></a></p>
			  <?php endwhile;?>

			  </div>
			  <div>
			  <div class="col-xs-6 col-sm-3">
			    <h5 class="textset">RECENT PROJECTS</h5>
			    <hr class="dash" />
			    <div><img src="<?php bloginfo('template_url');?>/images/recent-pro-1.jpg" title="bloginfo('title');"></div>
			    <br />
			    <div><img src="<?php bloginfo('template_url');?>/images/recent-pro-2.jpg" title="bloginfo('title');"></div>
			    <br />
			    <div><img src="<?php bloginfo('template_url');?>/images/recent-pro-3.jpg" title="bloginfo('title');"></div>
			    <br>
			  </div>
			  <!-- Add clearfix for only the required viewport -->
			  <div class="clearfix visible-xs"></div>

			  <div class="col-xs-6 col-sm-3" id="socialmedia">
			    <h5 class="textset">STAY IN TOUCH</h5>
			    <hr class="dash" />


			    <div id="widget3">
			        <ul>
			        <?php if ( function_exists ( 'ot_get_option' ) ) {
			                 $fb=ot_get_option ( 'facebook' );
			                 $tw=ot_get_option ( 'twitter' );
			                 $li=ot_get_option ( 'linkedin' );
			                 $rss=ot_get_option('rss');
			             }
			        ?>
			        <?php if($fb!="") {?>
			            <li><a href="<?php echo $fb ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/images/facebookhover.jpg"/><img src="<?php bloginfo ( 'template_directory' );?>/images/facebook.jpg"/>  Facebook</a></li>
			        <?php }?>
			        <?php if($tw!="") {?>
			           <li><a href="<?php echo $tw ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/images/twitterhover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/images/twitter.jpg"/>  Twitter</a></li>
			        <?php }?>
			        <?php if($li!="") {?>
			           <li><a href="<?php echo $li ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/images/linkedinhover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/images/linkedin.jpg"/>  Linked In</a></li>
			        <?php }?>
			        <?php if($rss!="") {?>
			           <li><a href="<?php echo $rss ?>" target=”_blank”><img src="<?php bloginfo ( 'template_directory' ); ?>/images/rsshover.jpg" /><img src="<?php bloginfo ( 'template_directory' ); ?>/images/rss.jpg"/>  RSS</a></li>
			        <?php }?>
			        </ul>
			      </div>
			    </div><!--End Widget3-->

			  </div>
			  <div class="col-xs-6 col-sm-3">
			    <h5 class="textset">SECURITY &amp; PRIVACY</h5>
			    <hr class="dash" />
			    <div style="display:inline-block; clear:both;">
			      <?php dynamic_sidebar( 'security' ); ?>
			    </div>
			  </div>
			</div>
			</div>


<?php
get_sidebar();
get_footer();
