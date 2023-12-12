                                    <?php
                                        use Carbon\Carbon;
                                        $profile = Profile::getuserProfile();
                                        $A_profile = Profile::getAuth();
                                        $devices = Profile::getDeviceInfo();
                                        $das = Profile::getInfo();
                                        
                                        $uploaded_time = Carbon::parse($devices['login_time']);
                                        $uploaded_time_str = $uploaded_time->Format('D, j M Y, g:i A');

                                        $accound_create = Carbon::parse($profile['uploaded_time']);
                                        $created_at = $accound_create->Format('D, j M Y, g:i A');

                                        if (Session::isOwnerOf($profile['owner'])) {
                                    ?>

                                    <div class="tab-pane fade h-100 active show" id="tab-content-settings" role="tabpanel">
                                        <div class="d-flex flex-column h-100">
                                            <div class="hide-scrollbar">

                                                <!-- Profile -->
                                                <div class="card border-0">
                                                    <div class="card-body rounded-3">
                                                        <div class="">
                                                            <?php
                                                                if (isset($_FILES['update_image']))
                                                                {
                                                                    $avatar = $_FILES['update_image']['tmp_name'];
                                                                    Profile::profile($avatar);
                                                                }
                                                            ?>
                                                            <!-- image update form data -->
                                                            <form class="d-flex align-items-center overflow-auto" method="post" action="" autocomplete="off" enctype="multipart/form-data">
                                                                <div class="col-auto pe-3">
                                                                    <div class="avatar">
                                                                        <img src="<?=$profile['avatar']?>" alt="..." class="avatar-img view_image">

                                                                        <div class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                                        </div>
                                                                        <input id="upload-profile-photo" class="d-none file-input" type="file" accept="image/*" name="update_image">
                                                                        <label class="stretched-label mb-0" for="upload-profile-photo"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="col px-0">
                                                                    <h6 class="text-profile-style mb-1"><?=$profile['owner']?></h6>
                                                                    <p class="d-block small opacity-50 m-0"><?=$created_at?></p>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <a href="#" class="text-muted">
                                                                        <div class="icon">
                                                                            <button class="btn change-avatar d-none" type="submit" style="color: #fff; background: green; padding: 3px; border-radius: 1rem; height: 2rem; width: 2rem;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
                                                                                </svg>
                                                                            </button>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Profile -->

                                                <!-- Account -->
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <small class="text-muted me-auto">Account</small>
                                                    </div>

                                                    <div class="card border-0">
                                                        <div class="card-body rounded-3 py-1">
                                                            <!-- Accordion -->
                                                            <div class="accordion accordion-flush" id="accordion-profile">
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header" id="accordion-profile-1">
                                                                        <a href="#" class="text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-1" aria-expanded="false" aria-controls="accordion-profile-body-1">
                                                                            <div>
                                                                                <h6 class="text-profile-style mb-1">Profile settings</h6>
                                                                                <p class="d-block small opacity-50 m-0">Change your profile settings</p>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div id="accordion-profile-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-profile-1" data-parent="#accordion-profile">
                                                                        <div class="accordion-body p-0">
                                                                            <?php
                                                                                if (isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['bio'])) {
                                                                                    $user = $_POST['username'];
                                                                                    $email = $_POST['email'];
                                                                                    $phone = $_POST['phone'];
                                                                                    $bio = $_POST['bio'];
                                                                                    Profile::profileinfo($user, $email, $phone, $bio);
                                                                                }
                                                                            ?>
                                                                            <form method="post" action="" autocomplete="off" id="Profile-Form1" novalidate>
                                                                                <div class="form-floating mb-3">
                                                                                    <input type="text" class="form-control" id="profile-name" name="username" value="<?=$A_profile['username']?>" required>
                                                                                    <label for="profile-name">Username</label>
                                                                                </div>

                                                                                <div class="form-floating mb-3">
                                                                                    <input type="email" class="form-control" id="profile-email" name="email" value="<?=$A_profile['email']?>" required>
                                                                                    <label for="profile-email">Email address</label>
                                                                                </div>

                                                                                <div class="form-floating mb-3">
                                                                                    <input type="number" class="form-control" id="profile-phone" name="phone" value="<?=$A_profile['phone']?>" required>
                                                                                    <label for="profile-phone">Phone</label>
                                                                                </div>

                                                                                <div class="form-floating mb-3">
                                                                                    <textarea class="form-control" placeholder="<?=$profile['bio']?>" name="bio" id="profile-bio" data-autosize="true" style="min-height: 120px; overflow: hidden; overflow-wrap: break-word; resize: none;" required><?=$profile['bio']?></textarea>
                                                                                    <label for="profile-bio">Bio</label>
                                                                                </div>

                                                                                <button type="submit" class="btn btn-block btn-lg btn-primary w-100 mb-3">Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-header" id="accordion-profile-2">
                                                                        <a href="#" class="text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-2" aria-expanded="false" aria-controls="accordion-profile-body-2">
                                                                            <div>
                                                                                <h6 class="text-profile-style mb-1">Other settings</h6>
                                                                                <p class="d-block small opacity-50 m-0">Change your Gender & DoB</p>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div id="accordion-profile-body-2" class="accordion-collapse collapse" aria-labelledby="accordion-profile-2" data-parent="#accordion-profile">
                                                                        <div class="accordion-body p-0">
                                                                            <?php
                                                                                if (isset($_POST['gen'])) {
                                                                                    $gender = $_POST['gender'];
                                                                                    Profile::gender($gender);
                                                                                }
                                                                            ?>
                                                                            <div class="col-md-12 active">
                                                                                <form class="row flex-column" method="post" action="" autocomplete="off">
                                                                                    <div class="form-row flex-center">
                                                                                        <input type="radio" name="gender" id="Male" value="Male" class="form-inputs" required>
                                                                                        <label for="Male" class="form-label m-0">Male</label>
                                                                                    </div>
                                                                                    <div class="form-row flex-center">
                                                                                        <input type="radio" name="gender" id="Female" value="Female" class="form-inputs" required>
                                                                                        <label for="Female" class="form-label m-0">Female</label>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-end position-absolute" style="right: 0; top: 18%;">
                                                                                        <button class="btn btn-block btn-lg btn-primary p-2" type="submit" name="gen">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>

                                                                            <?php
                                                                                if (isset($_POST['day'])) {
                                                                                    $dob = $_POST['dob'];
                                                                                    Profile::dob($dob);
                                                                                }
                                                                            ?>
                                                                            <div class="col-md-12 active my-3">
                                                                                <form class="row" method="post" action="" autocomplete="off">
                                                                                    <div class="form-dob">
                                                                                        <input type="date" class="dob" name="dob" style="border: none;" placeholder="mm-dd-yyyy" value="<?=$profile['dob']?>" required>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-end position-absolute" style="right: 0; top: 18%;">
                                                                                        <button class="btn btn-block btn-lg btn-primary p-2" type="submit" name="day">Save</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="accordion-item">
                                                                    <div class="accordion-header" id="accordion-profile-3">
                                                                        <a href="#" class="text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-3" aria-expanded="false" aria-controls="accordion-profile-body-3">
                                                                            <div>
                                                                                <h6 class="text-profile-style mb-1">Connected accounts</h6>
                                                                                <p class="d-block small opacity-50 m-0">Connect with you're social media</p>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div id="accordion-profile-body-3" class="accordion-collapse collapse" aria-labelledby="accordion-profile-3" data-parent="#accordion-profile">
                                                                        <div class="accordion-body p-0">
                                                                            <?php
                                                                                if (isset($_POST['link'])) {
                                                                                    $link = $_POST['link'];
                                                                                    Profile::link($link);
                                                                                }
                                                                            ?>
                                                                            <form method="post" action="" autocomplete="off">
                                                                                <div class="form-floating mb-3">
                                                                                    <input type="text" class="form-control" id="profile-twitter" name="link" value="<?=$profile['link']?>" required>
                                                                                    <label for="profile-website">Website</label>
                                                                                </div>

                                                                                <button type="submit" class="btn btn-block btn-lg btn-primary w-100 mb-3">Save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Account -->

                                                <!-- Security -->
                                                <div class="mt-3">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <small class="text-muted me-auto">Security</small>
                                                    </div>

                                                    <div class="card border-0">
                                                        <div class="card-body rounded-3 py-1">
                                                            <!-- Accordion -->
                                                            <div class="accordion accordion-flush" id="accordion-security">
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header" id="accordion-security-1">
                                                                        <a href="#" class="text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1">
                                                                            <div>
                                                                                <h6 class="text-profile-style mb-1">Password</h6>
                                                                                <p class="d-block small opacity-50 m-0">Change your're password</p>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security">
                                                                        <div class="accordion-body p-0">
                                                                            <?php
                                                                                if (isset($_POST['current_password']) and isset($_POST['password'])) {
                                                                                    $current_password = $_POST['current_password'];
                                                                                    $password = $_POST['password'];
                                                                                    Profile::newPassword($current_password, $password);
                                                                                }
                                                                            ?>
                                                                            <form method="post" action="" autocomplete="off" id="Profile-Form2" novalidate>
                                                                                <div class="form-floating mb-3">
                                                                                    <input type="password" class="form-control" name="current_password" id="profile-current-password" placeholder="Current Password" required>
                                                                                    <label for="profile-current-password">Current Password</label>
                                                                                </div>

                                                                                <div class="form-floating mb-3">
                                                                                    <input type="password" class="form-control" name="password" id="profile-new-password" placeholder="New password" required>
                                                                                    <label for="profile-new-password">New password</label>
                                                                                </div>

                                                                                <!-- <div class="form-floating mb-3">
                                                                                    <input type="password" class="form-control" id="profile-verify-password" placeholder="Verify Password" autocomplete="">
                                                                                    <label for="profile-verify-password">Verify Password</label>
                                                                                </div> -->
                                                                                <button type="submit" class="btn btn-block btn-lg btn-primary w-100 mb-3">Update</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Switch -->
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">
                                                                                <h6 class="text-profile-style mb-1">Two-step verifications</h6>
                                                                                <p class="d-block small opacity-50 m-0">Enable two-step verifications</p>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="form-check form-switch">
                                                                                    <div class="toggle-switch mb-1 d-flex align-items-center justify-content-center">
                                                                                        <input type="checkbox" class="switch form-check-input position-relative">
                                                                                    </div>
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

                                                <!-- Devices -->
                                                <div class="mt-3 device" data-id="<?=$das['token']?>">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <small class="text-muted me-auto">Devices</small>
                                                        <div class="text-muted">
                                                            <a type="button" class="small text-decoration-none text-primary" id="das">Clear All Sessions</a>
                                                        </div>
                                                    </div>

                                                    <div class="card border-0">
                                                        <div class="card-body rounded-3 p-2">
                                                            <ul class="list-group list-group-flush rounded-3">
                                                                <?php
                                                                    foreach ($devices as $device) {
                                                                        $uploaded_time = Carbon::parse($device['login_time']);
                                                                        $userAgent = $device['user_agent'];
                                                                        $info = Profile::extractDeviceInfo($userAgent);
                                                                ?>
                                                                <li class="list-group-item p-3">
                                                                    <div class="row align-items-center">
                                                                        <div class="col">
                                                                            <h6 class="text-profile-style mb-1"><?=$info['device']?> • <?=$device['ip']?></h6>
                                                                            <p class="d-block small opacity-50 m-0"><?=$uploaded_time->format('D, j M, g:i A')?> • Browser: <?=$info['browser']?></p>
                                                                        </div>
                                                                        <?php
                                                                            if ($device['active'] == 1) {
                                                                        ?>
                                                                        <div class="col-auto">
                                                                            <span class="text-success extra-small">active</span>
                                                                        </div>
                                                                        <?php
                                                                            } else {
                                                                        ?>
                                                                        <div class="col-auto">
                                                                            <span class="text-danger extra-small">inactive</span>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </li>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Devices -->

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>