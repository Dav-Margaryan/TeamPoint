<link rel="stylesheet" href="/resources/css/apiList.css">
<script src="/resources/js/api_list.js"></script>
<script src="/resources/js/qrcode.js"></script>
<div class="api_title">
    <h1>Project_name/Api_name</h1>
</div>
<div class="content p-4" style="border-radius: 15px;text-align: justify">
    <h1 style="text-align:center; color:#1e40af;">🌐 DreamSync Public API</h1>
    <p style="text-align:center; color:#6b7280; font-style:italic;">
        Powerful, reliable, and developer-friendly — connect your app to the DreamSync ecosystem.
    </p>

    <hr>

    <h2>🚀 Overview</h2>
    <p>
        The <strong>DreamSync API</strong> provides secure access to the platform’s core features — projects, tasks, and team collaboration.
        It’s designed to make integrations simple, efficient, and elegant.
        Developers can use the API to <span style="color:#2563eb;">create, manage, and automate</span> operations within DreamSync without ever opening the dashboard.
    </p>

    <h2>🎯 Purpose</h2>
    <p>
        DreamSync API was created for developers and organizations who want to extend their existing systems with
        seamless project management capabilities.
        Whether you’re building a custom dashboard, syncing user data, or automating workflows — our API gives you the flexibility to do it all.
    </p>

    <h2>🧩 Core Capabilities</h2>
    <ul>
        <li><strong>User Management:</strong> create, update, and manage user profiles and permissions.</li>
        <li><strong>Project Control:</strong> automate project creation, task assignment, and progress tracking.</li>
        <li><strong>Team Collaboration:</strong> integrate real-time communication and activity logs.</li>
        <li><strong>Analytics Access:</strong> fetch performance metrics and reports programmatically.</li>
    </ul>

    <h2>🛡️ Security</h2>
    <p>
        DreamSync API uses <strong>token-based authentication</strong> and enforces <span style="color:#16a34a;">HTTPS-only</span> connections to ensure data privacy.
        Every request is validated and logged for transparency and safety.
    </p>

    <h2>⚙️ Integration Scenarios</h2>
    <ol>
        <li>Link your internal tools with DreamSync for unified project visibility.</li>
        <li>Build custom dashboards using our project and user data endpoints.</li>
        <li>Automate recurring tasks — such as project creation or reporting.</li>
    </ol>

    <h2>🌍 Environment</h2>
    <table style="width:100%; border-collapse:collapse;" border="1">
        <thead >
        <tr>
            <th>Environment</th>
            <th>Base URL</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Production</td>
            <td><code>https://api.dreamsync.io/v1</code></td>
            <td>Active ✅</td>
        </tr>
        <tr>
            <td>Sandbox</td>
            <td><code>https://sandbox.dreamsync.io/v1</code></td>
            <td>For testing 🧪</td>
        </tr>
        </tbody>
    </table>

    <h2>💡 Highlights</h2>
    <ul>
        <li>100% RESTful and stateless architecture</li>
        <li>Consistent JSON responses across all endpoints</li>
        <li>Versioned API for backward compatibility</li>
        <li>Detailed logging and rate-limiting built-in</li>
    </ul>

    <hr>

    <blockquote style="border-left:4px solid #3b82f6; margin:1em; padding:0.5em 1em; color:#374151;">
        “Built by developers, for developers — empowering creativity through connectivity.”
        <br>— <em>DreamSync Engineering Team</em>
    </blockquote>

    <p style="text-align:center; font-size:14px; color:#9ca3af;">
        Last updated: <strong>Nov 2025</strong> · API Version <strong>1.0</strong>
    </p>
    <div class="d-flex gap-3 justify-content-end mt-2">
        <div class="btn share_button btn-success d-flex align-items-center gap-2" style="font-size: 21px" data-bs-toggle="modal" data-bs-target="#share_api" aria-expanded="false" aria-controls="share_api">
            Տարածել<i class="fa-solid fa-share-nodes"></i>
        </div>
        <div class="btn comment_button btn-warning d-flex align-items-center gap-2" style="font-size: 21px" data-bs-toggle="modal" data-bs-target="#feedback" aria-expanded="false" aria-controls="feedback">
            Թողնել մեկնաբանություն <i class="fa fa-commenting text-light"></i>
        </div>
        <a class="btn get_doc_button btn-primary d-flex align-items-center gap-2" style="font-size: 21px" href="<?=$this->helperUrl(array('controller'=>'Customer','action'=>'login'))?>">
            API նկարագիր <i class="fa fa-file"></i>
        </a>
    </div>
