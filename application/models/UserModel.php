<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

	public function getAllUser($filter = [])
	{
		$this->db->select("u.*, r.*");

		$this->db->from('user as u');
		$this->db->join('role as r', 'r.id_role = u.id_role');
		if (empty($filter['is_login'])) {
			$this->db->select("NULL as password", FALSE);
		}
		if (isset($filter['is_not_self'])) $this->db->where('u.id_user !=', $this->session->userdata('id_user'));
		if (isset($filter['username'])) $this->db->where('u.username', $filter['username']);
		if (isset($filter['id_user'])) $this->db->where('u.id_user', $filter['id_user']);
		if (isset($filter['except_roles'])) $this->db->where_not_in('u.id_role', $filter['except_roles']);
		if (isset($filter['just_roles'])) $this->db->where_in('u.id_role', $filter['just_roles']);
		if (!empty($filter['id_role'])) $this->db->where('u.id_role', $filter['id_role']);
		$res = $this->db->get();
		// var_dump($res->result_array());
		// die();
		return DataStructure::keyValue($res->result_array(), 'id_user');
	}


	public function getUser($idUser = NULL)
	{
		$row = $this->getAllUser(['id_user' => $idUser]);
		if (empty($row)) {
			throw new UserException("User yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return $row[$idUser];
	}

	public function cekUserByUsername($username = NULL)
	{
		$row = $this->getAllUser(['username' => $username, 'is_login' => TRUE]);
		if (!empty($row)) {
			throw new UserException("User yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
		}
	}

	public function cekUserByEmailBuyer($data)
	{
		$this->db->select("email");
		$this->db->from('buyer as u');
		$this->db->where('u.email', $data['email']);
		$res = $this->db->get();
		$row = $res->result_array();
		if (!empty($row)) {
			throw new UserException("Email yang kamu daftarkan sudah ada", USER_NOT_FOUND_CODE);
		}
	}

	public function getUserByUsername($username = NULL)
	{
		$row = $this->getAllUser(['username' => $username, 'is_login' => TRUE]);
		if (empty($row)) {
			throw new UserException("User yang kamu cari tidak ditemukan", USER_NOT_FOUND_CODE);
		}
		return array_values($row)[0];
	}

	public function login($loginData)
	{

		$user = $this->getUserByUsername($loginData['username']);
		if (md5($loginData['password']) !== $user['password'])
			throw new UserException("Password yang kamu masukkan salah.", WRONG_PASSWORD_CODE);
		return $user;
	}

	public function addUser($data)
	{
		$data['password'] = md5($data['password']);

		$this->db->insert('user', DataStructure::slice($data, [
			'username', 'nama', 'id_role', 'password'
		], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah User", "User");

		$id_user = $this->db->insert_id();

		// if ($data['id_role'] == 2) {
		// 	ini_set('date.timezone', 'Asia/Jakarta');
		// 	$date = date("Y-m-d h:i:s");
		// 	if (!empty($data['nama_perusahaan'])) $this->db->set('nama_perusahaan', $data['nama_perusahaan']);
		// 	if (!empty($data['alamat'])) $this->db->set('lok_perusahaan_full', $data['alamat']);

		// 	$this->db->insert('perusahaan', ['id_user' => $id_user, 'date_modified' => $date]);
		// 	ExceptionHandler::handleDBError($this->db->error(), "Tambah User", "Perusahaan");
		// }

		return $id_user;
	}

	public function addBuyer($data)
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		$data['date_modified'] = date("Y-m-d h:i:s");

		$this->db->insert('buyer', DataStructure::slice($data, [
			'id_user', 'nama_perusahaan', 'alamat', 'region', 'email', 'date_modified'
		], TRUE));
		ExceptionHandler::handleDBError($this->db->error(), "Tambah User", "User");

		$id_user = $this->db->insert_id();

		if ($data['id_role'] == 2) {
			ini_set('date.timezone', 'Asia/Jakarta');
			$date = date("Y-m-d h:i:s");
			$this->db->insert('perusahaan', ['id_user' => $id_user, 'date_modified' => $date]);
			ExceptionHandler::handleDBError($this->db->error(), "Tambah User", "Perusahaan");
		}
	}



	public function editUser($data)
	{
		if (!empty($data['password'])) $this->db->set('password', md5($data['password']));
		$this->db->set(DataStructure::slice($data, ['username', 'nama', 'id_role']));
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user');

		ExceptionHandler::handleDBError($this->db->error(), "Ubah User", "User");

		return $data['id_user'];
	}

	public function deleteUser($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user');

		ExceptionHandler::handleDBError($this->db->error(), "Hapus User", "User");
	}

	public function changePassword($data)
	{
		$idUser = $this->session->userdata('nama_role') == 'admin' ? $data['id_user'] : $this->session->userdata('id_user');
		$this->db->set('password', md5($data['password']));
		$this->db->where('id_user', $idUser);
		$this->db->update('user');
	}

	public function changeUsername($data)
	{
		$this->db->set('username', $data['username_new']);
		$this->db->where('username', $data['username']);
		$this->db->update('user');

		ExceptionHandler::handleDBError($this->db->error(), "Ganti Username", "User");
	}

	public function deleteBatch($ids)
	{
		$this->db->where_in('id_user', $ids);
		$this->db->delete('user');

		ExceptionHandler::handleDBError($this->db->error(), "Hapus User", "User");
	}
}
