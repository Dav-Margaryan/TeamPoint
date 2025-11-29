<link rel="stylesheet" href="<?=BASE_URL.'resources/css/login.css'?>">

<div class="login_form_block">
    <div class="first_div p-5">
        <form action="" class="login_form mt-5">
            <h1 class="text-center">Մուտք</h1>
            <label for="">Ծածկանուն</label>
            <input type="text" class="form-control">
            <div class="position-relative mt-3">
                <label for="">Գաղտնաբառ</label>
                <input type="password" class="form-control">
                <i class="fa fa-eye position-absolute"></i>
                <i class="fa fa-eye-slash position-absolute d-none"></i>
            </div>
            <div class="w-100 d-flex justify-content-center mt-3">
                <a href="<?=$this->helperUrl(array('controller'=>'project','action'=>'index'))?>" class="btn btn-success w-50 mt-2">Մուտք</a>
            </div>
            <div class="mt-4 google_login">
                <img src="<?=BASE_URL .'resources/images/Google_logo.svg'?>" height="40" alt="">
                Շարունակեք Google-ով
            </div>
        </form>
        <div class="d-flex justify-content-between mt-4">
            <a href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'registration'))?>" class="text-secondary">Գրանցում</a>
            <a href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'forgotPassword'))?>" class="text-secondary">Մոռացել եմ գաղտանբառը</a>
        </div>
    </div>
</div>
