<div id="join-campagne" class="card-signature">
    <div class="container">
        <h2 class="title-signature-section">Rejoignez l'équipe de campagne</h2>
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
                        <input class="form-control" name="portable" type="tel" pattern="\d{10}|\+33\d{9}|\+33\s\d{1}\s\d{2}\s\d{2}\s\d{2}\s\d{2}|\d{2}\s\d{2}\s\d{2}\s\d{2}\s\d{2}" placeholder="Téléphone portable (facultatif)">
                    </div>
                    <div class="col-md-6">
                        <input class="form-control" name="postalcode" type="text" placeholder="Code postal" pattern="[0-9]{5}" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <label class="label-checkbox-signature"> <input  class="increase" type="checkbox" name="rgpd_field" required> J'accepte que mes informations soient traitées pour le soutien de la campagne régionale de la liste "On est là !", conformément à la <a href="">politique de conservation de données</a>.</label>
                </div>

                <div class="row">
                    <button type="submit" name="signature-send" class="btn btn-primary mt-3">
                        <span>Rejoignez-nous !</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<footer>
    <p class="text-center">Tous droits réservés - onestla.org</p>
</footer>

</body>
</html>
