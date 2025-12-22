<link rel="stylesheet" href="<?=BASE_URL?>resources/css/login.css">
<style>
    .login_menu_item{
        display: block !important;
    }
</style>
<div class="login_form_block">
    <div class="first_div p-5">
        <form action="" class="login_form mt-3" method="post">
            <h1 class="text-center">Գրանցում</h1>
            <div class="form-group">
                <label for="">Անուն</label>
                <input type="text" class="form-control" name="name" required value="<?=!empty($data['name'])?$data['name']:''?>">
                <span class="text-danger"><b><?=!empty($error_message['name'])?$error_message['name']:''?></b></span>
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Ազգանուն</label>
                <input type="text" class="form-control" name="lastname" required value="<?=!empty($data['lastname'])?$data['lastname']:''?>">
                <span class="text-danger"><b><?=!empty($error_message['lastname'])?$error_message['lastname']:''?></b></span>
            </div>
            <div class="form-group">
                <label for="" class="mt-2">Էլ․ հասցե</label>
                <input type="email" class="form-control" name="email" required value="<?=!empty($data['email'])?$data['email']:''?>">
                <span class="text-danger"><b><?=!empty($error_message['email'])?$error_message['email']:''?></b></span>
            </div>
            <div class="form-group">
                <label for="pw">Գաղտնաբառ</label>
                <input type="password" class="form-control" name="password" required >
                <span class="text-danger"><b><?=!empty($error_message['password'])?$error_message['password']:''?></b></span>
            </div>
            <div class="form-group">
                <label for="pw">Կրկնել գաղտնաբառ</label>
                <input type="password" class="form-control" name="password_repeat" required >
                <span class="text-danger"><b><?=!empty($error_message['password_repeat'])?$error_message['password_repeat']:''?></b></span>
            </div>
            <div class="w-100 d-flex justify-content-center mt-3">
                <button class="btn btn-success w-50 mt-2">Գրանցվել</button>
            </div>
        </form>
        <div class="d-flex justify-content-between mt-2">
            <a href="" class="text-secondary"></a>
            <a href="<?=$this->helperUrl(array('controller'=>'Customer','action'=>'login'))?>" class="text-secondary">Արդեն ունեմ հաշիվ</a>
        </div>
    </div>
</div>