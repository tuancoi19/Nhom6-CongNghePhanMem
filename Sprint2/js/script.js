$( document ).ready(function() {
    var lev=$("#lever").text();

    $("select.NV").change(function(){
       

        var str = $(this).children("option:selected").val();
        var tex=  $(this).children("option:selected").text();
        var idO = $(this).parent().siblings(".Oid").text();
        var conf="Bạn có muốn phân việc cho nhân viên "+tex;
        if(str=="NULL") conf="Bạn có muốn hủy phân công công việc này? ";
        if(confirm(''+conf)){
            $.ajax({
                url: 'admin/editWork.php',
                type: 'POST',
                data: {'type':'editWork','id1' : str,'id2': idO  } ,
                success: function (data) {
                   alert('Đã phân công công việc');
                   window.location.reload();
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        }else window.location.reload();
    });
    
    $("#ConfirmWork").click(function(){
        var id = $('#idoder').text();
        if(lev == 0){
            if(confirm("Xác nhận công việc hoàn thành?"))
            {
                $.ajax({
                    url: 'admin/editWork.php',
                    type: 'POST',
                    data: {'type':'confirmWork','id' : id  } ,
                    success: function (data) {
                    alert('Đã xác nhận');
                    window.location.reload();
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
                
            }
        }else{
            var link = $("#link").val();
            var id = $('#idoder').text();
            if(link=="") alert('Phần link không được bỏ trống');
            else
                if(confirm("Xác nhận công việc hoàn thành?"))
                {
                    
                    $.ajax({
                        url: 'admin/editWork.php',
                        type: 'POST',
                        data: {'type':'link','id' : id,'link':link  } ,
                        success: function (data) {
                        // alert('Đã xác nhận');
                        window.location.reload();
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
            };
        }
    });
    $(".deleteOder").click(function(){
        
        var idO = $(this).parent().siblings(".Oid").text();
        if(confirm("Bạn có chắc muốn xóa?"))
        {
            $.ajax({
                url: 'admin/editWork.php',
                type: 'POST',
                data: {'type':'delete','id' : idO } ,
                success: function (data) {
                // alert('Đã xác nhận');
                window.location.reload();
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        }
    });
    $(".deletenv").click(function(){
        var id = $(this).parent().siblings(".idnv").text();
        if(confirm("Bạn có chắc muốn xóa?"))
        {
            $.ajax({
                url: 'admin/editWork.php',
                type: 'POST',
                data: {'type':'deletenv','id' : id } ,
                success: function (data) {
                // alert('Đã xác nhận');
                window.location.reload();
                },
                error: function (e) {
                    console.log(e.message);
                }
            });
        } 
    })
});