<?php
    include_once "../../DV_Controllers.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Document </title>
        <link rel="stylesheet" href="../../../resources/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body class="body">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Task Manager</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-8 mt-3">
                <div class="tasksList">
                    <div class="d-flex justify-content-between mb-1">
                        <div class="border border-dark p-1">Tasks list</div>
                        <div>
                            <input type="text" class="form-control quick_search" data_search_tbl='.tasks_tbl' placeholder="Quick Search">
                        </div>
                    </div>
                    <table class="tasks_tbl table-bordered table-hover col-12">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">title</th>
                                <th scope="col">date</th>
                                <th scope="col">is_active</th>
                            </tr>
                        </thead>
                        <tbody id="content_body"></tbody>
                    </table>
                </div>
            <div class="tasksForm d-none">
                <div class="p-1 mb-2 bg-primary text-white">Tasks Form</div>
                <div class="form_content"></div>
                <div class="p-1 mb-2 bg-primary text-white"></div>
            </div>
            <div class="blockFooter d-none">
                <button class="btn btn-success" onclick="onClickSaveAction()">Save</button>
                <button class="btn btn-secondary" onclick="onClickCancelButton()">Go back</button>&nbsp
            </div>
        </div>
            <div class="col-lg-4 mt-3">
                <div class="actionsDiv">
                    <div class="border border-dark p-1 col-2 mb-1">Actions</div>
                    <div class="border border-dark p-1">
                        <div class="d-flex justify-content-around mt-1 buttonsList">
                            <button class="btn btn-success col addTask" data-title="Add task">Add task</button>
                            <button class="btn disabled col">Delete task</button>
                            <button class="btn disabled col">Edit task</button>
                            <button class="btn btn-danger enabled d-none col" onclick="if(confirm('Are you sure, you want to delete this task???')){return onClickDeleteButton()}">Delete task</button>
                            <button class="btn btn-primary enabled d-none col" onclick="onClickEditButton()">Edit task</button>
                        </div>
                        <div id="searchBlock">
                            <div class="title">Search</div>
                            <form id="search-form" onsubmit="return false">
                                <input class="form-control" type="text" name="title" placeholder="Title">
                                <input pattern="\d{4}" class="form-control mt-1" type="date" name="date" placeholder="Date">
                                <button class="btn btn-secondary mt-2 float-right" onclick="onClickSearchButton()">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 text-white" id="modalDialog"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer border-0 row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <button class="btn btn-success hidden" id="addTask">
                                <i class="fa fa-plus"></i>
                                <span> Ավելացնել</span>
                            </button>
                            <button class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="fa-solid fa-lock"></i>
                                <span> Փակել</span>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalErrorDialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-title fs-5 text-white" id="modalErrorDialog"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer border-0 row">
                    <div class="col-6"></div>
                    <div class="col-6 d-flex justify-content-end">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-lock"></i>
                            <span> Փակել</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="../../../resources/js/script.js"></script>
    </body>
</html>