<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function index()
	{
		$this->load->model('Report_model');
		$view_data['customers'] = $this->Report_model->get_reports();
		$this->load->view('reports/index.php', $view_data);
	}
	public function update()
	{
		$this->load->model('Report_model');
		$date = array(
            'to' => $this->input->post('to', TRUE),
            'from' => $this->input->post('from', TRUE)
        );
		$view_data['customers'] = $this->Report_model->update_reports($date); 
		$this->load->view('reports/index.php', $view_data);
	}
}
