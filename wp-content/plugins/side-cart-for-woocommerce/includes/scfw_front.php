<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('SCFW_front')) {

    class SCFW_front {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }

        function init() {
            add_action('wp_head', array( $this, 'SCFW_craete_cart' ));
            add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'SCFW_cart_count_fragments' ), 10, 1 );
            add_action( 'wp_ajax_change_qty', array( $this, 'SCFW_change_qty_cust') );
            add_action( 'wp_ajax_nopriv_change_qty', array( $this, 'SCFW_change_qty_cust') );
            add_action( 'wp_ajax_product_remove', array( $this, 'SCFW_ajax_product_remove') );
            add_action( 'wp_ajax_nopriv_product_remove', array( $this, 'SCFW_ajax_product_remove') );
            add_action( 'wp_ajax_coupon_ajax_call', array( $this, 'SCFW_coupon_ajax_call_func') );
            add_action( 'wp_ajax_nopriv_coupon_ajax_call', array( $this, 'SCFW_coupon_ajax_call_func') );
            add_action( 'wp_ajax_remove_applied_coupon_ajax_call', array( $this, 'SCFW_remove_applied_coupon_ajax_call_func') );
            add_action( 'wp_ajax_nopriv_remove_applied_coupon_ajax_call', array( $this, 'SCFW_remove_applied_coupon_ajax_call_func') );
            add_action( 'wp_footer', array($this, 'SCFW_coupons_reponse_message') );
        }

        function SCFW_cart_create() {
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();
            global $woocommerce;
            /*if(get_option( 'wfc_ajax_cart' ) == "yes"){
                update_option('woocommerce_enable_ajax_add_to_cart', get_option( 'wfc_ajax_cart' ), 'yes');
            }*/

            ?>
            <div class="wfc_container">
                <div class="wfc_header">
                    <h3 class="wfc_header_title" style="color: <?php echo get_option( 'wfc_head_ft_clr') ?>;font-size: <?php echo get_option( 'wfc_head_ft_size')."px" ?>"><?php echo get_option( 'wfc_head_title' ); ?></h3>
                    <span class="wfc_close_cart"><img src="<?php echo SCFW_PLUGIN_DIR . '/images/cancel-music.png'; ?>"></span>
                </div>
                <div class="wfc_body">
                    <?php
                        $html = ''; 
                        $html .= '<div class="wfc_body">';
                        if ( ! WC()->cart->is_empty() ) :
                            //echo "hello";
                                    $html .= "<table class='wfc_cust_mini_cart'>";
                                    global $woocommerce;
                                    $items = WC()->cart->get_cart();
                                  // print_r($items);
                                        foreach($items as $item => $values) { 
                                            $html .= "<tr product_id='".$values['product_id']."' c_key='".$values['key']."'>";
                                            $_product =  wc_get_product( $values['data']->get_id() );
                                            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $values['product_id'], $values, $item );
                                            //product image
                                            $getProductDetail = wc_get_product( $values['product_id'] );
                                            $html .= "<td class='image_div'>";
                                            $html .= $getProductDetail->get_image('thumbnail'); // accepts 2 arguments ( size, attr )
                                            $html .= "</td><td><div class='description_div' style='color:". get_option( 'wfc_product_ft_clr') .";font-size: ".get_option( 'wfc_product_ft_size')."px;'>";
                                            
                                            $html .= "<b>".$_product->get_title() .'</b>  <br> '; 
                                            $html .= "Price: " . apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $values, $item ).'<br> ';
                                            $html .= "<span class='qty_title'>Qty: </span>";
                                            if (get_option( 'wfc_qty_box' ) == "yes") {
                                                $html .= "<input type='number' name='update_qty'  value='".$values['quantity']."'>";
                                            }else{
                                                $html .= $values['quantity'];
                                            }
                                            $html .= "</div></td>";
                                            if(get_option( 'wfc_delet_option' ) == "yes"){
                                                $html .= "<td>";
                                                $html .= apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove"  aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">×</a>', 
                                                                esc_url(wc_get_cart_remove_url($item)), 
                                                                esc_html__('Remove this item', 'evolve'),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $_product->get_sku() ),
                                                                esc_attr( $item )
                                                                ), $item);
                                                $html .= "</td>";
                                            }
                                            $html .= "</tr>";
                                        }
                                        
                                        
                                    $html .= "</table>";
                                    $html .= "<div class='wfc_total_tr'>";
                                    $html .= "<div><span>Subtotal</span></div>";

                                    $wfc_get_totals = WC()->cart->get_totals();
                                    $wfc_cart_total = $wfc_get_totals['subtotal'];
                                    $wfc_cart_discount = $wfc_get_totals['discount_total'];
                                    $wfc_final_subtotal = $wfc_cart_total - $wfc_cart_discount;

                                    $html .= "<div><span class='wfc_fragtotal'>".get_woocommerce_currency_symbol().number_format($wfc_final_subtotal, 2)."</span></div>";
                                    $html .= "</div>";
                                    $html .= "<div class='wfc_coupon'>";
                                    $html .= "<div class='wfc_apply_coupon_link'>";
                                    $html .= "<a href='#' id='wfc_apply_coupon'>Apply Coupon</a>";
                                    $html .= "</div>";
                                    $html .= '<div class="wfc_coupon_field">';
                                    $html .= '<input type="text" id="wfc_coupon_code" placeholder="Enter your promo code">';
                                    $html .= '<span class="wfc_coupon_submit">APPLY</span>';
                                    $html .= '</div>';

                                    $applied_coupons = WC()->cart->get_applied_coupons();
                                    if(!empty($applied_coupons)) {
                                        $html .= "<ul class='wfc_applied_cpns'>";
                                        //$html .= "<ul>";
                                        foreach($applied_coupons as $cpns ) {
                                            $html .= "<li class='wfc_remove_cpn' cpcode='".$cpns."'>".$cpns." <span class='dashicons dashicons-no'></span></li>";
                                        }
                                        //$html .= "</ul>";
                                        $html .= "</ul>";
                                    }

                                    $html .= "</div>";
                                else :
                                        $html .= "<h3 class='empty_cart_text'>Cart is empty</h3>";
                                endif;
                        $html .= '</div>';
                        echo $html;
                    ?>
                </div>
                <div class="wfc_slider">
                    <div class="wfc_slider_inn owl-carousel owl-theme">
                        <?php 
                            $productsa = get_option('wfc_select2');
                            if(!empty($productsa)) {
                                foreach ($productsa as $value) {
                                    $productc = wc_get_product( $value );
                                    $title = $productc->get_name();
                                    $price = $productc->get_price();
                                    ?>
                                        <div class="item wfc_gift_product">
                                            <a href="<?php echo get_permalink( $productc->get_id() ); ?>">
                                                <div class="wfc_left_div"><?php echo $productc->get_image(); ?></div>
                                                <div class="wfc_right_div">
                                                    <h3 style="color: <?php echo get_option( 'wfc_sld_product_ft_clr'); ?>;font-size: <?php echo get_option( 'wfc_sld_product_ft_size'); ?>px;"><?php echo $title; ?></h3>
                                                    <span style="color: <?php echo get_option( 'wfc_sld_product_ft_clr'); ?>;font-size: <?php echo get_option( 'wfc_sld_product_ft_size'); ?>px;"><?php echo wc_price($price); ?></span>
                                                </div>
                                            </a>
                                        </div>
                                    <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="wfc_footer">
                    <div class="wfc_ship_txt" style="color: <?php echo get_option( 'wfc_ship_ft_clr') ?>;font-size: <?php echo get_option( 'wfc_ship_ft_size')."px" ?>;"><?php echo get_option( 'wfc_ship_txt' ); ?></div>
                    <?php  if(get_option( 'wfc_cart_option' ) == "yes"){ ?>
                        <a href="<?php echo wc_get_cart_url();?>" style="background-color: <?php echo get_option( 'wfc_ft_btn_clr') ?>;margin: <?php echo get_option( 'wfc_ft_btn_mrgin')."px" ?>;color: <?php echo get_option( 'wfc_ft_btn_txt_clr') ?>;">
                            <?php echo get_option( 'wfc_cart_txt'); ?>
                        </a>
                    <?php } ?>
                    <?php  if(get_option( 'wfc_checkout_option' ) == "yes"){ ?>
                        <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" style="background-color: <?php echo get_option( 'wfc_ft_btn_clr') ?>;margin: <?php echo get_option( 'wfc_ft_btn_mrgin')."px" ?>;color: <?php echo get_option( 'wfc_ft_btn_txt_clr') ?>;">
                            <?php echo get_option( 'wfc_checkout_txt'); ?>
                        </a>
                    <?php } ?>
                    <?php  if(get_option( 'wfc_conshipping_option' ) == "yes"){ ?>
                        <a href="<?php echo get_option( 'wfc_conshipping_link' ) ?>" style="background-color: <?php echo get_option( 'wfc_ft_btn_clr') ?>;margin: <?php echo get_option( 'wfc_ft_btn_mrgin')."px" ?>;color: <?php echo get_option( 'wfc_ft_btn_txt_clr') ?>;">
                            <?php echo get_option( 'wfc_conshipping_txt'); ?>
                        </a>
                    <?php } ?>
                </div>
            </div> 
            <?php if(get_option( 'wfc_show_cart_icn' ) == "yes"){ ?>
                <div class="wfc_cart_basket" style="<?php if(get_option('wfc_basket_position') == "top"){ ?>top: 15px;<?php }elseif (get_option('wfc_basket_position') == "bottom") { ?>bottom: 15px;<?php } ?>;height: <?php echo get_option( 'wfc_basket_icn_size')."px" ?>;width: <?php echo get_option( 'wfc_basket_icn_size')."px" ?>;background-color: <?php echo get_option( 'wfc_basket_bg_clr') ?>;">
                    <div class="cart_box">
                        <img src="<?php echo SCFW_PLUGIN_DIR . '/images/ShoppingCart2-512.png'; ?>">
                    </div>
                    <?php if(get_option( 'wfc_product_cnt' ) == "yes"){ ?>
                        <div class="wfc_item_count" style="background-color: <?php echo get_option( 'wfc_cnt_bg_clr') ?>;color: <?php echo get_option( 'wfc_cnt_txt_clr') ?>;font-size: <?php echo get_option( 'wfc_cnt_txt_size')."px" ?>;">
                            <span class="float_countc"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
        }
     
        function SCFW_craete_cart(){
            $wcf_page_ids = explode(",",get_option( 'wfc_on_pages' ));
            $wcf_crnt_page = get_the_ID();
            if (!in_array($wcf_crnt_page, $wcf_page_ids)){
                if(wp_is_mobile() ){
                    if(get_option( 'wfc_mobile' ) == "yes"){
                        if(is_checkout() || is_cart()){
                            if(get_option( 'wfc_cart_check_page' ) == "yes"){
                                add_filter( 'wp_footer', array($this, 'SCFW_cart_create'));
                            }
                        }else{
                            add_filter( 'wp_footer', array($this, 'SCFW_cart_create'));
                        }
                    }
                }else{
                    if(is_checkout() || is_cart()){
                        if(get_option( 'wfc_cart_check_page' ) == "yes"){
                            add_filter( 'wp_footer', array($this, 'SCFW_cart_create'));
                        }
                    }else{
                        add_filter( 'wp_footer', array($this, 'SCFW_cart_create'));
                    }
                }
            }
        }
      
        function SCFW_cart_count_fragments( $fragments ) {
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();
            $html = '<div class="wfc_body">';
            if ( ! WC()->cart->is_empty() ) :
                //echo "hello";
                        $html .= "<table class='wfc_cust_mini_cart'>";
                        global $woocommerce;
                        $items = WC()->cart->get_cart();
                      // print_r($items);
                            foreach($items as $item => $values) { 
                                $html .= "<tr product_id='".$values['product_id']."' c_key='".$values['key']."'>";
                                $_product =  wc_get_product( $values['data']->get_id() );
                                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $values['product_id'], $values, $item );
                                //product image
                                $getProductDetail = wc_get_product( $values['product_id'] );
                                $html .= "<td class='image_div'>";
                                $html .= $getProductDetail->get_image('thumbnail'); // accepts 2 arguments ( size, attr )
                                $html .= "</td><td><div class='description_div' style='color:". get_option( 'wfc_product_ft_clr') .";font-size: ".get_option( 'wfc_product_ft_size')."px'>";
                                
                                $html .= "<b>".$_product->get_title() .'</b>  <br> '; 
                                $html .= "Price: " . apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $values, $item ).'<br> ';
                                $html .= "<span class='qty_title'>Qty: </span>";
                                if (get_option( 'wfc_qty_box' ) == "yes") {
                                    $html .= "<input type='number' name='update_qty'  value='".$values['quantity']."'>";
                                }else{
                                    $html .= $values['quantity'];
                                }
                                $html .= "</div></td>";
                                if(get_option( 'wfc_delet_option' ) == "yes"){
                                    $html .= "<td>";
                                    $html .= apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove"  aria-label="%s" data-product_id="%s" data-product_sku="%s" data-cart_item_key="%s">×</a>', 
                                                    esc_url(wc_get_cart_remove_url($item)), 
                                                    esc_html__('Remove this item', 'evolve'),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() ),
                                                    esc_attr( $item )
                                                    ), $item);
                                    $html .= "</td>";
                                }
                                $html .= "</tr>";
                            }
                            
                            
                        $html .= "</table>";
                        $html .= "<div class='wfc_total_tr'>";
                        $html .= "<div><span>Subtotal</span></div>";

                        $wfc_get_totals = WC()->cart->get_totals();
                        $wfc_cart_total = $wfc_get_totals['subtotal'];
                        $wfc_cart_discount = $wfc_get_totals['discount_total'];
                        $wfc_final_subtotal = $wfc_cart_total - $wfc_cart_discount;

                        $html .= "<div><span class='wfc_fragtotal'>".get_woocommerce_currency_symbol().number_format($wfc_final_subtotal, 2)."</span></div>";
                        $html .= "</div>";
                        $html .= "<div class='wfc_coupon'>";
                        $html .= "<div class='wfc_apply_coupon_link'>";
                        $html .= "<a href='#' id='wfc_apply_coupon'>Apply Coupon</a>";
                        $html .= "</div>";
                        $html .= '<div class="wfc_coupon_field">';
                        $html .= '<input type="text" id="wfc_coupon_code" placeholder="Enter your promo code">';
                        $html .= '<span class="wfc_coupon_submit">APPLY</span>';
                        $html .= '</div>';

                        $applied_coupons = WC()->cart->get_applied_coupons();
                        if(!empty($applied_coupons)) {
                            $html .= "<ul class='wfc_applied_cpns'>";
                            //$html .= "<ul>";
                            foreach($applied_coupons as $cpns ) {
                                $html .= "<li class='wfc_remove_cpn' cpcode='".$cpns."'>".$cpns." <span class='dashicons dashicons-no'></span></li>";
                            }
                            //$html .= "</ul>";
                            $html .= "</div>";
                        }


                        $html .= "</ul>";
                        
                    else :
                            $html .= "<h3 class='empty_cart_text'>Cart is empty</h3>";
                    endif;
            $html .= '</div>';
            $fragments['div.wfc_body'] = $html;
            $html='<span class="float_countc">'.WC()->cart->get_cart_contents_count().'</span>';
            $fragments['span.float_countc'] = $html;


            $wfc_get_totals = WC()->cart->get_totals();
            $wfc_cart_total = $wfc_get_totals['subtotal'];
            $wfc_cart_discount = $wfc_get_totals['discount_total'];
            $wfc_final_subtotal = $wfc_cart_total - $wfc_cart_discount;
            
            $wfc_fragtotal = get_woocommerce_currency_symbol().number_format($wfc_final_subtotal, 2);
            $fragments['span.wfc_fragtotal'] = $wfc_fragtotal;

            return $fragments;    
        }


        function SCFW_ajax_product_remove() {
            ob_start();
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
                {
                    WC()->cart->remove_cart_item($cart_item_key);
                }
            }

            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();

            woocommerce_mini_cart();

            $mini_cart = ob_get_clean();

            // Fragments and mini cart are returned
            $data = array(
                'fragments' => apply_filters( 'woocommerce_add_to_cart_fragments', array(
                        'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
                    )
                ),
                'cart_hash' => apply_filters( 'woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5( json_encode( WC()->cart->get_cart_for_session() ) ) : '', WC()->cart->get_cart_for_session() )
            );

            wp_send_json( $data );

            die();
        }
        
        function SCFW_change_qty_cust() {

            $c_key = sanitize_text_field($_REQUEST['c_key']);
            $qty = sanitize_text_field($_REQUEST['qty']);
            WC()->cart->set_quantity($c_key, $qty, true);
            WC()->cart->set_session();
            exit();
        }

        function SCFW_coupon_ajax_call_func() {
            
            $code = $_REQUEST['coupon_code'];

            // Check coupon code to make sure is not empty
            if( empty( $code ) || !isset( $code ) ) {
                // Build our response
                $response = array(
                    'result'    => 'empty',
                    'message'   => 'Coupon Code Field is Empty!'
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();
            }

            // Create an instance of WC_Coupon with our code
            $coupon = new WC_Coupon( $code );

            if (in_array($code, WC()->cart->get_applied_coupons())) {
                $response = array(
                    'result'    => 'already applied',
                    'message'   => 'Coupon Code Already Applied.'
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();

            } elseif( !$coupon->is_valid() ) {
                // Build our response
                $response = array(
                    'result'    => 'not valid',
                    'message'   => 'Invalid code entered. Please try again.'
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                exit();

            } else {
                
                WC()->cart->apply_coupon( $code );
                // Build our response
                $response = array(
                    'result'    => 'success',
                    'message'      => 'Coupon Applied Successfully.'
                );

                header( 'Content-Type: application/json' );
                echo json_encode( $response );

                // Always exit when doing ajax
                WC()->cart->calculate_totals();
                WC()->cart->maybe_set_cart_cookies();
                WC()->cart->set_session();
                wc_clear_notices();
                exit();

            }
        }


        function SCFW_remove_applied_coupon_ajax_call_func() {
            $code = $_REQUEST['remove_code'];
            
            if(WC()->cart->remove_coupon( $code )) {
                echo 'Coupon Removed Successfully.';
            }
            WC()->cart->calculate_totals();
            WC()->cart->maybe_set_cart_cookies();
            WC()->cart->set_session();
            exit();
        }


        function SCFW_coupons_reponse_message() {
        ?>

            <div class="wfc_coupon_response">
                <span id="wfc_cpn_resp"></span>
            </div>
        <?php
        }


    }
    SCFW_front::instance();
}