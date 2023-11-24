                        <?php 
                            $profile = Profile::getuserProfile();
                            $A_profile = Profile::getuserAuth();
                        ?>
                        <div class="tab-content py-2" role="tablist">

                            <!-- Posts -->
                            <div class="tab-pane fade active show" id="offcanvas-posts-tab" role="tabpanel">
                                <div class="row m-1" data-masonry='{"percentPosition": true }'>
                                    <?php
                                        $userPosts = Post::getUserposts();
                                        foreach ($userPosts as $post) {
                                    ?>
                                        <div class="col-6 p-0">
                                            <img src="<?=$post['image_uri']?>" alt="" class="img-fluid rounded shadow-sm ps-1 pt-1">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Posts -->

                            <!-- Profile Info -->
                            <div class="tab-pane fade" id="offcanvas-profile-info-tab" role="tabpanel">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h5>Birthday</h5>
                                                <p class="m-0"><?=$profile['dob']?></p>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h5>Gender</h5>
                                                <p class="m-0"><?=$profile['gender']?></p>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h5>Phone</h5>
                                                <p class="m-0"><?=$A_profile['phone']?></p>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                                        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h5>Email</h5>
                                                <p class="m-0"><?=$A_profile['email']?></p>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                                        <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h5>Like</h5>
                                                <a class="text-decoration-none" href="<?=$profile['link']?>"><?=$profile['link']?></a>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                                        <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                                        <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                        if (!Session::isOwnerOf($profile['owner'])) {
                                    ?>
                                        <li class="list-group-item">
                                            <a href="#" class="text-danger text-decoration-none">Block</a>
                                        </li>
                                    <?php } ?>
                                </ul>

                            </div>
                            <!-- Profile Info -->

                            <!-- Profile Edit -->
                            <div class="tab-pane fade" id="offcanvas-profile-edit-tab" role="tabpanel">
                                <?php Session::loadTemplate('profile/edit_profile'); ?>
                            </div>
                            <!-- Profile Edit -->
                            
                        </div>