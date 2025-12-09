<link rel="stylesheet" href="<?= BASE_URL.'resources/css/project.css'?>">
<link rel="stylesheet" href="<?= BASE_URL.'resources/css/api.css'?>">
<script src="https://cdn.tiny.cloud/1/nbdizg85b5g579d6pand16frqn15j4b8xzjpj90dk0i29uoi/tinymce/8/tinymce.min.js"
        referrerpolicy="origin" crossorigin="anonymous"></script>
<script src="<?=BASE_URL.'resources/js/api.js'?>"></script>
<h1 class="page_title"><?=!empty($_GET['id'])?'Խմբագրել':'Ավելացնել'?>API</h1>
<div class="general_image_block">
    <div class="general_image"></div>
    <button class="btn btn-secondary attach_button">Կցել նկար</button>
    <input type="file" class="form-control d-none attach_image" style="width: auto">
</div>
<form action="">
    <div class="form_group">
        <label for="">API endpoint</label>
        <input type="text" class="form-control w-25" placeholder="/api/get_customers" value="<?=!empty($_GET['id'])?'/api/get_customers':''?>">
    </div>
    <div class="multi_lang_content mt-2">
        <div class="languages d-flex gap-2">
            <div class="active" data-lang="arm">Հայերեն</div>
            <div class="" data-lang="ru">Ռուսերեն</div>
            <div class="" data-lang="en">Անգլերեն</div>
        </div>
        <div class="for_bg">
            <div class="lang_blocks">
                <div class="block" data-lang-block="arm">
                    <label for="">Անվանում</label>
                    <input type="text" class="form-control mb-2">
                    <label for="">Նկարագրություն</label>
                    <textarea name="" class="multi_lang_content" id="arm" cols="30" rows="10"></textarea>
                </div>
                <div class="block d-none" data-lang-block="ru">
                    <label for="">Անվանում</label>
                    <input type="text" class="form-control mb-2">
                    <label for="">Նկարագրություն</label>
                    <textarea name="" class="multi_lang_content" id="ru" cols="30" rows="10"></textarea>
                </div>
                <div class="block d-none" data-lang-block="en">
                    <label for="">Անվանում</label>
                    <input type="text" class="form-control mb-2">
                    <label for="">Նկարագրություն</label>
                    <textarea name="" class="multi_lang_content" id="en" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-lg btn-success float-end mt-3">Պահպանել</button>
    </div>
</form>