</div>
<div class="modal fade" id="share_api" aria-labelledby="share_api" aria-hidden="true">
    <div class="modal-dialog w-100">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h1 class="modal-title fs-5" id="member_name">Տարածել API-ը</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-4 pt-4 d-flex gap-4 align-items-center justify-content-between">
                <div style="width:-webkit-fill-available">
                    <label class="form-label  mt-2"><b>Պատճենել կայքի հղումը</b></label>
                    <div class="d-flex justify-content-center">
                        <input type="text" class="form-control api_desc_url" value="<?=((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
                            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")?>">
                        <button class="btn btn-outline-secondary copy_page_url">
                            <i class="fa fa-copy"></i>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center gap-5 mt-4" style="font-size: 35px">
                        <i class="fa-brands fa-facebook"  onclick="shareFacebook()"></i>
                        <i class="fa-brands fa-instagram"  onclick="shareInstagram()"></i>
                        <i class="fa-brands fa-linkedin" onclick="shareLinkedIn()"></i>
                        <i class="fa-brands fa-reddit" onclick="shareReddit()"></i>
                    </div>
                </div>
                <div id="qrcode"></div>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="feedback" aria-labelledby="feedback" aria-hidden="true">
    <div class="modal-dialog w-100">
        <div class="modal-content">
            <div class="modal-header bg-body-secondary">
                <h1 class="modal-title fs-5" id="member_name">Թողնել մեկնաբանություն</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-4 pt-4">
                <h2 class="text-center mb-3"><b>Ձեր կարծիքը շատ կարևոր է</b></h2>
                <div class="d-flex gap-5 justify-content-center feedback_stars">
                    <i class="fa fa-star" data-value="1"></i>
                    <i class="fa fa-star" data-value="2"></i>
                    <i class="fa fa-star" data-value="3"></i>
                    <i class="fa fa-star" data-value="4"></i>
                    <i class="fa fa-star" data-value="5"></i>
                </div>
                <div class="d-flex mt-5 justify-content-between mb-5">
                    <div class="existing_feedbacks">
                        <label for="" class="mb-2"><b>Առկա մեկնաբանություններ</b></label>
                        <div class="feedback_list">
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                </div>
                                <div class="feedback_message">
                                    Very satisfied with my experience. Will definitely come back again
                                </div>
                            </div>
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gray"></i>
                                </div>
                                <div class="feedback_message">
                                    I'm extremely happy with the service I received. The team was professional, responsive, and truly cared about my needs. The whole process was smooth and transparent. I’ll definitely recommend this company to my friends!
                                </div>
                            </div>
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gray"></i>
                                </div>
                                <div class="feedback_message">
                                    Amazing quality! The website works perfectly across all devices, and the design looks beautiful. Communication was quick, and every detail was handled with care. Thank you for the great experience!
                                </div>
                            </div>
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gray"></i>
                                </div>
                                <div class="feedback_message">
                                    Very satisfied with my experience. Will definitely come back again
                                </div>
                            </div>
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gray"></i>
                                </div>
                                <div class="feedback_message">
                                    Very satisfied with my experience. Will definitely come back again
                                </div>
                            </div>
                            <div class="customer_feedback">
                                <div class="stars d-flex gap-2">
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                    <i class="fa fa-star" style="color: gold"></i>
                                </div>
                                <div class="feedback_message">
                                    Very satisfied with my experience. Will definitely come back again
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new_feedback">
                        <label for="" class="mb-2"><b>Թողնել մեկնաբանություն</b></label>
                        <textarea id="" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-body-secondary">
                <button type="button" class="btn btn-success">Պահպանել</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>
