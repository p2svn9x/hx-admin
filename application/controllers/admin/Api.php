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
            $start_time = date('m/d/Y 00:00:00');
        }
        $date = strtotime($start_time) * 1000;
        $data = $this->curl->simple_get($this->config->item('api_url') . 'ccu?n=' . $this->nickName . '&at=' . $this->accessToken . '&t=n&st=' . $date);
        echo $data;
    }

    function addGiftcode()
    {
        $typeGC = urlencode($this->input->get('typeGC'));
        $amountGC = urlencode($this->input->get('amountGC'));
        $expiryDateGC = urlencode($this->input->get('expiryDateGC'));
        $priceGC = urlencode($this->input->get('priceGC'));
        $otpGC = urlencode($this->input->get('otpGC'));
        $campainGC = urlencode($this->input->get('campainGC'));
        $data = $this->curl->simple_get($this->config->item('api_url') . 'gengiftcode?at=' . $this->accessToken . '&n=' . $this->nickName . '&type=' . $typeGC . '&amount=' . $amountGC . '&day=' . $expiryDateGC . '&value=' . $priceGC . '&campain=' . $campainGC . '&flag=0&otp=' . $otpGC);
        $respone = json_decode($data);
        //var_dump($this->config->item('api_url') . 'admdailychuyenkhoan?at=' . $this->accessToken . '&n=' . $this->nickName.'&receiver='.$nickname.'&prereceiver='.$renickname.'&boa='.$money.'&reason='.$reason.'&otp='.$otp);
        if ($respone->e == 0) {
            echo json_encode("0");
        } else {
            if ($respone->e == 1) {
                echo json_encode("Lỗi hệ thống . Vui lòng thử lại !!!");
            } elseif ($respone->e == 8) {
                echo json_encode("Lỗi xác thực . Vui lòng thử lại !!!");
            } elseif ($respone->e == 12) {
                echo json_encode("Lỗi tham số .  Vui lòng thử lại!!!");
            } elseif ($respone->e == 121) {
                echo json_encode("Bạn chỉ được tạo tối đa 100 Giftcode 1 lấn !!!");
            } elseif ($respone->e == 116) {
                echo json_encode("Bạn không có quyền tạo Giftcode!!!");
            } elseif ($respone->e == 36) {
                echo json_encode("Tài khoản không tồn tại !!!");
            } elseif ($respone->e == 28) {
                echo json_encode("Mã OTP không chính xác !!!");
            } elseif ($respone->e == 93) {
                echo json_encode("Số điện thoại không chính xác !!!");
            } elseif ($respone->e == 114) {
                echo json_encode("Trừ tiền đại lý lỗi !!!");
            } elseif ($respone->e == 17) {
                echo json_encode("Tài khoản không đủ tiền để tạo Giftcode !!!");
            } elseif ($respone->e == 74) {
                echo json_encode("Thông tin đại lý không chính xác để tạo Giftcode !!!");
            } else {
                echo json_encode("[" . $respone->e . "].Error !!!");
            }


        }
    }

    function listGiftcode()
    {
        $typeDate = urlencode($this->input->get('typeDate'));
        $typeGC = urlencode($this->input->get('typeGC'));
        $fromDate = urlencode($this->input->get('fromDate'));
        $toDate = urlencode($this->input->get('toDate'));
        $page = urlencode($this->input->get('page'));
        $data = $this->curl->simple_get($this->config->item('api_url') . 'listgiftcode?at=' . $this->accessToken . '&n=' . $this->nickName . '&t=' . $typeDate . '&st=' . $fromDate . '&ed=' . $toDate . '&page=' . $page . '&status=' . $typeGC);
       // var_dump($this->config->item('api_url') . 'listgiftcode?at=' . $this->accessToken . '&n=' . $this->nickName . '&t=' . $typeDate . '&st=' . $fromDate . '&ed=' . $toDate . '&page=' . $page . '&status=' . $typeGC);
        $respone = json_decode($data);
        if ($respone->e == 0) {
            echo $data;
        } else {
            if ($respone->e == 1) {
                echo json_encode("1");
            } elseif ($respone->e == 8) {
                echo json_encode("8");
            } elseif ($respone->e == 12) {
                echo json_encode("12");
            } elseif ($respone->e == 36) {
                echo json_encode("36");
            } else {
                echo json_encode("[" . $respone->e . "].Error !!!");
            }

        }
    }

    function blockChat()
    {
        $nickname = urlencode($this->input->get('nickname'));
        $blockChat = urlencode($this->input->get('blockChat'));
        $data = $this->curl->simple_get($this->config->item('api_url') . 'rejectuserchattx?at=' . $this->accessToken . '&n=' . $this->nickName . '&user=' . $nickname . '&day=' . $blockChat);
        // var_dump($this->config->item('api_url') . 'listgiftcode?at=' . $this->accessToken . '&n=' . $this->nickName . '&t=' . $typeDate . '&st=' . $fromDate . '&ed=' . $toDate . '&page=' . $page . '&status=' . $typeGC);
        $respone = json_decode($data);
        if ($respone->e == 0) {
            echo json_encode("0");
        } else {

            if ($respone->e == 1) {
                echo json_encode("Lỗi hệ thống . Vui lòng thử lại !!!");
            } elseif ($respone->e == 8) {
                echo json_encode("Lỗi xác thực . Vui lòng thử lại !!!");
            } elseif ($respone->e == 12) {
                echo json_encode("Lỗi tham số .  Vui lòng thử lại!!!");
            }else {
                echo json_encode("[" . $respone->e . "].Error !!!");
            }

        }
    }


}
