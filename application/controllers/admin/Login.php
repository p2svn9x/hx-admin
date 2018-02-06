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
        $odpinfo = $this->get_data_curl($this->config->item('api_backend').'?c=701&un='.$username.'&pw='.$password);

        $data = json_decode($odpinfo);


        if($data->success == true){
            $nickname = json_decode(base64_decode($data->sessionKey))->nickname;
			 $access = $data->accessToken;
           if($this->infouser($nickname,$access) == true){

               echo json_encode("1");

           }else{

               echo json_encode("2");
           }

        }else{
            if($data->errorCode == 1001){

                echo json_encode("3");
            }
            if($data->errorCode == 1005){

                echo json_encode("4");
            }
            if($data->errorCode == 1007){

                echo json_encode("5");
            }
            if($data->errorCode == 1109){

                echo json_encode("6");
            }
            if($data->errorCode == 1114){

                echo json_encode("7");
            }
            if($data->errorCode == 2001){

                echo json_encode("8");
            }
            if($data->errorCode == 1012){

                echo json_encode("9");
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