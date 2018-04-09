<?php

Class Login extends MY_controller
{
    function index()
    {

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->load->view('admin/login/index');
    }

  function infouser($nickname,$accessToken){
        $this->load->model('admin_model');
        $where = array('FullName' => $nickname);
        $user = $this->admin_model->get_info_rule($where);
       if($user == false){
           $this->session->set_flashdata('message', ' Tài khoản chưa được phân quyền');
           return false;
       }else{

        $this->session->set_userdata('user_id_login', $user->ID);}
		$this->session->set_userdata('accessToken',array($accessToken,$nickname));

        return true;
    }
    function loginODP()
    {
        $username= $this->input->post('username');
        $password= $this->input->post('password');
        $odpinfo = $this->get_data_curl($this->config->item('api_url').'5&m='.$username.'&pw='.$password.'&ty=ad');

        $data = json_decode($odpinfo);


        if($data->errorCode == 0){
            $nickname = json_decode(base64_decode($data->sessionKey))->mobile;
			 $access = $data->accessToken;

           if($this->infouser($nickname,$access) == true){

               echo json_encode("1");
               $this->log_login_admin($username, "Thành công", 0);

           }else{

               echo json_encode("2");
               $this->log_login_admin($username, "Tài khoản chưa được phân quyền", 1);
           }

        }else{
            if($data->errorCode == 11){
                $this->log_login_admin($username, "Số điện thoại chưa được đăng ký", 1);
                echo json_encode("3");
            }
            if($data->errorCode == 15){
                $this->log_login_admin($username, "AccessToken hết hạn", 1);
                echo json_encode("4");
            }
            if($data->errorCode == 16){
                $this->log_login_admin($username, "Mật khẩu không chính xác", 1);
                echo json_encode("5");
            }
            if($data->errorCode == 17){
                $this->log_login_admin($username, "Yêu cầu cập nhật số điện thoại", 1);
                echo json_encode("6");
            }
            if($data->errorCode == 101){
                $this->log_login_admin($username, "Tài khoản bị khóa đăng nhập", 1);
                echo json_encode("7");
            }
            if($data->errorCode == 1){
                $this->log_login_admin($username, "Hệ thống gián đoạn", 1);
                echo json_encode("8");
            }

        }


    }

    function log_login_admin($username,$action,$status){
        $this->load->model('admin_model');
        $this->load->model('log_loginadmin_model');
        $where = array('UserName' => $username);
        $user = $this->admin_model->get_info_rule($where);
        if($user == true){
            $username = $user->UserName;
            $nickname = $user->FullName;
        }else{
            $nickname = "";
        }
        $data = array(
            'username' =>$username,
            'nickname' => $nickname,
            'ip' => $this->get_client_ip(),
            'status'=>$status,
            'agent' => $_SERVER['HTTP_USER_AGENT'],
            'action' => $action,
            'tool' => "Admin"

        );
        $this->log_loginadmin_model->create($data);

    }
}