$(document).ready(function() {
    if($("textarea.multi_lang_content").length) {
        tinymce.init({
            selector: 'textarea.multi_lang_content',
            license_key: 'gpl',
            plugins: [
                'accordion','anchor','autolink','autoresize','autosave',
                'charmap','code','codesample','directionality','emoticons','fullscreen',
                'help','image','importcss','insertdatetime','link','lists','media',
                'nonbreaking','pagebreak','preview','quickbars','save','searchreplace',
                'table','visualblocks','visualchars','wordcount'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        const params = new URLSearchParams(window.location.search);
        const id = params.get("id");
        if(id) {
            $(".general_image").css('background-image', "url('../resources/images/api_logo_example.png')")
            var val = "<h1 style=\"text-align:center; color:#1e40af;\">🌐 DreamSync Public API</h1>\n" +
                "<p style=\"text-align:center; color:#6b7280; font-style:italic;\">\n" +
                "Powerful, reliable, and developer-friendly — connect your app to the DreamSync ecosystem.\n" +
                "</p>\n" +
                "\n" +
                "<hr>\n" +
                "\n" +
                "<h2>🚀 Overview</h2>\n" +
                "<p>\n" +
                "The <strong>DreamSync API</strong> provides secure access to the platform’s core features — projects, tasks, and team collaboration.\n" +
                "It’s designed to make integrations simple, efficient, and elegant.  \n" +
                "Developers can use the API to <span style=\"color:#2563eb;\">create, manage, and automate</span> operations within DreamSync without ever opening the dashboard.\n" +
                "</p>\n" +
                "\n" +
                "<h2>🎯 Purpose</h2>\n" +
                "<p>\n" +
                "DreamSync API was created for developers and organizations who want to extend their existing systems with\n" +
                "seamless project management capabilities.\n" +
                "Whether you’re building a custom dashboard, syncing user data, or automating workflows — our API gives you the flexibility to do it all.\n" +
                "</p>\n" +
                "\n" +
                "<h2>🧩 Core Capabilities</h2>\n" +
                "<ul>\n" +
                "  <li><strong>User Management:</strong> create, update, and manage user profiles and permissions.</li>\n" +
                "  <li><strong>Project Control:</strong> automate project creation, task assignment, and progress tracking.</li>\n" +
                "  <li><strong>Team Collaboration:</strong> integrate real-time communication and activity logs.</li>\n" +
                "  <li><strong>Analytics Access:</strong> fetch performance metrics and reports programmatically.</li>\n" +
                "</ul>\n" +
                "\n" +
                "<h2>🛡️ Security</h2>\n" +
                "<p>\n" +
                "DreamSync API uses <strong>token-based authentication</strong> and enforces <span style=\"color:#16a34a;\">HTTPS-only</span> connections to ensure data privacy.\n" +
                "Every request is validated and logged for transparency and safety.\n" +
                "</p>\n" +
                "\n" +
                "<h2>⚙️ Integration Scenarios</h2>\n" +
                "<ol>\n" +
                "  <li>Link your internal tools with DreamSync for unified project visibility.</li>\n" +
                "  <li>Build custom dashboards using our project and user data endpoints.</li>\n" +
                "  <li>Automate recurring tasks — such as project creation or reporting.</li>\n" +
                "</ol>\n" +
                "\n" +
                "<h2>🌍 Environment</h2>\n" +
                "<table style=\"width:100%; border-collapse:collapse;\" border=\"1\">\n" +
                "  <thead style=\"background-color:#f3f4f6;\">\n" +
                "    <tr>\n" +
                "      <th>Environment</th>\n" +
                "      <th>Base URL</th>\n" +
                "      <th>Status</th>\n" +
                "    </tr>\n" +
                "  </thead>\n" +
                "  <tbody>\n" +
                "    <tr>\n" +
                "      <td>Production</td>\n" +
                "      <td><code>https://api.dreamsync.io/v1</code></td>\n" +
                "      <td>Active ✅</td>\n" +
                "    </tr>\n" +
                "    <tr>\n" +
                "      <td>Sandbox</td>\n" +
                "      <td><code>https://sandbox.dreamsync.io/v1</code></td>\n" +
                "      <td>For testing 🧪</td>\n" +
                "    </tr>\n" +
                "  </tbody>\n" +
                "</table>\n" +
                "\n" +
                "<h2>💡 Highlights</h2>\n" +
                "<ul>\n" +
                "  <li>100% RESTful and stateless architecture</li>\n" +
                "  <li>Consistent JSON responses across all endpoints</li>\n" +
                "  <li>Versioned API for backward compatibility</li>\n" +
                "  <li>Detailed logging and rate-limiting built-in</li>\n" +
                "</ul>\n" +
                "\n" +
                "<hr>\n" +
                "\n" +
                "<blockquote style=\"border-left:4px solid #3b82f6; margin:1em; padding:0.5em 1em; color:#374151;\">\n" +
                "“Built by developers, for developers — empowering creativity through connectivity.”\n" +
                "<br>— <em>DreamSync Engineering Team</em>\n" +
                "</blockquote>\n" +
                "\n" +
                "<p style=\"text-align:center; font-size:14px; color:#9ca3af;\">\n" +
                "Last updated: <strong>Nov 2025</strong> · API Version <strong>1.0</strong>\n" +
                "</p>\n"

            $("textarea.multi_lang_content").val(val)
        }
    }


    $('.conversation_block').height($('.block1').height() - $(".team_block").height())

    if($('.group_of_contents').length)
        $('.group_of_contents').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            infinite: false,
            adaptiveHeight: true,
            accessibility: false,
            draggable: false,
            swipe: false,
        })
    if($(".api_fields").length)
        $('.api_fields').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            infinite: false,
            adaptiveHeight: true,
            accessibility: false,
            draggable: false,
            swipe: false,
        })
    if($(".response_content").length)
        $('.response_content').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            infinite: false,
            adaptiveHeight: true,
            accessibility: false,
            draggable: false,
            swipe: false,
        })

    if($('#collapseBody .fields').length)
        $('#collapseBody .fields').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: false,
            nextArrow: false,
            infinite: false,
            adaptiveHeight: true,
            accessibility: false,
            draggable: false,
            swipe: false,
        })

    document.querySelectorAll('.menu-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const popup = btn.parentElement.querySelector('.menu-popup');
            const isOpen = popup.style.display === 'block';
            document.querySelectorAll('.menu-popup').forEach(p => p.style.display = 'none');
            popup.style.display = isOpen ? 'none' : 'block';
        });
    });

    $(document).on('click','.member',function (){
        $("#member_modal #member_name").html($(this).find('.member_image').attr('title'))
        $("#member_modal").modal("show")
    })
    $(document).on('click','.fa-plus-circle',function (){
        $("#add_member_modal").modal('show');
        $(".search_user").val("")
    })

    $('.buttons_block button').click(function(e) {
        // e.preventDefault();
        var slideno = $(this).data('slide');
        // localStorage.setItem('slider_item_num', slideno)
        // sessionStorage.setItem('libraries_page',$('a[data-slide="'+slideno+'"]').attr('id'));
        $('.group_of_contents').slick('slickGoTo', slideno - 1);
        // $('.languages .dropdown-menu li a').each(function(){
        //     let href = $(this).attr('href')
        //     if(!$(this).attr('data-exact'))
        //         $(this).attr('data-exact',href)
        //     else
        //         href = $(this).attr('data-exact')
        //     if(slideno == 1)
        //         href += '/#publications'
        //     else if(slideno == 2)
        //         href += '/#videos'
        //     else
        //         href += '/#blogs'
        //     $(this).attr('href',href)
        // })
        // $('a[data-slide]').each(function(){
        //     $(this).removeClass('active')
        // })
        // this.classList.add('active');
    });

    $(document).on('click','.response_content_buttons .groups div',function (){
        var slideno = $(this).data('slide');
        $(".response_content").slick('slickGoTo',slideno - 1)
    })

    $(document).on('click','.block2 .blocks div',function (){
        var slideno = $(this).data('slide');
        $('.api_fields').slick('slickGoTo', slideno - 1);
    })
    $(document).on('click','#collapseBody .transfer_types div',function (){
        var slideno = $(this).data('slide');
        $('#collapseBody .fields').slick('slickGoTo', slideno - 1);
    })
    $(document).on('click','.form_block .blocks div',function (){
        var slideno = $(this).data('slide');
        $('.api_fields').slick('slickGoTo', slideno - 1);
    })
    $(document).on('click','.transfer_types div',function (){
        var slideno = $(this).data('slide');
        $('#collapseBody .fields').slick('slickGoTo', slideno - 1);
    })


    if($('.all_messages').length)
        $('.all_messages').scrollTop($('.all_messages')[0].scrollHeight)

    let isDragging = false;
    let startY = 0;
    let startHeight = 0;

    const $container = $(".block1");
    const $top = $(".team_block");
    const $bottom = $(".conversation_block");
    const $gutter = $(".resizer");

    $gutter.on("mousedown", function(e) {
        isDragging = true;
        startY = e.clientY;
        startHeight = $top.height();
        $("body").css("cursor", "row-resize");
        e.preventDefault();
    });

    $(window).on("mousemove", function(e) {
        if (!isDragging) return;

        const dy = e.clientY - startY;
        const containerHeight = $container.height();
        const gutterHeight = $gutter.outerHeight();
        const min = 80;
        const max = containerHeight - min;

        let newHeight = startHeight + dy;
        if (newHeight < min) newHeight = min;
        if (newHeight > max) newHeight = max;

        $top.height(newHeight);
        $bottom.height($container.height() - newHeight)
    });

    $(window).on("mouseup", function() {
        if (isDragging) {
            isDragging = false;
            $("body").css("cursor", "");
        }
    });

    // adjust if window resizes
    $(window).on("resize", function() {
        const containerHeight = $container.height();
        const gutterHeight = $gutter.outerHeight();
        const min = 80;
        const max = containerHeight - min - gutterHeight;
        if ($top.height() > max) {
            $top.height(max);
        }
    });

    $('.collapse').each(function (){
        $(this).on('show.collapse', function( event ) {
            event.stopPropagation();
        })
        $(this).on('hide.bs.collapse', function( event ) {
            event.stopPropagation();
        })
    })

    $(document).on('click','.blocks div',function (){
        $(".blocks div").each(function (){
            $(this).removeClass('active');
        })
        var clicked = $(this)
        $(".api_fields .collapse").each(function (){
            if($(this).attr('id') != clicked.attr('aria-controls'))
                $(this).collapse('hide')
        })
        $(this).addClass('active')
    })
    $(document).on('click','.transfer_types .type',function (){
        $('.transfer_types .type').each(function (){
            $(this).removeClass('active');
        })

        var clicked = $(this)
        $('.fields .collapse').each(function (){
            if($(this).attr('id') != clicked.attr('aria-controls'))
                $(this).collapse('hide')
        })

        $(this).addClass('active')
    })

    $(document).on('input','.fields input',function (){
        var tr = $(this).closest('tr');
        var dont_add = true;
        tr.find('input').each(function(){
            if($(this).val())
                dont_add = false
        })

        if(!dont_add) {
            var new_tr = tr.clone();
            tr.find('.fa-trash').removeClass('d-none');
            new_tr.find('input').each(function (){
                $(this).val('')
            })
            if (tr.next().length == 0) {
                $(tr).closest('tbody').append(new_tr)
            }
            $(".api_fields").scrollTop($(".api_fields")[0].scrollHeight)
        }
    })

    $(document).on('click','.fields .fa-trash',function (){
        $(this).closest('tr').remove()
    })

    $(document).on('change','.data_type_select',function (){
        if($(this).val())
            $($(this).closest('td').next()).html('<input type="'+$(this).val()+'" class="form-control"/>')
    })

    $(document).on('click','.send_request',function (){
        $('#collapseResponse').collapse('hide')
        $('.request_loader').removeClass('d-none')

        setTimeout(function (){
            $('.request_loader').addClass('d-none');
            $('#collapseResponse').collapse('show');
            $(".response_content").slick('slickGoTo',0)
        },2000)
    })

    $(document).on('click','.menu_bar .groups div',function (){
        $(".menu_bar .groups div").each(function (){
            $(this).removeClass('active');
        })
        var clicked = $(this)
        $(".menu_content .collapse").each(function (){
            if($(this).attr('id') != clicked.attr('aria-controls'))
                $(this).collapse('hide')
        })
        $(this).addClass('active')
    })


    $(document).on('click','.buttons_block button',function (){
        var aria_control = $(this).attr('aria-controls');
        $(".mobile_block .collapse").each(function (){
            if($(this).attr('id') != aria_control)
            $(this).collapse('hide')
        })

    })



    // response body
    const data = {
        HOUSE: "8/1",
        REGION: "Երևան",
        RIGHTS: [
            {
                PARCELS: [{ id: 1, area: "100" }],
                REG_DATE: "02/05/2017",
                BUILDINGS: []
            },
            {
                CERTIFICATE_NUMBER: "02052017-01-0158",
                CERTIFICATE_PASS: "TLQHZBAAYPSB",
                BUILDINGS: [{ id: 2 }, { id: 3 }],
                META: { approved: true, count: 2 }
            }
        ],
        UNIT_ID: "1742463",
        BUILDING: ""
    };

    // ---------- helpers ----------
    function escapeHtml(str) {
        if (str == null) return '';
        return String(str)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // ---------- JSON viewer (same expandable style) ----------
    function renderJSON(obj) {
        if (typeof obj !== 'object' || obj === null) {
            if (typeof obj === 'string') return `<span class="string">"${escapeHtml(obj)}"</span>`;
            if (typeof obj === 'number') return `<span class="number">${obj}</span>`;
            if (typeof obj === 'boolean') return `<span class="boolean">${obj}</span>`;
            return `<span class="null">${escapeHtml(String(obj))}</span>`;
        }

        if (Array.isArray(obj)) {
            let html = `<details><summary>[Array(${obj.length})]</summary>`;
            obj.forEach((v, i) => {
                html += `<div>${i}: ${renderJSON(v)}</div>`;
            });
            html += `</details>`;
            return html;
        } else {
            let html = `<details open><summary>{Object}</summary>`;
            for (const key in obj) {
                html += `<div><span class="key">${escapeHtml(key)}</span>: ${renderJSON(obj[key])}</div>`;
            }
            html += `</details>`;
            return html;
        }
    }

    // ---------- JSON -> XML ----------
    function jsonToXml(obj, indent = "") {
        let xml = "";
        for (const prop in obj) {
            if (Array.isArray(obj[prop])) {
                obj[prop].forEach(item => {
                    xml += `${indent}<${prop}>\n${jsonToXml(item, indent + "  ")}${indent}</${prop}>\n`;
                });
            } else if (typeof obj[prop] === "object" && obj[prop] !== null) {
                xml += `${indent}<${prop}>\n${jsonToXml(obj[prop], indent + "  ")}${indent}</${prop}>\n`;
            } else {
                const value = obj[prop] == null ? "" : escapeHtml(obj[prop]);
                xml += `${indent}<${prop}>${value}</${prop}>\n`;
            }
        }
        return xml;
    }

    // ---------- JSON -> HTML structure (rendered) ----------
    // This creates nested <details> / <div> elements to visually present the data as HTML.
    function jsonToHtml(obj) {
        if (typeof obj !== 'object' || obj === null) {
            // primitives -> span
            return `<span class="html-value">${escapeHtml(String(obj))}</span>`;
        }

        if (Array.isArray(obj)) {
            let html = `<details><summary>Array(${obj.length})</summary>`;
            obj.forEach((v, i) => {
                html += `<div class="html-row"><span class="html-key">[${i}]</span>${jsonToHtml(v)}</div>`;
            });
            html += `</details>`;
            return html;
        } else {
            let html = `<details open><summary>Object</summary>`;
            for (const key in obj) {
                const value = obj[key];
                if (typeof value === 'object' && value !== null) {
                    html += `<div class="html-row"><span class="html-key">${escapeHtml(key)}</span>${jsonToHtml(value)}</div>`;
                } else {
                    html += `<div class="html-row"><span class="html-key">${escapeHtml(key)}</span><span class="html-value">${escapeHtml(String(value))}</span></div>`;
                }
            }
            html += `</details>`;
            return html;
        }
    }

    // ---------- display logic ----------
    const viewer = document.getElementById('viewer');
    const format = document.getElementById('format');
    const showSource = document.getElementById('showSource');
    const showSourceLabel = document.getElementById('showSourceLabel');

    function render() {
        const fmt = format.value;

        if (fmt === 'json') {
            // show expandable JSON-like view (HTML content)
            viewer.innerHTML = renderJSON(data);
            showSourceLabel.style.display = 'none';
        } else if (fmt === 'xml') {
            // show pretty XML as text
            const xml = `<root>\n${jsonToXml(data, '  ')}</root>`;
            viewer.innerHTML = `<pre>${escapeHtml(xml)}</pre>`;
            showSourceLabel.style.display = 'none';
        } else if (fmt === 'html') {
            // show HTML-structured rendered view
            showSourceLabel.style.display = 'inline-flex';
            const htmlString = jsonToHtml(data);
            if (showSource && showSource.checked) {
                // show HTML source as text
                viewer.innerHTML = `<pre>${escapeHtml(htmlString)}</pre>`;
            } else {
                // render the HTML structure (safe because values are escaped)
                viewer.innerHTML = htmlString + `<div class="html-preview"><small style="color:#84ccff">Preview area — here you see the structure rendered as HTML elements</small></div>`;
            }
        }
    }

    if(format)
        format.addEventListener('change', render);
    showSource && showSource.addEventListener('change', render);

    if($("#collapseResponse").length)
        render();

    $(".emoji_block").click(function (e) {
        let emoji = $(e.target).text();
        $(".my_message_input").val($(".my_message_input").val() + emoji);
    });


    async function generatePDF() {
        const { jsPDF } = window.jspdf;

        // convert to image
        $("#pdf-content").removeClass('d-none')
        const canvas = await html2canvas(document.getElementById("pdf-content"), { scale: 2 });
        $("#pdf-content").addClass('d-none')
        const imgData = canvas.toDataURL("image/png");

        const pdf = new jsPDF("p", "pt", "a4");

        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        pdf.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
        // pdf.save("api_documentation.pdf");

        // Create PDF Blob
        const blob = pdf.output("blob");
        const url = URL.createObjectURL(blob);

        // Show PDF in iframe
        document.getElementById("pdfFrame").src = url;

        // Download button
        document.getElementById("download_api_description").onclick = () => {
            const a = document.createElement("a");
            a.href = url;
            a.download = "API_description.pdf";
            a.click();
        };

        // Open modal
        $("#pdfModal").modal('show');
    }

    $(document).on("click",".api_description",async function (){await generatePDF()})

    function closePDF() {
        document.getElementById("pdfModal").style.display = "none";
    }
});