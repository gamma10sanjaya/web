<?php


class Perpustakaan_model extends CI_Model
{
    public function getSidebar()
    {
        $role_id = $this->session->userdata('user_role_id');
        $queryMenu = "SELECT user_menu.user_menu_id, user_menu_title, user_menu_icon
            FROM user_menu JOIN user_access_menu
            ON user_menu.user_menu_id = user_access_menu.user_menu_id
            WHERE user_access_menu.user_role_id = $role_id
            ORDER BY user_access_menu.user_menu_id ASC
            ";
        return $this->db->query($queryMenu)->result_array();
    }

    public function getSubmenu($menuId)
    {
        $querySubMenu = "SELECT * FROM user_sub_menu
        WHERE user_menu_id = $menuId
        AND is_active = 1
        ";
        return $this->db->query($querySubMenu)->result_array();
    }

    public function getUserrole()
    {
        $this->db->where('user_role_id !=', 4);
        return $this->db->get('user_role')->result_array();
    }

    public function getUsermenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getFeedbacksave($data)
    {
        $this->db->insert('tb_feedback', $data);
    }

    public function getFeedback()
    {
        return $this->db->get('tb_feedback')->result_array();
    }
}
