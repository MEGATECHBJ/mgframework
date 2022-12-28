<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Installation de MEGAFRAME etape 3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
    <div class="row py-5 mt-5">
        <div class="col-md-8 offset-md-2">
            <form action="" method="post">
                <h4>Information de connexion et de configuration</h4>
                <p>Veuillez fournir toutes les informations de connexion et de configuration du framework</p>
                <hr>
                <div class="form-group">
                    <label for="username">Identifiant administrateur </label>
                    <input required="required" class="form-control" type="text" name="username" id="username" autocomplete="false"
                           value="<?= (isset($_POST['username']))?$_POST['username']:'admin'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="name">Nom et prénom de l'administrateur</label>
                    <input required="required" class="form-control" type="text" name="name" id="name" autocomplete="false"
                           value="<?= (isset($_POST['name']))?$_POST['name']:'Jean DOSSOU'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe administrateur</label>
                    <input required="required" class="form-control" type="text" name="password" id="password"
                           autocomplete="false"
                           value="<?= (isset($_POST['password']))?$_POST['password']:randomPassword(12); ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email Administrateur</label>
                    <input required="required" class="form-control" type="text" name="email" id="app_slogan"
                           autocomplete="false"
                           value="<?= (isset($_POST['email']))?$_POST['email']:'admin@megatech-web.com'; ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone administrateur</label>
                    <input required="required" class="form-control" type="text" name="phone" id="app_description"
                           autocomplete="false"
                           value="<?= (isset($_POST['phone']))?$_POST['phone']:'+229 60 63 63 16'; ?>"
                    >
                </div>

                <h4 class="mt-5">Configuration du framework</h4>
                <p>Veullez choisir les options de votre framework</p>
                <hr>
                <div class="form-group">
                    <label for="admin">Votre site a besoin d'un espace d'administration</label>
                    <select class="form-control" name="admin" id="admin" autocomplete="false" required="required">
                        <option value="true">Oui</option>
                        <option value="false">Non</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="user">Votre site a besoin d'un espace utilsiateur</label>
                    <select class="form-control" name="user" id="user" autocomplete="false" required="required">>
                        <option value="true">Oui</option>
                        <option value="false">Non</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="blog">Votre site a besoin d'un blog</label>
                    <select class="form-control" name="blog" id="blog" autocomplete="false" required="required">>
                        <option value="true">Oui</option>
                        <option value="false">Non</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="site_info" value="Envoyer">
                </div>
            </form>


        </div>
    </div>
</div>



</body>
</html>