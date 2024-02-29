<!doctype html>
<html lang="en">

	<?php Session::loadTemplate('_head'); ?>

	<body>
	
		<?php
			if (Session::$isError) {
				Session::loadTemplate('_error');
			} else {
				Session::loadTemplate(Session::currentScript());
			}
		?>

		<!-- This is plays cloneing this temp dialogs -->
		<div id="modalsGarbage">
			<div class="modal fade animate__animated" id="dummy-dialog-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true" style="padding-right: 0px;">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content blur">
						<div class="modal-header">
							<h4 class="modal-title text"></h4>
						</div>
						<div class="modal-body text">
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>


	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/jquery-3.6.3.min.js"></script>

	<script src="/js/app.min.js"></script>
	<script src="/js/post-crop.js"></script>
	<script src="/js/profile-crop.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
	
	<script>
		// Initialize the agent at application startup.
		const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
			.then(FingerprintJS => FingerprintJS.load())

		// Get the visitor identifier when you need it.
		fpPromise
			.then(fp => fp.get())
			.then(result => {
				// This is the visitor identifier:
				const visitorId = result.visitorId

				// set a cookie 
				setCookie('fingerprint', visitorId, 1);
			})
	</script>


	<!-- JS Links -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<!-- Mixitup -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.2.2/mixitup.min.js'></script>
	<!-- fancybox -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js'></script>
	<!-- Fancybox js -->
	<script>
		/*Downloaded from https://www.codeseek.co/ezra_siton/mixitup-fancybox3-JydYqm */
		// 1. querySelector
		var containerEl = document.querySelector(".portfolio-item");
		// 2. Passing the configuration object inline
		//https://www.kunkalabs.com/mixitup/docs/configuration-object/
		var mixer = mixitup(containerEl, {
		animation: {
			effects: "fade translateZ(-100px)",
			effectsIn: "fade translateY(-100%)",
			easing: "cubic-bezier(0.645, 0.045, 0.355, 1)"
		}
		});
		// fancybox insilaze & options //
		$("[data-fancybox]").fancybox({
		loop: true,
		hash: true,
		transitionEffect: "slide",
		/* zoom VS next////////////////////
		clickContent - i modify the deafult - now when you click on the image you go to the next image - i more like this approach than zoom on desktop (This idea was in the classic/first lightbox) */
		clickContent: function(current, event) {
			return current.type === "image" ? "next" : false;
		}
		});
	</script>

</html>