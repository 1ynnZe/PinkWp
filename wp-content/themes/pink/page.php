<?php get_header();?>

<section class="page mb-5">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="container">
                    <div class='showcase__content px-5'>
                       <?php if(has_post_thumbnail()&&!is_page( '線上購物' )&&!is_page( '購物車' )&&!is_page( '結帳頁面' )): ?>
                                <?php while(have_posts()) : the_post(); ?>
                                <div class="showcase__title title mb-2">
                                    <?php the_title(); ?>
                                </div>
                                <?php endwhile; ?>
                         <?php endif; ?>
                         <?php if(!is_page( '線上購物' )&&!is_page( '購物車' )&&!is_page( '結帳頁面' )):
                        $pageHeaderContent = get_field('pageHeaderContent');
                        echo "<p> {$pageHeaderContent} </p>";
                    ?>
                      <?php endif; ?>
                </div>
                   
                </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-3 order-first order-md-0">
            <?php if(has_post_thumbnail()&&!is_page( '線上購物' )) : ?>
                <div class="page__header">
                  <?php the_post_thumbnail(); ?>
              </div>
                <?php endif; ?>
               
            </div>


        </div>


    </section>
<section>
<?php #echo do_shortcode("[featured_products]"); ?>

    <section>
    <?php
    $id = get_the_ID();?>
    </section>

    <div class="container">
        <?php if(is_page( '線上購物' )):?>
            <div class="row">
                <div class="col-12">
                    <div class="showcase__title title mb-2 py-0 text-center">
                        <?php the_title(); ?>
                    </div>
                </div>
                </div>   
        <?php endif; ?>
       
        <div class="row">
            <div class="col-12">
                <?php if(have_posts()) : ?>
                                <?php while(have_posts()) : the_post(); ?>
                                <?php the_content(); ?>
                                <?php endwhile; ?>
                                <?php  echo paginate_links()?>
                                <?php else : ?>
                                <p><?php __('No Posts Found'); ?></p>
                <?php endif; ?>

            </div>
        </div> 
    </div>
       
</section>            
<?php get_footer();?>

