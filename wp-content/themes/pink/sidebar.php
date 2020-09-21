<?php if(!is_front_page()&&!is_page( '線上購物' )&&!is_page( '購物車' )&&!is_page( '結帳頁面' )) : ?>
  <!-- /.blog-main -->
      <aside class="blog__sidebar">
        <div class="p-4 sidebar-module">
            <?php if(is_active_sidebar('sidebar')): ?>
            <?php dynamic_sidebar('sidebar');?>
            <?php endif; ?>
        </div>
      </aside><!-- /.blog-sidebar -->

<?php endif;?>