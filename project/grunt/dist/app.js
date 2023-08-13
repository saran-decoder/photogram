/*Processed by SNA Labs on 28/12/2022 @ 15:54:29*/
// init Masonry
var $grid = $('#masonry-area').masonry({
    // itemSelector: '.col',
    // columnWidth: '.col',
    percentPosition: true
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
    $grid.masonry('layout');
});

//
$.post('/api/posts/count', {
    id: 10
}, function(data) {
    console.log(data);
    $('#total-posts').html("Total posts: " + data.count);
});

$('.btn-delete').on('click', function(){
    post_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Post", "Are you sure want to remove this post");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this post ${post_id} is deleted`);
                // $(`#post-${post_id}`).remove();
                
                $.post('/api/posts/delete',
                {
                    id: post_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#post-${post_id}`).remove();
                    }
                });

                $(event.data.modal).modal('hide')
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});




$(document).ready(function(){
    $('#exampleModal').on('show.bs.modal', function(){
        console.log("Modal is being shown");
    });

    $('#exampleModal').on('shown.bs.modal', function(){
        console.log("Modal has been shown");
    });

    $('#exampleModal').on('hide.bs.modal', function(){
        console.log("Modal is being hidden");
    });

    $('#exampleModal').on('hidden.bs.modal', function(){
        console.log("Modal is hidden");
    });

    $('#exampleModal').on('mouseover', function(){
        console.log("Mouse is over this button");
    });

    $('#textbox').on('keydown', function(event){
        console.log(event.originalEvent.key + " Key is pressed")
    });

    $('#textbox').on('keyup', function(event){
        console.log(event.originalEvent.key + " Key is released")
    });

    $('#liveToastBtn').click(function(){
        var el = $('#liveToast');
        new bootstrap.Toast(el).show();
    });

    $('#fetchModal').on('click', function(){
        $.get('/api/demo/modal', function(data, textStatus){
            $('main#mainel').append(data);
        });
    });

    
});
//# sourceMappingURL=app.js.map