<link rel="stylesheet" href="<?= BASE_URL.'resources/css/api.css'?>">
<script src="<?=BASE_URL.'resources/js/api.js'?>"></script>
<div class="sub_main">
    <div class="block1">
        <div class="team_block d-flex flex-column w-100">
            <div class="w-100 p-3 team_block_header d-flex justify-content-between align-items-center">
                Թիմի անդամներ
                <i class="fa fa-plus-circle"></i>
            </div>
            <div class="members p-2">
                <?php if (!empty($team_members)):
                        foreach ($team_members as $member):?>
                            <div class="member mt-2" data-id="<?=$member['id']?>">
                                <div class="d-flex align-items-center">
                                    <div class="member_image me-2" style="background-color: <?='dark'.$member['color']?>"></div>
                                    <?=$member['full_name']?>
                                </div>
                                <i class="fa-solid fa-ellipsis" style="font-size: 20px"></i>
                            </div>
                <?php   endforeach;
                endif;?>
            </div>
        </div>
        <div class="resizer"><i class="fa fa-bars"></i></div>
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
            <div class="my_message d-flex align-items-center gap-2 p-2">
                <i class="fa fa-plus" style="font-size: 30px"></i>
<!--                <input type="text" class="form-control my_message_input" style="background: none;color: white" placeholder="Ձեր նամակը․․․․">-->
                <textarea name="" id="" cols="30" rows="10" class="my_message_input"></textarea>
                <i class="fa fa-smile" style="font-size: 30px"></i>
            </div>
        </div>
    </div>
    <div class="block2">
        <div class="api_block_header d-flex align-items-center justify-content-between ps-3 pe-3">
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
                <button class="btn btn-primary api_description" data-bs-toggle="modal" data-bs-target="#API_Description"><span>Նկարագրություն</span><i class="fa-brands fa-wpforms"></i></button>
                <button class="btn btn-warning api_test"><span>Փորձարկել</span><i class="fa-solid fa-flask"></i></button>
            </div>
        </div>
        <div class="d-flex justify-content-between w-100 blocks p-3">
            <div class="border-end-1 active" style="width: 33%;"  data-bs-toggle="collapse" data-bs-target="#collapseParams" aria-expanded="false" aria-controls="collapseParams">Params</div>
            <div class="border-end-1" style="width: 34%" data-bs-toggle="collapse" data-bs-target="#collapseHeader" aria-expanded="false" aria-controls="collapseHeader">Header</div>
            <div style="width: 33%" data-bs-toggle="collapse" data-bs-target="#collapseBody" aria-expanded="false" aria-controls="collapseBody">Body</div>
        </div>
        <div class="api_fields d-flex flex-column w-100 align-items-end p-3 pt-0">
            <div class="collapse show  w-100" id="collapseParams">
                <div class="w-100 fields">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Key</th>
                                <th scope="col">Value</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="raw">
                                    <input type="text" class="form-control">
                                </td>
                                <td scope="raw">
                                    <input type="text" class="form-control">
                                </td>
                                <td class="text-center pt-3">
                                    <i class="fa fa-trash d-none"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="collapse w-100" id="collapseHeader">
                <div class="w-100 fields">
                    <table class="table table-bordered table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Key</th>
                            <th scope="col">Value</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td scope="raw">
                                <input type="text" class="form-control">
                            </td>
                            <td scope="raw">
                                <input type="text" class="form-control">
                            </td>
                            <td class="text-center pt-3">
                                <i class="fa fa-trash d-none"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="collapse w-100" id="collapseBody">
                <div class="row transfer_types m-0">
                    <div class="col-6 p-2 type active">
                        <b>None</b>
                    </div>
                    <div class="col-6 p-2 type"   data-bs-toggle="collapse" data-bs-target="#multiFormData" aria-expanded="false" aria-controls="multiFormData">
                        <b>Multipart/Form-data</b>
                    </div>
                    <div class="col-6 p-2 type"   data-bs-toggle="collapse" data-bs-target="#formData" aria-expanded="false" aria-controls="formData">
                        <b>Form data(application/x-www-form-urlencoded)</b>
                    </div>
                    <div class="col-6 p-2 type"   data-bs-toggle="collapse" data-bs-target="#json" aria-expanded="false" aria-controls="json">
                        <b>Json</b>
                    </div>
                    <div class="col-6 p-2 type"  data-bs-toggle="collapse" data-bs-target="#rawText" aria-expanded="false" aria-controls="rawText">
                        <b>Raw text</b>
                    </div>
                </div>
                <div class="w-200 fields mt-3">
                    <div class="collapse w-100 inner-collapse" id="multiFormData">
                        <div class="w-100 fields">
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Key</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Value</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="key">
                                        </td>
                                        <td scope="raw">
                                            <select name="" id="" class="form-select data_type_select">
                                                <option value="text">text</option>
                                                <option value="file">file</option>
                                            </select>
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="value">
                                        </td>
                                        <td scope="raw" class="text-center pt-3">
                                            <i class="fa fa-trash d-none"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div >
                    <div class="collapse w-100 inner-collapse" id="formData">
                        <div class="w-100 fields">
                            <table class="table table-bordered table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Key</th>
                                    <th scope="col">Value</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="key">
                                        </td>
                                        <td scope="raw">
                                            <input type="text" class="form-control" placeholder="value">
                                        </td>
                                        <td scope="raw" class="text-center pt-3">
                                            <i class="fa fa-trash d-none"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="collapse w-100 inner-collapse" id="json">
                        <div class="w-100 fields">
                            <textarea name="" id="" cols="30" rows="10" class="w-100"></textarea>
                        </div>
                    </div>
                    <div class="collapse w-100 inner-collapse" id="rawText">
                        <div class="w-100 fields">
                            <textarea name="" id="" cols="30" rows="10" class="w-100"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="API_Description" aria-labelledby="API_Description" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">API նկարագրություն</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>