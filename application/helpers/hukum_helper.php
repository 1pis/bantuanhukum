<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @param string     $view
 * @param array|null $data
 * @param bool       $returnhtml
 *
 * @return mixed
 */
if (!function_exists('render_page')) {
    function render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {
        $ci =& get_instance();
        $viewdata = (empty($data)) ? $ci->data : $data;
        $view_html = $ci->load->view($view, $viewdata, $returnhtml);
        // This will return html on 3rd argument being true
        if ($returnhtml) {
            return $view_html;
        }
    }
}

/**
 * @return array A CSRF key-value pair
 */
if (!function_exists('get_csrf_nonce')) {
    function get_csrf_nonce()
    {
        $ci =& get_instance();
        $ci->load->helper('string');
        $key   = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $ci->session->set_flashdata('csrfkey', $key);
        $ci->session->set_flashdata('csrfvalue', $value);

        return [$key => $value];
    }
}

/**
 * @return bool Whether the posted CSRF token matches
 */
if (!function_exists('valid_csrf_nonce')) {
    function valid_csrf_nonce()
    {
        $ci =& get_instance();
        $csrfkey = $ci->input->post($ci->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $ci->session->flashdata('csrfvalue')) {
            return true;
        }

        return false;
    }
}

//check auth
if (!function_exists('check_auth')) {
    function check_auth()
    {
        // Get a reference to the controller object
        $ci =& get_instance();
        if(!$ci->ion_auth->logged_in())
        {
            redirect('admin/auth/login', 'refresh');
        }
    }
}

