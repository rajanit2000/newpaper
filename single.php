<?php get_header();?>

	<div class="container">
		<div class="paper-container">
			<?php if( have_posts() ){
				if( have_posts() ){ the_post();?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
					<div class="post-tags">
						<p><?php the_tags();?></p>
					</div>
					<?php if ( has_post_thumbnail() ) {?>
					<div class="post-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php }?>
					<?php the_content();?>
					<?php comments_template(); ?>
				</div>
			<?php }
			}?>
			
			<div class="paginate">
				<?php echo paginate_links(); ?>
			</div>
		</div>
	</div>

<?php get_footer();?>