<div id="join-campagne" class="card-signature">
    <div class="container">
        <?php if(is_front_page()): ?>
            <h2 class="title-signature-section">Signez l'appel</h2>
        <?php else: ?>
            <h2 class="title-signature-section">Participez à la campagne</h2>
        <?php endif; ?>
        <p class="number-signature">Nous sommes déjà <?= wp_count_posts('signataire')->publish + 1240; ?> à soutenir la liste</p>

        <div id="form-signature">
            <form action="<?php treatment_form_add_signature(); ?>" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="firstname" type="text" placeholder="Prénom" required>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="name" type="text" placeholder="Nom" required>
                    </div>
                </div>
                <div class="row">
                    <input class="form-control" name="email" type="email" placeholder="E-mail" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" name="portable" type="tel" pattern="\d{10}|\+33\d{9}|\+33\s\d{1}\s\d{2}\s\d{2}\s\d{2}\s\d{2}|\d{2}\s\d{2}\s\d{2}\s\d{2}\s\d{2}" placeholder="Téléphone portable (allez viens, on est bien)">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" name="postalcode" type="text" placeholder="Code postal" pattern="[0-9]{5}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <label class="label-checkbox-signature"> <input  class="increase" type="checkbox" name="activist_field"> Je veux participer activement à la campagne</label>
                </div>

                <div class="row mt-3">
                    <label class="label-checkbox-signature"> <input  class="increase" type="checkbox" name="rgpd_field" required> J'accepte que mes informations soient traitées pour le soutien de la campagne régionale de la liste "On est là !", conformément à la <a href="">politique de conservation de données</a>.</label>
                </div>

                <div class="row">
                    <button type="submit" name="signature-send" class="btn btn-primary mt-3">
                        <span>Signez l'appel</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<footer class="text-white">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div id="footer-logo"></div>
        </div>
        <div class="col-md-4 footer-padding">
            <nav class="navbar navbar-expand-lg">
                <?php              
                                wp_nav_menu([
                                    'theme_location' => 'footer',
                                    'container' => false,
                                    'menu_class' => 'navbar-nav text-center'
                                ])
                            ?>
            </nav>
        
        </div>
        <div class="col-md-4 footer-padding-rss">
            <section class="text-center">
                <!-- Facebook -->
                <a
                    class="btn btn-link btn-floating btn-lg text-white"
                    href="https://facebook.com/OnestlaNA"
                    target="_blank"
                    role="button"
                    data-mdb-ripple-color="white"
                    ><i class="bi bi-facebook"></i
                ></a>

                <!-- Twitter -->
                <a
                    class="btn btn-link btn-floating btn-lg text-white"
                    href="https://twitter.com/OnEstLa_Na"
                    target="_blank"
                    role="button"
                    data-mdb-ripple-color="white"
                    ><i class="bi bi-twitter"></i
                ></a>

                <!-- Instagram -->
                <a
                    class="btn btn-link btn-floating btn-lg text-white"
                    href="https://www.instagram.com/onestla_na/"
                    target="_blank"
                    role="button"
                    data-mdb-ripple-color="white"
                    ><i class="bi bi-instagram"></i
                ></a>
            </section>
        </div>
    </div>
  </div>

  <!-- Grid container -->
  <div class="container">
    <p class="text-center">Tous droits réservés - onestla.org</p>
  </div>

</footer>

</body>
</html>
