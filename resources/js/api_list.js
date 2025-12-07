$(document).ready(function (){
    if($("#qrcode").length){
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: window.location.href,
            width: 128,
            height: 128
        });
    }

    $(document).on("click",'.copy_page_url',function (){
        let value = $(this).closest("div").find('input').val();
        navigator.clipboard.writeText(value).then(function () {
            console.log('Copied!');
        });
        $(this).html('<i class="fa fa-check"></i>')
    })

    $('.feedback_stars .fa-star').on('mouseenter', function () {
        let value = $(this).data('value');

        $('.fa-star').removeClass('gold');

        for (let i = 1; i <= value; i++) {
            $('.fa-star[data-value="' + i + '"]').addClass('gold');
        }
    });
    let selectedRating = 0;

    $('.feedback_stars .fa-star').on('click', function () {
        selectedRating = $(this).data('value');
    });

    $('.feedback_stars .fa-star').on('mouseleave', function () {
        $('.fa-star').removeClass('gold');
        for (let i = 1; i <= selectedRating; i++) {
            $('.fa-star[data-value="' + i + '"]').addClass('gold');
        }
    });
})