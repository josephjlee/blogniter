<?php

function is_logged_in()
{
	$ci = get_instance();

	$email = $ci->session->userdata('email');

	if ($email)
	{
			show_relevant_menu();
	}
	else
	{
			redirect('auth');
	}
}

function show_relevant_menu()
{
		$ci = get_instance();

		$role_id = $ci->session->userdata('role_id');

		$menu = $ci->db->get_where( 'menu_group', ['title' => $ci->uri->segment(1)] )->row_array();
		$menu_id = $menu['id'];

		$user_access = $ci->db->get_where('user_access_menu', [
			'role_id' => $role_id,
			'menu_id'	=> $menu_id
		]);

		if ($user_access->num_rows() < 1)
		{
			redirect('auth/blocked');
		}
}

function has_post_access()
{
		$ci = get_instance();

		$email = $ci->session->userdata('email');

		$user = $ci->db->get_where( 'users', ['email' => $email] )->row_array();
		$user_id = $user['id'];

		$post_access = $ci->db->get_where( 'posts', [
				'user_id' => $user_id,
				'id'			=> $ci->uri->segment(3)
		]);
		
		if ($post_access->num_rows() < 1)
		{
				redirect('auth/blocked');
		}
}

function print_debugger($data)
{
	echo '<pre>';
		print_r($data);
	echo '</pre>';
		
	die;
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$access = $ci->db->get_where('user_access_menu', [
		'role_id'	=> $role_id,
		'menu_id'	=> $menu_id
	]);

	if ($access->num_rows() > 0)
	{
		return "checked='checked'";
	}
}