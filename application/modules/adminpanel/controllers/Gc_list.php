<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gc_list extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        // pre-load
        $this->load->database();
        $this->load->helper('url');
      $this->load->library('grocery_CRUD');
    }

    /**
     *
     * index: main function with search and pagination built into it
     *
     * @param int|string $order_by order by this data column
     * @param string $sort_order asc or desc
     * @param string $search search type, used in index to determine what to display
     * @param int $offset the offset to be used for selecting data
     */

    public function index() {

       $crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('customers');
			

			$output = $crud->render();

			$this->_example_output($output);

  

	}
	function test()
	{
		$crud = new grocery_CRUD();
		 $crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			
			$crud->set_subject('Customer');
		

			$output = $crud->render();

			$this->_example_output($output);
	}
	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}
	 public function dashboard(){

      $crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('user');
			$crud->columns('username','email');

			$output = $crud->render();
	  

        $this->quick_page_setup(
            $this->_theme,
            $this->_layout,
            $this->lang->line('dashboard_title'),
            'test',
            $this->_header,
            $this->_footer,
            '',
           $output);
    }
}