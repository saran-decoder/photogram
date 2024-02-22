<?php

if (Session::isAuthenticated()) {
    ?>
    <main class="d-flex flex-nowrap vh-100">
    <?php
        Session::loadTemplate('_header');
        Session::loadTemplate("index/photogram");
        Session::loadTemplate("index/search");
    ?>
        <div id="uploadimageModal" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text">Image Crop & Post</h5>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-9 w-100">
								<style>textarea#post_message::placeholder{ color: var(--timer-color); }</style>
								<textarea class="form-control input-sm px-2" type="textarea" name="post_text" id="post_message" placeholder="What's on Your Mind?" maxlength="200" rows="6"></textarea>
								<span class="help-block d-flex justify-content-end">
									<p id="characterLeft" class="help-block" style="margin-top: -2rem; margin-right: 1rem; color: var(--text-color);">You have reached the limit</p>
								</span>
							</div>
							<div class="col">
								<div id="image_demo"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a type="button" href="/" class="btn btn-outline-secondary text" data-dismiss="modal">Close</a>
						<button class="btn btn-outline-success text" id="share-memory">Crop & Post</button>
					</div>
				</div>
			</div>
		</div>
    </main>
    <?php
} else {
    Session::loadTemplate('signin/index');
}
?>