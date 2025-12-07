<nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid #eff1f4;">
    <div class="container" style="position: relative">
        <div class="navbar-brand d-flex">
            <a href="<?=$this->helperUrl(array('controller'=>'','action'=>''))?>" class="logo d-flex align-items-center justify-content-start">
                <img src="<?= BASE_URL ?>/resources/images/TeamPointIco.png" alt="TeamPoint">
                <div id="logo_letters" class="d-flex justify-content-start"></div>
            </a>
        </div>
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-lightbulb light_on_off2"></i>
            <i class="fa fa-solid fa-globe mobile_lang_collapse"  data-bs-toggle="collapse" data-bs-target="#collapseLang" aria-expanded="false" aria-controls="collapseLang"></i>
            <button class="navbar-toggler-icon navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <ul class="navbar-nav pe-1">
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" role="button" href="<?= $this->helperUrl(array('controller'=>'Api','action'=>'list'))?>">
                            API ցանկ
                        </a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" target="_blank" href="<?= BASE_URL.'resources/TeamPoint_guide.pdf'?>">
                            Ուղեցույց
                        </a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" role="button" href="<?= $this->helperUrl(array('controller'=>'FeedBack','action'=>'index'))?>">
                            Հետադարձ կապ
                        </a>
                    </li>
                    <?php if(!empty($_SESSION['user_id'])):?>
                        <li class="nav-item dropdown position-relative person_account_mobile">
                            <div class="nav-link d-flex justify-content-between" role="button"  data-bs-toggle="collapse" data-bs-target="#personalAccountInside" aria-expanded="false" aria-controls="personalAccountInside">
                                Անձնական գրասենյակ
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="collapse" id="personalAccountInside" style="">
                                <ul class="navbar-nav ps-5">
                                    <li class="nav-item"><a class="nav-link" href="<?= $this->helperUrl(array('controller'=>'project','action'=>'index'))?>">Պռոեկտներ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'personalAccount'))?>">Անձնական տվյալներ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'changePassword'))?>">Փոխել գաղտնաբառը</a>    </li>
                                    <li class="nav-item"><a class="nav-link" href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'logout'))?>">Ելք համակարգից</a></li>
                                </ul>
                            </div>
                        </li>
                    <?php endif;?>
                </ul>
                <?php
                Logger::logDebugInformation($_SESSION);
                if(empty($_SESSION['user_id'])):?>
                    <ul class="navbar-nav login_menu_item">
                        <li class="nav-item rounded">
                            <a class="nav-link menu-color" href="<?= $this->helperUrl(array('controller'=>'Customer','action' => 'login','reset' => true))?>">
                                <i class="fa fa-sign-in-alt"></i>
                                <span>Մուտք</span>
                            </a>
                        </li>
                    </ul>
                <?php else:?>
                    <ul class="navbar-nav person_account">
                        <li class="nav-item rounded">
                            <i class="fa-solid fa-user"  role="button" data-bs-toggle="collapse" data-bs-target="#personalAccount" aria-expanded="false" aria-controls="personalAccount"></i>
                        </li>
                    </ul>
                <?php endif;?>
                <ul class="navbar-nav desktop_lang_collapse">
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link menu-color non-after" role="button" data-bs-toggle="collapse" data-bs-target="#collapseLang" aria-expanded="false" aria-controls="collapseLang">
                            <span class="menu-color">Հայերեն <i class="fa fa-solid fa-globe"></i></span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav light_on_off1">
                    <li class="nav-item dropdown position-relative nav-link light-on-off" style="cursor: pointer;" data-light="on">
                        <i class="fa-solid fa-lightbulb"></i>
                    </li>
                </ul>
            </div>
        </div>
        <div class="collapse" id="collapseLang" style="">
            <ul>
                <li>Հայերեն</li>
                <li>Ռուսերեն</li>
                <li>Անգլերեն</li>
            </ul>
        </div>
        <?php if(!empty($_SESSION['user_id'])):?>
            <div class="collapse" id="personalAccount" style="">
                <ul>
                    <li><a href="<?= $this->helperUrl(array('controller'=>'project','action'=>'index'))?>">Պռոեկտներ</a></li>
                    <li><a href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'personalAccount'))?>">Անձնական տվյալներ</a></li>
                    <li><a href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'changePassword'))?>">Փոխել գաղտնաբառը</a>    </li>
                    <li><a href="<?=$this->helperUrl(array('controller'=>'customer','action'=>'logout'))?>">Ելք համակարգից</a></li>
                </ul>
            </div>
        <?php endif;?>
    </div>
</nav>