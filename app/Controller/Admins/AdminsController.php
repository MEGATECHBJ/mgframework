<?php

namespace App\Controller\Admins;

use App\App;
use App\Controller\AppController;
use Src\Form\BootstrapForm;

class AdminsController extends AppController
{

    private const URL = 'admins';

    /**
     *
     */
    public function __construct ()
    {
        parent::__construct();

        $this->loadModel('Admin');
    }

    /**
     * Default display page for this controller. Is called if no other method is specified.
     *
     * @return void
     */
    public function view (): void
    {
        $page_titre = 'Gestion des Utilisateurs';
        $url = $this->url();

        $admins = $this->Admin->MyAll(['del' => 0], ['='], ('username ASC'));

        $this->render('admins.admins', compact('page_titre', 'admins', 'url'));
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
     * Allows to add a new record in the database
     *
     * @return void
     */
    public function create (): void
    {

        $page_titre = 'Ajouter un administrateur';
        $action = "Ajouter";
        $form = new BootstrapForm($_POST);

        if (isset($_POST) && array_key_exists('create', $_POST)) {
            extract($this->secureData($_POST));
            if (App::getInstance()->not_empty(['username', 'password', 'email', 'name',
                'phone', 'userright'])) {

                if ($this->Admin->MyInUse(['username' => $username]) < 1
                    || $this->Admin->MyInUse(['email' => $email]) < 1) {

                    $datas = array_splice($_POST, 0, -1);
                    $datas['password'] = password_hash($datas['password'], PASSWORD_DEFAULT);

                    $this->Admin->MyCreate($datas);
                    $this->alertDefine('Adminsitrateur ajouté avec succès', 'success');

                    $this->redirection($this->url());
                } else {
                    $this->alertDefine('Un administrateur existe déjà avec cet 
                        email ou ce nom d\'utilisateur.', 'danger');
                }
            } else {
                $this->alertDefine('Veuillez remplir tous les champs obligatoires', 'danger');
            }
        }

        $this->render('admins.admins-form', compact('form', 'page_titre', 'action'));
    }

    /**
     * Updating information in database
     *
     * @param $id : ID of the line to be modified
     * @return void
     */
    public function edit (int $id): void
    {

        $page_titre = 'Modifier un administrateur';
        $action = "Modifier";
        $form = new BootstrapForm($_POST);

        if (isset($id) && (int)$id !== 0) {
            $find = $this->Admin->MyFind($id);
            $form = new BootstrapForm($find);

            if (isset($_POST) && array_key_exists('create', $_POST)) {
                extract($this->secureData($_POST));

                $id = htmlspecialchars($id);

                if (App::getInstance()->not_empty(['username', 'password', 'email', 'name', 'phone', 'userright'])) {

                    if ($this->Admin->MyInUse(['username' => $username], $id) < 1
                        || $this->Admin->MyInUse(['email' => $email], $id) < 1) {

                        $datas = array_splice($_POST, 0, -1);
                        $datas['password'] = password_hash($datas['password'], PASSWORD_DEFAULT);

                        $this->Admin->MyUpdate($id, $datas);
                        $this->alertDefine('Adminsitrateur modifié avec succès', 'success');

                        $this->redirection($this->url());
                    } else {
                        $this->alertDefine('Un administrateur existe déjà avec 
                            cet email ou ce nom d\'utilisateur.', 'danger');
                    }
                } else {
                    $this->alertDefine('Veuillez remplir tous les champs 
                        obligatoires', 'danger');
                }
            }
        } else {
            $this->alertDefine('Aucune information à modifier. Veuillez vérifier le lien et réessayer', 'danger');
        }

        $this->render('admins.admins-form', compact('form', 'page_titre', 'action'));
    }

    /**
     * Delete information from the database
     *
     * @param $id : ID of the row to delete
     * @return void
     */
    public function delete (int $id): void
    {

        if (isset($id) && (int)$id !== 0) {
            $this->Admin->MyUpdate($id, ['del' => 1]);
            $this->redirection($this->url());
        } else {
            $this->notFound();
        }
    }

    /**
     * Contains CSS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function css (): string
    {
        $css = '<link href="' . $this->entity()->get_file("css","style-admin.css") . '" rel="stylesheet">';
        $css .= '<link href="' . $this->entity()->get_file("vendor","dataTables/datatables.min.css") . '" rel="stylesheet">';
        return $css;
    }

    /**
     * Contains JS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function js (): string
    {
        $js = '<script src="' . $this->entity()->get_file("vendor","dataTables/datatables.min.js") . '"></script>';
        $js .= '<script src="' . $this->entity()->get_file("js","my.datatables.js") . '"></script>';
        return $js;
    }

}