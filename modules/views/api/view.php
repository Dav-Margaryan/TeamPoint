<link rel="stylesheet" href="<?= BASE_URL.'resources/css/api.css'?>">
<script src="<?=BASE_URL.'resources/js/slick.js'?>"></script>
<script src="<?=BASE_URL.'resources/js/api.js'?>"></script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<style>
    .main{
        display: flex;
        flex-direction: column;
        align-items: center
    }
    table th{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    table tbody td{
        text-align: center;
    }
</style>
<?=!empty($end_point)?"<h1 class='endpoint'>".((!empty($server)?$server:'').$end_point)."</h1>":""?>
<div class="sub_main">
    <div class="row m-0 desktop_block">
        <div class="block1 col-12 col-lg-6 p-0">
            <div class="team_block d-flex flex-column w-100">
                <div class="w-100 p-3 team_block_header d-flex justify-content-between align-items-center">
                    Թիմի անդամներ
                    <i class="fa fa-plus-circle"></i>
                </div>
                <div class="members p-2 d-flex overflow-x-auto">
                    <?php if (!empty($team_members)):
                            foreach ($team_members as $member):?>
                                <div class="member mt-2 d-flex align-items-center" data-id="<?=$member['id']?>">
                                    <div class="member_image d-flex align-items-center justify-content-center p-4" style="background-color: <?='dark'.$member['color']?>;text-align: center" title="<?=$member['full_name']?>"><?=mb_substr($member['full_name'],0,1, "UTF-8")?></div>
                                </div>
                    <?php   endforeach;
                    endif;?>
                </div>
            </div>
            <div class="conversation_block">
                <div class="all_messages p-3 d-flex flex-column">
                    <?php if(!empty($messages)):
                            foreach ($messages as $index => $message):?>
                                <div class="message_block d-flex gap-2 mt-3 <?=($message['writer_id']==5?'mine':'')?> <?=empty($messages[$index+1])?' mb-5':''?>" data-id="<?=$message['message_id']?>">
                                    <div class="message_member_img" title="<?=$message['writer_full_name']?>" style="background-color: <?='dark'.$message['color']?>"></div>
                                    <div class="message">
                                        <?=$message['message']?>
                                    </div>
                                </div>
                    <?php endforeach;
                    endif;?>
                </div>
            </div>
            <div class="my_message d-flex align-items-center gap-2 p-2">
                <i class="fa fa-plus" style="font-size: 30px"></i>
                <textarea name="" id="" cols="30" rows="10" class="my_message_input" placeholder="Ձեր նամակը․․․․"></textarea>
                <i class="fa fa-smile" data-bs-toggle="modal" data-bs-target="#emoji_set" style="font-size: 30px"></i>
            </div>
        </div>
        <div class="block2 col-12 col-lg-6 p-0">
            <div class="api_block_header d-flex align-items-center justify-content-between ps-3 pe-3">
                <div style="width: fit-content;position: relative;display: inline-block">
                    <div class="d-flex align-items-center gap-2 bg-success p-1 ps-3 pe-3" style="border-radius: 5px" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMethod" aria-expanded="false" aria-controls="collapseMethod">
                        <?= !empty($request_params['method'])?strtoupper($request_params['method']):'Մեթոդ'?>
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="collapse" id="collapseMethod">
                        <div class="card card-body text-black">
                            <ul class="mb-0">
                                <?php foreach(API::$METHODS as $method):?>
                                    <li><?=$method?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary api_description" ><span>Նկարագրություն</span><i class="fa-brands fa-wpforms"></i></button>
                </div>
            </div>
            <div class="d-flex justify-content-between w-100 blocks p-3">
                <div class="border-end-1 active" data-slide="1" style="width: 33%;" >Պարամետրեր</div>
                <div class="border-end-1" data-slide="2" style="width: 34%" >Գլխագրեր</div>
                <div style="width: 33%" data-slide="3" >Բովանդակություն</div>
            </div>
            <div class="api_fields p-3 pt-0">
                <div id="collapseParams">
                    <div class="fields">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Բանալի</th>
                                    <th scope="col">Տվյալի տեսակ</th>
                                    <th scope="col">Պարտադիր</th>
                                    <th scope="col">Արժեք</th>
                                    <th scope="col">Նկարագրություն</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($request_params['params'] as $key => $arr):?>
                                    <tr>
                                        <td scope="raw">
                                            <input type="text" class="form-control key" placeholder="Բանալի" value="<?=$key?>">
                                        </td>
                                        <td scope="raw">
                                            <select name="" class="form-control" id="">
                                                <option value="">Ընտրել</option>
                                                <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                    <option value="<?=$dt?>" <?=($arr['type']==$dt?'selected':'')?>><?=$dt?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td scope="raw">
                                            <input type="checkbox" <?=$arr['required']?'checked':''?>>
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="Արժեք" value="<?=$arr['value']?>">
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control description" placeholder="Նկարագրություն" value="<?=$arr['desc']?>">
                                        </td>
                                        <td class="text-center pt-3">
                                            <i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td scope="raw">
                                        <input type="text" class="form-control key" placeholder="Բանալի">
                                    </td>
                                    <td scope="raw">
                                        <select name="" class="form-control" id="">
                                            <option value="">Ընտրել</option>
                                            <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                <option value="<?=$dt?>"><?=$dt?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td scope="raw">
                                        <input type="checkbox">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control" placeholder="Արժեք">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                    </td>
                                    <td class="text-center pt-3">
                                        <i class="fa fa-trash d-none"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="collapseHeader">
                    <div class="fields">
                        <table class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Բանալի</th>
                                    <th scope="col">Տվյլաի տեսակ</th>
                                    <th scope="col">Պարտադիր</th>
                                    <th scope="col">Արժեք</th>
                                    <th scope="col">Նկարագրություն</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($request_params['header'] as $key => $arr):?>
                                    <tr>
                                        <td scope="raw">
                                            <input type="text" class="form-control key" placeholder="Բանալի" value="<?=$key?>">
                                        </td>
                                        <td scope="raw">
                                            <select name="" class="form-control" id="">
                                                <option value="">Ընտրել</option>
                                                <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                    <option value="<?=$dt?>" <?=$arr['type']==$dt?'selected':''?>><?=$dt?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td scope="raw">
                                            <input type="checkbox" <?=$arr['required']?'checked':''?>>
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="Արժեք" value="<?=$arr['value']?>">
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control description" placeholder="Նկարագրություն" value="<?=$arr['desc']?>">
                                        </td>
                                        <td class="text-center pt-3">
                                            <i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td scope="raw">
                                        <input type="text" class="form-control key" placeholder="Բանալի">
                                    </td>
                                    <td scope="raw">
                                        <select name="" class="form-control" id="">
                                            <option value="">Ընտրել</option>
                                            <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                <option value="<?=$dt?>"><?=$dt?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td scope="raw">
                                        <input type="checkbox">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control" placeholder="Արժեք">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                    </td>
                                    <td class="text-center pt-3">
                                        <i class="fa fa-trash d-none"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="collapseBody">
                    <div class="row transfer_types m-0">
                        <?php
                        $data_slide = 1;
                        foreach (API::$POST_FORM_TYPES as $form_type => $translation):?>
                            <div class="col-6 p-2 type <?=(!empty($request_params['body']['form_type'])&&$request_params['body']['form_type']==$form_type)?'active':''?>" data-slide="<?=$data_slide?>" data-type="<?=$form_type?>">
                                <b><?=$translation?></b>
                            </div>
                        <?php $data_slide++; endforeach;?>
                    </div>
                    <div class="w-200 fields mt-3">
                        <div></div>
                        <div id="multiFormData">
                            <div class="w-100 fields">
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Բանալի</th>
                                            <th scope="col">Տվյալի տեսակ</th>
                                            <th scope="col">Պարտադիր</th>
                                            <th scope="col">Արժեք</th>
                                            <th scope="col">Նկարագրություն</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="raw">
                                                <input type="text" class="form-control key" placeholder="Բանալի">
                                            </td>
                                            <td scope="raw">
                                                <select name="" id="" class="form-select data_type_select">
                                                    <option value="text">Տեքստ</option>
                                                    <option value="file">Ֆայլ</option>
                                                </select>
                                            </td>
                                            <td scope="raw">
                                                <input type="checkbox">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control" placeholder="Արժեք">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                            </td>
                                            <td scope="raw" class="text-center pt-3">
                                                <i class="fa fa-trash d-none"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div >
                        <div id="formData">
                            <div class="w-100 fields">
                                <table class="table table-bordered table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">Բանալի</th>
                                        <th scope="col">Տվյալի տեսակ</th>
                                        <th scope="col">Պարտադիր</th>
                                        <th scope="col">Արժեք</th>
                                        <th scope="col">Նկարագրություն</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="raw">
                                                <input type="text" class="form-control key" placeholder="Բանլի">
                                            </td>
                                            <td scope="raw">
                                                <select name="" class="form-control" id="">
                                                    <option value="">Ընտրել</option>
                                                    <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                        <option value="<?=$dt?>"><?=$dt?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </td>
                                            <td scope="raw">
                                                <input type="checkbox">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control" placeholder="Արժեք">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                            </td>
                                            <td scope="raw" class="text-center pt-3">
                                                <i class="fa fa-trash d-none"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="raw">
                            <div class="w-100 fields">
                                <textarea name="" id="" cols="30" rows="10" class="w-100"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="send_request btn">
                Ուղարկել հարցում
            </button>
            <div class="request_loader d-none">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div class="mobile_block">
        <div class="buttons_block">
            <button class="btn btn-danger" data-slide="1" type="button" data-bs-toggle="collapse" data-bs-target="#team_collapse" aria-expanded="false" aria-controls="team_collapse"><i class="fa-solid fa-user-group"></i>Թիմ</button>
            <button class="btn btn-primary" data-slide="2" type="button" data-bs-toggle="collapse" data-bs-target="#chat_collapse" aria-expanded="false" aria-controls="chat_collapse"><i class="fa-solid fa-comments"></i>Նամակագրություն</button>
            <button class="btn btn-warning" data-slide="3" type="button" data-bs-toggle="collapse" data-bs-target="#form_collapse" aria-expanded="false" aria-controls="form_collapse"><i class="fa-solid fa-flask"></i>Հարցում</button>
        </div>
        <div class="group_of_contents">
            <div class="team_block">
                <div class="w-100 p-3 team_block_header d-flex justify-content-between align-items-center collapse_header">
                    Թիմի անդամներ
                    <i class="fa fa-plus-circle"></i>
                </div>
                <div class="members p-2">
                    <?php if (!empty($team_members)):
                        foreach ($team_members as $member):?>
                            <div class="member mt-2" data-id="<?=$member['id']?>">
                                <div class="d-flex align-items-center">
                                    <div class="member_image me-2" style="background-color: <?='dark'.$member['color']?>"  title="<?=$member['full_name']?>"><?=mb_substr($member['full_name'],0,1, "UTF-8")?></div>
                                    <?=$member['full_name']?>
                                </div>
                                <i class="fa-solid fa-ellipsis" style="font-size: 20px"></i>
                            </div>
                        <?php   endforeach;
                    endif;?>
                </div>
            </div>
            <div class="message_block">
                <div class="all_messages p-3 d-flex flex-column">
                    <?php if(!empty($messages)):
                        foreach ($messages as $index => $message):?>
                            <div class="message_block d-flex gap-2 mt-3 <?=($message['writer_id']==5?'mine':'')?> <?=empty($messages[$index+1])?' mb-5':''?>" data-id="<?=$message['message_id']?>">
                                <div class="message_member_img" title="<?=$message['writer_full_name']?>" style="background-color: <?='dark'.$message['color']?>"></div>
                                <div class="message">
                                    <?=$message['message']?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif;?>
                </div>
                <div class="my_message d-flex align-items-center gap-2 p-2">
                    <i class="fa fa-plus" style="font-size: 30px"></i>
                    <textarea name="" id="" cols="30" rows="10" class="my_message_input" placeholder="Ձեր նամակը․․․․"></textarea>
                    <i class="fa fa-smile" data-bs-toggle="modal" data-bs-target="#emoji_set"  style="font-size: 30px"></i>
                </div>
            </div>
            <div class="form_block">
                <div class="api_block_header d-flex align-items-center justify-content-between ps-3 pe-3  collapse_header">
                    <div style="width: fit-content;position: relative;display: inline-block">
                        <div class="d-flex align-items-center gap-2 bg-success p-1 ps-3 pe-3" style="border-radius: 5px" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMethod" aria-expanded="false" aria-controls="collapseMethod">
                            Մեթոդ
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <div class="collapse" id="collapseMethod">
                            <div class="card card-body text-black">
                                <ul class="mb-0">
                                    <li>GET</li>
                                    <li>POST</li>
                                    <li>PUT</li>
                                    <li>PATCH</li>
                                    <li>DELETE</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary api_description">Նկարագրություն</button>
<!--                        <button class="btn btn-warning api_test"><span>Փորձարկել</span><i class="fa-solid fa-flask"></i></button>-->
                    </div>
                </div>
                <div class="d-flex justify-content-between w-100 blocks p-3">
                    <div class="border-end-1 active" style="width: 33%;" data-slide="1">Պարամետրեր</div>
                    <div class="border-end-1" style="width: 34%" data-slide="2">Գլխագրեր</div>
                    <div style="width: 33%" data-slide="3">Բովանդակություն</div>
                </div>
                <div class="api_fields w-100 p-3 pt-0">
                    <div id="collapseParams">
<!--                        <div class="w-100 fields">-->
                            <table class="table table-bordered table-dark w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Բանալի</th>
                                    <th scope="col">Տվյալի տեսակ</th>
                                    <th scope="col">Պարտադիր</th>
                                    <th scope="col">Արժեք</th>
                                    <th scope="col">Նկարագրություն</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="raw">
                                        <input type="text" class="form-control key" placeholder="Բանալի">
                                    </td>
                                    <td scope="raw">
                                        <select name="" class="form-control" id="">
                                            <option value="">Ընտրել</option>
                                            <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                <option value="<?=$dt?>"><?=$dt?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td scope="raw">
                                        <input type="checkbox">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control" placeholder="Արժեք">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                    </td>
                                    <td class="text-center pt-3">
                                        <i class="fa fa-trash d-none"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
<!--                        </div>-->
                    </div>
                    <div id="collapseHeader">
<!--                        <div class="w-100 fields">-->
                            <table class="table table-bordered table-dark w-100">
                                <thead>
                                <tr>
                                    <th scope="col">Բանալի</th>
                                    <th scope="col">Տվյալի տեսակ</th>
                                    <th scope="col">Պարտադիր</th>
                                    <th scope="col">Արժեք</th>
                                    <th scope="col">Նկարագրություն</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td scope="raw">
                                        <input type="text" class="form-control key" placeholder="Բանալի">
                                    </td>
                                    <td scope="raw">
                                        <select name="" class="form-control" id="">
                                            <option value="">Ընտրել</option>
                                            <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                <option value="<?=$dt?>"><?=$dt?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td scope="raw">
                                        <input type="checkbox">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control" placeholder="Արժեք">
                                    </td>
                                    <td scope="raw">
                                        <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                    </td>
                                    <td class="text-center pt-3">
                                        <i class="fa fa-trash d-none"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
<!--                        </div>-->
                    </div>
                    <div id="collapseBody">
                        <div class="row transfer_types m-0">
                            <div class="col-6 p-2 type active" data-slide="1">
                                <b>None</b>
                            </div>
                            <div class="col-6 p-2 type" data-slide="2">
                                <b>Multipart/Form-data</b>
                            </div>
                            <div class="col-6 p-2 type" data-slide="3">
                                <b>Form data(application/x-www-form-urlencoded)</b>
                            </div>
                            <div class="col-6 p-2 type" data-slide="4">
                                <b>Raw</b>
                            </div>
                        </div>

                        <div class="w-200 fields mt-3">
                            <div class="w-100"></div>
                            <div class="w-100 inner-collapse" id="multiFormData">
<!--                                <div class="w-100 fields">-->
                                    <table class="table table-bordered table-dark w-100">
                                        <thead>
                                        <tr>
                                            <th scope="col">Բանալի</th>
                                            <th scope="col">Տեսակ</th>
                                            <th scope="col">Արժեք</th>
                                            <th scope="col">Նկարագրություն</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="raw">
                                                    <input type="text" class="form-control key" placeholder="Բանալի">
                                                </td>
                                                <td scope="raw">
                                                    <select name="" id="" class="form-select data_type_select">
                                                        <option value="text">Տեքստ</option>
                                                        <option value="file">Ֆայլ</option>
                                                    </select>
                                                </td>
                                                <td scope="raw">
                                                    <input type="text" class="form-control" placeholder="Արժեք">
                                                </td>
                                                <td scope="raw">
                                                    <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                                </td>
                                                <td scope="raw" class="text-center pt-3">
                                                    <i class="fa fa-trash d-none"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
<!--                                </div>-->
                            </div >
                            <div class="w-100 inner-collapse" id="formData">
<!--                                <div class="w-100 fields">-->
                                    <table class="table table-bordered table-dark w-100">
                                        <thead>
                                        <tr>
                                            <th scope="col">Բանալի</th>
                                            <th scope="col">Տվյալի տեսակ</th>
                                            <th scope="col">Պարտադիր</th>
                                            <th scope="col">Արժեք</th>
                                            <th scope="col">Նկարագրություն</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td scope="raw">
                                                <input type="text" class="form-control key" placeholder="Բանալի">
                                            </td>
                                            <td scope="raw">
                                                <select name="" class="form-control" id="">
                                                    <option value="">Ընտրել</option>
                                                    <?php foreach (API::$REQUEST_DATA_TYPES as $dt):?>
                                                        <option value="<?=$dt?>"><?=$dt?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </td>
                                            <td scope="raw">
                                                <input type="checkbox">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control" placeholder="Արժեք">
                                            </td>
                                            <td scope="raw">
                                                <input type="text" class="form-control description" placeholder="Նկարագրություն">
                                            </td>
                                            <td scope="raw" class="text-center pt-3">
                                                <i class="fa fa-trash d-none"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
<!--                                </div>-->
                            </div>
                            <div class="w-100 inner-collapse" id="raw">
<!--                                <div class="w-100 fields">-->
                                    <textarea name="" id="" cols="30" rows="10" class="w-100"> </textarea>
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <button class="send_request btn">
                    Ուղարկել հարցում
                </button>
                <div class="request_loader d-none">
                    <div class="loader"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="emoji_set" aria-labelledby="emoji_set" aria-hidden="true">
    <div class="modal-dialog w-100">
        <div class="modal-content">
            <div class="modal-body">
                <div class="w-100 d-flex gap-2 emoji_block" style="font-size: 20px">
                    😀 😃 😄 😁 😆 😅 😂 🤣 🥲 🥹 😊 😇 🙂 🙃 😉 😌 😍
                    🥰 😘 😗 😙 😚 😋 😛 😝 😜 🤪 🤨 🧐 🤓 😎 🥸 🤩 🥳 🙂‍↕️ 😏
                    😒 🙂‍↔️ 😞 😔 😟 😕 🙁 ☹️ 😣 😖 😫 😩 🥺 😢 😭
                    😮‍💨 😤 😠 😡 🤬 🤯 😳 🥵 🥶 😱 😨 😰 😓 🫣 🤗 🫡 🤔 🫢 🤭
                    🤫 🤥 😶 😶‍🌫️ 😐 😑 😬 🫨 🫠 🙄 😯 😦 😧 😮 😲 🥱 😴 🫩 🤤 😪 😵
                    😵‍💫 🫥 🤐 🥴 🤢 🤮 🤧 😷 🤒 🤕 🤑 🤠 😈 👿 👹 👺 🤡 💩 👻 💀
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="block3 pt-2 collapse w-100" id="collapseResponse">
        <div class="menu_bar response_content_buttons d-flex justify-content-between">
            <div class="d-flex groups">
                <div class="active pb-2 pe-3 ps-3 pt-1" data-slide="1">Body</div>
                <div class="pb-2 pe-3 ps-3 pt-1" data-slide="2">Cookies</div>
                <div class="pb-2 pe-3 ps-3 pt-1" data-slide="3">Header</div>
            </div>
            <div class="addition_info items">
                <div class="item status" role="listitem" tabindex="0" aria-describedby="status-panel">
                    <div class="value">
                        <span class="status-dot up" aria-hidden="true"></span>
                        <span>200 OK</span>
                    </div>

                    <div class="panel" id="status-panel" role="dialog" aria-hidden="true">
                        <div class="row">
                            <div class="metric">200 OK</div>
                            <div class="hint">Հաջող վերադարձված պատասխան</div>
                        </div>
                        <div class="row">
                            <div class="hint">Մոտավոր պատճառներ</div>
                        </div>
                        <div class="row">
                            <div class="badge">Method: GET</div>
                            <div class="badge">Path: /api/get_customers</div>
                        </div>
                        <div class="footer">
                            <div>Սերվեր՝ api.example.com</div>
                            <div class="hint">Դետալներ</div>
                        </div>
                    </div>
                </div>

                <!-- TIME -->
                <div class="item time" role="listitem" tabindex="0" aria-describedby="time-panel">
                    <div class="value">322.88 ms</div>

                    <div class="panel" id="time-panel" role="dialog" aria-hidden="true">
                        <div class="row">
                            <div class="metric">Total: 734.58 ms</div>
                            <div class="hint">Մանրամասները ներքո</div>
                        </div>

                        <div class="row">
                            <div style="flex:1;">
                                <table class="tbl table-bordered hint w-100">
                                    <tbody>
                                        <tr>
                                            <td class="p-2">DNS:</td>
                                            <td class="p-2">75.68 ms</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">TCP:</td>
                                            <td class="p-2">79 ms</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">SSL:</td>
                                            <td class="p-2">171.41 ms</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">TTFB:</td>
                                            <td class="p-2">322.88 ms</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2">Download:</td>
                                            <td class="p-2">30.10 ms</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="footer">
                            <div class="hint">Time breakdown</div>
                            <div class="hint">Cached: No</div>
                        </div>
                    </div>
                </div>

                <!-- SIZE -->
                <div class="item size" role="listitem" tabindex="0" aria-describedby="size-panel">
                    <div class="value">15.4 KB</div>

                    <div class="panel" id="size-panel" role="dialog" aria-hidden="true">
                        <div class="row">
                            <div class="metric">15.4 KB</div>
                            <div class="hint">Ընդհանուր պատասխան</div>
                        </div>

                        <div class="row">
                            <div style="flex:1;">
                                <div class="hint">Headers: <strong>1.2 KB</strong></div>
                                <div class="hint">Body: <strong>14.2 KB</strong></div>
                                <div class="hint">Compressed: <strong>8.7 KB</strong></div>
                            </div>
                        </div>

                        <div class="footer">
                            <div class="hint">Content-Type: application/json</div>
                            <div class="hint">Encoding: gzip</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="response_content p-3">
            <div class="w-100" id="collapseResponseBody">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="controls">
                        <label for="format">Ֆորմատ :</label>
                        <select id="format">
                            <option value="json" selected>JSON</option>
                            <option value="xml">XML</option>
<!--                            <option value="html">HTML</option>-->
                        </select>

                        <!-- optional: when HTML selected, allow to show source instead of rendered -->
                        <label id="showSourceLabel" style="display:none; align-items:center;">
                            <input type="checkbox" id="showSource" /> &nbsp;Show HTML source
                        </label>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa fa-copy"></i>
                        <input type="text" class="form-control" style="width: 150px;" placeholder="Որոնել․․․">
                    </div>
                </div>

                <div id="viewer" role="region" aria-label="data viewer"></div>
            </div>
            <div class="w-100 overflow-y-auto" id="collapseResponseCookies">
                <table class="tbl table-bordered table-dark w-100">
                    <thead>
                    <tr>
                        <th class="p-2">Բանալի</th>
                        <th class="p-2">Արժեք</th>
                        <th class="p-2">Նկարագիր</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-2">session_id</td>
                            <td class="p-2">abc123xyz</td>
                            <td class="p-2">Օգտվողի session-ի նույնականացուցիչ</td>
                        </tr>
                        <tr>
                            <td class="p-2">lang</td>
                            <td class="p-2">hy</td>
                            <td class="p-2">Կայքի ընտրած լեզուն</td>
                        </tr>
                        <tr>
                            <td class="p-2">theme</td>
                            <td class="p-2">dark</td>
                            <td class="p-2">Օգտվողի գունային թեման</td>
                        </tr>
                        <tr>
                            <td class="p-2">auth_token</td>
                            <td class="p-2">eyJhbGciOiJIUzI1NiIs․․․</td>
                            <td class="p-2">JWT / մուտքագրման token</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-100 overflow-y-auto" id="collapseResponseHeaders">
                <table class="tbl table-bordered table-dark w-100">
                    <thead>
                    <tr>
                        <th class="p-2">Բանալի</th>
                        <th class="p-2">Արժեք</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="p-2">Վիճակ</td>
                        <td class="p-2">200 OK</td>
                    </tr>
                    <tr>
                        <td class="p-2">Ամսաթիվ</td>
                        <td class="p-2">Thu, 20 Nov 2025 12:00:00 GMT</td>
                    </tr>
                    <tr>
                        <td class="p-2">Սերվեր</td>
                        <td class="p-2">nginx/1.24.0</td>
                    </tr>
                    <tr>
                        <td class="p-2">Բովանդակության տեսակ</td>
                        <td class="p-2">application/json; charset=utf-8</td>
                    </tr>
                    <tr>
                        <td class="p-2">Բովանդակության չափ</td>
                        <td class="p-2">345</td>
                    </tr>
                    <tr>
                        <td class="p-2">Կապի տեսակ</td>
                        <td class="p-2">keep-alive</td>
                    </tr>
                    <tr>
                        <td class="p-2">Սեղմում</td>
                        <td class="p-2">gzip</td>
                    </tr>
                    <tr>
                        <td class="p-2">Քեշի կառավարում</td>
                        <td class="p-2">no-cache</td>
                    </tr>
                    <tr>
                        <td class="p-2">Թույլատրելի ծագում</td>
                        <td class="p-2">*</td>
                    </tr>
                    <tr>
                        <td class="p-2">Frame արգելք</td>
                        <td class="p-2">DENY</td>
                    </tr>
                    <tr>
                        <td class="p-2">Cookie սահմանում</td>
                        <td class="p-2">session_id=abc123; Path=/; HttpOnly; Secure</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="member_modal" aria-labelledby="member_modal" aria-hidden="true">
        <div class="modal-dialog w-100">
            <div class="modal-content">
                <div class="modal-header  bg-body-secondary">
                    <h1 class="modal-title fs-5" id="member_name"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b>Իրավունքներ</b>
                    <div class="ps-2">
                        <div class="d-flex gap-2 mt-2">
                            <input type="checkbox" class="">
                            <label for="">Միայն փորձարկել</label>
                        </div>
                        <div class="d-flex gap-2 mt-2">
                            <input type="checkbox" class="">
                            <label for="">Փորձարկել և խմբագրել</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-danger" title="Հեռացնել"><i class="fa fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-success">Պահպանել</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_member_modal" aria-labelledby="add_member_modal" aria-hidden="true">
        <div class="modal-dialog w-100">
            <div class="modal-content">
                <div class="modal-header  bg-body-secondary">
                    <h1 class="modal-title fs-5">Ավելացնել օգտվող</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" placeholder="Ոնորնել օգտվող" class="form-control search_user">
                    <div class="perm_block mt-4">
                        <b>Իրավունքներ</b>
                        <div class="ps-2">
                            <div class="d-flex gap-2 mt-2">
                                <input type="checkbox" class="">
                                <label for="">Միայն փորձարկել</label>
                            </div>
                            <div class="d-flex gap-2 mt-2">
                                <input type="checkbox" class="">
                                <label for="">Փորձարկել և խմբագրել</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-body-secondary">
                    <button type="button" class="btn btn-success">Պահպանել</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
                </div>
            </div>
        </div>
    </div>
<div id="pdfModal" class="modal fade">
    <div class="modal-dialog w-100">
        <div class="modal-content">
            <div class="modal-header  bg-body-secondary">
                <h1 class="modal-title fs-5">API նկարագրություն</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center border-1">
                <iframe id="pdfFrame" class="w-100" style="min-height: 800px"></iframe>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-success " id="download_api_description">Ներբեռնել</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
            </div>
        </div>
    </div>
</div>
<div id="pdf-content" class="d-none" style="width: 800px; padding: 40px; font-family: Arial;color: black" >
    <h1 style="font-size: 36px; margin-bottom: 10px;">API Նկարագրություն</h1>
    <div style="display:flex;justify-content: space-between;align-items:center;margin-bottom: 20px;">
        <div style="background:#3a7bff;color:white;padding:6px 12px;border-radius:8px;font-weight:bold;">
            <?=strtoupper($request_params['method'])?>
        </div>
        <div style="font-size:18px;">
            v1.0
        </div>
    </div>

    <div style="font-size:20px; margin-bottom: 10px;">
        <?=((!empty($server)?$server:'').$end_point)?>
    </div>

    <hr style="border: none; border-top: 1px solid #ddd; margin: 20px 0;" />

    <h2>Նկարագրություն</h2>
    <p>Վերադարձնում է գրանցված օգտվողների ցանկը։</p>

    <?php if(!empty($request_params['params'])):?>
        <h2>Պարամետրեր</h2>
        <table class="tbl table-bordered table-striped w-100">
            <thead>
                <tr>
                    <th class="p-2 text-start">Բանլի</th>
                    <th class="p-2 text-start">Տվյալի տեսակ</th>
                    <th class="p-2 text-start">Պարտադիր</th>
                    <th class="p-2 text-start">Նկարագրություն</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($request_params['params'] as $key => $arr):?>
                <tr>
                    <td class="p-2 text-start">
                        <?=$key?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['type']?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['required']?'այո':'ոչ'?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['desc']?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;

    if(!empty($request_params['header'])):?>
        <h2 class="mt-3">Գլխագրեր</h2>
        <table class="tbl table-bordered table-striped w-100">
            <thead>
            <tr>
                <th class="p-2 text-start">Բանլի</th>
                <th class="p-2 text-start">Տվյալի տեսակ</th>
                <th class="p-2 text-start">Պարտադիր</th>
                <th class="p-2 text-start">Նկարագրություն</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($request_params['header'] as $key => $arr):?>
                <tr>
                    <td class="p-2 text-start">
                        <?=$key?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['type']?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['required']?'այո':'ոչ'?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['desc']?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;

    if(!empty($request_params['body']['params'])):?>
        <h2 class="mt-3">Բովանդակություն</h2>
        <table class="tbl table-bordered table-striped w-100">
            <thead>
            <tr>
                <th class="p-2 text-start">Բանլի</th>
                <th class="p-2 text-start">Տվյալի տեսակ</th>
                <th class="p-2 text-start">Պարտադիր</th>
                <th class="p-2 text-start">Նկարագրություն</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($request_params['body']['params'] as $key => $arr):?>
                <tr>
                    <td class="p-2 text-start">
                        <?=$key?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['type']?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['required']?'այո':'ոչ'?>
                    </td>
                    <td class="p-2 text-start">
                        <?=$arr['desc']?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;?>

<!--    <h2 class="mt-3">Վարդարձված տվյլաներ (200 OK) դեպքում</h2>-->
<!---->
<!--    <pre style="-->
<!--        background:#f6f8fa;-->
<!--        padding:20px;-->
<!--        border-radius:10px;-->
<!--        border:1px solid #e3e3e3;-->
<!--        font-size:14px;-->
<!--        white-space:pre-wrap;-->
<!--        color: #0b253a;-->
<!--    ">-->
<!--{-->
<!--  "success": true,-->
<!--  "data": [-->
<!--    { "id": 1, "name": "John" },-->
<!--    { "id": 2, "name": "Alice" }-->
<!--  ]-->
<!--}-->
<!--    </pre>-->
</div>
<!--<div id="pdfModal" class="modal">-->
<!--    <div class="modal-content">-->
<!--        <span class="close" onclick="closePDF()">&times;</span>-->
<!---->
<!--        <iframe id="pdfFrame"></iframe>-->
<!---->
<!--        <button id="downloadBtn">Download PDF</button>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->