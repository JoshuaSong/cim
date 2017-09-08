<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_member extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');

        if (! self::check_permissions(15)) {
            redirect("/adminpanel/no_access");
        }
    }

    /**
     *
     * _remap checks for existing methods and calls it when found in this controller
     *
     */

    public function _remap($method, $params = array()) {

        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }

        if ( ! $this->form_validation->is_natural_no_zero($this->uri->segment(3))) {
            $this->session->set_flashdata('error', '<p>'. $this->lang->line('illegal_request') .'</p>');
            redirect('adminpanel/list_members');
        }

        // get email data for member
        $this->load->model('contact_member_model');
        $content_data['email'] = $this->contact_member_model->get_email();

        // init js
        $this->template->set_js('tinymce-core', base_url() .'assets/vendor/tinymce/tinymce.min.js');
        $this->template->set_js('tinymce-init', base_url() .'assets/js/tinymce.js');

        $this->quick_page_setup(
            $this->_theme,
            $this->_layout,
            $this->lang->line('contact_member_title'),
            'contact_member',
            $this->_header,
            $this->_footer,
            '',
            $content_data
        );
    }

    /**
     *
     * send_message: send the actual email to the member
     *
     */

    public function send_message() {

        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required|integer');
        $this->form_validation->set_rules('email', 'email', 'trim|required|max_length[255]|is_valid_email');
        $this->form_validation->set_rules('message', 'message', 'trim|required|max_length[99999]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/adminpanel/contact_member/'. $this->input->post('user_id'));
        }

        // purify message content
        $this->load->helper('htmlpurifier');
        $clean_html = html_purify($this->input->post('message'), 'comment');

        $this->load->helper('send_email');
        $this->load->library('email', load_email_config(Settings_model::$db_config['email_protocol']));
        $this->email->from(Settings_model::$db_config['admin_email'], $_SERVER['HTTP_HOST']);
        $this->email->to($this->input->post('email'));
        $this->email->subject("Email from administrator:");

        if ($this->input->post('send_as_html') != "") {
            $this->email->set_mailtype("html");
        }else{
            $clean_html = strip_tags($clean_html);
        }

        $this->email->message($clean_html);

        if (!$this->email->send()) {
            $this->session->set_flashdata('error', 'could not send email');
        }else{
            $this->session->set_flashdata('success', $this->lang->line('contact_member_success'));
        }

        redirect('adminpanel/contact_member/'. $this->input->post('user_id'));
    }

}