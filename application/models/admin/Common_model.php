<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{

    function insert_data1($data){
        $this->db->insert("tbl_coupons",$data);
    }
    function fetch_data1()
    {
        $query=$this->db->get("tbl_coupons");
        return $query;
    }
    function update1($id)
    {
         $data = array(
            'Status' => 'D',
        );
        //$this->db->set($data);
        $this->db->where('Id', $id);
        $this->db->update('tbl_coupons',$data);
    }
    function get_custom_query($query = '')
    {
        $query = $this->db->query($query);
        
        $result = $query->result(); 
		$result = $this->action_html_entity_decode($result);
        return $result;
    }
	
    function get_records($table = '', $where = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        
        $result = $query->result(); 
		$result = $this->action_html_entity_decode($result);
        return $result;
    }
	
    function get_record($table = '', $where = '', $column_name = '')
    {
        $this->db->select($column_name . " as column_name");
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        
        $result = $query->result();    
		$result = $this->action_html_entity_decode($result);		
        return $result[0]->column_name;
    }
	
    function insert($table = '', $info = '')
    {
		foreach($info as $key => $value)
		{
			$data[$key] = htmlentities($value);
		}
        $this->db->trans_start();
        $this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
        $this->db->trans_complete();
		
        return $insert_id;
    }
	
    function update($table = '', $info = '', $where = '')
    {
		foreach($info as $key => $value)
		{
			$data[$key] = htmlentities($value);
		}
        $this->db->where($where);
        $this->db->update($table, $data);
        
        return TRUE;
    }
    
    
    function delete_data($table = '', $where = '', $where2 ='')
    {

        $this->db->where('id',$where);
        $this->db->set('status','1');

        $this->db->update($table); 
        return TRUE;
    }

        function activate_data($table = '', $where = '', $where2 ='')
    {

        $this->db->where('id',$where);
        $this->db->set('status','0');

        $this->db->update($table); 
        return TRUE;
    }
       function update_status($table = '', $where = '', $where2 ='',$field='')
    {

        $this->db->where('id',$where);
        $this->db->set($field,$where2);

        $this->db->update($table); 
        return TRUE;
    }

	
    function delete_all($table = '')
    {
        $this->db->where('status = 0');
        $this->db->delete($table);
        
        return TRUE;
    }
	
    function get_section_name($seccode = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_sections');
        $this->db->where('section_code', $seccode);
        $query = $this->db->get();
        
        $result = $query->result();        
		$result = $this->action_html_entity_decode($result);
        return $result[0]->name;
    }
	
    function get_category_name($catid = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('id', $catid);
        $query = $this->db->get();
        
        $result = $query->result();
		$result = $this->action_html_entity_decode($result);
        return $result[0]->name;
    }
	
    function get_sub_category_name($scatid = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('id', $scatid);
        $query = $this->db->get();
        
        $result = $query->result(); 
		$result = $this->action_html_entity_decode($result);
        return $result[0]->name;
    }
	
    function get_child_category_name($ccatid = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_child_category');
        $this->db->where('id', $ccatid);
        $query = $this->db->get();
        
        $result = $query->result();       
		$result = $this->action_html_entity_decode($result);
        return $result[0]->name;
    }
	
	function action_html_entity_decode($result)
	{
		$count1 = sizeof($result);
		for($i = 0; $i < $count1; $i++)
		{
			foreach($result[$i] as $key => $val)
			{
				$result[$i]->$key = html_entity_decode($val);
			}
		}
		return $result;
	}
	
	function slugify($text)
	{
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
  function delete_data_status($table = '', $where = '', $where2 ='')
    {

        $this->db->where('id',$where);
        $this->db->set('status','1');

        $this->db->update($table); 
        return TRUE;
    }

    function custom_query($query)
    {
        $qu = $this->db->query($query);
		
		return $qu->result();
    }
    
  
}

  