$(document).ready(function(){
    $image_crop = $('#banner_view').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 100,
            // square & circle
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#banner_pick').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('#uploadbannerpick.modal').modal('hide');
            }

            $image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('#uploadbannerpick.modal').modal('show');
    });
    
    $('#update-banner-pick').on('click', function () {

        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: '/api/profile/banner',
                type: "POST",
                data: {'banner_pick': response},
                success:function(data) {
                    console.log('Server Response:', data);
                    $('#uploadbannerpick.modal').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});