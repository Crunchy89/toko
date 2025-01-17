<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('element')) {
    function detail_page($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('detail.php', $data);
    }
    function front_page($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('home.php', $data);
    }
    function admin_page($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('admin.php', $data);
    }
    function member_page($template, $data = null)
    {
        $ci = &get_instance();
        $data['view'] = $ci->load->view($template, $data, true);
        $ci->load->view('member.php', $data);
    }
}
