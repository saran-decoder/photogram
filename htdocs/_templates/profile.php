<?php Session::loadTemplate('_header'); ?>

<div class="container list p-0"> 
	<div class="profile-layout h-100 position-absolute">
		<div class="d-flex justify-content-center">
			<div class="col col-10 p-0 w-100">
                
                <?php 
                    $profile = Profile::getuserProfile();
                    $A_profile = Profile::getuserAuth();
                ?>
                
                <div class="overflow-hidden">

                    <!-- Offcanvas Body -->
                    <div class="offcanvas-body overflow-x-hidden px-2">
                        <!-- Avatar -->
                        <div class="text-center py-4">
                            <div class="mr-3 d-flex flex-column align-items-center mt-2">
                                <img src="<?=$profile['avatar']?>" alt="..." width="130" height="130" style="border-radius: 4rem;">    
                                <div class="pt-3 d-flex flex-column align-items-center">
                                    <h5 class="mb-0 text text-capitalize" style="font-variant: petite-caps;">
                                        <?=$profile['owner']?>
                                    </h5>
                                    <div class="py-2 rounded text">
                                        <p class="font-italic mb-0"><?=$profile['bio']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Avatar -->

                        <!-- Tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text active" data-bs-toggle="pill" href="#offcanvas-posts-tab" role="tab" aria-controls="offcanvas-posts-tab" aria-selected="true">
                                    Posts
                                    <?php
                                        $userpostCount = Profile::getPostcount();
                                        foreach ($userpostCount as $count) {
                                    ?>
                                        <sub><?=$count['image_uri']?></sub>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text" data-bs-toggle="pill" href="#offcanvas-profile-info-tab" role="tab" aria-controls="offcanvas-profile-info-tab" aria-selected="false">
                                    Profile <sub>Info</sub>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text" data-bs-toggle="pill" href="#offcanvas-profile-edit-tab" role="tab" aria-controls="offcanvas-profile-edit-tab" aria-selected="false">
                                    Edit <sub>Profile</sub>
                                </a>
                            </li>
                        </ul>
                        <!-- Tabs -->

                        <!-- Tabs Infos -->
                        <?php Session::loadTemplate('profile/tabs_info'); ?>
                        <!-- Tabs Infos -->
                    </div>
                    <!-- Offcanvas Body -->
                </div>
            </div>
        </div>
    </div>