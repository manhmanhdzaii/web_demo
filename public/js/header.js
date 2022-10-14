

$('.header_menu').click(function(){
    $('.header_sub').removeClass('hidden');
})
$('.header_sub_arrow').click(function(){

    if($('.header_sub_title').hasClass('hidden') == true){
             $('.header_sub').addClass('hidden');
    }else{
        $('.header_sub_title').addClass('hidden');
        $('.header_sub_box2').addClass('hidden');
        $('.header_sub_box1').removeClass('hidden');
    }
})

$('.h_sub_b1_item_shop').click(function(){
    $('.header_sub_box1').addClass('hidden');
    $('.header_sub_box2').removeClass('hidden');
    $('.header_sub_title').removeClass('hidden');
})
