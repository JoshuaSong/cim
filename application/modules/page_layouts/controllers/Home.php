<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
	
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
    }

    public function index() {
        redirect('page_layouts/left_menu_fluid');
        // makes use of the default_controller in config.php
        // but you can set a default controller for each module individually
    }
	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}
	function test()
	{
		$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

}

