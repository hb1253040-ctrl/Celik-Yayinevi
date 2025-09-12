<footer id="footer" class="footer-texts-more-lighten">
				<div class="container">
					<div class="row py-4 my-5">
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-4 text-color-light mb-3">İletişim Bilgileri</h5>
							<ul class="list list-unstyled">
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">Adress</span> 
									<?php echo $contact->address; ?>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">Telefon Numarası</span>
									<a href="tel:+1234567890"><?php echo $contact->phone ?></a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">E-mail</span>
									<a href="mailto:mail@example.com"><?php echo $contact->email; ?></a>
								</li>
								<li class="pb-1 mb-2">
									<span class="d-block font-weight-normal line-height-1 text-color-light">Çalışma Saatleri </span>
									Pazartesi - Cuma / 09:00 - 17:00
								</li>
							</ul>
							<ul class="social-icons social-icons-clean-with-border social-icons-medium">
								<li class="social-icons-instagram">
									<a href="<?php echo $socialmedia->instagram; ?>" class="no-footer-css" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
								</li>
								<li class="social-icons-twitter mx-2">
									<a href="<?php echo $socialmedia->twitter; ?>" class="no-footer-css" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
								</li>
								<li class="social-icons-facebook">
									<a href="<?php echo $socialmedia->facebook; ?>" class="no-footer-css" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-2 mb-5 mb-lg-0">
							<h5 class="text-4 text-color-light mb-3">Sayfa Linkleri</h5>
							<ul class="list list-unstyled mb-0">
								<li class="mb-0"><a href="<?php echo _link(''); ?>">Anasayfa</a></li>
								<li class="mb-0"><a href="<?php echo _link('index_author'); ?>">Yazar</a></li>
								<li class="mb-0"><a href="<?php echo _link('translator_index'); ?>">Mütercimler</a></li>
								<li class="mb-0"><a href="<?php echo _link('editor_index'); ?>">Düzenleyenler</a></li>
								<li class="mb-0"><a href="<?php echo _link('book_index'); ?>">Kitaplar</a></li>
								<li class="mb-0"><a href="<?php echo _link('editor_notes'); ?>">Editör Notları</a></li>
								<li class="mb-0"><a href="<?php echo _link('communication'); ?>">Bize Ulaşın</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-4 mb-5 mb-md-0">
							<h5 class="text-4 text-color-light mb-3">Hakkımızda</h5>
							<article class="mb-3">
								<span class="line-height-2 mb-0">
									Çelik Yayınevi 1972 yılında yayın hayatına başlamış Türkiye’nin köklü kuruluşlarındandır. 
									Hadis, tasavvuf gibi İslam'ın temel kaynakları başta olmak üzere, belgesel tarihi roman , biyografiler gibi kurgu ve kurgu dışı alanlarda 500’ün üzerinde eser yayınlamıştır.
								</span>
							</article>
						</div>
						<div class="col-md-6 col-lg-3">
							<h5 class="text-4 text-color-light mb-3">Çalışma Saatleri</h5>
							<ul class="list list-icons list-dark mt-2">
								<li><i class="far fa-clock top-6"></i> Pazartesi - Cuma - 09:00 - 17:00</li>
								<li><i class="far fa-clock top-6"></i> Haftasonu - 09:00 - 14:00</li>
								<li><i class="far fa-clock top-6"></i> Pazar - Kapalı</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="footer-copyright footer-copyright-style-2 pt-4 pb-5">
						<div class="row">
							<div class="col-12 text-center">
								<p class="mb-0">Porto Template © 2024. All Rights Reserved</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="<?php echo assets('vendor/plugins/js/plugins.min.js'); ?>"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo assets('js/theme.js'); ?>"></script>

		<!-- Circle Flip Slideshow Script -->
		<script src="<?php echo assets('vendor/circle-flip-slideshow/js/jquery.flipshow.min.js'); ?>"></script>
		<!-- Current Page Views -->
		<script src="<?php echo assets('js/views/view.home.js'); ?>"></script>

		<!-- Theme Custom -->
		<script src="<?php echo assets('js/custom.js'); ?>"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo assets('js/theme.init.js'); ?>"></script>

		<script id="google-recaptcha-v3" src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- https://www.latlong.net/
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			function initializeGoogleMaps() {
				// Map Markers
				var mapMarkers = [{
					address: "New York, NY 10017",
					html: "<strong>New York Office</strong><br>New York, NY 10017",
					icon: {
						image: "img/pin.png",
						iconsize: [26, 46],
						iconanchor: [12, 46]
					},
					popup: true
				}];

				// Map Initial Location
				var initLatitude = 40.75198;
				var initLongitude = -73.96978;

				// Map Extended Settings
				var mapSettings = {
					controls: {
						draggable: (($.browser.mobile) ? false : true),
						panControl: true,
						zoomControl: true,
						mapTypeControl: true,
						scaleControl: true,
						streetViewControl: true,
						overviewMapControl: true
					},
					scrollwheel: false,
					markers: mapMarkers,
					latitude: initLatitude,
					longitude: initLongitude,
					zoom: 16
				};

				setTimeout(function(){

					var map = $('#googlemaps').gMap(mapSettings),
						mapRef = $('#googlemaps').data('gMap.reference');

					// Styles from https://snazzymaps.com/
					var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

					var styledMap = new google.maps.StyledMapType(styles, {
						name: 'Styled Map'
					});

					mapRef.mapTypes.set('map_style', styledMap);
					mapRef.setMapTypeId('map_style');

				}, 800);
			}

			// Initialize Google Maps when element enter on browser view
			theme.fn.intObs( '.google-map', 'initializeGoogleMaps()', {} );

			// Map Center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$('#googlemaps').gMap("centerAt", options);
			}

		</script>

	</body>
</html>