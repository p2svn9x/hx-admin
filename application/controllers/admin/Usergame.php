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
    function indexajax(){
        $phone = urlencode($this->input->post("phone"));
        $fieldname = urlencode($this->input->post("fieldname"));
        $timkiemtheo =  urlencode($this->input->post("timkiemtheo"));
        $typetimkiem =  $this->input->post("typetimkiem");
        $pages = $this->input->post("pages");
        $datainfo = $this->curl->simple_get($this->config->item('api_backend2').'2005&m=' . $phone . '&tysh=' . $typetimkiem.'&vl='.$fieldname.'&tys='.$timkiemtheo.'&p='.$pages);
        if(isset($datainfo)) {
            echo $datainfo;
        }else{
            echo "Bạn không được hack";
        }
    }
	
}