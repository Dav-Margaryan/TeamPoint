$(document).ready(function(){
    loadTasksTable();
    $("body").on('click', '#content_body tr', function (){ onSelectTask(this) });


    $('#exampleModalCenter').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
})

$(document).on('keyup','.quick_search',function (){quickSearch()})

var url = "../controllers/MethodsController.php";

function loadTasksTable() {
    $.ajax({
        type: "POST",
        data: "functionName=loadTasksTable",
        url: url,
        success: function (data) {
            try {
                var data = JSON.parse(data);
            } catch (err) {
                modalDialog('Error: ' + err);
                return false
            }
            let content = '';
            if (data.length > 0) {
                if (data.length > 1) {
                    for (let i = 0; i < data.length; i++) {
                        index = i + 1;
                        if(data[i].is_active == 1){ input = 'Ակտիվ է';color = '#44ed44'}else{ input = 'Ակտիվ չէ';color = '#aaa3a3'};
                        content += '<tr value="'+data[i].id+'"><td style="background-color: '+color+'">'+index+'</td><td>'+data[i].title+
                                '</td><td>'+data[i].date+'</td><td>'+input+
                                '</td></tr>';
                    }
                } else {
                    data = data[0]
                    if(data.is_active == 1){ input = 'Ակտիվ է';color = '#44ed44'}else{ input = 'Ակտիվ չէ';color = '#aaa3a3'};
                    content += '<tr value="'+data.id+'"><td style="background-color: '+color+'">'+1+'</td><td>'+data.title+
                        '</td><td>'+data.date+'</td><td>'+input+
                        '</td></tr>';
                }
                $('#content_body').html(content)
            }else{
                $('#content_body').html('')
                if($('.no_data').length > 0){
                    $('.no_data').removeClass('d-none')
                }else {
                    let tr = document.createElement("tr");
                    tr.setAttribute("class", "no_data");
                    tr.appendChild(document.createTextNode('no data found'));
                    tr.style.color = 'red';
                    document.querySelector('#content_body').appendChild(tr)
                }
            }
        }
    })
}

function onClickCancelButton(){
    $('.buttonsList').removeClass('d-none');
    $('.actionsDiv').removeClass('d-none');
    $('.add_form').addClass('d-none');
    $('.tasksForm').addClass('d-none');
    $('.tasksList').removeClass('d-none');
    $('.blockFooter').addClass('d-none')
}

function onSelectTask(oNode){
    if($(oNode).hasClass("selected")) return onSelectTask(null);
    if(oNode == null){
        $("#selectedTaskTitle").html();
        $('#change').addClass('d-none');
        $("#content_body tr").each(function (){
            $(this).removeClass('selected')
        })
        $('.enabled').addClass('d-none');
        $('.disabled').removeClass('d-none');
        $("#selectedTaskTitle").html('');
        $("#selectedTaskId").val('')
        return true;
    }
    $("#selectedTaskTitle").html('Selected task name: '+'<b>'+$(oNode).children("td").eq(1).text()+'</b>');
    $('#change').removeClass('d-none');
    $('.enabled').removeClass('d-none');
    $('.disabled').addClass('d-none');

    let id = $(oNode).attr("value");
    $("#content_body tr").each(function(){
        if($(this).attr("value") === id)
        {
            $(this).addClass("selected");
        }
        else
            $(this).removeClass("selected");
    });
    $("#selectedTaskId").val(id)
}

function onClickEditButton(){
    $('.tasksList').addClass('d-none');
    $('.actionsDiv').addClass('d-none');
    $('.tasksForm').removeClass('d-none');
    let id = $('#selectedTaskId').val();
    let content = $('.form_content').html();
    $.ajax({
        data:"functionName=edit" + '&id='+id,
        type:"POST",
        url:url,
        success: function(data){
            try {
                var data = JSON.parse(data);
            } catch (err) {
                modalDialog('Error: ' + err);
                return false
            }
            data = data[0]
            checked = data.is_active === 1? 'checked':'';
            content = ""
            content +=  '<div class="form-group">'+
                            '<label>'+
                                'Task title'+
                            '</label>&nbsp'+
                            '<input type="text" class="form-control col-4" id="taskTitle" placeholder="Password" value="'+data.title+'">'+
                        '</div>'+
                        '<div class="form-check mt-2 mb-2">'+
                            '<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>'+
                            '<label class="form-check-label" for="flexCheckChecked">'+
                                'Active'+
                            '</label>'+
                        '</div>';
            $('.form_content').removeClass('d-none');
            $('.form_content').html(content)
            $('.blockFooter').removeClass('d-none');

        }
    })

}

