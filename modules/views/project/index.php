<link rel="stylesheet" href="<?= BASE_URL.'resources/css/project_api.css'?>">
<script src="<?=BASE_URL.'resources/js/project_api.js'?>"></script>
<div class="project_api_list d-flex flex-column w-100">
    <div class="d-flex justify-content-between">
        <div></div>
        <a href="<?=$this->helperUrl(array('controller'=>'project','action'=>'form'))?>" class="btn btn-success d-flex gap-2 align-items-center mb-3" style="width: fit-content;float: right">
            <i class="fa fa-plus"></i>
            Ավելացնել պրոեկտ
        </a>
    </div>
    <?php
    if(!empty($project_api_list)):
        foreach ($project_api_list as $index => $pal):?>
            <div class="w-100 projectCollapseOpener <?=$index>0?'mt-4':''?>" data-id="<?=$pal['id']?>">
                <div class="for_bg w-100 d-flex justify-content-between">
                    <?=$pal['title']?>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-warning gap-2">
                            <i class="fa fa-eye"></i>
                            Դիտել
                        </button>
                        <a href="<?=$this->helperUrl(array('controller'=>'project','action'=>'form'))?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-pencil"></i>
                            Խմբագրել
                        </a>
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i>
                            Ավելացնել API
                        </button>
                        <i class="fa fa-chevron-down" data-bs-toggle="collapse" data-bs-target="#collapseProject<?=$index?>" aria-expanded="false" aria-controls="collapseProject<?=$index?>" style="cursor: pointer"></i>
                    </div>
                </div>
            </div>
            <?php if(!empty($pal['api_list'])):?>
                <div class="collapse projectCollapse" id="collapseProject<?=$index?>">
                    <div class="card card-body">
                        <?php foreach ($pal['api_list'] as $i => $api):?>
                            <div class="w-100 p-3 mb-3 d-flex justify-content-between align-items-center" style="border:1px solid gray;border-radius: 5px;" data-id="<?=$api['id']?>">
                                <div class="d-flex justify-content-between align-items-center gap-2">
                                    <?=$api['title']?>
                                    <div class="message_circle d-flex align-items-center justify-content-center" title="Նոր նամակներ"><?=rand(1,10)*($i+1)?></div>
                                </div>
                                <div class="d-flex justify-content-between gap-2">
                                    <button class="btn btn-secondary d-flex justify-content-between align-items-center gap-2">
                                        <i class="fa fa-eye"></i>
                                        Դիտել
                                    </button>
                                    <button class="btn btn-danger d-flex justify-content-between align-items-center gap-2">
                                        <i class="fa fa-trash"></i>
                                        Հեռացնել
                                    </button>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;
        endforeach;
    endif; ?>
</div>

