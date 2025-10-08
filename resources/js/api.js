$(document).ready(function() {
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
        const max = containerHeight - min - gutterHeight;

        let newHeight = startHeight + dy;
        if (newHeight < min) newHeight = min;
        if (newHeight > max) newHeight = max;

        $top.height(newHeight);
        $bottom.height($container.height() - newHeight -27)
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

    $('.fields .collapse').each(function (){
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
});