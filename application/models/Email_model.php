<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class Email_model extends CI_Model
{









	function contact_us($id)
	{
		$to_email = $this->get_record("tbl_general_settings", "option_name = 'system_mail'", "value");
		$to_sms = $this->get_record("tbl_general_settings", "option_name = 'system_phone'", "value");
		
		$subject = "Someone Contacted You - Mimaas.in";
		
		$name = $this->get_record("tbl_contact_form", "id = '$id'", "name");
		$email = $this->get_record("tbl_contact_form", "id = '$id'", "email");
		$phone = $this->get_record("tbl_contact_form", "id = '$id'", "phone_number");
		$subject = $this->get_record("tbl_contact_form", "id = '$id'", "subject");
		$message = $this->get_record("tbl_contact_form", "id = '$id'", "message");
		
		$msg_sms = "Someone Contacted You \n Name: $name \n Email: $email \n Mobile: $phone \n Subject: $subject \n Message: $message";
		
		$msg_email = "
			Someone Contacted You - <a href='" . base_url() . "'>mimaas.in</a>\r\n
			Name: $name\r\n
			Email: $email\r\n
			Mobile: $phone\r\n
			Subject: $subject\r\n
			Message: $message\r\n
			<a href='" . base_url() . "admin'>Login mimaas admin account.</a>
		";
		
		$this->send_sms($to_sms, $msg_sms);
		//$this->send_mail($to_email, $subject, $msg_email);
	}








	
	function new_seller_register($seller_id)
	{
		$to_email = $this->get_record("tbl_general_settings", "option_name = 'system_mail'", "value");
		$to_sms = $this->get_record("tbl_general_settings", "option_name = 'system_phone'", "value");
		
		$subject = "New Seller Registered - Mimaas.in";
		
		$user_id = $this->get_record("tbl_sellers", "seller_id = '$seller_id'", "user_id");
		
		$name = $this->get_record("tbl_general_users", "id = '$user_id'", "first_name") . " " . $this->get_record("tbl_general_users", "id = '$user_id'", "first_name");
		$email = $this->get_record("tbl_general_users", "id = '$user_id'", "email");
		$phone = $this->get_record("tbl_general_users", "id = '$user_id'", "phone_number");
		
		$msg_sms = "New Seller Registered \n Name: $name \n Email: $email \n Mobile: $phone";
		
		$msg_email = "
			New Seller Registered - <a href='" . base_url() . "'>mimaas.in</a>\r\n
			Name: $name\r\n
			Email: $email\r\n
			Mobile: $phone\r\n
			<a href='" . base_url() . "admin'>Login mimaas admin account.</a>
		";
		
		$this->send_sms($to_sms, $msg_sms);
		//$this->send_mail($to_email, $subject, $msg_email);
	}
	
	function new_product($product_id)
	{
		$to_email = $this->get_record("tbl_general_settings", "option_name = 'system_mail'", "value");
		$to_sms = $this->get_record("tbl_general_settings", "option_name = 'system_phone'", "value");
		
		$subject = "New product has been uploaded in our system - Mimaas.in";
		
		$name = $this->get_record("tbl_product", "id = '$product_id'", "name");
		$store_id = $this->get_record("tbl_product", "id = '$product_id'", "store_id");
		
		$msg_sms = "New product has been uploaded in our system \n Name: $name \n Store ID: $store_id";
		
		$msg_email = "
			New product has been uploaded in our system - <a href='" . base_url() . "'>mimaas.in</a>\r\n
			Name: $name\r\n
			Store ID: $store_id\r\n
			<a href='" . base_url() . "admin'>Login mimaas admin account.</a>
		";
		
		$this->send_sms($to_sms, $msg_sms);
		//$this->send_mail($to_email, $subject, $msg_email);
	}
	
	function new_quote_request($info)
	{
		//$to_email = $this->get_record("tbl_general_settings", "option_name = 'system_mail'", "value");
		$to_sms = $info['phone_number'];
		
		$subject = "New Quote Request - Mimaas.in";
		
		$product_name = $this->get_record("tbl_product", "id = '" . $info['product_id'] . "'", "name");
		$store_id = $this->get_record("tbl_product", "id = '" . $info['product_id'] . "'", "store_id");
		$user_id = $this->get_record("tbl_sellers", "store_id = '" . $store_id . "'", "user_id");
		$to_sms_user = $this->get_record("tbl_general_users", "id = '" . $user_id . "'", "phone_number");
		
		$msg_sms_user = "New Quote Request \n Product Name: " . $product_name . " \n Name: " . $info['name'] . " \n Notes: " . $info['notes'] . " \n Quantity: " . $info['quantity'];
		
		$msg_sms = "We have received your enquiry. Our representative will get in touch with you shortly.";
		
		$msg_email = "
			New Quote Request - <a href='" . base_url() . "'>mimaas.in</a>\r\n
			Product Name: " . $product_name . " \r\n 
			Name: " . $info['name'] . " \r\n 
			Notes: " . $info['notes'] . " \r\n 
			Quantity: " . $info['quantity'] . "\r\n
			<a href='" . base_url() . "admin'>Login mimaas admin account.</a>
		";
		
		$this->send_sms($to_sms, $msg_sms);
		$this->send_sms($to_sms_user, $msg_sms_user);
		//$this->send_mail($to_email, $subject, $msg_email);
	}
	
	function send_mail($to, $subject, $msg)
	{
		$from = "no-reply@meraenglish.in";
		$cc = "";
		$to = $to;
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$headers .= "From: " . $from . "\r\n" .
		"CC: " . $cc;
			
		mail($to,$subject,$msg,$headers);
	}
	
	public function send_sms($numbers, $message)
	{
		$message = urlencode($message);
		
		$access_token = $this->get_record("tbl_general_settings", "option_name = 'sms_token'", "value");
		$sender_id = $this->get_record("tbl_general_settings", "option_name = 'sms_sender_id'", "value");
		
		$data = "access_token=" . $access_token . "&message=" . $message . "&sender=" . $sender_id . "&to=" . $numbers . "&service=T";
		$ch = curl_init('http://sms.messagewall.in/api/v2/sms/send?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
	}
	
    function get_record($table = '', $where = '', $column_name = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        
        $result = $query->result();     

		$result = $this->action_html_entity_decode($result);
		
        return $result[0]->$column_name;
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
}