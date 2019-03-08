
//商品上架、下架--js
$(document).on('click', '.grid-is-status', function() {

        var id = $(this).attr("id");
        var _this = $(this);

        $.post('/recovery',{id:id,_token:LA.token},function (data) {

            toastr.success('操作成功');
            var obj =  JSON.parse(data);
            if(obj.code == 200){
                _this.parent('td').parent('tr').remove();
                $.pjax.reload('#pjax-container');
            }else{swal(data.msg, '', 'error');}
        });
});


