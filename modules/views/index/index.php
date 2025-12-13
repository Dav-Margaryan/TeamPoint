<div class="row site_desc_block m-3 pt-4 pb-4">
    <div class="col-12 col-lg-6 d-flex flex-column justify-content-between">
        <div>
            <h1>API թեստավորում, փաստաթղթավորում և հրապարակում</h1>
            <h4>Համագործակցեք ձեր թիմի հետ, ավտոմատացրեք փաստաթղթավորումը և հեշտությամբ հրապարակեք API-ները</h4>
        </div>
        <a class="btn btn-success btn-lg mt-3 login1" href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'login'))?>">Մութք համակարգ</a>
    </div>
    <div class="col-12 col-lg-6 d-flex justify-content-end img">
        <img src="<?=BASE_URL.'/resources/images/general_image1.png'?>" alt="">
        <a class="btn btn-success btn-lg mt-3 login2" href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'login'))?>">Մութք համակարգ</a>
    </div>
</div>
<div class="owl-parent container">
<!--    <div class="row mt-0 mt-lg-5 mb-5">-->
<!--        <div class="col-6 col-lg-3 d-flex justify-content-center">-->
<!--            <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2 w-100">-->
<!--                <img src="--><?//=BASE_URL.'resources/images/testing.png'?><!--" alt="Թեստավորում" style="height: 50px">-->
<!--                Թեստավորում-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-6 col-lg-3 d-flex justify-content-center">-->
<!--            <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2 w-100">-->
<!--                <i class="fa-regular fa-comments text-black" style="font-size: 40px"></i>-->
<!--                Թիմային քննարկումներ-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-6 col-lg-3 d-flex justify-content-center">-->
<!--            <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2 w-100">-->
<!--                <i class="fa-regular fa-file-lines text-black" style="font-size: 40px"></i>-->
<!--                Ավտոմատ փաստաթղթավորում-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-6 col-lg-3 d-flex justify-content-center">-->
<!--            <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2 w-100">-->
<!--                <i class="fa-solid fa-bullhorn text-black" style="font-size: 40px"></i>-->
<!--                Հրապարակում-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="goal_container row">

        <div class="card col-6 col-lg-3">
            <div class="inner">
                <div class="front">
                    <div class="icon">⚙️</div>
                    API թեստավորում
                </div>
                <div class="back" data-icon="⚙️">
                    Աշխատացրեք, թեստավորեք և վավերացրեք API-ներ հաճելի և հարմարավետ միջավայրում
                </div>
            </div>
        </div>

        <div class="card col-6 col-lg-3">
            <div class="inner">
                <div class="front">
                    <div class="icon">📄</div>
                    Ավտոմատ փաստաթղթավորում
                </div>
                <div class="back" data-icon="📄">
                    Գներացրեք API նկարագիր իրական ժամանակում
                </div>
            </div>
        </div>

        <div class="card col-6 col-lg-3">
            <div class="inner">
                <div class="front">
                    <div class="icon">👥</div>
                    Թիմային աշխատանք
                </div>
                <div class="back" data-icon="👥">
                    Հաղորդակցվեք, կազմակերպեք և կառավարեք օգտվողի դերեր
                </div>
            </div>
        </div>

        <div class="card col-6 col-lg-3">
            <div class="inner">
                <div class="front">
                    <div class="icon"><img src="/resources/images/mascot.png" height="50" alt=""></div>
                    ԱԲ օգնական
                </div>
                <div class="back ai-bg" data-icon=''>
                    Խելացի չատբոտ Ձեզ օգնելու և աշխատանքը հեշտացնելու համար
                </div>
            </div>
        </div>
    </div>
    <div class="message_div mt-2 pt-2">
        <h2>Հարթակի նպատակն է</h2>
        <p class="pt-2">
            TeamPoint – միասնական հարթակ թիմային API մշակման համար։<br>
            Այստեղ ծրագրավորողները, թեստավորողները և բիզնես թիմերը կարող են միասին նախագծել, փաստաթղթավորել և ստուգել API-ները իրական ժամանակում։ TeamPoint-ը դարձնում է API մշակման գործընթացը թափանցիկ, արագ և ավելի արդյունավետ․
            <br>
            📄 Կենտրոնացված փաստաթղթավորում՝ բոլորը աշխատում են նույն API specification-ի վրա։
            <br>
            🤝 Համագործակցություն իրական ժամանակում՝ մեկնաբանություններ, քննարկումներ և թիմային աշխատանք։
            <br>
            🧪 Թեստավորում և վավերացում՝ API-ն ստուգվում է նախքան պրոդաքշն տեղափոխվելը։
            <br>
            TeamPoint-ը ստեղծված է, որպեսզի API մշակումը դառնա ոչ թե բարդ գործընթաց, այլ թիմային ստեղծագործություն։
        </p>
    </div>
    <h2>API ցանկ</h2>
    <div class="owl-carousel"  data-ban="carousel1">
        <?php if(!empty($api_list)):
            foreach($api_list as $api):?>
                <div><?=$api?></div>
        <?php endforeach;
        endif;?>
    </div>
    <div class="owl-carousel mt-3" data-ban="carousel2">
        <?php if(!empty($api_list)):
            foreach($api_list as $api):?>
                <div><?=$api?></div>
            <?php endforeach;
        endif;?>
    </div>
</div>