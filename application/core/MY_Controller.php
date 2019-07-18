<?php

Class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang ben view
    public $data = array();

    function __construct()
    {
        //ke thua tu CI_Controller
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin' :
                {
                    $admin_login = $this->session->userdata('user_id_login');
                    $this->data['userID'] = $admin_login;
                    $this->data['game_name']  = "Boa.Club";
                    $this->data['money_name']  = "Boa";
                    if ($admin_login) {
                        $this->data['nick_name'] = $this->session->userdata('nick_name');
                        $this->data['user_status'] = $this->session->userdata('user_status');
                        $this->load->model('admin_model');
                        $this->load->model('userrole_model');
                        $this->load->model('menurole_model');
                        $this->load->model('menu_model');
                        $admin_info = $this->admin_model->get_info($admin_login);
                        $this->data['admin_info'] = $admin_info;
                        $link1 = $this->uri->rsegment('1');
                        $link2 = $this->uri->rsegment('2');
                        if ($link2 != "index") {
                            if ($this->menu_model->get_menu_id($link1 . '/' . $link2)) {
                                $menu_id = $this->menu_model->get_menu_id($link1 . '/' . $link2);
                                $this->data['role'] = $this->get_role_user($admin_login, $menu_id[0]->id);
                            } else {
                                $this->data['role'] = false;
                            }
                        } else {
                            if ($this->menu_model->get_menu_id($link1)) {
                                $menu_id = $this->menu_model->get_menu_id($link1);
                                $this->data['role'] = $this->get_role_user($admin_login, $menu_id[0]->id);
                            } else {
                                $this->data['role'] = false;
                            }
                        }
                        $list = $this->GetMenuLeftByUser($admin_info->ID);
                        $this->data['menu_list'] = $list;
                    }
                    $this->_check_login();
                    break;
                }
            default:
                {

                    $this->data['game_name']  = "Boa.Club";
                }

        }
    }

    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('user_id_login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }




    function GetMenuLeftByUser($user_id)
    {

        $this->load->model('admin_model');
        $this->load->model('userrole_model');
        $this->load->model('menurole_model');
        $str = "";
        //lấy group_id theo userid
        $list_group_id = $this->userrole_model->get_list_role_by_userid($user_id);

        if (!empty($list_group_id)) {
            foreach ($list_group_id as $group_id_item) {
                //lấy danh sách các menu_id theo group id
                $list_menu = $this->menurole_model->get_list_menu_id_by_group($group_id_item->Group_ID);
                if (!empty($list_menu)) {
                    //lấy ra tên menu theo menu id
                    foreach ($list_menu as $menu_item) {
                        $list_name = $this->menu_model->get_list_menu_name_by_menu_id($menu_item->Menu_ID);
                        if (!empty($list_name)) {
                            foreach ($list_name as $menu_name_item) {
                                $list_menu_child = $this->menu_model->get_list_menu_name_by_parrent_id($menu_item->Menu_ID, $group_id_item->Group_ID);
                                $str .= "<li>";
                                $str .= "<a href=" . admin_url($menu_name_item->Link) . "><i class=\"fa fa-dashboard\"></i><span>" . $menu_name_item->Name . "</span></a>";
                                if (!empty($list_menu_child)) {
                                    $str .= "<ul class=\"treeview-menu\">";
                                    foreach ($list_menu_child as $menu_child) {
                                        $str .= "<li><a href=" . admin_url($menu_child->Link) . "><i class=\"fa fa-circle-o\"></i>$menu_child->Name</a></li>";
                                    }
                                    $str .= "</ul>";
                                }
                                $str .= " </li>";

                            }
                        }
                    }
                }
            }
        }
        return $str;
    }

    function get_role_user($user_id, $menu_id)
    {
        $this->load->model('userrole_model');
        $role = $this->userrole_model->get_list_role_menu($user_id, $menu_id);
        return $role;
    }



}
