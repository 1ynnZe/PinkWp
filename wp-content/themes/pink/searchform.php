<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <input type="search" class="search-field form-control" placeholder="請輸入關鍵字搜尋..."name="s" title="Search"value="<?php echo get_search_query() ?>">
    <button type="submit"><i class="fa fa-search"></i></button>
</form>
