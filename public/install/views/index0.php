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
            <h4>Installation de MEGAFRAME - Base de données</h4>
            <p>Bienvenue sur MEGA, le framework de conception de site de site Internet et d'application Web de MEGATECH</p>
            <hr>
            <h4>Informations de la base données</h4>
            <p>Veuillez créer une base de données afin de recupérer les informations que vous allez insérer dans le formulaire ci-dessous.</p>
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
                <div class="form-group">
                    <label for="db_host">Nom du serveur de la base de données *</label>
                    <input required="required" class="form-control"
                           type="text" name="db_host" id="db_host" autocomplete="false"
                           value="<?= (isset($_POST['db_host']))?$_POST['db_host']:'localhost'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="db_name">Nom de la base de données *</label>
                    <input required="required" class="form-control"
                           type="text" name="db_name" id="db_name" autocomplete="false"
                           value="<?= (isset($_POST['db_name']))?$_POST['db_name']:'mega'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="db_user">Identifiant de la base de données *</label>
                    <input required="required" class="form-control" type="text"
                           name="db_user" id="db_user" autocomplete="false"
                           value="<?= (isset($_POST['db_user']))?$_POST['db_user']:'root'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="db_pass">Mot de passe de la base de données *</label>
                    <input required="required" class="form-control"
                           type="text" name="db_pass" id="db_pass" autocomplete="false"
                           value="<?= (isset($_POST['db_pass']))?$_POST['db_pass']:'password'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="db_prefix">Préfix de la base de données *</label>
                    <input required="required" class="form-control" type="text"
                           name="db_prefix" id="db_prefix" value="<?= randomPassword(5) ?>_"
                           autocomplete="false">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="db_config" value="Envoyer">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>