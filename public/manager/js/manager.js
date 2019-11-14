/**
 * Created by Administrator on 2019/8/1.
 */

$(function () {
    $('.table .sort').click(function () {
        var id = $(this).parent().siblings(":first").text();
        // var id = '22fdsfs';
        var sort = $(this).siblings('input').val();
        // var sort = 'dfadfas';
        $.ajax({
            url:'/admin/hot_search_sort_edit/',
            type:'get',
            dataType:'json',
            data:{id:id, sort:sort},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                alert(data.message);
            }, error:function (data) {
                console.log('服务器报错了~');
            }
        })
    })
})