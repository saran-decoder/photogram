                        <?php 
                            $profile = Profile::getuserProfile();
                            $Auth = Profile::getAuth();
                            $email = $Auth['email'];
                            $phone = $Auth['phone'];
                            $AE_profile = Profile::getuserEAuth($email);
                            $AP_profile = Profile::getuserPAuth($phone);
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
                                <?php
                                    if (Session::isOwnerOf($profile['owner'])) {
                                ?>
                                <div class="list-group-item rounded-2 mb-3 p-3">
                                    <a href="../settings" class="text-decoration-none">
                                        <div class="row align-items-center">
                                            <div class="col text">
                                                <h6 class="text-profile-style mb-1">Settings</h6>
                                                <p class="d-block small opacity-50 m-0">Go to you're settings</p>
                                            </div>
                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="d-flex align-items-center mb-2">
                                    <small class="text-muted me-auto">About</small>
                                </div>
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h6 class="text-profile-style mb-1">Birthday</h6>
                                                <?php
                                                    if ($profile['dob'] == '1000-01-01') {
                                                ?>
                                                <p class="d-block small opacity-50 m-0">0000-00-00</p>
                                                <?php
                                                    } else {
                                                ?>
                                                <p class="d-block small opacity-50 m-0"><?=$profile['dob']?></p>
                                                <?php
                                                    }
                                                ?>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cake" viewBox="0 0 16 16">
                                                        <path d="m7.994.013-.595.79a.747.747 0 0 0 .101 1.01V4H5a2 2 0 0 0-2 2v3H2a2 2 0 0 0-2 2v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a2 2 0 0 0-2-2h-1V6a2 2 0 0 0-2-2H8.5V1.806A.747.747 0 0 0 8.592.802l-.598-.79ZM4 6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v.414a.911.911 0 0 1-.646-.268 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0A.911.911 0 0 1 4 6.414zm0 1.414c.49 0 .98-.187 1.354-.56a.914.914 0 0 1 1.292 0c.748.747 1.96.747 2.708 0a.914.914 0 0 1 1.292 0c.374.373.864.56 1.354.56V9H4zM1 11a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.793l-.354.354a.914.914 0 0 1-1.293 0 1.914 1.914 0 0 0-2.707 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0L1 11.793zm11.646 1.854a1.915 1.915 0 0 0 2.354.279V15H1v-1.867c.737.452 1.715.36 2.354-.28a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.708 0a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.707 0a.914.914 0 0 1 1.293 0Z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h6 class="text-profile-style mb-1">Gender</h6>
                                                <p class="d-block small opacity-50 m-0"><?=$profile['gender']?></p>
                                            </div>

                                            <div class="col-auto">
                                                <div class="text">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row align-items-center gx-6">
                                            <div class="col">
                                                <h6 class="text-profile-style mb-1">Phone</h6>
                                                <p class="d-block small opacity-50 m-0"><?=$AP_profile?></p>
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
                                                <h6 class="text-profile-style mb-1">Email</h6>
                                                <p class="d-block small opacity-50 m-0"><?=$AE_profile?></p>
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
                                                <h6 class="text-profile-style mb-1">Like</h6>
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
                                            <div class="d-flex align-items-center">
                                                <div class="text-danger mb-1 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                                        <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                                    </svg>
                                                </div>
                                                <a href="#" class="text-danger text-decoration-none">Block</a>
                                            </div>
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