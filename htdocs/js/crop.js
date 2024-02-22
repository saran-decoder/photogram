$(document).ready(function(){
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });
    $('.file#post_image').on('change', function () { 
        var reader = new FileReader();
        reader.onload = function (e) {
            $image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });			
        }
        reader.readAsDataURL(this.files[0]);
        $('.modal#uploadimageModal').modal('show');
    });
    
    // $('#share-memory').on('click', function (ev) {
    //     var postText = $("#post_message").val();

    //     $image_crop.croppie('result', {
    //         type: 'canvas',
    //         size: 'viewport'
    //     }).then(function (response) {
    //         // Create a FormData object
    //         const formData = new FormData();
    //         formData.append('post_image', response);
    //         formData.append('post_text', postText);
    
    //         // Make the fetch request
    //         // fetch('/api/posts/memory', {
    //         //     method: 'POST',
    //         //     body: formData,
    //         // })
    //         // .then(response => response.json())
    //         // .then(data => {
    //         //     console.log('Server Response:', data);
    //         //     console.log('Post Message:', data.postText);
    //         //     console.log('Post Image:', data.response);

    //         //     // Continue with the rest of your code
    //         // })
    //         // .catch(error => console.error('Error:', error));

    //         // $('.modal#uploadimageModal').modal('hide');

    //         // $.ajax({
    //         //     url: '/api/posts/memory',
    //         //     type: 'POST',
    //         //     data: formData,
    //         //     processData: false,  // To prevent jQuery from automatically processing the data
    //         //     contentType: false,  // To prevent jQuery from automatically setting the content type
    //         //     success: function(data) {
    //         //         console.log('Server Response:', data);
    //         //         console.log('Post Message:', data.postText);
    //         //         console.log('Post Image:', data.response);
                    
    //         //         $('.modal#uploadimageModal').modal('hide');
    //         //         // Continue with the rest of your code
    //         //     },
    //         //     error: function(error) {
    //         //         console.error('Error:', error);
    //         //     }
    //         // });
            
    //         $.post('/api/posts/memory', {
    //             ata: formData,
    //             processData: false,  // To prevent jQuery from automatically processing the data
    //             contentType: false,  // To prevent jQuery from automatically setting the content type
    //         }, function(data) {
    //             console.log('Server Response:', data);
    //             console.log('Post Message:', data.postText);
    //             console.log('Post Image:', data.response);        
    //             $('.modal#uploadimageModal').modal('hide');
    //         });

    //     });
    // });
    
    
    $('#share-memory').on('click', function (ev) {
        var postText = $("#post_message").val();
    
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            // Create a FormData object
            const formData = new FormData();
            formData.append('post_image', response);
            formData.append('post_text', postText);
    
            // Make the AJAX request using $.ajax
            $.ajax({
                url: '/api/posts/memory',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log('Server Response:', data);
                    console.log('Post Message:', data.postText);
                    console.log('Post Image:', data.response);
    
                    // Continue with the rest of your code
    
                    // Hide the modal
                    $('.modal#uploadimageModal').modal('hide');
                },
                error: function (xhr, status, error) {
                    console.error('Error:', xhr, status, error);
    
                    // Additional error handling, log the server response
                    if (xhr.responseJSON) {
                        console.error('Server Response:', xhr.responseJSON);
                    }
                }
            });
        });
    });
    
    
    
    
});