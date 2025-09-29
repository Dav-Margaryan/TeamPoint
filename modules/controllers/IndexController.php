<?php
class controllers_IndexController extends MainController {
    public function indexAction(){
        $data['api_list'] = array(
            0 => 'Վճարային համակարգ',
            1 => 'Եղանակի տեսություն',
            2 => 'Համերգի տոմսերի վաճառք',
            3 => 'Ռեստորանում սեղանի ամրագրում',
            4 => 'Ավիատոմսերի վաճառք',
            5 => 'Հյուրանոցային համարի ամրագրում',
            6 => 'Արհեստական բանականության վրա հիմնված չատ'
        );
        $this->render('index/index',$data);
    }
}