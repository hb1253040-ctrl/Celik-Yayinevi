<?php echo $data['header']; ?>

    <div role="main" class="main">
        <div class="container py-4">
            <div class="row mb-2">
                <div class="col">
                    <h2 class="font-weight-bold text-7 mt-2 mb-0">İletişim</h2>
                    <p class="mb-4">Detayları sormaktan çekinmeyin, sorularınızı saklamayın!</p>
                    <form class="contact-form-recaptcha-v3" action="php/contact-form-recaptcha-v3.php" method="POST">
                        <div class="contact-form-success alert alert-success d-none mt-4">
                            <strong>Başarılı!</strong> Mesajınız tarafımıza iletilmiştir.
                        </div>

                        <div class="contact-form-error alert alert-danger d-none mt-4">
                            <strong>Hata!</strong> Mesajınız gönderilirken bir hata oluştu.
                            <span class="mail-error-message text-1 d-block"></span>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">İsminiz</label>
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="form-label mb-1 text-2">Email Adresiniz</label>
                                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label mb-1 text-2">Konu</label>
                                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control text-3 h-auto py-2" name="subject" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label mb-1 text-2">Mesaj</label>
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control text-3 h-auto py-2" name="message" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <input type="submit" value="Gönder" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-4">

                    <div class="overflow-hidden mb-3">
                        <h4 class="pt-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200" data-plugin-options="{'accY': -200}"><strong>Hakkımızda</strong></h4>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="lead text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400" data-plugin-options="{'accY': -200}">Çelik Yayınevi 1972 yılında yayın hayatına başlamış Türkiye’nin köklü kuruluşlarındandır. Hadis, tasavvuf gibi İslam'ın temel kaynakları başta olmak üzere, belgesel tarihi roman , biyografiler gibi kurgu ve kurgu dışı alanlarda 500’ün üzerinde eser yayınlamıştır.</p>
                    </div>

                </div>
                <div class="col-lg-4 offset-lg-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800" data-plugin-options="{'accY': -200}">

                    <h4 class="pt-5">Our <strong>Office</strong></h4>
                    <ul class="list list-icons list-icons-style-3 mt-2">
                        <li><i class="fas fa-map-marker-alt top-6"></i> <strong>Adres:</strong><?php echo $contact->address; ?></li>
                        <li><i class="fas fa-phone top-6"></i> <strong>Telefon Numarımız:</strong><?php echo $contact->phone; ?></li>
                        <li><i class="fas fa-envelope top-6"></i> <strong>Email:</strong> <a href="mailto:<?php echo $contact->email; ?>"><?php echo $contact->email; ?></a></li>
                    </ul>

                </div>
                <div class="col-lg-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1000" data-plugin-options="{'accY': -200}">

                    <h4 class="pt-5">Çalışma <strong>Saatlerimiz</strong></h4>
                    <ul class="list list-icons list-dark mt-2">
                        <li><i class="far fa-clock top-6"></i> Pazartesi - Cuma - 09:00 - 17:00</li>
                        <li><i class="far fa-clock top-6"></i> Haftasonu - 09:00 - 14:00</li>
                        <li><i class="far fa-clock top-6"></i> Pazar - Kapalı</li>
                    </ul>

                </div>
            </div>
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <div id="googlemaps" class="google-map m-0 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="height:450px;"></div>
	</div>

<?php echo $data['footer']; ?>