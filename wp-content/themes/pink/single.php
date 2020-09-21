<?php get_header();?>
<main role="main" class="container blog">
        <div class="row">
            <div class="col-md-8 blog-main">
                  <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                       <?php get_template_part('content',get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php #echo previous_posts_link(); ?>
                    <?php  echo paginate_links()?>
                    <?php #echo previous_posts_link(); ?>
                    <?php else : ?>
                    <p><?php __('No Posts Found'); ?></p>
                 <?php endif; ?>
            </div>
            <div class="col-md-4 blog-main">
                <?php get_sidebar();?>
            </div>
        </div>
    </main>                     
<?php get_footer();?>
