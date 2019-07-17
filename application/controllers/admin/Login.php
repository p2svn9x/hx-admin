<?php

Class Login extends MY_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

    }
    function index()
    {

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->load->view('admin/login/index');
    }

    function infouser($nickname, $accessToken)
    {
        $this->load->model('admin_model');
        $where = array('FullName' => $nickname);
        $user = $this->admin_model->get_info_rule($where);
        if ($user == false) {
            return false;
        } else {
            $this->session->set_userdata('user_id_login', $user->ID);
            $this->session->set_userdata('user_status', $user->Status);
        }
        $this->session->set_userdata('nick_name', $nickname);
        $this->session->set_userdata('accessToken', $accessToken);

        return true;
    }

    function loginODP()
    {
        $username = urlencode($this->input->get('username'));
        $password = urlencode($this->input->get('password'));
        //$otp = urlencode($this->input->get('otp'));
        $odpinfo = $this->curl->simple_get($this->config->item('api_url') . 'loginadmin?u=' . $username . '&p=' . $password . '&otp=75464574');
        $data = json_decode($odpinfo);
        if ($data->e === 0) {
            $info = $data->uInfo;
            $nickname = $info->nn;
            $access = $data->at;
            if ($this->infouser($nickname, $access) == true) {
                echo json_encode("0");
            }else{
                echo json_encode("Tài khoản không phải là admin !!!");
            }

        } else {
            if ($data->e == 1) {
                echo json_encode("Lỗi hệ thống. Vui lòng thử lại");
            } elseif ($data->e == 12) {
                echo json_encode("Lỗi tham số. Vui lòng thử lại");
            } elseif ($data->e == 4) {
                echo json_encode("Tên đăng nhập hoặc mật khẩu không đúng");
            } elseif ($data->e == 8) {
                echo json_encode("Không có quyền truy cập");
            } elseif ($data->e == 28) {
                echo json_encode("Mã OTP không đúng");
            } elseif ($data->e == 93) {
                echo json_encode("Tài khoản chưa cập nhật số điện thoại trong game");
            } elseif ($data->e == 46) {
                echo json_encode("Hệ thống đang bảo trì. Vui lòng thử lại");
            } elseif ($data->e == 5) {
                echo json_encode("Tên đăng nhập hoặc mật khẩu không đúng");
            } elseif ($data->e == 6) {
                echo json_encode("Tài khoản chưa cập nhật nickname");
            } elseif ($data->e == 11) {
                echo json_encode("Tài khoản đang bị khóa đăng nhập");
            } elseif ($data->e == 118) {
                echo json_encode("Tài khoản của bạn đang bị khóa !!!");
            } else {
                echo json_encode("[" . $data->e . "].Error !!!");
            }

        }
    }
}