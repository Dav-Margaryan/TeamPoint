<link rel="stylesheet" href="<?= BASE_URL.'resources/css/project_api.css'?>">
<h1 class="page_title">Պռոեկտներ</h1>
<div class="project_api_list d-flex flex-column w-100">
    <div class="d-flex justify-content-between">
        <div></div>
        <a href="<?=$this->helperUrl(array('controller'=>'project','action'=>'form'))?>" class="btn btn-success d-flex gap-2 align-items-center mb-3" style="width: fit-content;float: right">
            <i class="fa fa-plus"></i>
            Ավելացնել պրոեկտ
        </a>
    </div>
    <?php
    if(!empty($project_api_list)):
        foreach ($project_api_list as $index => $pal):?>
            <div>
                <div class="w-100 projectCollapseOpener <?=$index>0?'mt-4':''?>" data-id="<?=$pal['id']?>">
                    <div class="for_bg w-100 d-flex justify-content-between">
                        <div class="proj_name"  data-bs-toggle="collapse" data-bs-target="#collapseProject<?=$index?>" aria-expanded="false" aria-controls="collapseProject<?=$index?>">
                            <?=$pal['title']?>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-warning gap-2">
                                <i class="fa fa-eye"></i>
                                <div class="btn-text" data-bs-toggle="modal" data-bs-target="#project_description">
                                    Դիտել
                                </div>
                            </button>
                            <a href="<?=$this->helperUrl(array('controller'=>'project','action'=>'form'))?>" class="btn btn-sm btn-primary">
                                <i class="fa fa-pencil"></i>
                                <div class="btn-text">
                                    Խմբագրել
                                </div>
                            </a>
                            <a class="btn btn-sm btn-success" href="<?=$this->helperUrl(array('controller'=>'api','action'=>'form'))?>">
                                <i class="fa fa-plus"></i>
                                <div class="btn-text">
                                    Ավելացնել API
                                </div>
                            </a>
                            <i class="fa fa-chevron-down" data-bs-toggle="collapse" data-bs-target="#collapseProject<?=$index?>" aria-expanded="false" aria-controls="collapseProject<?=$index?>" style="cursor: pointer"></i>
                        </div>
                    </div>
                </div>
                <?php if(!empty($pal['api_list'])):?>
                    <div class="collapse projectCollapse" id="collapseProject<?=$index?>">
                        <div class="card card-body">
                            <?php foreach ($pal['api_list'] as $i => $api):?>
                                <div class="w-100 p-3 mb-3 d-flex justify-content-between align-items-center" style="border:1px solid gray;border-radius: 5px;" data-id="<?=$api['id']?>">
                                    <div class="d-flex justify-content-between align-items-center gap-2 project_api_name">
                                        <?=$api['title']?>
                                        <div class="message_circle d-flex align-items-center justify-content-center" title="Նոր նամակներ"><?=rand(1,10)*($i+1)?></div>
                                    </div>
                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="<?=$this->helperUrl(array('controller'=>'api','action'=>'view','data'=>array('id'=>$api['id'])))?>" class="btn btn-secondary d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-eye"></i>
                                            <div class="btn-text">
                                                Դիտել
                                            </div>
                                        </a>
                                        <a href="<?=$this->helperUrl(array('controller'=>'api','action'=>'form','data'=>array('id'=>$api['id'])))?>" class="btn btn-primary d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-pencil"></i>
                                            <div class="btn-text">
                                                Խմբագրել
                                            </div>
                                        </a>
                                        <button class="btn btn-danger d-flex justify-content-between align-items-center gap-2">
                                            <i class="fa fa-trash"></i>
                                            <div class="btn-text">
                                                Հեռացնել
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        <?php endforeach;
    endif; ?>
</div>
<div class="modal fade" id="project_description" aria-labelledby="project_description" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Պռոեկտի նկարագրություն</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1 style="text-align:center; color:#374151;">✨ DreamSync — Creative Collaboration Platform</h1>

                <p style="text-align:center; font-style:italic; color:#6b7280;">
                    Where ideas come alive, and teamwork becomes effortless.
                </p>

                <hr>

                <h2>🌈 Overview</h2>
                <p>
                    <strong>DreamSync</strong> is a modern web platform that helps creative teams <em>brainstorm, organize, and launch</em> projects together — all in one place.
                    Designed with simplicity and beauty in mind, it combines <span style="color:#2563eb;">real-time collaboration</span> with intuitive tools that boost productivity.
                </p>

                <h2>🚀 Key Features</h2>
                <ul>
                    <li><strong>Live Collaboration:</strong> edit documents with your teammates in real time.</li>
                    <li><strong>Task Boards:</strong> create, assign, and track progress visually.</li>
                    <li><strong>Version History:</strong> never lose your ideas — every change is saved.</li>
                    <li><strong>Smart Notifications:</strong> stay updated without feeling overwhelmed.</li>
                </ul>

                <h2>🧩 Tech Stack</h2>
                <table style="width:100%; border-collapse:collapse;" border="1">
                    <thead style="background-color:#f3f4f6;">
                    <tr>
                        <th>Component</th>
                        <th>Technology</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Frontend</td>
                        <td>React + Tailwind CSS</td>
                        <td>Clean, responsive user interface</td>
                    </tr>
                    <tr>
                        <td>Backend</td>
                        <td>Node.js + Express</td>
                        <td>Handles data and authentication</td>
                    </tr>
                    <tr>
                        <td>Database</td>
                        <td>MongoDB</td>
                        <td>Stores users, projects, and files</td>
                    </tr>
                    </tbody>
                </table>

                <h2>📸 Interface Preview</h2>
                <p style="text-align:center;">
                    <img src="https://picsum.photos/800/300" alt="Project preview" style="border-radius:12px; max-width:100%;">
                </p>

                <h2>💬 User Feedback</h2>
                <blockquote style="border-left:4px solid #3b82f6; margin:1em; padding:0.5em 1em; color:#374151;">
                    “DreamSync completely changed the way our design team works.
                    We collaborate faster, communicate better, and deliver more.”
                    <br>— <em>Anna M., UI Designer</em>
                </blockquote>

                <h2>⚙️ Future Plans</h2>
                <ol>
                    <li>Integrate AI-assisted brainstorming tools 🤖</li>
                    <li>Add offline collaboration mode 🌍</li>
                    <li>Release mobile app (iOS & Android) 📱</li>
                </ol>

                <h2>🎯 Summary</h2>
                <p>
                    DreamSync aims to redefine teamwork by bringing together <strong>creativity</strong>, <strong>clarity</strong>, and <strong>collaboration</strong> — beautifully.
                </p>

                <hr>

                <p style="text-align:center; font-size:14px; color:#9ca3af;">
                    Made with ❤️ by the DreamSync Team<br>
                    <small>Version 1.0 — Built using TinyMCE Free Edition</small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Փակել</button>
            </div>
        </div>
    </div>
</div>

