<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
     <div class="row">
          <div class="col">
               <!--Section: Contact v.2-->
               <section class="mb-4">

                    <!--Section heading-->
                    <h2 class="h1-responsive font-weight-bold text-center my-4">Kontak Kami</h2>
                    <!--Section description-->
                    <p class="text-center w-responsive mx-auto mb-5"></p>

                    <div class="row">

                         <!--Grid column-->
                         <div class="col-md-9 mb-md-0 mb-5">
                              <form id="contact-form" aria-placeholder="contact-form" action="mail.php" method="POST">

                                   <!--Grid row-->
                                   <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                             <div class="md-form mb-0">
                                                  <input type="text" id="name" name="name" class="form-control" placeholder="Dicky Ikbal Pratama" autofocus>
                                                  <label for="name" class="">Nama Lengkap</label>
                                             </div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                             <div class="md-form mb-0">
                                                  <input type="text" id="email" name="email" class="form-control" placeholder="User@gmail.com">
                                                  <label for="email" class="">Gmail</label>
                                             </div>
                                        </div>
                                        <!--Grid column-->

                                   </div>
                                   <!--Grid row-->

                                   <!--Grid row-->
                                   <div class="row">
                                        <div class="col-md-12">
                                             <div class="md-form mb-0">
                                                  <input type="text" id="subject" name="subject" class="form-control" placeholder="masukkan subject">
                                                  <label for="subject" class="">Subject</label>
                                             </div>
                                        </div>
                                   </div>
                                   <!--Grid row-->

                                   <!--Grid row-->
                                   <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                             <div class="md-form">
                                                  <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="masukkan pesan.."></textarea>
                                                  <label for="message">Pesan anda </label>
                                             </div>

                                        </div>
                                   </div>
                                   <!--Grid row-->

                              </form>

                              <div class="text-center text-md-left">
                                   <a class="btn btn-info" onclick="document.getElementById('contact-form').submit();">Send</a>
                              </div>
                              <br></br>
                              <h2>Alamat Kami</h2>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15942.390635739519!2d121.06098572626833!3d-2.6356614192750247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d90578d167287f7%3A0x6c451fb0e61af6d5!2sBalantang%2C%20Malili%2C%20Luwu%20Timur%2C%20Luwu%20Timur%2C%20Sulawesi%20Selatan!5e0!3m2!1sms!2sid!4v1608101919282!5m2!1sms!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                              <div class="status"></div>
                         </div>
                         <!--Grid column-->

                         <!--Grid column-->
                         <div class="col-md-3 text-center">
                              <ul class="list-unstyled mb-0">
                                   <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                        <p>Luwu Timur, Malili, Sulawesi Selatan</p>
                                   </li>

                                   <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                        <p>(+62)08524038592</p>
                                   </li>

                                   <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                        <p>dickykyky126@gmail.com</p>
                                   </li>
                              </ul>
                         </div>
                         <!--Grid column-->

                    </div>

               </section>
               <!--Section: Contact v.2-->
          </div>
     </div>
</div>
<?= $this->endSection(); ?>