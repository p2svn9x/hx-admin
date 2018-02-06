<?php

Class Kqsx extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kqsx_model');
    }


    function index()
    {


        $list = $this->kqsx_model->listlogkqsx();
        $this->data['list'] = $list["rows"];
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/kqsx/index';
        $this->load->view('admin/main', $this->data);
    }
    function add()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $time = null;
        if ($this->input->post('toDate')) {
            $time = $this->input->post('toDate');
        }
        if ($time === null) {
            $time = date('Y-m-d H:i:s');
        }
        $this->data['time'] = $time;

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('param_kq', 'Bạn chưa nhập đủ giải kết quả', 'required');
            $this->form_validation->set_rules('param_tong', 'Kết quả tổng chưa đúng', 'required');
            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $param_kq = $this->input->post('param_kq');
                $param_tong = $this->input->post('param_tong');
                $param_ddtong = $this->input->post('param_ddtong');
                $param_ddhieu = $this->input->post('param_ddhieu');
                $param_dontong = $this->input->post('param_dontong');
                $param_donhieu = $this->input->post('param_donhieu');

                $data = array(
                    'ketqua' => $param_kq,
                    'tong' => $param_ddtong,
                    'hieu' => $param_ddhieu,
                    'ketquatong' => $param_tong,
                    'dontong' => $param_dontong,
                    'donhieu' => $param_donhieu,
                    'creatdate' => $time,

                );
                if ($this->kqsx_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('kqsx'));
            }
        }
        $this->data['temp'] = 'admin/kqsx/add';
        $this->load->view('admin/main', $this->data);
    }


    function edit()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $time = null;
        if ($this->input->post('toDate')) {
            $time = $this->input->post('toDate');
        }
        if ($time === null) {
            $time = date('Y-m-d H:i:s');
        }
        $this->data['time'] = $time;
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->kqsx_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại kqsx');
            redirect(admin_url('kqsx'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('param_kq', 'Bạn chưa nhập đủ giải kết quả', 'required');
            $this->form_validation->set_rules('param_tong', 'Kết quả tổng chưa đúng', 'required');
            $this->form_validation->set_rules('param_status', 'Trạng thái chưa cập nhật', 'required');
            if ($this->form_validation->run()) {
                $param_kq = $this->input->post('param_kq');
                $param_tong = $this->input->post('param_tong');
                $param_ddtong = $this->input->post('param_ddtong');
                $param_ddhieu = $this->input->post('param_ddhieu');
                $param_dontong = $this->input->post('param_dontong');
                $param_donhieu = $this->input->post('param_donhieu');
                $param_status = $this->input->post('param_status');
                $data = array(
                    'ketqua' => $param_kq,
                    'tong' => $param_ddtong,
                    'hieu' => $param_ddhieu,
                    'ketquatong' => $param_tong,
                    'dontong' => $param_dontong,
                    'donhieu' => $param_donhieu,
                    'creatdate' => $time,
                    'status' => $param_status,
                );

                if ($this->kqsx_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('kqsx'));
            }
        }
        $this->data['temp'] = 'admin/kqsx/edit';
        $this->load->view('admin/main', $this->data);
    }
}