<?php get_header();?>

	<div class="container">
		<div class="paper-container">
			<div class="row">
				<div class="col-sm-9">
					<div class="paper-left-content">
						<?php if( have_posts() ){
							while( have_posts() ){ the_post();?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="post-meta">
									<p><?php the_date();?></p>
								</div>
								<?php the_excerpt();?>
							</div>
						<?php }
						}?>
						<div class="paginate">
							<?php echo paginate_links(); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="paper-right-content">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer();?>