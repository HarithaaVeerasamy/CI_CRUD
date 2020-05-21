<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Student extends CI_Model
{
	function getData()
	{
		$response = array();
 
    // Select record
    $this->db->select('*');
    $q = $this->db->get('codeigniter_crud');
    $response = $q->result_array();

    return $response;
	}
	public function save($value)
	{
		if(!empty($value)){
			$this->db->insert('codeigniter_crud',$value);
		}
	}
	public function delete($value)
	{
		$this->db->query("delete  from codeigniter_crud where id='".$value."'");
	}
	public function getEdit($value)
	{
		$response = array();
 
    // Select record
    $this->db->select('*');
    $this->db->where('id',$value);
    $q = $this->db->get('codeigniter_crud');
    $response = $q->result_array();

    return $response;
	}
	public function update($value,$id)
	{
		$this->db->where('id', $id);
        $this->db->update('codeigniter_crud', $value);
	}
}