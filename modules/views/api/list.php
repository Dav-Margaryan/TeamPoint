<link rel="stylesheet" href="<?=BASE_URL.'resources/css/apiList.css'?>">
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
