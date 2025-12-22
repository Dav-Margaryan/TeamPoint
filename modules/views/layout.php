<!--[if lte IE 1]>
##################################################################################################################################
#
#
#  _____           _           _     _             _____              _ _     __  __
# |  __ \         (_)         | |   | |           |  __ \            (_) |   |  \/  |
# | |__) | __ ___  _  ___  ___| |_  | |__  _   _  | |  | | __ ___   ___| |_  | \  / | __ _ _ __ __ _  __ _ _ __ _   _  __ _ _ __
# |  ___/ '__/ _ \| |/ _ \/ __| __| | '_ \| | | | | |  | |/ _` \ \ / / | __| | |\/| |/ _` | '__/ _` |/ _` | '__| | | |/ _` | '_ \
# | |   | | | (_) | |  __/ (__| |_  | |_) | |_| | | |__| | (_| |\ V /| | |_  | |  | | (_| | | | (_| | (_| | |  | |_| | (_| | | | |
# |_|   |_|  \___/| |\___|\___|\__| |_.__/ \__, | |_____/ \__,_| \_/ |_|\__| |_|  |_|\__,_|_|  \__, |\__,_|_|   \__, |\__,_|_| |_|
#                _/ |                       __/ |                                               __/ |            __/ |
#               |__/                       |___/                                               |___/            |___/
#
##################################################################################################################################
<![endif]-->

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TeamPoint</title>
        <!-- favicon PNG -->
        <link rel="icon" type="image/png" href="<?=BASE_URL?>resources/images/TeamPointIco.ico">
<!--        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->

        <?php require_once 'blocks/scripts.php'?>
    </head>
    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('app-loader');
            loader.style.opacity = '0';
            loader.style.transition = 'opacity .4s ease';

            setTimeout(() => {
                loader.remove();
            }, 400);
        });
    </script>

    <body>
    <div id="app-loader">
        <div class="spinner"></div>
        <div class="text">Loading TeamPoint…</div>
    </div>

    <?php require_once 'blocks/menu.php'?>
        <div class="main container">
            <?= $content ?>
        </div>

        <canvas id="bg"></canvas>
        <div class="mascot" id="mascot">
            <!-- Paste your SVG here -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 360 360" width="180" height="180" role="img" aria-labelledby="tpProfTitle tpProfDesc">
                <title id="tpProfTitle">TeamPoint — Professor mascot (hands inward)</title>
                <desc id="tpProfDesc">Professor-style TeamPoint mascot with both hands turned inward towards body.</desc>
                <defs>
                    <style>
                        .bp-body{ fill: #0f766e; stroke: rgba(0,0,0,0.06); stroke-width:1.5; }
                        .bp-coat{ fill: #e6f7f6; stroke: rgba(0,0,0,0.04); }
                        .bp-glass{ fill: #ffffff; stroke: rgba(4,20,23,0.12); stroke-width:1; }
                        .bp-eye{ fill:#042f33; }
                        .bp-hair{ fill:#1f2937; }
                        .tp-root{ transform-origin: center; }
                        @keyframes idle-bob { 0% { transform: translateY(0);} 50% { transform: translateY(-5px);} 100% { transform: translateY(0);} }
                        .tp-root { animation: idle-bob 3s ease-in-out infinite; }
                    </style>
                </defs>
                <g class="tp-root">
                    <g transform="translate(0,20)">
                        <path class="bp-coat" d="M110 170 q70 80 140 0 v-60 q0 -18 -18 -22 h-104 q-18 4 -18 22 z" />
                        <rect x="150" y="160" width="60" height="72" rx="8" class="bp-coat"/>
                    </g>
                    <g transform="translate(0,0)">
                        <circle cx="180" cy="110" r="58" class="bp-body"/>
                        <path class="bp-hair" d="M128 100 q20 -34 52 -28 q32 -6 52 28 q-30 -18 -104 0 z" />
                        <g transform="translate(0,0)">
                            <rect x="136" y="96" width="46" height="30" rx="8" class="bp-glass"/>
                            <rect x="178" y="96" width="46" height="30" rx="8" class="bp-glass"/>
                            <rect x="170" y="110" width="20" height="4" fill="rgba(0,0,0,0.02)"/>
                            <circle cx="158" cy="112" r="8" class="bp-eye" id="eye-left"/>
                            <circle cx="202" cy="112" r="8" class="bp-eye" id="eye-right"/>
                        </g>
                        <path d="M160 132 q20 18 40 0" stroke="rgba(4,20,23,0.18)" stroke-width="2" fill="none" stroke-linecap="round"/>
                    </g>
                    <g id="arms" transform="translate(0,20)">
                        <path class="bp-body" d="M112 180 q20 12 28 32 q4 8 -4 12 q-6 2 -14 -4 q-10 -6 -12 -14 q-4 -12 2 -26 z"/>
                        <path class="bp-body" d="M248 180 q-20 12 -28 32 q-4 8 4 12 q6 2 14 -4 q10 -6 12 -14 q4 -12 -2 -26 z"/>
                    </g>
                    <g id="legs" transform="translate(0,20)">
                        <rect x="120" y="260" width="36" height="24" rx="8" class="bp-body"/>
                        <rect x="210" y="260" width="36" height="24" rx="8" class="bp-body"/>
                    </g>
                    <text x="130" y="195" font-family="Inter, Arial, sans-serif" font-size="20" fill="#07383b" font-weight="600">TeamPoint</text>
                </g>
            </svg>
            <div class="bubble" id="bubble">Ունե՞ք հարցեր</div>
        </div>
        <div class="modal fade" id="modal_feedback" aria-labelledby="API_Description" aria-hidden="true" style="margin-top: 150px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-body-secondary">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Կապ մեզ հետ</h1>
                        <button type="button" class="btn-close d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="text" placeholder="Անուն" required>
                            <input type="email" placeholder="Էլ․ հասցե" required>
                            <textarea rows="4" placeholder="Ձեր նամակը․․․․" required></textarea>
                            <button type="submit" class="btn btn-success">Ուղարկել</button>
                        </form>
                    </div>
                    <div class="modal-footer  bg-body-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
                    </div>
                </div>
            </div>
        </div>
        <?php //require_once 'blocks/footer.php'?>
        <script src="<?=BASE_URL?>resources/js/script.js"></script>
        <script defer src="https://app.blumix.net/vendor/chatbot/js/external-chatbot.js" data-chatbot-uuid="23b4600d-b5bd-491c-b75b-6cd215ad139d" data-iframe-width="500" data-iframe-height="550" data-language="en" ></script>
    </body>
</html>