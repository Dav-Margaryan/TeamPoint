<nav class="navbar navbar-expand-lg" style="border-bottom: 1px solid #eff1f4;">
    <div class="container">
        <div class="navbar-brand d-flex">
            <a href="<?=$this->helperUrl(array('controller'=>'','action'=>''))?>" class="logo">
                <img src="<?= BASE_URL ?>/resources/images/TeamPoint.png" alt="TeamPoint" class="black_letters">
                <img src="<?= BASE_URL ?>/resources/images/TeamPointWhite.png" alt="TeamPoint" class="white_letters d-none">
            </a>
        </div>
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-lightbulb light_on_off2"></i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <ul class="navbar-nav pe-5">
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" role="button" href="#">
                            API ցանկ
                        </a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" href="#">
                            Ուղեցույց
                        </a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link" role="button"href="#">
                            Հետադարձ կապ
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav login_menu_item">
                    <li class="nav-item rounded">
                        <a class="nav-link menu-color" href="<?= $this->helperUrl(array('controller'=>'Customer','action' => 'login','reset' => true))?>">
                            <i class="fa fa-sign-in-alt"></i>
                            <span>Մուտք</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle menu-color non-after" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="menu-color">Հայերեն <i class="fa fa-solid fa-globe"></i></span>
                        </a>
                        <ul class="dropdown-content dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="menu-color" href="/ru" title="Ռուսերեն">
                                    <span class="">Ռուսերեն</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="menu-color" href="/en" title="Անգլերեն">
                                    <span class="">Անգլերեն</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav light_on_off1">
                    <li class="nav-item dropdown position-relative nav-link light-on-off" style="cursor: pointer;" data-light="on">
                        <i class="fa-solid fa-lightbulb"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>