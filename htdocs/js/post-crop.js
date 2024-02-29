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
    
    $('#share-memory').on('click', function (ev) {
        var postText = $("#post_message").val();

        $image_crop.croppie('result', {
            type: 'base64',
            size: 'viewport'
        }).then(function(response) {
            // Create a FormData object
            const formData = new FormData();
            formData.append('post_image', dataURLtoBlob(response), 'cropped_image.jpg');
            formData.append('post_text', postText);

            // Make the fetch request
            fetch('/api/posts/memory', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                },
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

// Function to convert base64 to Blob
function dataURLtoBlob(dataURL) {
    var byteString = atob(dataURL.split(',')[1]);
    var mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);

    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ab], { type: mimeString });
}