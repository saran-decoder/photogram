<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('post_text') && $this->paramsExists('post_image')) {
        $image_tmp = $_FILES['post_image']['tmp_name'];
        $text = $_POST['post_text'];
        Post::registerPost($text, $image_tmp);
    } else {
        $this->response($this->json([
            'message' => "Bad request"
        ]), 405);
    }
};