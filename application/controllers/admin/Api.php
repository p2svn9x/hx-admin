<?php

Class Api extends MY_Controller
{
    private $accessToken;
    private $nickName;

    function __construct()
    {
        parent::__construct();
        $this->accessToken = $this->session->userdata('accessToken')[0];
        $this->nickName = $this->session->userdata('accessToken')[1];
    }

    function reportTotal()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = round(microtime(true) * 1000);
        $data = $this->curl->simple_get($this->config->item('api_url') . 'ccu?n=' . $this->nickName . '&at=' . $this->accessToken . '&t=n&st=' . $date);
        echo $data;
    }


}
