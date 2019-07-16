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
        }
        $this->session->set_userdata('accessToken', array($accessToken, $nickname));

        return true;
    }

    function loginODP()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $odpinfo = $this->get_data_curl($this->config->item('api_url') . 'loginadmin?u=' . $username . '&p=' . $password . '&otp=75464574');
        $data = json_decode($odpinfo);
        if ($data->e == 0) {
            $info = $data->uInfo;
            $nickname = $info->nn;
            $access = $data->at;
            if ($this->infouser($nickname, $access) == true) {
                echo json_encode("1");
            } else {
                echo json_encode("2");
            }

        } else {
            if ($data->e == 11) {
                echo json_encode("3");
            }
            if ($data->e == 15) {
                echo json_encode("4");
            }
            if ($data->e == 16) {
                echo json_encode("5");
            }
            if ($data->e == 17) {
                echo json_encode("6");
            }
            if ($data->e == 101) {
                echo json_encode("7");
            }
            if ($data->e == 1) {
                echo json_encode("8");
            }

        }
    }
}