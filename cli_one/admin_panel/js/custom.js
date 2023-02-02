var counter = 1;

$(document).ready(function() {
    $('#news_dataTable').DataTable();
    /*$('#news_dataTable').DataTable({
        processing: true,
        serverSide: true,
        aaSorting: [[0, 'asc']],
        ajax: {
            url: 'get_news_data.php',
            type: 'post',
            data: function (d) {
                d.from_time=$('#from_time').val();
                d.to_time=$('#to_time').val();
                d.type=$('#type').val();
            },
        },
        aoColumns: [
            { mData: 'checkbox_row' },
            { mData: 'sr_no' },
            { mData: 'news_title' },
            { mData: 'source_name' },
            { mData: 'language' },
            { mData: 'topics' },
            { mData: 'no_of_views' },
            { mData: 'active' },
        ],
        columnDefs: [{
            defaultContent: "-",
            targets: "_all"
        }]
    });*/
});

/*
 * select all in delete
 */
$(document).on("click", ".conchkSelectAll", function (e) {
    $('.conchkNumber').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber').map(function () {
        return $(this).attr('id');
    }).get();
    $("#delete_value").val(values);

});

$(document).on("click", ".conchkNumber", function (e) {
    var values = $('input:checkbox:checked.conchkNumber').map(function () {
        return $(this).attr('id');
    }).get();
    $("#delete_value").val(values);

});

/*
 * Ajax delete
 */
$(document).on("click", ".delete_news", function () {
    $('#mydelete').modal('toggle');
    $.ajax({
        type: 'delete',
        url: 'delete_news.php?id='+$("#delete_value").val(),
        success: function (result) {
            var from_time=$('#from_time').val();
            var to_time=$('#to_time').val();
            var type=$('#type').val();
            ajax_data_table_load(from_time,to_time,type);
        },
    })
});

function get_news_data() {
    var from_time=$('#from_time').val();
    var to_time=$('#to_time').val();
    var type=$('#type').val();

    if(from_time == ''){
        alert('Please Enter From Time');
    }else if (to_time == ''){
        alert('Please Enter To Time');
    }else{
        ajax_data_table_load(from_time,to_time,type);
    }
}

function get_story_data() {
    var from_time=$('#from_time').val();
    var to_time=$('#to_time').val();
    var type=$('#type').val();

    if(from_time == ''){
        alert('Please Enter From Time');
    }else if (to_time == ''){
        alert('Please Enter To Time');
    }else{
        ajax_data_story_table_load(from_time,to_time,type);
    }
}

function load_news_data() {
    $('#news_dataTable').DataTable().ajax.reload();
}

function get_news_data_by_type(type) {
    $('#news_dataTable').DataTable().ajax.reload();
    //ajax_data_table_load('','',type);
    //console.log('news_dataTable_'+counter);
    /*$('#news_dataTable_'+counter).DataTable({
        aoColumns: [
            { mData: 'checkbox_row' },
            { mData: 'sr_no' },
            { mData: 'news_title' },
            { mData: 'source_name' },
            { mData: 'language' },
            { mData: 'topics' },
            { mData: 'no_of_views' },
            { mData: 'active' },
        ],
        columnDefs: [{
            defaultContent: "-",
            targets: "_all"
        }]
    });*/
    /*$("#news_div").load('get_news_div.php?from_time=&to_time=&type='+type+'&counter='+counter);
    $('#news_dataTable_'+counter).DataTable();*/
    //counter++;
}

function ajax_data_table_load(from_time,to_time,type){
    var url = 'get_news_data.php';

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data:{from_time:from_time,to_time:to_time,type:type},
        success: function (cdata) {
            $('#news_dataTable').dataTable().fnClearTable();
            $('#news_dataTable').dataTable().fnAddData(cdata);
        }
    });
}
function ajax_data_story_table_load(from_time,to_time,type){
    var url = 'get_story_data.php';

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data:{from_time:from_time,to_time:to_time,type:type},
        success: function (cdata) {
            $('#news_dataTable').dataTable().fnClearTable();
            $('#news_dataTable').dataTable().fnAddData(cdata);
        }
    });
}