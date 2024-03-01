<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('post_text') && $this->paramsExists('post_image')) {
        $image_tmp = $_POST['post_image'];
        list($type, $image_tmp) = explode(';', $image_tmp);
        list(, $image_tmp) = explode(',', $image_tmp);
        $image_tmp = base64_decode($image_tmp);
        // $image_tmp = md5(time());
        $text = $_POST['post_text'];
        Post::registerPost($text, $image_tmp);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};