<link rel="stylesheet" href="<?=BASE_URL.'/resources/css/login.css'?>">
<style>
    .login_menu_item{
        display: block !important;
    }
    /*.login_form_block{*/
    /*    height: 460px;*/
    /*}*/
</style>
<div class="login_form_block">
    <div class="first_div p-5">
        <h1 class="text-center">Ուղարկել նամակ</h1>
        <form action="" class="login_form mt-5">
            <label for="">
                Անուն
            </label>
            <input type="text" class="form-control">
            <label for="">
                Էլ․ հասցե
            </label>
            <input type="email" class="form-control">
            <label for="">
                Թեմա
            </label>
            <input type="text" class="form-control">
            <label for="">
                Հաղորդագրություն
            </label>
            <textarea type="text" class="form-control"></textarea>
            <div class="w-100 d-flex justify-content-center mt-3">
                <button class="btn btn-primary">Ուղարկել</button>
            </div>
        </form>
    </div>
</div>