<link rel="stylesheet" href="resources/css/login.css">
<div class="login_form_block">
    <div class="first_div p-5">
        <form action="" class="login_form mt-3">
            <div class="general_image_block personal_account">
                <div class="general_image circle_image"></div>
                <button class="btn btn-secondary attach_button" type="button">Կցել նկար</button>
                <input type="file" class="form-control d-none attach_image" style="width: auto">
            </div>
            <label for="name">Անուն</label>
            <input type="text" class="form-control" value="<?=$data['name']?>">
            <label for="lastname" class="mt-2">Ազգանուն</label>
            <input type="text" class="form-control" value="<?=$data['lastname']?>">
            <label for="email" class="mt-2">Էլ․ հասցե</label>
            <input type="text" class="form-control" value="<?=$data['email']?>">
            <div class="w-100 d-flex justify-content-center mt-3">
                <button class="btn btn-success w-50 mt-2">Պահպանել</button>
            </div>
        </form>
    </div>
</div>