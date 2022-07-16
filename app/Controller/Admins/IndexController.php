<?php

namespace App\Controller\Admins;

use App\Controller\AppController;

class IndexController extends AppController
{

    private const URL = 'dashboard';

    public function __construct ()
    {
        parent::__construct();
    }

    /**
     * Default display page for this controller. Is called if no other method is specified.
     */
    public function view (): void
    {
        $page = 'index';
        $page_titre = 'Votre espace d\'administration';

        $this->render('admins.' . $page, compact('page_titre'));
    }

    /**
     * Contains CSS links of all pages dependent on this controller
     *
     * @return string
     */
    protected function css (): string
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
    protected function js (): string
    {
        $js = '<script src="' . $this->entity()->vendor_file("dataTables/datatables.min.js") . '"></script>';
        $js .= '<script src="' . $this->entity()->js_file("my.datatables.js") . '"></script>';
        return $js;
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
}