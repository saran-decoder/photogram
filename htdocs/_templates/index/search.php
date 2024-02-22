        <!-- Right Side Navbar Started -->
        <div class="d-none flex-column p-3 bg-body-tertiary right">
            <div class="d-flex align-items-center justify-content-between">
                <div class="search-back d-block me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 8l-4 4l4 4m-4-4h20"/>
                    </svg>
                </div>
                <div class="search rounded-5 p-2 pe-3">
                    <div class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="7"/>
                                <path stroke-linecap="round" d="M11 8a3 3 0 0 0-3 3m12 9l-3-3"/>
                            </g>
                        </svg>
                    </div>
                    <input id="search" type="text" name="search" class="search-txt" placeholder="Search...">
                </div>
                <div class="upload-btn d-none p-3">
                    <label class="upload-area">
                        <input type="file" accept="image/*" name="post_image" class="custom-file-input file pe-2" id="post_image" multiple required hidden>
                        <span class="upload-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                            </svg>
                        </span>
                    </label>
                </div>
            </div>


            <b class="my-3 side-head">Users</b>
            <ul class="flex-column rounded-3 mb-auto overflow-scroll p-0 d-block">
                <div class="no-results-message d-none">No results found</div>
                <?php
                    $profiles = Profile::getAllUser();
                    foreach ($profiles as $p) {
                ?>
                <li class="nav-item d-flex align-items-center mb-3 list-item" id="pro-<?=$p['id']?>" style="display: none;">
                    <div class="w-auto">
                        <a href="profile<?=get_config('base_path');?><?=$profile['owner']?>">
                            <img class="rounded-5" src="<?=$p['avatar']?>" width="40" alt="User profile">
                        </a>
                    </div>
                    <div class="w-auto ms-2">
                        <p class="m-0 user-name"><a href="profile<?=get_config('base_path');?><?=$profile['owner']?>" class="text">saran</a></p>
                        <p class="text m-0 user-bio"><?=$p['bio']?></p>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Right Side Navbar Ended -->