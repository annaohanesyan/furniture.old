let url = '';
let likes = [];


$(document).ready(function(){

    $('.wind_disp').mouseover(function() {
        $(".window").css("display", "block");
    })

    $(".wind_disp").mouseout(function(){
        $(".window").css("display", "none");
    });



    $('.views_count').click(function(){
        let id = $(this).data('id');
        let name = $(this).data('name');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            method: 'POST',
            url: url + '/views_count'+'/'+id,
            data: {id:id, name:name},
            dataType: 'JSON',
            success: function (response) {
              
            }
        })
    })
   

    $('.like').click(function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        $(this).addClass('liked'); 
        likes.push(id);
        console.log(likes);
        if(likes.length <= 1){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            method: 'POST',
            url: url + '/like'+'/'+id,
            data: {id:id, name:name},
            dataType: 'JSON',
            success: function (data) {
                let lik_count = '';
                let count = JSON.stringify(data.likes);
                lik_count += "<span>"+ count +"</span>";   
                $(".like").html(lik_count);
               
            }
            
        })
        }else{
            $(this).removeClass('liked'); 
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                method: 'POST',
                url: url + '/dislike'+'/'+id,
                data: {id:id, name:name},
                dataType: 'JSON',
                success: function (data) {
                    let lik_count = '';
                    let count = JSON.stringify(data.likes);
                    lik_count += "<span>"+ count +"</span>";   
                    $(".like").html(lik_count);
                    likes = [];
                }
                
            })
        }
        

      

    
    })
    

    $('.shop_cart').click(function(){
        let id = $(this).data('id');
        let name = $(this).data('name');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            method: 'POST',
            url:   url + '/add_to_cart'+'/'+id,
            data: {id:id, name:name},
            dataType: 'JSON',
            success: function (data) {
                location.reload();  
            }
        })
    })



    
})



  




function send_message(){
    let text = $(".comment").val();
    let id = $("#fur_id").val();
    console.log(text);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        method: 'POST',
        url: url + '/send_message',
        data: {text:text, id:id},
        dataType: 'JSON',
        success: function () {
           
        }
    })



    
}


