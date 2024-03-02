<?php Session::loadTemplate('_header'); ?>

<style>
    nav.navbar.w-100.h-100.p-2.position-fixed.rs-navbar.sidebar {
        display: none;
    }
</style>


<div class="container list p-0">
	<div class="search-layout w-100 position-absolute z-1">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <div class="overflow-hidden">
                    <div class="px-2 py-4 pe-4">

                        <form autocomplete="off" class="d-flex align-items-center w-100">
                            <a href="/" class="text me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </a>
                            <div class="text w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search position-absolute" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                <input id="search" type="text" name="search" class="search-input w-100" placeholder="Search...">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="users-profile">
        <?php
			$profiles = Profile::getAllUser();
			foreach ($profiles as $p) {
		?>
        <div class="row p-1 list-item" id="pro-<?=$p['id']?>" style="display: none;">
            <div class="card p-2 border-0">
                <div class="row d-flex flex-row align-items-center">
                    <div class="w-auto">
                        <a href="<?=get_config('base_path');?>profile<?=get_config('base_path');?><?=$p['owner']?>">
                            <img class="rounded-5" src="<?=$p['avatar']?>" width="50" alt="Company" />
                        </a>
                    </div>
                    <div class="w-auto">
                        <p class="m-0 user-name"><a href="<?=get_config('base_path');?>profile<?=get_config('base_path');?><?=$p['owner']?>" class="text"><?=$p['owner']?></a></p>
                        <p class="text m-0 user-bio"><?=$p['bio']?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>