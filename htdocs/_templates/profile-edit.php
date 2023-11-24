<?php Session::loadTemplate('_header'); ?>

<style>
    nav.navbar.w-100.h-100.p-2.position-fixed.rs-navbar.sidebar {
        display: none;
    }
    textarea.form-control::placeholder {
        color: var(--timer-color);
    }
    input.form-control::placeholder {
        color: var(--timer-color);
    }
</style>

<div class="container list p-0"> 
	<div class="profile-layout h-100 position-absolute">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <?php
                    $loggedInProfileowner = Profile::getProfileowner();
                    while ($loggedInProfileowner) {
                        $profileowner = Profile::getProfileowner('username');
                    
                        $loggedInProfile = Profile::getProfile();
                        while ($loggedInProfile) {
                            $profile = Profile::getProfile('owner');
                ?>
                <div class="overflow-hidden">
                    <div class="p-2">
                        <?php
                            if (isset($_FILES['update_image']))
                            {
                                $avatar = $_FILES['update_image']['tmp_name'];
                                Profile::profile($avatar);
                            }
                        ?>
                        <!-- image update form data -->
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="mr-3">
                                <div class="imageWrapper">
                                    <!-- This is the preview image -->
                                    <img class="update_img view_image" src="<?=$profile['avatar']?>" alt="..." width="180" height="180">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="top: 5px;">
                                    <div class="profile_input update_image" style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="file" accept="image/*" name="update_image" class="custom-file-input file-input form__file"> 
                            </div>
                            <div class="d-flex justify-content-between align-items-center position-relative" style="bottom: 16rem;">
                                <a class="text" href="profile/<?=$profile['owner']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </a>
                                <button class="btn" type="submit" style="color: #fff; background: green; padding: 3px; border-radius: 1rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        
                        
                        <div class="list-group list-group-checkable d-grid border-0 gap-4">
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Bio</span>
                                    <span class="d-block small opacity-50"><?=$profile['bio']?></span>
                                </div>
                                <div class="pro-ico active" id="bioRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="bioDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/bio'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Username</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['username']?></span>
                                </div>
                                <div class="pro-ico active" id="userRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="userDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/user'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Email</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['email']?></span>
                                </div>
                                <div class="pro-ico active" id="emailRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="emailDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/email'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Phone Number</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['phone']?></span>
                                </div>
                                <div class="pro-ico active" id="numRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="numDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/phone'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Gender</span>
                                    <span class="d-block small opacity-50"><?=$profile['gender']?></span>
                                </div>
                                <div class="pro-ico active" id="genRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="genDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/gender'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Birthday</span>
                                    <span class="d-block small opacity-50"><?=$profile['dob']?></span>
                                </div>
                                <div class="pro-ico active" id="dobRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="dobDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/dob'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Link</span>
                                    <span class="d-block small opacity-50"><?=$profile['link']?></span>
                                </div>
                                <div class="pro-ico active" id="linkRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="linkDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/link'); ?>

                            
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Change Password</span>
                                    <span class="d-block small opacity-50">**********</span>
                                </div>
                                <div class="pro-ico active" id="passRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="passDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/pass'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php break; } break; } ?>







<!-- <div class="tab-pane fade h-100 active show" id="tab-content-settings" role="tabpanel">
                        <div class="d-flex flex-column h-100">
                            <div class="hide-scrollbar">
                                <div class="container py-8">

                                    <!- Title ->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Settings</h2>
                                    </div>

                                    <!- Search ->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                            </div>
                                        </form>
                                    </div>

                                    <!- Profile ->
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <img src="assets/img/avatars/1.jpg" alt="#" class="avatar-img">

                                                        <div class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                        </div>
                                                        <input id="upload-profile-photo" class="d-none" type="file">
                                                        <label class="stretched-label mb-0" for="upload-profile-photo"></label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5>William Pearson</h5>
                                                    <p>wright@studio.com</p>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="text-muted">
                                                        <div class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!- Profile ->

                                    <!- Account ->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center mb-4 px-6">
                                            <small class="text-muted me-auto">Account</small>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <!- Accordion ->
                                                <div class="accordion accordion-flush" id="accordion-profile">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-profile-1">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-1" aria-expanded="false" aria-controls="accordion-profile-body-1">
                                                                <div>
                                                                    <h5>Profile settings</h5>
                                                                    <p>Change your profile settings</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-profile-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-profile-1" data-parent="#accordion-profile">
                                                            <div class="accordion-body">
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-name" placeholder="Name">
                                                                    <label for="profile-name">Name</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="email" class="form-control" id="profile-email" placeholder="Email address">
                                                                    <label for="profile-email">Email</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-phone" placeholder="Phone">
                                                                    <label for="profile-phone">Phone</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <textarea class="form-control" placeholder="Bio" id="profile-bio" data-autosize="true" style="min-height: 120px; overflow: hidden; overflow-wrap: break-word; resize: none;"></textarea>
                                                                    <label for="profile-bio">Bio</label>
                                                                </div>

                                                                <button type="button" class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-profile-2">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-2" aria-expanded="false" aria-controls="accordion-profile-body-2">
                                                                <div>
                                                                    <h5>Connected accounts</h5>
                                                                    <p>Connect with your accounts</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-profile-body-2" class="accordion-collapse collapse" aria-labelledby="accordion-profile-2" data-parent="#accordion-profile">
                                                            <div class="accordion-body">
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-twitter" placeholder="Twitter">
                                                                    <label for="profile-twitter">Twitter</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-facebook" placeholder="Facebook">
                                                                    <label for="profile-facebook">Facebook</label>
                                                                </div>

                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-instagram" placeholder="Instagram">
                                                                    <label for="profile-instagram">Instagram</label>
                                                                </div>

                                                                <button type="button" class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!- Switch ->
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Appearance</h5>
                                                                    <p>Choose light or dark theme</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a class="switcher-btn text-reset" href="#!" title="Themes">
                                                                        <div class="switcher-icon switcher-icon-dark icon icon-lg" data-theme-mode="dark">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                                                        </div>
                                                                        <div class="switcher-icon switcher-icon-light icon icon-lg d-none" data-theme-mode="light">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Account -->

                                    <!-- Security -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center my-4 px-6">
                                            <small class="text-muted me-auto">Security</small>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <!-- Accordion -->
                                                <div class="accordion accordion-flush" id="accordion-security">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-security-1">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1">
                                                                <div>
                                                                    <h5>Password</h5>
                                                                    <p>Change your password</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security">
                                                            <div class="accordion-body">
                                                                <form action="#" autocomplete="on">
                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control" id="profile-current-password" placeholder="Current Password" autocomplete="">
                                                                        <label for="profile-current-password">Current Password</label>
                                                                    </div>

                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control" id="profile-new-password" placeholder="New password" autocomplete="">
                                                                        <label for="profile-new-password">New password</label>
                                                                    </div>

                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control" id="profile-verify-password" placeholder="Verify Password" autocomplete="">
                                                                        <label for="profile-verify-password">Verify Password</label>
                                                                    </div>
                                                                </form>
                                                                <button type="button" class="btn btn-block btn-lg btn-primary w-100">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Switch -->
                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Two-step verifications</h5>
                                                                    <p>Enable two-step verifications</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="accordion-security-check-1">
                                                                        <label class="form-check-label" for="accordion-security-check-1"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Security -->

                                    <!-- Storage -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center my-4 px-6">
                                            <small class="text-muted me-auto">Storage</small>

                                            <div class="flex align-items-center text-muted">
                                                <a href="#" class="text-muted small">Clear storage</a>

                                                <div class="icon icon-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <!-- Accordion -->
                                                <div class="accordion accordion-flush" id="accordion-storage">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-storage-1">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-storage-body-1" aria-expanded="false" aria-controls="accordion-storage-body-1">
                                                                <div>
                                                                    <h5>Cache</h5>
                                                                    <p>Maximum cache size</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-storage-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-storage-1" data-parent="#accordion-storage">
                                                            <div class="accordion-body">
                                                                <div class="row justify-content-between mb-4">
                                                                    <div class="col-auto">
                                                                        <small>2 GB</small>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <small>4 GB</small>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <small>6 GB</small>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <small>8 GB</small>
                                                                    </div>
                                                                </div>
                                                                <input type="range" class="form-range" min="1" max="4" step="1" id="custom-range-1">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Keep media</h5>
                                                                    <p>Photos, videos and other files</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="accordion-storage-check-1">
                                                                        <label class="form-check-label" for="accordion-storage-check-1"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Storage -->

                                    <!-- Notifications -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center my-4 px-6">
                                            <small class="text-muted me-auto">Notifications</small>
                                        </div>

                                        <!-- Accordion -->
                                        <div class="card border-0">
                                            <div class="card-body py-2">
                                                <div class="accordion accordion-flush" id="accordion-notifications">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-notifications-1">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-notifications-body-1" aria-expanded="false" aria-controls="accordion-notifications-body-1">
                                                                <div>
                                                                    <h5>Message</h5>
                                                                    <p>Set custom notifications for users</p>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div id="accordion-notifications-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-notifications-1" data-parent="#accordion-notifications">
                                                            <div class="accordion-body">
                                                                <div class="row align-items-center">
                                                                    <div class="col">
                                                                        <h5>Text</h5>
                                                                        <p>Show text in notifications</p>
                                                                    </div>

                                                                    <div class="col-auto">
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" id="accordion-notifications-check-1">
                                                                            <label class="form-check-label" for="accordion-notifications-check-1"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Sound</h5>
                                                                    <p>Enable sound notifications</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="accordion-notifications-check-3">
                                                                        <label class="form-check-label" for="accordion-notifications-check-3"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header">
                                                            <div class="row align-items-center">
                                                                <div class="col">
                                                                    <h5>Browser notifications</h5>
                                                                    <p>Enable browser notifications</p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="accordion-notifications-check-2" checked="">
                                                                        <label class="form-check-label" for="accordion-notifications-check-2"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Notifications -->

                                    <!-- Devices -->
                                    <div class="mt-8">
                                        <div class="d-flex align-items-center my-4 px-6">
                                            <small class="text-muted me-auto">Devices</small>

                                            <div class="flex align-items-center text-muted">
                                                <a href="#" class="text-muted small">End all sessions</a>

                                                <div class="icon icon-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-0">
                                            <div class="card-body py-3">

                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Windows ⋅ USA, Houston</h5>
                                                                <p>Today at 2:48 pm ⋅ Browser: Chrome</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <span class="text-primary extra-small">active</span>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="list-group-item">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>iPhone ⋅ USA, Houston</h5>
                                                                <p>Yesterday at 2:48 pm ⋅ Browser: Chrome</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- Devices -->

                                </div>
                            </div>
                        </div>
                    </div> -->