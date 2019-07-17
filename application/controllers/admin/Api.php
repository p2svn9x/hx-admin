<?php

Class Api extends MY_Controller
{
    private $accessToken;
    private $nickName;

    function __construct()
    {
        parent::__construct();
        $this->accessToken = $this->session->userdata('accessToken');
        $this->nickName = $this->session->userdata('nick_name');
    }

    function reportTotal()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $start_time = null;
        if ($start_time === null) {
            $start_time =  date('m/d/Y 00:00:00');
        }
        $date =strtotime($start_time) * 1000;
        $data = $this->curl->simple_get($this->config->item('api_url') . 'ccu?n=' . $this->nickName . '&at=' . $this->accessToken . '&t=n&st=' . $date);
        echo $data;
    }


}
