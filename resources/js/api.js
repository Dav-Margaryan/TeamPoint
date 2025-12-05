$(document).ready(function() {
    if($("textarea.multi_lang_content").length) {
        tinymce.init({
            selector: 'textarea.multi_lang_content',
            plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features

                // Try the most popular premium features until Oct 14, 2025:
                // 'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                {value: 'First.Name', title: 'First Name'},
                {value: 'Email', title: 'Email'},
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            uploadcare_public_key: 'ad6009d5978d2650edf1',
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


    $(document).on("click",".api_description",function (){
        const jsPDF = window.jspdf.jsPDF;
        const pdf = new jsPDF();

        // ---- YOUR IMAGE (Base64) ----
        const bgImg = "data:image/png;base64,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";

        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        // 🔥 Draw background image with OPACITY
        pdf.setGState(new pdf.GState({ opacity: 0.15 })); // 0.0 - 1.0
        pdf.addImage(bgImg, "PNG", 20, 20, pageWidth - 40, pageHeight - 40);
        pdf.setGState(new pdf.GState({ opacity: 1 })); // return to normal

        // Example JSON
        const data = [
            { id: 1, name: "John", age: 25 },
            { id: 2, name: "Sarah", age: 30 },
            { id: 3, name: "Michael", age: 45 }
        ];

        var params = [];
        var header = [];
        var body = [];

        $('#collapseParams tbody tr').each(function (){
            let key = $(this).find('.key').val();
            let desc = $(this).find('.description').val()
            if(key != '' && desc != '' && key != undefined && desc != undefined)
                params.push({'key':key,'desc':desc})
        })

        $('#collapseHeader tbody tr').each(function (){
            let key = $(this).find('.key').val();
            let desc = $(this).find('.description').val()
            if(key != '' && desc != '' && key != undefined && desc != undefined)
                header.push({'key':key,'desc':desc})
        })

        $('#collapseBody .slick-active tbody tr').each(function (){
            let key = $(this).find('.key').val();
            let desc = $(this).find('.description').val()
            if(key != '' && desc != '' && key != undefined && desc != undefined)
                body.push({'key':key,'desc':desc})
        })

        pdf.setFontSize(18);

        if(params.length) {
            pdf.text("Params", 14, 20);
            pdf.autoTable({
                startY: 25,
                head: [['Key', 'Description']],
                body: params.map(r => [r.key, r.desc]),

                styles: {
                    fillColor: [255, 255, 255],
                    textColor: 30,
                },

                headStyles: {
                    fillColor: [0, 123, 255],
                    textColor: 255,
                    fontStyle: 'bold'
                },

                alternateRowStyles: {
                    fillColor: [245, 245, 245]
                }
            });
        }

        if(header.length) {
            pdf.text("Header", 14, pdf.autoTable.previous.finalY + 15);
            pdf.autoTable({
                startY: pdf.autoTable.previous.finalY + 20,
                head: [['Key', 'Description']],
                body: header.map(r => [r.key, r.desc]),

                styles: {
                    fillColor: [255, 255, 255],
                    textColor: 30,
                },

                headStyles: {
                    fillColor: [0, 123, 255],
                    textColor: 255,
                    fontStyle: 'bold'
                },

                alternateRowStyles: {
                    fillColor: [245, 245, 245]
                }
            });
        }

        if(body.length) {
            pdf.text("Body", 14, pdf.autoTable.previous.finalY + 15);
            pdf.autoTable({
                startY: pdf.autoTable.previous.finalY + 20,
                head: [['Key', 'Description']],
                body: body.map(r => [r.key, r.desc]),

                styles: {
                    fillColor: [255, 255, 255],
                    textColor: 30,
                },

                headStyles: {
                    fillColor: [0, 123, 255],
                    textColor: 255,
                    fontStyle: 'bold'
                },

                alternateRowStyles: {
                    fillColor: [245, 245, 245]
                }
            });
        }

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
    })

    function closePDF() {
        document.getElementById("pdfModal").style.display = "none";
    }
});