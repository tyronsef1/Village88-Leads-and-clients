<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {
    function get_reports()
    {
        return $this->db->query("SELECT * FROM customers")->result_array();
    }

    function update_reports($date)
    {
        $query = "SELECT first_name, last_name, DATE_FORMAT(created_at, '%Y/%m/%d') AS created_at, num_leads FROM customers WHERE created_at BETWEEN ? AND ?";
        $values = array($date['from'], $date['to']);
        return $this->db->query($query, $values)->result_array();
    }
}
