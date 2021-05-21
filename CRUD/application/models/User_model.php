<?php

/**
 * 
 */
class User_model extends CI_model
{	
	function create($formArray)
	{
		$this->db->insert('users',$formArray);//INSERT INTO users(users is a table name) (name,email) values(?,?);
	}

	function all()
	{
		//all user data fetch in list page
		return $users=$this->db->get('users')->result_array();//SELECT * from users
	}

	function getUser($userId)
	{
		$this->db->where('user_id',$userId);
		return $user=$this->db->get('users')->row_array();//select * from users where user_id =?
	}

	function updateUser($userId,$formArray)
	{
		$this->db->where('user_id',$userId);
		$this->db->update('users',$formArray);//Update user SET name=?,email=? where user_id=?
	}

	function deleteUser($userId)
	{
		$this->db->where('user_id',$userId);
		$this->db->deleteUser('users');//DELETE from users where user_id=?
	}
}

?>