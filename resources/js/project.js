$(document).ready(function (){
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
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: 'ad6009d5978d2650edf1',
    });
    const params = new URLSearchParams(window.location.search);
    const id = params.get("id");
    if(id) {
        $(".general_image").css('background-image',"url('../resources/images/project_logo_example.jpeg')")
        var val = "<h1 style=\"text-align:center; color:#374151;\">✨ DreamSync — Creative Collaboration Platform</h1>\n" +
            "\n" +
            "                <p style=\"text-align:center; font-style:italic; color:#6b7280;\">\n" +
            "                    Where ideas come alive, and teamwork becomes effortless.\n" +
            "                </p>\n" +
            "\n" +
            "                <hr>\n" +
            "\n" +
            "                <h2>🌈 Overview</h2>\n" +
            "                <p>\n" +
            "                    <strong>DreamSync</strong> is a modern web platform that helps creative teams <em>brainstorm, organize, and launch</em> projects together — all in one place.\n" +
            "                    Designed with simplicity and beauty in mind, it combines <span style=\"color:#2563eb;\">real-time collaboration</span> with intuitive tools that boost productivity.\n" +
            "                </p>\n" +
            "\n" +
            "                <h2>🚀 Key Features</h2>\n" +
            "                <ul>\n" +
            "                    <li><strong>Live Collaboration:</strong> edit documents with your teammates in real time.</li>\n" +
            "                    <li><strong>Task Boards:</strong> create, assign, and track progress visually.</li>\n" +
            "                    <li><strong>Version History:</strong> never lose your ideas — every change is saved.</li>\n" +
            "                    <li><strong>Smart Notifications:</strong> stay updated without feeling overwhelmed.</li>\n" +
            "                </ul>\n" +
            "\n" +
            "                <h2>🧩 Tech Stack</h2>\n" +
            "                <table style=\"width:100%; border-collapse:collapse;\" border=\"1\">\n" +
            "                    <thead style=\"background-color:#f3f4f6;\">\n" +
            "                    <tr>\n" +
            "                        <th>Component</th>\n" +
            "                        <th>Technology</th>\n" +
            "                        <th>Description</th>\n" +
            "                    </tr>\n" +
            "                    </thead>\n" +
            "                    <tbody>\n" +
            "                    <tr>\n" +
            "                        <td>Frontend</td>\n" +
            "                        <td>React + Tailwind CSS</td>\n" +
            "                        <td>Clean, responsive user interface</td>\n" +
            "                    </tr>\n" +
            "                    <tr>\n" +
            "                        <td>Backend</td>\n" +
            "                        <td>Node.js + Express</td>\n" +
            "                        <td>Handles data and authentication</td>\n" +
            "                    </tr>\n" +
            "                    <tr>\n" +
            "                        <td>Database</td>\n" +
            "                        <td>MongoDB</td>\n" +
            "                        <td>Stores users, projects, and files</td>\n" +
            "                    </tr>\n" +
            "                    </tbody>\n" +
            "                </table>\n" +
            "\n" +
            "                <h2>📸 Interface Preview</h2>\n" +
            "                <p style=\"text-align:center;\">\n" +
            "                    <img src=\"https://picsum.photos/800/300\" alt=\"Project preview\" style=\"border-radius:12px; max-width:100%;\">\n" +
            "                </p>\n" +
            "\n" +
            "                <h2>💬 User Feedback</h2>\n" +
            "                <blockquote style=\"border-left:4px solid #3b82f6; margin:1em; padding:0.5em 1em; color:#374151;\">\n" +
            "                    “DreamSync completely changed the way our design team works.\n" +
            "                    We collaborate faster, communicate better, and deliver more.”\n" +
            "                    <br>— <em>Anna M., UI Designer</em>\n" +
            "                </blockquote>\n" +
            "\n" +
            "                <h2>⚙️ Future Plans</h2>\n" +
            "                <ol>\n" +
            "                    <li>Integrate AI-assisted brainstorming tools 🤖</li>\n" +
            "                    <li>Add offline collaboration mode 🌍</li>\n" +
            "                    <li>Release mobile app (iOS & Android) 📱</li>\n" +
            "                </ol>\n" +
            "\n" +
            "                <h2>🎯 Summary</h2>\n" +
            "                <p>\n" +
            "                    DreamSync aims to redefine teamwork by bringing together <strong>creativity</strong>, <strong>clarity</strong>, and <strong>collaboration</strong> — beautifully.\n" +
            "                </p>\n" +
            "\n" +
            "                <hr>\n" +
            "\n" +
            "                <p style=\"text-align:center; font-size:14px; color:#9ca3af;\">\n" +
            "                    Made with ❤️ by the DreamSync Team<br>\n" +
            "                    <small>Version 1.0 — Built using TinyMCE Free Edition</small>\n" +
            "                </p>"

        $("textarea.multi_lang_content").val(val)
    }
})
