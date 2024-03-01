$(document).ready(function(){
    $image_crop = $('.modal #image_demo').croppie({
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

    $('.custom-file-input.file#post_image').on('change', function () { 
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
    
            // Make the fetch request
            fetch('/api/posts/memory', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server Response:', data);
                console.log('Post Message:', data.postText);
                console.log('Post Image:', data.response);

                // Continue with the rest of your code
            })
            .catch(error => console.error('Error:', error));

            $('.modal#uploadimageModal').modal('hide');

        });
    });

});