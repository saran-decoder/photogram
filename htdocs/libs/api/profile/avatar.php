<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('post_image')) {
        $image_tmp = $_POST['post_image'];
        $image_tmp = explode(',', $image_tmp);
        $avatar = base64_decode($image_tmp[1]);
        Profile::profile($avatar);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};