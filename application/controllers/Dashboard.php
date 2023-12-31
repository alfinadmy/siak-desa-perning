<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard - Desa Perning";
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer', $data);
    }
}