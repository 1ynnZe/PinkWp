<?php get_header();?>
<section class="mb-5">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo get_theme_mod('slider1_image',get_bloginfo('template_directory').'/img/banner.jpg') ?>" alt="" class="d-block w-100 img-fluid">
                <!-- <img src="<?php //echo get_bloginfo('template_directory').'/img/banner.jpg' ?>" alt="First slide" class="d-block w-100 img-fluid"> -->
                <div class="carousel-caption d-none d-md-flex">
                            <h5 class="carousel-caption__title">
                                <?php echo get_theme_mod('slider1_heading','請輸入標題內文');?>
                            </h5>
                            <p class="mb-0"> 
                                <?php echo get_theme_mod('slider1_text','人的一生中，最適合吃冰的年紀，是小學到初中這個階段。所謂的暑假，也幾乎是冰棒、冰水或刨冰的代名詞。一旦把冰抽離，相信每個人的童年都會黯然失色。');?></h5>
                            </p>
                            <button class="btn" onclick='location.href="<?php echo get_theme_mod('slider1_btn_url','http://test.com');?>"'>
                                <?php echo get_theme_mod('slider1_btn_text',' 更多');?>  
                            </button>
                </div>    
                
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_theme_mod('slider2_image',get_bloginfo('template_directory').'/img/banner_2.jpg') ?>" alt="" class="d-block w-100 img-fluid">
                <div class="carousel-caption d-none d-md-flex">
                    <h5 class="carousel-caption__title">
                        <?php echo get_theme_mod('slider2_heading','粉圓冰、仙草冰、愛玉冰、米苔目');?>
                    </h5>
                    <p class="mb-0"> 
                        <?php echo get_theme_mod('slider2_text','老闆從木箱中拿出一大塊晶亮的冰塊，軋入刨冰機中，然後飛快地搖轉起來時，那冰屑就像雪花一般，一片一片飛落盤中，俄頃堆積成一座小冰山。老闆再淋上糖水，光看這等光景，已讓人消去大半暑氣');?></h5>
                    </p>
                    <button class="btn" onclick='location.href="<?php echo get_theme_mod('slider2_btn_url','http://test.com');?>"'>
                        <?php echo get_theme_mod('slider2_btn_text',' 更多');?>  
                    </button>
                </div>    
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="showcase  py-5  position-relative" >
    <div class="bg-img">  </div>    
    <div class="container">
    <div class="row">
                <div class="col-md-6 mb-md-0 mb-3">
                    <div class="showcase__content">
                        <div class="showcase__title title">
                            <?php echo get_theme_mod('showcase_heading','請輸入標題內文');?>
                        </div>
                        <p>
                            <?php echo get_theme_mod('showcase_text','現代的冰品，拜科學昌明之賜，固然色彩繽紛，花樣百出，但單就口味而言，比起臺灣早年的冰製品恐怕就遜色了。<br><br><br>除了冰棒和冰水之外，刨冰也是相當普遍的冰品。一般都在小攤子販賣，小攤設在樹蔭下，或釘幾塊門板遮擋太陽。<br><br>刨冰的種類繁多，主要有四果冰、粉圓冰、仙草冰、愛玉冰、米苔目，或由其中二至三種混在一起。');?>
                        </p>
                        <button class="btn btn-primary" onclick='location.href="<?php echo get_theme_mod('btn_url','http://test.com');?>"'>
                        <?php echo get_theme_mod('btn_text','繼續閱讀');?>  
                        </button>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="imgBox">
                    <img src="<?php echo get_theme_mod('showcase_image',get_bloginfo('template_directory').'/img/06.jpg') ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
    </div>
</section>
<section class="showcase2 py-5">
    <div class=" bg-img bg-img2"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-6 mb-md-0 mb-3  d-flex justify-content-center">
                <div class="imgBox imgBox-2 ">
                    <img src="<?php echo get_theme_mod('showcase2_image',get_bloginfo('template_directory').'/img/07.jpg') ?>" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 order-first order-md-0 d-flex justify-content-center align-items-center">
                 <div class="showcase__content text-center">
                        <div class="showcase__img d-inline-block">
                              <img src="<?php echo get_theme_mod('showcaseContent_image',get_bloginfo('template_directory').'/img/bg02.png') ?>" alt="" class="img-fluid">
                        </div>
                        <div class="showcase__title title pt-3">
                            <?php echo get_theme_mod('showcase2_heading','請輸入標題內文');?>
                        </div>
                        <p>
                            <?php echo get_theme_mod('showcase2_text','現在社會富裕了，小孩對冰的選擇可說是五花八門、應有盡有。<br><br>從最早的芋冰，到國外進口的冰淇淋；<br>從一枝五元的冰棒，到一客百元火燒冰淇淋，集合了傳統的口味與最尖端的食品科技，現代人誠然口福不淺。<br><br>尤其是嗜冰如命?的小孩子們，更是得其所哉。一個夏天下來，吃掉的冰恐怕都要多過自己的體重。');?>
                        </p>
                        <button class="btn btn-primary" onclick='location.href="<?php echo get_theme_mod('btn2_url','http://test.com');?>"'>
                        <?php echo get_theme_mod('btn2_text','繼續閱讀');?>  
                        </button>
                </div>


            </div>

        </div>
    </div>

</section>
<section class="boxes py-5">
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-md-4">
            <!-- 用widget的工具box就不用重複多打div class="box" -->
                    <?php if(is_active_sidebar('box1')) :?>
                        <?php dynamic_sidebar('box1');?>
                    <?php endif;?>
            </div>
            <div class="col-md-4">
                <?php if(is_active_sidebar('box2')) :?>
                        <?php dynamic_sidebar('box2');?>
                    <?php endif;?>
            </div>
            <div class="col-md-4">
                <?php if(is_active_sidebar('box3')) :?>
                        <?php dynamic_sidebar('box3');?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <?php echo do_shortcode('[products_slider slide_to_show="4"]'); ?>
</div>

<?php get_footer();?>

</html>

