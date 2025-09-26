 <div class="main container">
    <div class="owl-parent container">
        <div class="owl-carousel"  data-ban="carousel1">
            <?php if(!empty($api_count)):
                for ($i = 1;$i <= $api_count;$i++):?>
                    <div>API <?=$i?></div>
            <?php endfor;
            endif;?>
        </div>
        <div class="owl-carousel mt-3" data-ban="carousel2">
            <?php if(!empty($api_count)):
                for ($i = 1;$i <= $api_count;$i++):?>
                    <div>API <?=$i?></div>
                <?php endfor;
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
    </div>
</div>
<canvas id="bg"></canvas>