<link rel="stylesheet" href="<?=BASE_URL.'resources/css/login.css'?>">
<div class="login_form_block">
    <div class="first_div p-5">
        <form action="" class="login_form mt-3">
            <div class="w-100 d-flex justify-content-center mb-5 personal_account">
                <div class="circle_image"></div>
            </div>
            <label for="name">Անուն</label>
            <input type="text" class="form-control" value="<?=$data['name']?>">
            <label for="lastname" class="mt-2">Ազգանուն</label>
            <input type="text" class="form-control" value="<?=$data['lastname']?>">
            <label for="email" class="mt-2">Էլ․ հասցե</label>
            <input type="text" class="form-control" value="<?=$data['email']?>">
            <label for="image" class="mt-2">Լուսանկար</label>
            <input type="file" style="height: unset" class="form-control">
            <div class="w-100 d-flex justify-content-center mt-3">
                <button class="btn btn-success w-50 mt-2">Պահպանել</button>
            </div>
        </form>
    </div>
</div>