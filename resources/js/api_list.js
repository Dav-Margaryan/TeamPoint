$(document).ready(function (){
    $(document).on("click",'.copy_page_url',function (){
        let value = $(this).closest("div").find('input').val();
        navigator.clipboard.writeText(value).then(function () {
            console.log('Copied!');
        });
        $(this).html('<i class="fa fa-check"></i>')
    })
    const pageUrl = encodeURIComponent(window.location.href);
    const pageTitle = encodeURIComponent(document.title);
    function shareFacebook() {
        const url = "https://www.facebook.com/sharer/sharer.php?u=" + pageUrl;
        window.open(url, "_blank", "width=600,height=600");
    }
    function shareLinkedIn() {
        const url = "https://www.linkedin.com/shareArticle?mini=true&url="
            + pageUrl + "&title=" + pageTitle;
        window.open(url, "_blank", "width=600,height=600");
    }
    function shareReddit() {
        const url = "https://www.reddit.com/submit?url=" + pageUrl + "&title=" + pageTitle;
        window.open(url, "_blank", "width=600,height=600");
    }
    function shareInstagram() {
        if (navigator.share) {
            navigator.share({
                title: document.title,
                url: window.location.href
            });
        } else {
            alert("Instagram sharing is not supported on this device.");
        }
    }

    $('.feedback_stars .fa-star').on('mouseenter', function () {
        console.log('here')
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