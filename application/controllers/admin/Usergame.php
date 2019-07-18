<?php

Class Usergame extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('logadmin_model');

    }
    /*
     * Lay danh sach admin
     */
    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/usergame/index';
        $this->load->view('admin/main', $this->data);
    }
    function blockChat(){
        $this->data['temp'] = 'admin/usergame/blockchat';
        $this->load->view('admin/main', $this->data);
    }
	
}