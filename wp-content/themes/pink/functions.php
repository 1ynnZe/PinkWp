<?php   

    //Register Nav Walker class_alias//https://github.com/wp-bootstrap/wp-bootstrap-navwalker
    require_once('class-wp-bootstrap-navwalker.php');
    
    //Theme Support
    function pink_theme_setup(){
        //Nav Menusvm選單
        register_nav_menus(array(
            'primary'=>__('Primary Menu') 
         ));
        //文章圖片
        add_theme_support('post-thumbnails');
      
         //Post Formats文章格式 aside記事 gallery圖庫
         add_theme_support('post-formats',array('aside','gallery'));

        //搜尋bar   
        add_theme_support('html5',array('search-form'));

    }
    add_action('after_setup_theme','pink_theme_setup');

   //控制文章顯示長短
   function set_excerpt_length(){
    //return 字數
    return 200;
    }
    add_filter('excerpt_length',"set_excerpt_length");

//Widgets Location
function pink_init_widgets($id){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' =>  'sidebar',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',

    ));
    register_sidebar(array(
        'name' => 'Box1',
        'id' =>  'box1',
        'before_widget' => '<div class="box box1">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',

    ));
    register_sidebar(array(
        'name' => 'Box2',
        'id' =>  'box2',
        'before_widget' => '<div class="box box2">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',

    ));
    register_sidebar(array(
        'name' => 'Box3',
        'id' =>  'box3',
        'before_widget' => '<div class="box box3">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',

    ));
    register_sidebar(array(
        'name' => 'Slider-banner',
        'id' =>  'slider-banner',
        'before_widget' => '<div class="slider-banner">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',

    ));
}

add_action('widgets_init','pink_init_widgets');



//Customizer File
require get_template_directory(). '/inc/customizer.php';



//登入登出btn
function loginout_pink($text) {
$selector = 'class="nav-link"';
$login_text_before = '登入';
$login_text_after = '<i class="fa fa-user" aria-hidden="true"></i>會員登入';

$logout_text_before = '登出';
$logout_text_after = '<i class="fa fa-user" aria-hidden="true"></i>會員登出';

$text = str_replace('<a ', '<a '.$selector, $text);
$text = str_replace($login_text_before, $login_text_after ,$text);
$text = str_replace($logout_text_before, $logout_text_after ,$text);
return $text;
}
add_filter('loginout','loginout_pink');





