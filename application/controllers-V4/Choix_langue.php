<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class choix_langue extends CI_Controller {

    function __construct()
    {
            parent::__construct();
            $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('date');
        $this->load->library('email');
     $this->load->library("Pdf");
        $this->load->helper('url');
        $this->load->helper('html');
            //$this->load->model('connexion_modele');
            //$this->load->model('etudiant_modele');
            
    }
    public function index()
    {
            $this->load->view('choix_langue/index');
    }

   public function updateLang($language) {
        $lang = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $lang);
        redirect(base_url());
    }
	
}

