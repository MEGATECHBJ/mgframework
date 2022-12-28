<?php

namespace App\Controller\Admins;

use App\App;
use App\Controller\AppController;
use Src\Form\BootstrapForm;

class UsersController extends AppController
{

    private const URL = 'users';

    public function __construct ()
    {
        parent::__construct();

        $this->loadModel('User');
        $this->loadModel('Profil');
    }

    /**
     * Default display page for this controller. Is called if no other method is specified.
     *
     * @return void
     */
    public function view ()
    {
        $page_titre = 'Liste des utilisateurs de la plateforme';
        $form = new BootstrapForm($_POST);

        $datas = $this->User->MyJoin('Profil', 'id', 'users_id', false, ['state' => 1, 'del' => 0]);

        $this->render('admins.users', compact('page_titre', 'datas', 'form'));

    }

    /**
     * Allows to add a new record in the database
     *
     * @return void
     */
    public function create ()
    {
        $action = "Ajouter";

        if (isset($_POST) && array_key_exists('create', $_POST)) {
            extract($this->secureData($_POST));
            if (App::getInstance()->not_empty(['username', 'password', 'email', 'name',
                'phone', 'userright'])) {

                if ($this->Admin->MyInUse(['username' => $username]) < 1
                    || $this->Admin->MyInUse(['email' => $email]) < 1) {

                    //Insertion de l'information de la base de données
                    $this->Admin->MyCreate([
                        'username' => $username,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'email' => $email,
                        'name' => $name,
                        'phone' => $phone,
                        'userright' => $userright
                    ]);
                    $this->alertDefine('Utilisateur ajouté avec succès', 'success');

                    $url = $this->entity()->admins('admin');
                    $this->redirection($url);
                } else {
                    $this->alertDefine('Un utilisateur existe déjà avec cet 
                    email ce nom d\'utilisateur.', 'danger');
                }

            } else {
                $this->alertDefine('Veuillez remplir tous les champs obligatoires', 'danger');
            }
        }

        $page_titre = 'Créer un utilisateur';
        $form = new BootstrapForm($_POST);

        $this->render('admins.users-form', compact('form', 'page_titre', 'action'));

    }

    /**
     * Updating information in database
     *
     * @param $id : ID of the line to be modified
     * @return void
     */
    public function edit ($id)
    {

        if (isset($id) && (int)$id !== 0) {
            $action = "Modifier";

            if (isset($_POST) && array_key_exists('create', $_POST)) {
                extract($this->secureData($_POST));

                $id = htmlspecialchars($id);

                if (App::getInstance()->not_empty(['username', 'password', 'email', 'name', 'phone', 'userright'])) {

                    if ($this->Admin->MyInUse(['username' => $username], $id) < 1
                        || $this->Admin->MyInUse(['email' => $email], $id) < 1) {

                        $this->Admin->MyUpdate($id, [
                            'username' => $username,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'email' => $email,
                            'name' => $name,
                            'phone' => $phone,
                            'userright' => $userright
                        ]);
                        $this->alertDefine('Adminsitrateur modifié avec succès', 'success');

                        $url = $this->entity()->admins('admin');
                        $this->redirection($url);
                    } else {
                        $this->alertDefine('Un administrateur existe déjà avec 
                            cet email ou ce nom d\'utilisateur.', 'danger');
                    }

                } else {
                    $this->alertDefine('Veuillez remplir tous les champs 
                        obligatoires', 'danger');
                }
            }

            $page_titre = 'Modifier un administrateur';
            $find = $this->Admin->MyFind($id);
            $form = new BootstrapForm($find);

            $this->render('admins.admins-form', compact('form', 'page_titre',
                'action'));
        } else {
            $this->notFound();
        }

    }

    /**
     * Delete information from the database
     *
     * @param $id : ID of the row to delete
     * @return void
     */
    public function delete ($id)
    {

        if (isset($id) && (int)$id !== 0) {

            $this->User->MyUpdate($id, ['del' => 1]);
            $this->Profil->MyDelete($id, 'users_id');

            $this->redirection($this->url());
        } else {
            $this->notFound();
        }
    }

    /**
     * Define default page URL
     *
     * @return string
     */
    private function url (): string
    {
        return $this->entity()->admins(self::URL);
    }

    /**
     * Contains CSS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function css ()
    {
        $css = '<link href="' . $this->entity()->css_file("style-admin.css") . '" rel="stylesheet">';
        $css .= '<link href="' . $this->entity()->vendor_file("dataTables/datatables.min.css") . '" rel="stylesheet">';
        return $css;
    }

    /**
     * Contains JS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function js ()
    {
        $js = '<script src="' . $this->entity()->vendor_file("dataTables/datatables.min.js") . '"></script>';
        $js .= '<script src="' . $this->entity()->js_file("my.datatables.js") . '"></script>';
        return $js;
    }
}