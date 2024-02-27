            <div class="tab-pane fade active show" id="posts" role="tabpanel">
                <div class="container">
                    <div class="row gy-3 g-md-3 hcf-isotope-grid" data-masonry='{"percentPosition": true }'>
                        <?php
                            $userPosts = Post::getUserposts();
                            use Carbon\Carbon;

                            foreach ($userPosts as $post) {
                                $p = new Post($post['id']);
                                $uploaded_time = Carbon::parse($p->getUploadedTime());
                                $uploaded_time_str = $uploaded_time->diffForHumans();
                        ?>
                        <div class="col-12 col-md-6 col-lg-3 hcf-isotope-item">
                            <a class="hcf-masonry-card rounded rounded-4" type="button" id="post-<?=$post['id']?>">
                                <img class="card-img img-fluid" loading="lazy" src="<?=$post['image_uri']?>" alt="Your Post">
                            </a>
                            <!-- Modal -->
                            <div id="post-<?=$post['id']?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-auto col-lg-6 p-0">
                                                    <button type="button" class="close text profile-icon position-absolute mt-2 ms-2" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                    <img class="custom-wh" src="<?=$post['image_uri']?>" alt="User Post">
                                                </div>
                                                <div class="p-3">     
                                                    <div class="font-weight-bold w-100 d-flex align-items-center justify-content-between" data-id="3">
                                                        <a href="profile/<?=$post['owner']?>" class="text-decoration-none d-flex align-items-center text-capitalize text user-name">
                                                            <img class="rounded-circle me-2" src="<?=$post['image_uri']?>" width="30" alt="">
                                                            <p class="user-name m-0"><?=$post['owner']?></p>
                                                        </a>
                                                        <ul class="list-inline d-flex flex-row align-items-center m-0">
                                                            <li class="list-inline-item d-flex align-items-end">
                                                                <?php
                                                                    if (Session::isAuthenticated()) {
                                                                        $islike = new Like($post['id']);
                                                                        if ($islike->is_liked() ? $islike->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                                            if ($islike->is_liked()['status'] == 'liked') {
                                                                ?>
                                                                <!-- unlike button -->
                                                                <button class="btn p-0 list-inline-item me-2 text-danger btn-like liked icon-liked" data-id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48">
                                                                        <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.35" d="M15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326C31 40 44 30 44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8"></path>
                                                                    </svg>
                                                                </button>
                                                                <button class="btn p-0 list-inline-item me-2 btn-like liked d-none icon-like" data-id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php } else { ?>
                                                                <!-- liked button -->
                                                                <button class="btn p-0 list-inline-item me-2 btn-like" data-id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php
                                                                    }
                                                                        } else { ?>
                                                                <!-- liked button -->
                                                                <button class="btn p-0 list-inline-item me-2 btn-like" data-id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php } } ?>
                                                                <div class="text" id="like-count-<?=$post['id']?>"><?=$p->getLikeCount()?></div>
                                                            </li>
                                                            <!-- TODO: Implement the command code -->
                                                        </ul>
                                                    </div>
                                                    <p class="text m-0 mt-2"><?=$post['post_text']?></p>
                                                    <p class="time-date m-0 text-align-end"><?=$uploaded_time_str?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>