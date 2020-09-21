<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description');?>">
    
    <title>
        <?php bloginfo('name');?>|
        <?php is_front_page() ? bloginfo('description') : wp_title(); ?> 
       
    </title>
    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- font Awsome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head(); ?>
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
   
    
        <style>
        .bg-img{
                background-image: url(<?php echo get_bloginfo('template_directory').'/img/bg01.jpg' ?>) ;
            }
        .bg-img2{
                background-image: url(<?php echo get_bloginfo('template_directory').'/img/bg03.png' ?>) ;
            }
    </style>
</head>

<?php if(!is_front_page()) :?>
<body class="page">
<?php else : ?>
    <body>  
<?php endif;?>
<header>
    <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="/index.php">
        <img src="<?php echo get_theme_mod('logo',get_bloginfo('template_directory').'/img/logo.png') ?>" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-expanded="false">
            <div class="menu-burger"></div>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'primary',
                                'container'       => false, 
                                'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                                'menu_class'      => 'navbar-nav mx-auto',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>
                
            
                <ul class="navbar-nav navbar-nav-info">
                    <li>
                        <!-- <a class="nav-link" href="' . esc_url( wp_loginout_url( $redirect ) ) . '"> 
                            <i class="fa fa-user" aria-hidden="true"></i> -->
                        <?php wp_loginout(); ?>
                    </li>
                    <li class="dropdown">
                        <a href="#!" class="nav-link" data-toggle="dropdown" aria-expanded="false"
                            id="dropdownMenuButton">
                            <i class="fa fa-search"></i>
                            搜尋</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <?php get_search_form(); ?>
                        </div>
                    </li>

                </ul>
            </div>
    </nav>
</header>
       
  