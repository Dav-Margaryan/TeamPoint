<link rel="stylesheet" href="<?=BASE_URL?>resources/css/login.css">
<script>
    const url = new URL(window.location);
    url.search = ''; // remove query string
    window.history.replaceState({}, document.title, url.pathname);
</script>
<div class="login_form_block">
    <div class="first_div p-5">
        <form action="" class="login_form mt-5" method="post">
            <h1 class="text-center">Մուտք</h1>
            <div class="form-group">
                <label for="">Ծածկանուն</label>
                <input type="text" class="form-control" required name="username" value="<?=!empty($error_message['username']['val'])?$error_message['username']['val']:''?>">
            </div>
            <div class="position-relative mt-3 form-group">
                <label for="">Գաղտնաբառ</label>
                <input type="password" class="form-control" required name="password">
                <i class="fa fa-eye position-absolute"></i>
                <i class="fa fa-eye-slash position-absolute d-none"></i>
            </div>
            <?php if(!empty($error_message['message'])):?>
                <div class="alert alert-danger mt-4">
                    <b><?=$error_message['message']?></b>
                </div>
            <?php endif;
            if(isset($_GET['activation_required']) && $_GET['activation_required'] == 1):?>
                <div class="alert alert-warning mt-3">
                    <b>Ձեր էլ․ հասցեին ուղարկվել է նամակ գրանցումը հաստատելու համար</b>
                </div>
            <?php endif;
            if(isset($_GET['activation_required']) && $_GET['activation_required'] == 0):?>
                <div class="alert alert-success mt-3">
                    <b>Ձեր գրանցումը հաստատված է, կարող եք մուտք գործել Ձեր հաշիվ</b>
                </div>
            <?php endif;?>
            <div class="w-100 d-flex justify-content-center mt-3">
                <button type="submit" href="<?=$this->helperUrl(array('controller'=>'Project','action'=>'index'))?>" class="btn btn-success w-50 mt-2">Մուտք</button>
            </div>
            <div class="mt-4 google_login">
                <img src="<?=BASE_URL?>resources/images/Google_logo.svg" height="40" alt="">
                Շարունակեք Google-ով
            </div>
        </form>
        <div class="d-flex justify-content-between mt-4">
            <a href="<?=$this->helperUrl(array('controller'=>'Customer','action'=>'registration'))?>" class="text-secondary">Գրանցում</a>
            <a href="<?=$this->helperUrl(array('controller'=>'Customer','action'=>'forgotPassword'))?>" class="text-secondary">Մոռացել եմ գաղտանբառը</a>
        </div>
    </div>
</div>
