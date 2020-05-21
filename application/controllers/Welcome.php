<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){

     parent::__construct();

     // Load model
     $this->load->model('Student');
     $this->load->library('upload');
  }
	public function index()
	{
		$model = $this->load->model('Student');
		$data['list']  = $this->Student->getData();
		$this->load->view("list",$data);
	}
	public function add()
	{
		$this->load->view("add");
	}
	public function save()
	{
		//print_r($this->input->post());
		 		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'txt|pdf';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $data = array();
                $file_name = "";

                if ( $this->upload->do_upload('emp_cv'))
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];
                }

                $save_data = array(
                	'name' => $this->input->post('emp_name'),
                	'age'  => $this->input->post('emp_age'),
                	'date_of_birth' => $this->input->post('emp_dob'),
                	'cv' =>"$file_name"
                );
                $this->Student->save($save_data);
        	redirect('/Welcome/index', 'refresh');

	}
	public function download($fileName = NULL) {   
   		if ($fileName) {
    		$this->load->helper('download');
    		// read file contents
			$data = file_get_contents(base_url('/uploads/'.$fileName));
    		force_download($fileName, $data);
   		}
	}
	public function delete($value)
	{
		$this->Student->delete($value);
		redirect('/Welcome/index', 'refresh');
		
	}
	public function edit($value)
	{
		$data['list']  = $this->Student->getEdit($value);
		$this->load->view("edit",$data);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'txt|pdf|docx';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $data = array();
                $file_name = "";

                if ( $this->upload->do_upload('emp_cv'))
                {
                        $data = array('upload_data' => $this->upload->data());
                        $file_name = $data['upload_data']['file_name'];
                }

                $save_data = array(
                	'name' => $this->input->post('emp_name'),
                	'age'  => $this->input->post('emp_age'),
                	'date_of_birth' => $this->input->post('emp_dob')

                );
               // echo $file_name;die;
                if(!empty($file_name)) $save_data['cv']=$file_name;
                // print_r($save_data);die;
                $this->Student->update($save_data,$id);
        	redirect('/Welcome/index', 'refresh');
	}
}
