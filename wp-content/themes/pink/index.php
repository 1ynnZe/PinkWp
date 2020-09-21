<?php get_header();?>
    <main role="main" class="container blog">
        <div class="row">
            <div class="col-md-8 blog__main">
                  <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                       <?php get_template_part('content',get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php  echo paginate_links()?>
                    <?php else : ?>
                    <p><?php __('No Posts Found'); ?></p>
                  <?php endif; ?>
                        <!-- 限定顯示幾篇文章可用於最新消息區塊 -->
                        <?php #query_posts( array(
                            //分類代稱
                                #'category_name' => 'uncategorized',
                                #'posts_per_page' => 2,
                            #)); ?>

                            <?php #if( have_posts() ): while ( have_posts() ) : the_post(); ?>

                            <?php #get_template_part('content',get_post_format()); ?>
                            <?php #endwhile; ?>

                            <?php #else : ?>

                            <p><?php #__('No News'); ?></p>

                            <?php #endif; ?>
              
             </div>
            <div class="col-md-4 blog-main">
                <?php get_sidebar();?>
            </div>
        </div>
    </main>      
<?php get_footer();?>

