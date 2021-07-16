$(document).ready(function(){
    $('.like-btn').on('click', function(){
        var post_id = $(this).data('id');
        $clicked_btn = $(this);
        if($clicked_btn.hasClass('fas fa-thumbs-up')){
            var likeBTN_value = "unlike";
        } else if($clicked_btn.hasClass('far fa-thumbs-up')){
            var likeBTN_value = "like";
        }
         
        alert(likeBTN_value)

        $.ajax({
            type: "post",
            url: "single.php",
            data: {
                'like-dislike-action':likeBTN_value,
                'post_id': post_id
            },
            success: function (data) {
                // res = JSON.parse(data) 
                if($clicked_btn.hasClass("far fa-thumbs-up")){
                    $clicked_btn.removeClass("far fa-thumbs-up")
                    $clicked_btn.addClass("fas fa-thumbs-up")
                } else{
                    $clicked_btn.removeClass("fas fa-thumbs-up")
                    $clicked_btn.addClass("far fa-thumbs-up")
                }

//                 $clicked_btn.siblings('span.likes').text(res.likes)
//                 $clicked_btn.siblings('span.dislikes').text(res.dislikes)

//                 $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass("fa-thumbs-o-down")
            }
        });

    })

//     $('.dislike-btn').on('click', function(){
//         var post_id = $(this).data('id');
//         $clicked_btn = $(this);

//         if($clicked_btn.hasClass('fa-thumbs-o-down')){
//             action = 'dislike'
//         } else if($clicked_btn.hasClass('fa-thumbs-down')) {
//             action = 'undislike'
//         }

//         $.ajax({
//             type: "post",
//             url: "single.php",
//             data: {
//                 'action':action,
//                 'post_id':post_id
//             },
//             success: function (data) {
//                 res = JSON.parse(data)
//                 if(action == "dislike"){
//                     $clicked_btn.removeClass('fa-thumbs-o-down')
//                     $clicked_btn.addClass('fa-thumbs-down')
//                 } else if(action == "undislike"){
//                     $clicked_btn.removeClass('fa-thumbs-o-down')
//                     $clicked_btn.addClass('fa-thumbs-down ')
//                 }

//                 $clicked_btn.siblings('span.likes').text(res.likes)
//                 $clicked_btn.siblings('span.dislikes').text(res.dislikes)

//                 $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass("fa-thumbs-o-up")
//             }
//         });

//     })

})