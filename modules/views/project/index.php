<link rel="stylesheet" href="<?=BASE_URL?>resources/css/project_api.css">
<h1 class="page_title">Նախագծեր</h1>
<div class="project_api_list d-flex flex-column w-100">
    <div class="d-flex justify-content-between">
        <div></div>
        <a href="<?=$this->helperUrl(array('controller'=>'Project','action'=>'form'))?>" class="btn btn-success d-flex gap-2 align-items-center mb-3" style="width: fit-content;float: right">
            <i class="fa fa-plus"></i>
            Ավելացնել նախագիծ
        </a>
    </div>
    <?php
    if(!empty($project_api_list)):
        foreach ($project_api_list as $index => $pal):?>
            <div>
                <div class="w-100 projectCollapseOpener <?=$index>0?'mt-4':''?>" data-id="<?=$pal['id']?>">
                    <div class="for_bg w-100 d-flex justify-content-between">
                        <div class="proj_name"  data-bs-toggle="collapse" data-bs-target="#collapseProject<?=$index?>" aria-expanded="false" aria-controls="collapseProject<?=$index?>">
                            <?=$pal['title']?>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="<?=$this->helperUrl(array('controller'=>'Project','action'=>'form','data'=>array('id'=>$index+1)))?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil"></i>
                                <div class="btn-text">
                                    Խմբագրել
                                </div>
                            </a>
                            <a class="btn btn-sm btn-success" href="<?=$this->helperUrl(array('controller'=>'Api','action'=>'form'))?>">
                                <i class="fa fa-plus"></i>
                                <div class="btn-text">
                                    Ավելացնել API
                                </div>
                            </a>
                            <i class="fa fa-chevron-down" data-bs-toggle="collapse" data-bs-target="#collapseProject<?=$index?>" aria-expanded="false" aria-controls="collapseProject<?=$index?>" style="cursor: pointer"></i>
                        </div>
                    </div>
                </div>
                <?php if(!empty($pal['api_list'])):?>
                    <div class="collapse projectCollapse" id="collapseProject<?=$index?>">
                        <div class="card card-body">
                            <?php foreach ($pal['api_list'] as $i => $api):?>
                                <div class="w-100 p-3 mb-3 d-flex justify-content-between align-items-center" style="border:1px solid gray;border-radius: 5px;" data-id="<?=$api['id']?>">
                                    <div class="d-flex justify-content-between align-items-center gap-2 project_api_name">
                                        <?=$api['title']?>
                                        <div class="message_circle d-flex align-items-center justify-content-center" title="Նոր նամակներ"><?=rand(1,10)*($i+1)?></div>
                                    </div>
                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="<?=$this->helperUrl(array('controller'=>'Api','action'=>'view','data'=>array('id'=>$api['id'])))?>" class="btn btn-secondary d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-eye"></i>
                                            <div class="btn-text">
                                                Դիտել
                                            </div>
                                        </a>
                                        <a href="<?=$this->helperUrl(array('controller'=>'Api','action'=>'form','data'=>array('id'=>$api['id'])))?>" class="btn btn-primary d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-pencil"></i>
                                            <div class="btn-text">
                                                Խմբագրել
                                            </div>
                                        </a>
                                        <button class="btn btn-danger d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-trash"></i>
                                            <div class="btn-text">
                                                Հեռացնել
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        <?php endforeach;
    endif; ?>
</div>

