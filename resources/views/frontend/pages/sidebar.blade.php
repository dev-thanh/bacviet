<?php $language=request()->session()->get('lang');
    ?>
<div class="sidebar-left sticky-top">
    <div class="sidebar-cate">
        <h2><span>{{ __('cateproduct') }}</span></h2>
        <div class="cate-list">
            <?php $data = showCategories_product($menu_pro, $parent_id=0,$level = '',$language,$li=0);?>
        </div>
    </div>
</div>