
    <div class="owl-parent container">
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
        <div class="row mt-5">
            <div class="col-6 col-lg-3 d-flex justify-content-center">
                <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2">
                    <img src="<?=BASE_URL.'resources/images/testing.png'?>" alt="Թեստավորում" style="height: 50px">
                    Թեստավորում
                </div>
            </div>
            <div class="col-6 col-lg-3 d-flex justify-content-center">
                <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2">
                    <i class="fa-regular fa-comments text-black" style="font-size: 40px"></i>
                    Թիմային քննարկումներ
                </div>
            </div>
            <div class="col-6 col-lg-3 d-flex justify-content-center">
                <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2">
                    <i class="fa-regular fa-file-lines text-black" style="font-size: 40px"></i>
                    Ավտոմատ փաստաթղթավորում
                </div>
            </div>
            <div class="col-6 col-lg-3 d-flex justify-content-center">
                <div class="goal text-center d-flex align-items-center justify-content-evenly p-5 flex-column gap-2">
                    <i class="fa-solid fa-bullhorn text-black" style="font-size: 40px"></i>
                    Հրապարակում
                </div>
            </div>
        </div>
    </div>