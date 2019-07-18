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

    }

    function addGiftcode(){
        $this->data['temp'] = 'admin/giftcode/addgiftcode';
        $this->load->view('admin/main', $this->data);
    }


}
