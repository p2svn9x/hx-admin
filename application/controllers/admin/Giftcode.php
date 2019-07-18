<?php

Class Giftcode extends MY_Controller
{
    private $accessToken;
    private $nickName;

    function __construct()
    {
        parent::__construct();
        $this->accessToken = $this->session->userdata('accessToken');
        $this->nickName = $this->session->userdata('nick_name');
    }

    function index()
    {

        $start_time = null;
        $end_time = null;
        if ($start_time === null) {
            $start_time =  date('d/m/Y 00:00:00');
        }
        if ($end_time === null) {
            $end_time = date('d/m/Y 23:59:59');
        }
        $this->data['fromDate'] = $start_time;
        $this->data['toDate'] = $end_time;
        $this->data['temp'] = 'admin/giftcode/index';
        $this->load->view('admin/main', $this->data);
    }

    function addGiftcode(){
        $this->data['temp'] = 'admin/giftcode/addgiftcode';
        $this->load->view('admin/main', $this->data);
    }


}
