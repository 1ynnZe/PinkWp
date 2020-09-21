<?php
  function wpb_customize_register($wp_customize){


    // Showcase Section
    $wp_customize->add_section('showcase', array(
      //第二個參數PINK是佈景主題名稱
      'title'   => __('Showcase', 'PINK'),
      'description' => sprintf(__('Options for showcase','PINK')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('showcase_image', array(
      'default'   => get_bloginfo('template_directory').'/img/06.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_image', array(
      'label'   => __('Showcase圖片', 'PINK'),
      'section' => 'showcase',
      'settings' => 'showcase_image',
      'priority'  => 1
    )));


    $wp_customize->add_setting('showcase_heading', array(
      'default'   => _x('請輸入標題內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase_heading', array(
      'label'   => __('標題', 'PINK'),
      'section' => 'showcase',
      'priority'  => 2
    ));

    $wp_customize->add_setting('showcase_text', array(
      'default'   => _x('請輸入描述內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase_text', array(
      'label'   => __('內文', 'PINK'),
      'section' => 'showcase',
      'priority'  => 3
    ));

    $wp_customize->add_setting('btn_url', array(
      'default'   => _x('＃', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_url', array(
      'label'   => __('按鈕Ｕrl', 'PINK'),
      'section' => 'showcase',
      'priority'  => 4
    ));

    $wp_customize->add_setting('btn_text', array(
      'default'   => _x('更多', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn_text', array(
      'label'   => __('按鈕標題', 'PINK'),
      'section' => 'showcase',
      'priority'  => 5
    ));




    //showcase2
    $wp_customize->add_section('showcase2', array(
      'title'   => __('Showcase2', 'PINK'),
      'description' => sprintf(__('Options for showcase','PINK')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('showcase2_image', array(
      'default'   => get_bloginfo('template_directory').'/img/07.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase2_image', array(
      'label'   => __('Showcase2圖片', 'PINK'),
      'section' => 'showcase2',
      'settings' => 'showcase2_image',
      'priority'  => 1
    )));

    $wp_customize->add_setting('showcaseContent_image', array(
      'default'   => get_bloginfo('template_directory').'/img/bg02.png',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcaseContent_image', array(
      'label'   => __('Showcase圖片', 'PINK'),
      'section' => 'showcase2',
      'settings' => 'showcaseContent_image',
      'priority'  => 1
    )));

    $wp_customize->add_setting('showcase2_heading', array(
      'default'   => _x('請輸入標題內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase2_heading', array(
      'label'   => __('標題', 'PINK'),
      'section' => 'showcase2',
      'priority'  => 2
    ));

    $wp_customize->add_setting('showcase2_text', array(
      'default'   => _x('請輸入描述內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('showcase2_text', array(
      'label'   => __('內文', 'PINK'),
      'section' => 'showcase2',
      'priority'  => 3
    ));

    $wp_customize->add_setting('btn2_url', array(
      'default'   => _x('＃', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn2_url', array(
      'label'   => __('按鈕Ｕrl', 'PINK'),
      'section' => 'showcase2',
      'priority'  => 4
    ));

    $wp_customize->add_setting('btn2_text', array(
      'default'   => _x('更多', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('btn2_text', array(
      'label'   => __('按鈕標題', 'PINK'),
      'section' => 'showcase2',
      'priority'  => 5
    ));



    //logo
 
    $wp_customize->add_section('logo', array(
      'title'   => __('更換Logo', 'PINK'),
      'description' => sprintf(__('Options for showcase','PINK')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('Logo_image', array(
      'default'   => get_bloginfo('template_directory').'/img/logo.png',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'Logo_image', array(
      'label'   => __('Logo圖片', 'PINK'),
      'section' => 'logo',
      'settings' => 'Logo_image',
      'priority'  => 1
    )));

    //輪播圖1
    $wp_customize->add_section('slider1', array(
      //第二個參數PINK是佈景主題名稱
      'title'   => __('Slider1', 'PINK'),
      'description' => sprintf(__('Options for slider1','PINK')),
      'priority'    => 130
    ));

    $wp_customize->add_setting('slider1_image', array(
      'default'   => get_bloginfo('template_directory').'/img/banner.jpg',
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider1_image', array(
      'label'   => __('slider1圖片', 'PINK'),
      'section' => 'slider1',
      'settings' => 'slider1_image',
      'priority'  => 1
    )));

    $wp_customize->add_setting('slider1_heading', array(
      'default'   => _x('請輸入標題內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('slider1_heading', array(
      'label'   => __('標題', 'PINK'),
      'section' => 'slider1',
      'priority'  => 2
    ));

    $wp_customize->add_setting('slider1_text', array(
      'default'   => _x('請輸入描述內文', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('slider1_text', array(
      'label'   => __('內文', 'PINK'),
      'section' => 'slider1',
      'priority'  => 3
    ));
    $wp_customize->add_setting('slider1_btn_url', array(
      'default'   => _x('＃', 'PINK'),
      'type'      => 'theme_mod'
    ));

    $wp_customize->add_control('slider1_btn_url', array(
      'label'   => __('按鈕Ｕrl', 'PINK'),
      'section' => 'slider1',
      'priority'  => 4
    ));


//輪播圖2
$wp_customize->add_section('slider2', array(
  //第二個參數PINK是佈景主題名稱
  'title'   => __('Slider2', 'PINK'),
  'description' => sprintf(__('Options for slider2','PINK')),
  'priority'    => 130
));

$wp_customize->add_setting('slider2_image', array(
  'default'   => get_bloginfo('template_directory').'/img/banner_2.jpg',
  'type'      => 'theme_mod'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider2_image', array(
  'label'   => __('slider2圖片', 'PINK'),
  'section' => 'slider2',
  'settings' => 'slider2_image',
  'priority'  => 1
)));

$wp_customize->add_setting('slider2_heading', array(
  'default'   => _x('請輸入標題內文', 'PINK'),
  'type'      => 'theme_mod'
));

$wp_customize->add_control('slider2_heading', array(
  'label'   => __('標題', 'PINK'),
  'section' => 'slider2',
  'priority'  => 2
));

$wp_customize->add_setting('slider2_text', array(
  'default'   => _x('請輸入描述內文', 'PINK'),
  'type'      => 'theme_mod'
));

$wp_customize->add_control('slider2_text', array(
  'label'   => __('內文', 'PINK'),
  'section' => 'slider2',
  'priority'  => 3
));
$wp_customize->add_setting('slider2_btn_url', array(
  'default'   => _x('＃', 'PINK'),
  'type'      => 'theme_mod'
));

$wp_customize->add_control('slider2_btn_url', array(
  'label'   => __('按鈕Ｕrl', 'PINK'),
  'section' => 'slider2',
  'priority'  => 4
));


  }

  add_action('customize_register', 'wpb_customize_register');
