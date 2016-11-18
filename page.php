<?php get_header();?>

	<div class="container">
		<div class="paper-container">
			<?php if( have_posts() ){
				if( have_posts() ){ the_post();?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
					
					<?php the_content();?>
					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'newpaper' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'newpaper' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
					?>
				</div>
			<?php }
			}?>
			
			<div class="paginate">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div>

<?php get_footer();?>