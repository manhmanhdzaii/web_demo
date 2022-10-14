$("#f_add_product").validate({
    onfocusout: false,
    onclick: false,
    rules: {
        "name": {
            required: true,
        },
        "price": {
            required: true,
        },
        "color_id[]": {
            required: true,
        },
        "size_id[]": {
            required: true,
        },
        "category_id": {
            required: true,
        },
        "img": {
            required: true,
        },
    },
    messages: {
        "name": {
            required: "Tên sản phẩm không được để trống",
        },
        "price": {
            required: "Giá sản phẩm không được để trống",
        },
        "color_id[]": {
            required: "Màu sản phẩm không được để trống",
        },
        "size_id[]": {
            required: "Cỡ sản phẩm không được để trống",
        },
        "category_id": {
            required: "Loại danh mục không được để trống",
        },
        "img": {
            required: "Ảnh sản phẩm không được để trống",
        },
       
    },
    errorPlacement: function(error, element) {
        $(element).parent('div').next('.err').html(error);
    },
});

$('#category_id').select2({
    placeholder: "Chọn danh mục",
    width: "100%",
});
$('#size_id').select2({
    placeholder: "Chọn size sản phẩm",
    multiple: true,
    width: "100%",
   
});
$('#color_id').select2({
    placeholder: "Chọn màu sản phẩm",
    multiple: true,
    width: "100%",
});
function loadFile(event, img_sub) {
    var html='';
    var files = $(img_sub)[0].files;
    var num_img = 5 - $('.img_show').length - files.length;
    if (num_img>=0) {
        if (files.length <= 0) {
            alert('Bạn chưa chọn tệp upload');
        } else {
            for (var i = 0; i < files.length; i++) {
                var name = document.getElementById('img_sub').files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'jfif']) == -1) {
                    alert('Bạn chỉ được upload file ảnh');
                }else{
                var f = document.getElementById('img_sub').files[i];
                var fsize = f.size || f.fileSize;
                if (fsize > 2097152) {
                    alert('Bạn chỉ được upload file dưới 2MB');

                } else {
                    var src = URL.createObjectURL(event.target.files[i]);
                    html +='<a class="img_show"><img src="' + src + '" ><i class="fas fa-trash delete_imgshow" onclick="Remove_ImgShow(this)"></i></a>';
                }
            }
        }
        }
    }else{
        alert('Bạn chỉ được upload tối đa 4 ảnh');
    }
    $('.img_prew_sub').html(html);
}
function loadFile1(event, img) {
    var html='';
    var files = $(img)[0].files[0];
    var name = document.getElementById('img').files[0].name;
    var ext = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'jfif']) == -1) {
            alert('Bạn chỉ được upload file ảnh');
        }else{
        var f = document.getElementById('img').files[0];
        var fsize = f.size || f.fileSize;
        if (fsize > 2097152) {
            alert('Bạn chỉ được upload file dưới 2MB');

        } else {
            var src = URL.createObjectURL(event.target.files[0]);
            html +='<a class="img_show"><img src="' + src + '" ><i class="fas fa-trash delete_imgshow" onclick="Remove_ImgShow(this)"></i></a>';
        }
    }  
    $('.img_prew').html(html);
}
function Remove_ImgShow(e){
    $(e).parents('.img_show').addClass('tick');
    var arr_img = new Array();
    $('.img_show').each(function() {
        if ($(this).hasClass('tick')) {
            arr_img.push(1);
        } else {
            arr_img.push(0);
        }
    });
   var index = arr_img.indexOf(1)
//    console.log(index);
    $(e).parents('.img_show').remove();
    // var files = $('#upload_img')[0].files;
   
    // var $a = document.getElementById('upload_img').files[index];
    
    // console.log($a);

}