<?php

Class Confignew extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        // $this->load->model('gameconfig_model');
        $this->load->model('logadmin_model');
    }

    function index()
    {

        $this->data['temp'] = 'admin/config/index';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        $this->data['temp'] = 'admin/config/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit()
    {

        $datainfo1 = $this->curl->simple_get($this->config->item('api_backend') . '2001&pf=' . "" . '&n=' . "");
        if (isset($datainfo1)) {
            $data = json_decode($datainfo1);
        }else{
            $data = [];
        }

        $this->data['data'] = $data;
        $namecf = $this->uri->rsegment('3');
        $this->data['namecf'] = $namecf;
        $plat = $this->uri->rsegment('4');
        $this->data['plat'] = $plat;
        $id = $this->uri->rsegment('5');
        $this->data['id'] = $id;
        $this->data['temp'] = 'admin/config/testconfig';
        $this->load->view('admin/main', $this->data);
    }


    function listconfig()
    {

        $this->data['temp'] = 'admin/config/listconfignew';
        $this->load->view('admin/main', $this->data);
    }

    function listconfigajax()
    {
        $datainfo = $this->curl->simple_get($this->config->item('api_backend') . '2001&pf=' . "" . '&n=' . "");
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function editajax()
    {


        $configpf = $this->input->post('configpf');
        $nmconfig = $this->input->post('nmconfig');

        $datainfo = file_get_contents($this->config->item('api_backend') . '2001&pf=' . $configpf . '&n=' . $nmconfig);
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function successeditajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $idconfig = $this->input->post('idconfig');
        $valueconfig = urlencode($this->input->post('valueconfig'));
        $versionconfig = $this->input->post('versionconfig');
        $configpf = $this->input->post('configpf');

        $datainfo = file_get_contents($this->config->item('api_backend') . '2003&id=' . $idconfig . '&vl=' . $valueconfig . '&vrs=' . $versionconfig . '&pf=' . $configpf);
        if (isset($datainfo)) {
            $data = array(
                'account_name' => $configpf,
                'username' => $admin_info->UserName,
                'action' => "Sửa config",
            );
            $this->logadmin_model->create($data);
            echo $datainfo;

        } else {
            echo "Bạn không được hack";
        }
    }

    function addconfigajax()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        $name = $this->input->post('name');
        $valueconfig = urlencode($this->input->post('valueconfig'));
        $versionconfig = $this->input->post('versionconfig');
        $configpf = $this->input->post('configpf');

        $datainfo = file_get_contents($this->config->item('api_backend') . '2002&n=' . $name . '&vl=' . $valueconfig . '&vrs=' . $versionconfig . '&pf=' . $configpf);

        $data1 = json_decode($datainfo);
        if (isset($datainfo)) {
            $data = array(
                'account_name' => $configpf,
                'username' => $admin_info->UserName,
                'action' => "Thêm config " . $name,
            );
            if ($data1 == 0) {
                $this->logadmin_model->create($data);
            }
            echo $datainfo;

        } else {
            echo "Bạn không được hack";
        }
    }

    function configajax()
    {
        $datainfo = $this->curl->simple_get($this->config->item('api_url') . '?cd=7');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function config1ajax()
    {
        $datainfo = file_get_contents($this->config->item('api_url2') . '?c=7');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function config2ajax()
    {
        $datainfo = file_get_contents($this->config->item('api_url3') . '?c=7');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }

    function config3ajax()
    {
        $datainfo = file_get_contents($this->config->item('api_url4') . '?c=7');
        if (isset($datainfo)) {
            echo $datainfo;
        } else {
            echo "Bạn không được hack";
        }
    }
}