function onClickDeleteButton(){
    let id = $('#selectedTaskId').val();
    $.ajax({
        type:"POST",
        url:url,
        data:"functionName=delete" + '&id='+id,
        success: function (data){
            if(data){
                try {
                    var data = JSON.parse(data);
                } catch (err) {
                    modalDialog('Error: ' + err);
                    return false
                }
                if(data){
                    alert('Deleted successfully!!!');
                    $("#selectedTaskTitle").html('');
                    $("#selectedTaskId").val()
                    loadTasksTable();
                }else{
                    let message = 'There is a mistake somewhere in your code!!!'
                    modalDialog(message);
                }
            }
        }
    })
}

    $(document).on('click','#addTask',function() {
        let id = $('#selectedTaskId').val();
        let newTaskName = $('#inpTitle').val();
        let taskName = $('#task_title').val();
        let is_active = $('#is_active').is(':checked') == true ? 1 : 0;
        console.log(taskName)
        if (!taskName || taskName == '') {
            modalErrorDialog('bg-danger', 'Task name is empty', null, 'Please fill task name')
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: "functionName=save" + '&newTaskName=' + newTaskName + '&taskName=' + taskName + '&id=' + id + '&is_active=' + is_active,
                success: function (data) {
                    try {
                        var data = JSON.parse(data);
                        if (data['message']) {
                            var message = data['message']
                            modalDialog(message)
                        }
                    } catch (err) {
                        modalDialog('Error: ' + err);
                        return false
                    }
                    if (!data['message']) {
                        if (id) {
                            alert('Updated successfully!!!')
                        } else {
                            console.log('stex')
                            alert('Added successfully!!!');
                        }
                        loadTasksTable();
                        onSelectTask(null);
                        onClickCancelButton();
                        $('#inpTitle').val('')
                    }
                }
            })
        }
    })


function onClickAddButton(){
    onSelectTask(null);
    $('.buttonsList').addClass('d-none');
    $('.add_form').removeClass('d-none');
}

function onClickSearchButton(){
    let searchForm = $('#search-form');
    let data = new FormData(searchForm[0]);
    var output = [];
    for (const [key, value] of data) {
        output[key] = value
    }
    let date = output['date'];
    let title = output['title']
    $.ajax({
        type:'Post',
        data:'functionName=search'+'&date='+date+'&title='+title,
        url:url,
        success:function (data){
            try {
                var data = JSON.parse(data);
            } catch (err) {
                modalDialog('Error: ' + err);
                return false
            }
            let content = '';
            if (data.length > 0) {
                if (data.length > 1) {
                    for (let i = 0; i < data.length; i++) {
                        input = '';
                        index = i + 1;
                        if(data[i].is_active == 1){ input = 'Ակտիվ է';color = '#44ed44'}else{ input = 'Ակտիվ չէ';color = '#aaa3a3'};
                        content += '<tr value="'+data[i].id+'"><td style="background-color: '+color+'">'+index+'</td><td>'+data[i].title+
                            '</td><td>'+data[i].date+'</td><td>'+input+
                            '</td></tr>';
                    }
                } else {
                    data = data[0]
                    if(data.is_active == 1){ input = 'Ակտիվ է';color = '#44ed44'}else{ input = 'Ակտիվ չէ';color = '#aaa3a3'};
                    content += '<tr value"'+data.id+'"><td style="background-color: '+color+'">'+1+'</td><td>'+data.title+
                        '</td><td>'+data.date+'</td><td>'+input+
                        '</td></tr>';
                }
                $('#content_body').html(content)
            }else{
                $('#content_body').html('<div style="font-weight: bold;color: red;padding:5px">No data found</div>')
            }
        }
    })
}

function quickSearch(element = $('.quick_search')){
  var table, tbody, tr, td, i, j, filter
  let last_tr = 0
  filter = element.val().toUpperCase().trim();
  table = document.querySelector(element.attr('data_search_tbl'));
  tbody = table.querySelector('tbody')
  tr = tbody.getElementsByTagName('tr');
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else tr[i].style.display = "none";
            }
        }
    }

  $(tr).each(function (e){
        if(this.style.display !== 'none'){
            last_tr++
        }
        if(this.classList.contains('no_data')){
            last_tr--
        }
    })

    if(last_tr === 0){
        if($('.no_data').length > 0){
            $('.no_data').removeClass('d-none')
        }else {
            let tr = document.createElement("tr");
            tr.setAttribute("class", "no_data");
            tr.appendChild(document.createTextNode('no data found'));
            tr.style.color = 'red';
            tbody.appendChild(tr)
        }
    }else if($('.no_data') && last_tr !== 0) {
        $('.no_data').addClass('d-none')
    }
}


function modalDialog(type,title,buttons,message){
    $('#modalDialog .modal-header').addClass(type);
    $('#modalDialog .modal-title').html(title);
    $('#modalDialog .modal-body').html(message);
    $('#modalDialog #'+buttons+'').removeClass('hidden');
    $('#modalDialog').modal('show');
}

function modalErrorDialog(type,title,buttons,message){
    $('#modalErrorDialog .modal-header').addClass(type);
    $('#modalErrorDialog .modal-title').html(title);
    $('#modalErrorDialog .modal-body').html(message);
    $('#modalErrorDialog #'+buttons+'').removeClass('hidden');
    $('#modalErrorDialog').modal('show');
}


$(document).on('click','.addTask',function (){
    modalDialog(
        'bg-primary',
        $(this).attr('data-title'),
        'addTask',
        '<form>' +
                    '<div class="form-group">' +
                        '<input class="form-control" id="task_title" placeholder="New task name">' +
                    '</div>' +
                '</form>'

    )
})


