<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installation de MEGA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
    <div class="row py-5 mt-5">
        <div class="col-md-8 offset-md-2">
            <?php if(isset($errors) && count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                        <ul>
                            <li><?= $error; ?></li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <h4>Informations du site</h4>
                <p>Toutes les informations liées au site</p>
                <hr>
                <div class="form-group">
                    <label for="app_url">URL du site  *</label>
                    <input required="required" class="form-control" type="text" name="app_url"
                           id="app_url" autocomplete="false"
                           value="<?= (isset($_POST['app_url']))?$_POST['app_url']:'http://'.$_SERVER['HTTP_HOST']; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="app_name">Nom du site ou de l'application *</label>
                    <input required="required" class="form-control" type="text" name="app_name"
                           id="app_name" autocomplete="false"
                           value="<?= (isset($_POST['app_name']))?$_POST['app_name']:'MEGATECH'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="app_slogan">Un slogan *</label>
                    <input required="required" class="form-control" type="text" name="app_slogan" id="app_slogan"
                           autocomplete="false"
                           value="<?= (isset($_POST['app_slogan']))?$_POST['app_slogan']:'Faire du Web votre allié'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="app_description">Une description du site ou de l'application</label>
                    <input class="form-control" type="text" name="app_description"
                           id="app_description" autocomplete="false"
                        <?= (isset($_POST['app_description']))?$_POST['app_description']:'Une agence Web global qui aide les entreprises à renforcer leur pouvoir et accroître leur performance'; ?>
                    >
                </div>

                <h4 class="mt-5">Informations de l'entreprise</h4>
                <p>Les informations du client ou de l'entreprise propriétaire de l'application</p>
                <hr>
                <div class="form-group">
                    <label for="company_name">Nom de l'entreprise *</label>
                    <input required="required" class="form-control" type="text" name="company_name" id="company_name"
                           autocomplete="false"
                        value="<?= (isset($_POST['company_name']))?$_POST['company_name']:'MEGATECH'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_email">Email de l'entreprise *</label>
                    <input required="required" class="form-control" type="text" name="company_email" id="company_email"
                           autocomplete="false"
                        value="<?= (isset($_POST['company_email']))?$_POST['company_email']:'hello@megatech-web.bj'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_first_phone">Numéro de téléphone principal de l'entreprise *</label>
                    <input required="required" class="form-control" type="text" name="company_first_phone"
                           id="company_first_phone" autocomplete="false"
                        value="<?= (isset($_POST['company_first_phone']))?$_POST['company_first_phone']:'+229 60 63 63 16'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_second_phone">Numéro de téléphone secondaire de l'entreprise</label>
                    <input class="form-control" type="text" name="company_second_phone"
                           id="company_second_phone" autocomplete="false"
                        value="<?= (isset($_POST['company_second_phone']))?$_POST['company_second_phone']:'+229 68 50 38 50'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_whatsapp">Numéro WhatsApp de l'entreprise *</label>
                    <input required="required" class="form-control" type="text" name="company_whatsapp"
                           id="company_whatsapp" autocomplete="false"
                        value="<?= (isset($_POST['company_whatsapp']))?$_POST['company_whatsapp']:'+229 60 63 63 16'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_address">Adresse de l'entreprise *</label>
                    <input required="required" class="form-control" type="text" name="company_address" id="company_address"
                           autocomplete="false"
                        value="<?= (isset($_POST['company_address']))?$_POST['company_address']:'Vèdoko rue funaï, Cotonou, Bénin'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="company_bp">Boite postale de l'entreprise</label>
                    <input class="form-control" type="text" name="company_bp" id="company_bp"
                           autocomplete="false"
                        value="<?= (isset($_POST['company_bp']))?$_POST['company_bp']:''; ?>"
                    >
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="site_config" value="Envoyer">
                </div>
            </form>


        </div>
    </div>
</div>



</body>
</html>