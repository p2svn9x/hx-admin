<?php

Class Groupuser extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('groupuser_model');
        $this->load->model('menurole_model');


    }

    /*
     * Lay danh sach admin
     */
    function index()
    {
        $input = array();
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $messageError = $this->session->flashdata('messageError');
        $this->data['messageError'] = $messageError;
        $list = $this->groupuser_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'admin/groupuser/index';
        $this->load->view('admin/main', $this->data);

    }

    function listGroup()
    {
        $list = $this->groupuser_model->get_list();
        echo json_encode($list);
    }

    /*
         * Thêm mới quản trị viên
         */
    function add()
    {
        $name = $this->input->get('name');
        $description = $this->input->get('description');
        $data = array(
            'name' => $name,
            'description' => $description,
        );
        $checkName = $this->checkGroupName($name);
        header('Content-Type: application/json');
        if ($checkName == false) {
            $this->session->set_flashdata('messageError', 'Tên nhóm người dùng đã rồn tại');
        } else {
            if ($this->groupuser_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm mới nhóm người dùng thành công');
            } else {
                $this->session->set_flashdata('messageError', 'Lỗi hệ thống. Vui lòng thử lại !!!');
            }
        }


    }

    function checkGroupName($name)
    {
        $where = array('Name' => $name);
        $check = $this->groupuser_model->get_info_rule($where);
        if ($check == false) {
            return true;
        } else {
            return false;
        }
    }

    function edit()
    {
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        // $url= substr($_SERVER['REQUEST_URI'],18,strlen($_SERVER['REQUEST_URI'])-18);
        $url = $this->router->fetch_class();
        //lay id cua quan tri vien can chinh sua
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //lay thong cua quan trị viên
        $info = $this->groupuser_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại nhóm người dùng');
            redirect(admin_url('groupuser'));
        }
        $this->data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên nhóm', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $description = $this->input->post('description');
                $data = array(
                    'name' => $name,
                    'description' => $description,
                );
                if ($this->groupuser_model->update($id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(admin_url('groupuser'));
            }
        }
        $this->data['temp'] = 'admin/groupuser/edit';
        $this->load->view('admin/main', $this->data);
    }

//xóa dữ liệu nhóm người dùng
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        //lay thong tin cua quan tri vien
        $info = $this->groupuser_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại nhóm người dùng');
            redirect(admin_url('groupuser'));
        }
        //thuc hiện xóa
        $this->groupuser_model->delete($id);

        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('groupuser'));
    }

    function role()
    {
        //load model
        $this->load->model('admin_model');
        $this->load->model('menu_model');
        $group_id = $this->uri->rsegment('3');
        $group_id = intval($group_id);
        $list = $this->get_list_role($group_id);
        $this->data['list'] = $list;
        //lây user_id của session khi login vào
        $admin_login = $this->session->userdata('user_id_login');
        $admin_info = $this->admin_model->get_info($admin_login);
        if ($this->input->post()) {
            $where = array('Group_ID' => $group_id);
            $this->menurole_model->del_rule($where);
            //lay thong cua menu role
            $name = $_POST['rolegroup'];
            foreach ($name as $menu_item) {
                $data = array(
                    'Menu_ID' => $menu_item,
                    'Group_ID' => $group_id,
                );
                $this->menurole_model->Create($data);
            }
            $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
            redirect(admin_url('groupuser'));
        }
        $this->data['temp'] = 'admin/groupuser/role';
        $this->load->view('admin/main', $this->data);
    }

    //danh sach menu trang index
    function get_list_role($menuid)
    {
        $str = "";
        $this->load->model('menu_model');
        $roles = $this->menu_model->get_category();
        foreach ($roles as $role) {
            $roles1 = $this->menurole_model->get_list_role_menu($menuid, $role->id);
            $str .= "<ul style='list-style-type: none;'>";
            if ($roles1 != null) {
                $str .= " <li><input type='checkbox' name=\"rolegroup[]\"  checked value='$role->id' > $role->Name";
                $str .= $this->get_sub_list_role($menuid, $role->id);
                $str .= "</li>";
            } else {
                $str .= " <li><input type='checkbox' name=\"rolegroup[]\"  value='$role->id' > $role->Name";
                $str .= $this->get_sub_list_role($menuid, $role->id);
                $str .= "</li>";
            }
            $str .= "</ul>";
        }
        return $str;
    }

    function get_sub_list_role($menuid, $roleid)
    {
        $str = "";
        //$sub_roles = $this->menu_model->get_list_role_group_user_sub($roleid,$menuid);
        $sub_roles = $this->menu_model->get_subcategory($roleid);
        if ($sub_roles) {
            $stt = 1;
            foreach ($sub_roles as $sub_role) {
                $roles1 = $this->menurole_model->get_list_role_menu($menuid, $sub_role->id);
                //kiem tra get subcategory co ton ai hay

                $str .= "<ul style='margin-left: 25px;list-style-type: none;'>";
                if ($roles1 != null) {
                    $str .= " <li><input type='checkbox' name=\"rolegroup[]\" checked value='$sub_role->id'>$sub_role->Name</li>";
                } else {
                    $str .= " <li><input type='checkbox' name=\"rolegroup[]\" value='$sub_role->id'>$sub_role->Name</li>";
                }
                $str .= "</ul>";
            }
            return $str;
        }
    }
}
