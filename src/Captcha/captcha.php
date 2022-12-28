<?php

namespace Src\Captcha;

use Src\Config;

class captcha
{

    protected $site_key;

    protected $secret_key;

    protected $instance;

    protected $reponse;

    protected $remoteip;

    protected $decode;

    public function __construct ()
    {
        $this->instance = new Config();
        $this->site_key = $this->instance->get('captcha_site_key');
        $this->secret_key = $this->instance->get('captcha_secret_key');
        $this->reponse = $_POST['g-recaptcha-response'];
        $this->remoteip = $_SERVER['REMOTE_ADDR'];
    }

    public function verif_captcha ()
    {
        return $this->constuct_url()['success'];
    }

    protected function constuct_url ()
    {
        $url = "https://www.google.com/recaptcha/api/siteverify?secret="
            . $this->secret_key
            . "&response=" . $this->reponse
            . "&remoteip=" . $this->remoteip;

        return json_decode($this->curl_get_file_contents($url), true);
    }

    private function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }


}