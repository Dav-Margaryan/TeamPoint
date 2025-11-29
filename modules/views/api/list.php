<link rel="stylesheet" href="<?=BASE_URL.'resources/css/apiList.css'?>">
<div class="api_categories">
    <h1>API կատեգորիաներ</h1>
    <div class="cat_list">
        <div class="categories_list pb-1">
            <div class="circle_category" title="Ֆինանսներ"><i class="fa-solid fa-building-columns"></i></div>
            <div class="circle_category" title="Ճանապպարհորդություն"><i class="fa-solid fa-earth-americas"></i></div>
            <div class="circle_category" title="Ժամանց"><i class="fa-solid fa-utensils"></i></div>
            <div class="circle_category" title="Տոմսեր"><i class="fa-solid fa-ticket-alt"></i></div>
            <div class="circle_category" title="Խանութներ"><i class="fa-solid fa-shop"></i></div>
            <div class="circle_category" title="Ուսուցողական"><i class="fa-solid fa-chalkboard-user"></i></div>
            <div class="circle_category" title="Ֆինանսներ"><i class="fa-solid fa-building-columns"></i></div>
            <div class="circle_category" title="Ճանապպարհորդություն"><i class="fa-solid fa-earth-americas"></i></div>
            <div class="circle_category" title="Ժամանց"><i class="fa-solid fa-utensils"></i></div>
            <div class="circle_category" title="Տոմսեր"><i class="fa-solid fa-ticket-alt"></i></div>
            <div class="circle_category" title="Խանութներ"><i class="fa-solid fa-shop"></i></div>
            <div class="circle_category" title="Ուսուցողական"><i class="fa-solid fa-chalkboard-user"></i></div>
            <div class="circle_category" title="Ֆինանսներ"><i class="fa-solid fa-building-columns"></i></div>
            <div class="circle_category" title="Ճանապպարհորդություն"><i class="fa-solid fa-earth-americas"></i></div>
            <div class="circle_category" title="Ժամանց"><i class="fa-solid fa-utensils"></i></div>
            <div class="circle_category" title="Տոմսեր"><i class="fa-solid fa-ticket-alt"></i></div>
            <div class="circle_category" title="Խանութներ"><i class="fa-solid fa-shop"></i></div>
            <div class="circle_category" title="Ուսուցողական"><i class="fa-solid fa-chalkboard-user"></i></div>
        </div>
    </div>
</div>
<div class="search_block">
    <div style="position: relative;">
        <input type="text" class="form-control fast_search" placeholder="Արագ որոնում">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>
</div>
<br>
<div class="api_list_block">
    <?php
    if(!empty($api_list)):
        foreach ($api_list as $index => $api):?>
        <div class="mt-3">
            <div class="collapse_text_block">
                <h2 class="d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?=$index?>" aria-expanded="false" aria-controls="collapseExample<?=$index?>">
                    <span><?=$api['title']?></span>
                    <i class="fa fa-chevron-down"></i>
                </h2>
                <div class="collapse" id="collapseExample<?=$index?>">
                    <div class="card card-body">
                        <?=$api['description']?>
                        <div class="d-flex justify-content-end mt-3">
                            <a class="btn btn-primary" href="<?=$this->helperUrl(array('controller'=>'api','action'=>'details','data' => array('id'=>1)))?>">Իմանալ ավելին</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;
    endif; ?>
    <div class="text-center data_not_found d-none mt-3">
        <h2>
            Տվյալներ չեն գտնվել
        </h2>
    </div>
</div>
