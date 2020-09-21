<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('SCFW_admin_menu')) {

    class SCFW_admin_menu {

        protected static $SCFW_instance;

        function scfw_submenu_page() {
            add_submenu_page( 'woocommerce', 'Floating Cart', 'Floating Cart', 'manage_options', 'floating-cart',array($this, 'scfw_callback'));
        }

        function scfw_callback() {
            ?>    
                <div class="wrap">
                    <h2>Cart Setting</h2>
                    <?php if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
                        <div class="notice notice-success is-dismissible"> 
                            <p><strong>Record updated successfully.</strong></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="wfc-container">
                    <form method="post" >
                        <?php wp_nonce_field( 'wfc_nonce_action', 'wfc_nonce_field' ); ?>
                        <ul class="tabs">
                            <li class="tab-link current" data-tab="wfc-tab-general"><?php echo __( 'General Settings', SCFW_DOMAIN );?></li>
                            <li class="tab-link" data-tab="wfc-tab-other"><?php echo __( 'Custom Style', SCFW_DOMAIN );?></li>
                        </ul>
                        <div id="wfc-tab-general" class="tab-content current">
                            <div class="cover_div">
                                <h2>Side cart</h2>
                                <table class="data_table">
                                   
                                    <tr>
                                        <th>Ajax Add To Cart</th>
                                        <td>
                                            <input type="checkbox" name="wfc_ajax_cart" value="yes" <?php if (get_option( 'wfc_ajax_cart' ) == "yes" || empty(get_option( 'wfc_ajax_cart' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Add to cart without page refresh.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Title Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Head Title</th>
                                        <td>
                                            <input type="text" name="wfc_head_title" value="<?php if(!empty(get_option( 'wfc_head_title' ))){ echo get_option( 'wfc_head_title' ); }else{ echo "Your Cart";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text</th>
                                        <td>
                                            <input type="text" name="wfc_ship_txt" value="<?php if(!empty(get_option( 'wfc_ship_txt' ))){ echo get_option( 'wfc_ship_txt' ); }else{ echo "To find out your shipping cost , Please proceed to checkout.";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Button Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show ViewCart Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_cart_option" value="yes" <?php if (get_option( 'wfc_cart_option' ) == "yes" || empty(get_option( 'wfc_cart_option' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Viewcart Button.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Checkout Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_checkout_option" value="yes" <?php if (get_option( 'wfc_checkout_option' ) == "yes" || empty(get_option( 'wfc_checkout_option' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Checkout Button.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Continue Shopping Button</th>
                                        <td>
                                            <input type="checkbox" name="wfc_conshipping_option" value="yes" <?php if (get_option( 'wfc_conshipping_option' ) == "yes" || empty(get_option( 'wfc_conshipping_option' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Continue Shipping Button.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ViewCart Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_cart_txt" value="<?php if(!empty(get_option( 'wfc_cart_txt' ))){ echo get_option( 'wfc_cart_txt' ); }else{ echo "View Cart";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Checkout Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_checkout_txt" value="<?php if(!empty(get_option( 'wfc_checkout_txt' ))){ echo get_option( 'wfc_checkout_txt' ); }else{ echo "Checkout";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Continue Shopping Button Text</th>
                                        <td>
                                            <input type="text" name="wfc_conshipping_txt" value="<?php if(!empty(get_option( 'wfc_conshipping_txt' ))){ echo get_option( 'wfc_conshipping_txt' ); }else{ echo "Continue Shopping";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Continue Shopping Button Link</th>
                                        <td>
                                            <input type="text" name="wfc_conshipping_link" value="<?php if(!empty(get_option( 'wfc_conshipping_link' ))){ echo get_option( 'wfc_conshipping_link' ); }else{ echo "#";} ?>">
                                            <strong>Use "#" for the same page</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Product Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Show Delete Option</th>
                                        <td>
                                            <input type="checkbox" name="wfc_delet_option" value="yes" <?php if (get_option( 'wfc_delet_option' ) == "yes" || empty(get_option( 'wfc_delet_option' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Display Product Remove Option.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Display Qty Box</th>
                                        <td>
                                            <input type="checkbox" name="wfc_qty_box" value="yes" <?php if (get_option( 'wfc_qty_box' ) == "yes") {echo 'checked="checked"';} ?>>
                                            <strong>Display Product Qty box.</strong>
                                        </td>
                                    </tr>
                                    
                                    
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart Product Slider</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Select Product</th>
                                        <td>
                                            <select id="wfc_select_product" name="wfc_select2[]" multiple="multiple" style="width:100%;max-width:15em;">
                                                <?php 
                                                    $productsa = get_option('wfc_select2');
                                                    foreach ($productsa as $value) {
                                                        $productc = wc_get_product( $value );
                                                        if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                                            $title = $productc->get_name();
                                                            ?>
                                                                <option value="<?php echo $value; ?>" selected="selected"><?php echo $title; ?></option>
                                                            <?php   
                                                        }
                                                    }
                                                ?>
                                           </select> 
                                        </td>
                                    </tr>   
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart basket</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Cart Icon</th>
                                        <td>
                                            <input type="checkbox" name="wfc_show_cart_icn" value="yes" <?php if (get_option( 'wfc_show_cart_icn' ) == "yes" || empty(get_option( 'wfc_show_cart_icn' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Cart Icon</strong>
                                        </td>
                                    </tr>   
                                    <tr>
                                        <th>On Cart & Checkout Page</th>
                                        <td>
                                            <input type="checkbox" name="wfc_cart_check_page" value="yes" <?php if (get_option( 'wfc_cart_check_page' ) == "yes" || empty(get_option( 'wfc_cart_check_page' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Cart Basket on cart and checkout pages.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cart on mobile</th>
                                        <td>
                                            <input type="checkbox" name="wfc_mobile" value="yes" <?php if (get_option( 'wfc_mobile' ) == "yes" || empty(get_option( 'wfc_mobile' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Cart on mobile device.</strong>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Product Count</th>
                                        <td>
                                            <input type="checkbox" name="wfc_product_cnt" value="yes" <?php if (get_option( 'wfc_product_cnt' ) == "yes" || empty(get_option( 'wfc_product_cnt' ))) {echo 'checked="checked"';} ?>>
                                            <strong>Show Product Count.</strong>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Hide Basket Pages</th>
                                        <td>
                                            <input type="text" name="wfc_on_pages" value="<?php echo get_option( 'wfc_on_pages' ); ?>">
                                            <strong>Do not show basket on pages.</strong>
                                            <strong>Use page id separated by comma. For eg: 31,41,51</strong>
                                        </td>
                                    </tr> 
                                </table>
                            </div>
                            
                        </div>
                        <div id="wfc-tab-other" class="tab-content">
                            <div class="cover_div">
                                <h2>Side cart</h2>
                                <table class="data_table">
                                    
                                    <tr>
                                        <td>
                                            <h3>Title Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Header Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_head_ft_size" value="<?php if(!empty(get_option( 'wfc_head_ft_size' ))){ echo get_option( 'wfc_head_ft_size' ); }else{ echo "20"; } ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Header Font Color</th>
                                        <td>
                                            <input type="color" name="wfc_head_ft_clr" value="<?php if(!empty(get_option( 'wfc_head_ft_clr' ))){ echo get_option( 'wfc_head_ft_clr' ); }else{ echo "#000000";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_ship_ft_size" value="<?php if(!empty(get_option( 'wfc_ship_ft_size' ))){ echo get_option( 'wfc_ship_ft_size' ); }else{ echo "16"; } ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Text Font Color</th>
                                        <td>
                                            <input type="color" name="wfc_ship_ft_clr" value="<?php if(!empty(get_option( 'wfc_ship_ft_clr' ))){ echo get_option( 'wfc_ship_ft_clr' ); }else{ echo "#000000";} ?>">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <h3>Cart Product Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_product_ft_size" value="<?php if(!empty(get_option( 'wfc_product_ft_size' ))){ echo get_option( 'wfc_product_ft_size' ); }else{ echo "16";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Color</th>
                                        <td>
                                            <input type="color" name="wfc_product_ft_clr" value="<?php if(!empty(get_option( 'wfc_product_ft_clr' ))){ echo get_option( 'wfc_product_ft_clr' ); }else{ echo "#000000";} ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h3>Slider Product Setting</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Size</th>
                                        <td>
                                            <input type="number" name="wfc_sld_product_ft_size" value="<?php if(!empty(get_option( 'wfc_sld_product_ft_size' ))){ echo get_option( 'wfc_sld_product_ft_size' ); }else{ echo "18";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Product Font Color</th>
                                        <td>
                                            <input type="color" name="wfc_sld_product_ft_clr" value="<?php if(!empty(get_option( 'wfc_sld_product_ft_clr' ))){ echo get_option( 'wfc_sld_product_ft_clr' ); }else{ echo "#000000";} ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h3>Footer Button Setting</h3>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Footer Buttons Color</th>
                                        <td>
                                            <input type="color" name="wfc_ft_btn_clr" value="<?php if(!empty(get_option( 'wfc_ft_btn_clr' ))){ echo get_option( 'wfc_ft_btn_clr' ); }else{ echo "#766f6f";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Footer Buttons Text Color</th>
                                        <td>
                                            <input type="color" name="wfc_ft_btn_txt_clr" value="<?php if(!empty(get_option( 'wfc_ft_btn_txt_clr' ))){ echo get_option( 'wfc_ft_btn_txt_clr' ); }else{ echo "#ffffff";} ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Footer Buttons Margin</th>
                                        <td>
                                            <input type="number" name="wfc_ft_btn_mrgin" value="<?php if(!empty(get_option( 'wfc_ft_btn_mrgin' ))){ echo get_option( 'wfc_ft_btn_mrgin' ); }else{ echo "5";} ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cover_div">
                                <h2>Cart basket</h2>
                                <table class="data_table">
                                    <tr>
                                        <th>Basket Position</th>
                                        <td>
                                            <select name="wfc_basket_position">
                                                <option value="top" <?php if(get_option( 'wfc_basket_position' ) == "top"){ echo "selected"; } ?>>Top</option>
                                                <option value="bottom" <?php if(get_option( 'wfc_basket_position' ) == "bottom" || empty(get_option( 'wfc_basket_position' ))){ echo "selected"; } ?>>Bottom</option>
                                            </select>
                                        </td>
                                    </tr>   
                                    
                                   
                                    <tr>
                                        <th>Basket Icon Size</th>
                                        <td>
                                            <input type="number" name="wfc_basket_icn_size" value="<?php if(!empty(get_option( 'wfc_basket_icn_size' ))){ echo get_option( 'wfc_basket_icn_size' ); }else{ echo "60";} ?>">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Basket Background Color</th>
                                        <td><input type="color" name="wfc_basket_bg_clr" value="<?php if(!empty(get_option( 'wfc_basket_bg_clr' ))){ echo get_option( 'wfc_basket_bg_clr' ); }else{ echo "#cccccc";} ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Count Background Color</th>
                                        <td>
                                            <input type="color" name="wfc_cnt_bg_clr" value="<?php if(!empty(get_option( 'wfc_cnt_bg_clr' ))){ echo get_option( 'wfc_cnt_bg_clr' ); }else{ echo "#000000";} ?>">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Count Text Color</th>
                                        <td>
                                            <input type="color" name="wfc_cnt_txt_clr" value="<?php if(!empty(get_option( 'wfc_cnt_txt_clr' ))){ echo get_option( 'wfc_cnt_txt_clr' ); }else{ echo "#ffffff";} ?>">
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th>Count Text Size</th>
                                        <td>
                                            <input type="number" name="wfc_cnt_txt_size" value="<?php if(!empty(get_option( 'wfc_cnt_txt_size' ))){ echo get_option( 'wfc_cnt_txt_size' ); }else{ echo "15";} ?>">
                                        </td>
                                    </tr> 
                                </table>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="wfc_save_option">
                        <input type="submit" value="Save changes" name="submit" class="button-primary" id="wfc-btn-space">
                    </form>  
                </div>
            <?php
        }

        function scfw_recursive_sanitize_text_field($array) {  
            if(!empty($array)) {
                foreach ( $array as $key => $value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->scfw_recursive_sanitize_text_field($value);
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }
            }
            return $array;
        }

        function scfw_save_options(){
            if( current_user_can('administrator') ) { 
              if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'wfc_save_option'){
                if(!isset( $_POST['wfc_nonce_field'] ) || !wp_verify_nonce( $_POST['wfc_nonce_field'], 'wfc_nonce_action' ) ){
                    print 'Sorry, your nonce did not verify.';
                    exit;
                }else{
                    $scfw_ajax_cart = (!empty(sanitize_text_field( $_REQUEST['wfc_ajax_cart'] )))? sanitize_text_field( $_REQUEST['wfc_ajax_cart'] ) : 'no';
                    update_option('wfc_ajax_cart', $scfw_ajax_cart, 'yes');

                    update_option('wfc_head_title', sanitize_text_field( $_REQUEST['wfc_head_title'] ), 'yes');

                    update_option('wfc_ship_txt', sanitize_text_field( $_REQUEST['wfc_ship_txt'] ), 'yes');

                    $scfwqty_box = (!empty(sanitize_text_field( isset($_REQUEST['wfc_qty_box']) && $_REQUEST['wfc_qty_box'] )))? sanitize_text_field( $_REQUEST['wfc_qty_box'] ) : 'no';
                    update_option('wfc_qty_box', $scfwqty_box, 'yes');

                    $scfwdel_op = (!empty(sanitize_text_field( $_REQUEST['wfc_delet_option'] )))? sanitize_text_field( $_REQUEST['wfc_delet_option'] ) : 'no';
                    update_option('wfc_delet_option', $scfwdel_op, 'yes');

                    $scfwcart_btn = (!empty(sanitize_text_field( $_REQUEST['wfc_cart_option'] )))? sanitize_text_field( $_REQUEST['wfc_cart_option'] ) : 'no';
                    update_option('wfc_cart_option', $scfwcart_btn, 'yes');

                    $scfwchk_btn = (!empty(sanitize_text_field( $_REQUEST['wfc_checkout_option'] )))? sanitize_text_field( $_REQUEST['wfc_checkout_option'] ) : 'no';
                    update_option('wfc_checkout_option', $scfwchk_btn, 'yes');

                    $scfwcnt_ship_btn = (!empty(sanitize_text_field( $_REQUEST['wfc_conshipping_option'] )))? sanitize_text_field( $_REQUEST['wfc_conshipping_option'] ) : 'no';
                    update_option('wfc_conshipping_option', $scfwcnt_ship_btn, 'yes');

                    

                    $scfwcart_icn = (!empty(sanitize_text_field( $_REQUEST['wfc_show_cart_icn'] )))? sanitize_text_field( $_REQUEST['wfc_show_cart_icn'] ) : 'no';
                    update_option('wfc_show_cart_icn', $scfwcart_icn, 'yes');

                    $scfwcart_checkout_page = (!empty(sanitize_text_field( $_REQUEST['wfc_cart_check_page'] )))? sanitize_text_field( $_REQUEST['wfc_cart_check_page'] ) : 'no';
                    update_option('wfc_cart_check_page', $scfwcart_checkout_page, 'yes');

                    $scfwmobile_look = (!empty(sanitize_text_field( $_REQUEST['wfc_mobile'] )))? sanitize_text_field( $_REQUEST['wfc_mobile'] ) : 'no';
                    update_option('wfc_mobile', $scfwmobile_look, 'yes');

                    $scfwpro_cnt = (!empty(sanitize_text_field( $_REQUEST['wfc_product_cnt'] )))? sanitize_text_field( $_REQUEST['wfc_product_cnt'] ) : 'no';
                    update_option('wfc_product_cnt', $scfwpro_cnt, 'yes');

                    update_option('wfc_on_pages', sanitize_text_field( $_REQUEST['wfc_on_pages'] ), 'yes');

                    $scfw_select2 = $this->scfw_recursive_sanitize_text_field($_REQUEST['wfc_select2'] );
                    update_option('wfc_select2', $scfw_select2, 'yes');

                    update_option('wfc_cart_txt', sanitize_text_field( $_REQUEST['wfc_cart_txt'] ), 'yes');

                    update_option('wfc_checkout_txt', sanitize_text_field( $_REQUEST['wfc_checkout_txt'] ), 'yes');

                    update_option('wfc_conshipping_txt', sanitize_text_field( $_REQUEST['wfc_conshipping_txt'] ), 'yes');

                    update_option('wfc_conshipping_link', sanitize_text_field( $_REQUEST['wfc_conshipping_link'] ), 'yes');
                    update_option('wfc_head_ft_size', sanitize_text_field( $_REQUEST['wfc_head_ft_size'] ), 'yes');
                    update_option('wfc_head_ft_clr', sanitize_text_field( $_REQUEST['wfc_head_ft_clr'] ), 'yes');
                    update_option('wfc_ship_ft_size', sanitize_text_field( $_REQUEST['wfc_ship_ft_size'] ), 'yes');
                    update_option('wfc_ship_ft_clr', sanitize_text_field( $_REQUEST['wfc_ship_ft_clr'] ), 'yes');
                    update_option('wfc_product_ft_size', sanitize_text_field( $_REQUEST['wfc_product_ft_size'] ), 'yes');
                    update_option('wfc_product_ft_clr', sanitize_text_field( $_REQUEST['wfc_product_ft_clr'] ), 'yes');
                    update_option('wfc_sld_product_ft_size', sanitize_text_field( $_REQUEST['wfc_sld_product_ft_size'] ), 'yes');
                    update_option('wfc_sld_product_ft_clr', sanitize_text_field( $_REQUEST['wfc_sld_product_ft_clr'] ), 'yes');
                    // update_option('wfc_product_img_width', sanitize_text_field( $_REQUEST['wfc_product_img_width'] ), 'yes');
                    update_option('wfc_ft_btn_mrgin', sanitize_text_field( $_REQUEST['wfc_ft_btn_mrgin'] ), 'yes');
                    update_option('wfc_ft_btn_clr', sanitize_text_field( $_REQUEST['wfc_ft_btn_clr'] ), 'yes');
                    update_option('wfc_ft_btn_txt_clr', sanitize_text_field( $_REQUEST['wfc_ft_btn_txt_clr'] ), 'yes');
                    update_option('wfc_basket_position', sanitize_text_field( $_REQUEST['wfc_basket_position'] ), 'yes');
                    update_option('wfc_basket_bg_clr', sanitize_text_field( $_REQUEST['wfc_basket_bg_clr'] ), 'yes');
                    //update_option('wfc_basket_icn_clr', sanitize_text_field( $_REQUEST['wfc_basket_icn_clr'] ), 'yes');
                    update_option('wfc_basket_icn_size', sanitize_text_field( $_REQUEST['wfc_basket_icn_size'] ), 'yes');
                    update_option('wfc_cnt_bg_clr', sanitize_text_field( $_REQUEST['wfc_cnt_bg_clr'] ), 'yes');
                    update_option('wfc_cnt_txt_clr', sanitize_text_field( $_REQUEST['wfc_cnt_txt_clr'] ), 'yes');
                    update_option('wfc_cnt_txt_size', sanitize_text_field( $_REQUEST['wfc_cnt_txt_size'] ), 'yes');


                    //if($_REQUEST['wfc_ajax_cart'] == "yes"){
                    update_option('woocommerce_enable_ajax_add_to_cart', $scfw_ajax_cart, 'yes');
                    //}
                }
              }
            }
        }

        function scfw_product_ajax(){
          
                $return = array();
                $post_types = array( 'product','product_variation');
               
             
                $search_results = new WP_Query( array( 
                    's'=> sanitize_text_field($_GET['q']),
                    'post_status' => 'publish',
                    'post_type' => $post_types,
                    'posts_per_page' => -1,
                    'meta_query' => array(
                                        array(
                                            'key' => '_stock_status',
                                            'value' => 'instock',
                                            'compare' => '=',
                                        )
                                    )
                    ) );
                 

                if( $search_results->have_posts() ) :
                   while( $search_results->have_posts() ) : $search_results->the_post();   
                      $productc = wc_get_product( $search_results->post->ID );
                      if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
                         $title = $search_results->post->post_title;
                         $price = $productc->get_price_html();
                         $return[] = array( $search_results->post->ID, $title, $price);   
                      }
                   endwhile;
                endif;
                echo json_encode( $return );
                die;
        }

        function scfw_update_option($key,$val){
        	if(!get_option($key)){
        		update_option($key, $val, 'yes');
        	}
        }

        function init() {
            add_action( 'admin_menu',  array($this, 'scfw_submenu_page'));
            add_action( 'init',  array($this, 'scfw_save_options'));
            add_action( 'wp_ajax_nopriv_WFC_product_ajax',array($this, 'scfw_product_ajax') );
            add_action( 'wp_ajax_WFC_product_ajax', array($this, 'scfw_product_ajax') );


            $this->scfw_update_option('wfc_ajax_cart', "yes");
            $this->scfw_update_option('wfc_ajax_cart', "yes");
    		$this->scfw_update_option('wfc_head_title', "Your Cart");
    		$this->scfw_update_option('wfc_ship_txt', "To find out your shipping cost , Please proceed to checkout.");
    		$this->scfw_update_option('wfc_delet_option', "yes");
    		$this->scfw_update_option('wfc_cart_option', "yes");
    		$this->scfw_update_option('wfc_checkout_option', "yes");
    		$this->scfw_update_option('wfc_conshipping_option', "yes");
    		$this->scfw_update_option('wfc_cart_txt', "View Cart");
    		$this->scfw_update_option('wfc_checkout_txt', "Checkout");
    		$this->scfw_update_option('wfc_conshipping_txt', "Continue Shopping");
    		$this->scfw_update_option('wfc_conshipping_link', "#");
    		$this->scfw_update_option('wfc_show_cart_icn', "yes");
    		$this->scfw_update_option('wfc_cart_check_page', "yes");
    		$this->scfw_update_option('wfc_mobile', "yes");
    		$this->scfw_update_option('wfc_product_cnt', "yes");

    		$this->scfw_update_option('wfc_head_ft_size', 20);
    		$this->scfw_update_option('wfc_head_ft_clr', "#000000");
            $this->scfw_update_option('wfc_ship_ft_size', 16);
            $this->scfw_update_option('wfc_ship_ft_clr', "#000000");
    		$this->scfw_update_option('wfc_product_ft_size', 16);
    		$this->scfw_update_option('wfc_product_ft_clr', "#000000");
            $this->scfw_update_option('wfc_sld_product_ft_size', 18);
            $this->scfw_update_option('wfc_sld_product_ft_clr', "#000000");
    		$this->scfw_update_option('wfc_ft_btn_mrgin', 5);
    		$this->scfw_update_option('wfc_ft_btn_clr', "#766f6f");
    		$this->scfw_update_option('wfc_ft_btn_txt_clr', "#ffffff");
    		$this->scfw_update_option('wfc_basket_position', "bottom");
    		$this->scfw_update_option('wfc_basket_bg_clr', "#cccccc");
    		$this->scfw_update_option('wfc_basket_icn_size', 60);
    		$this->scfw_update_option('wfc_cnt_bg_clr', "#000000");
    		$this->scfw_update_option('wfc_cnt_txt_clr', "#ffffff");
    		$this->scfw_update_option('wfc_cnt_txt_size', 15);
    		$this->scfw_update_option('woocommerce_enable_ajax_add_to_cart', 'yes');
        }

        public static function SCFW_instance() {
            if (!isset(self::$SCFW_instance)) {
                self::$SCFW_instance = new self();
                self::$SCFW_instance->init();
            }
            return self::$SCFW_instance;
        }
    }
    SCFW_admin_menu::SCFW_instance();
}

