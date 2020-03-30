<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		sudahlogin();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('tamplates/headerauth');
			$this->load->view('auth/index');
			$this->load->view('tamplates/footerauth');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if ($user['aktivasi'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					password salah!
		  			</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Email belum diaktivasi, silahkan cek email anda untuk aktivasi!
		  		</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Email belum terdaftar!
		  	</div>');
			redirect('auth');
		}
	}

	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|is_unique[user.nama]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$this->load->view('tamplates/headerauth');
			$this->load->view('auth/daftar');
			$this->load->view('tamplates/footerauth');
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'foto' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'level' => 2,
				'aktivasi' => 0,
				'waktubuat' => time()
			];

			//buat token
			$token = base64_encode(random_bytes(32));
			$datatoken = [
				'email' => $this->input->post('email'),
				'token' => $token,
				'waktubuat' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('token', $datatoken);

			//kirim email
			$this->_kirimemail($token, 'verify');

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Akun berhasil terdaftar, silahkan cek email untuk aktivasi!
		  	</div>');
			redirect('auth');
		}
	}

	private function _kirimemail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'idristifa2020@gmail.com',
			'smtp_pass' => 'ronaldo1604',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"

		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('idristifa2020@gmail.com', 'Belajar Codeigniter');
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') {
			$this->email->subject('Aktivasi akun');
			$this->email->message('Aktivasi akun anda <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">disini</a>');
		} else if ($type == 'lupapassword') {
			$this->email->subject('Reset password');
			$this->email->message('Reset password anda <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">disini</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$cekuser = $this->db->get_where('token', ['email' => $email])->row_array();

		if ($cekuser) {
			$cektoken = $this->db->get_where('token', ['token' => $token])->row_array();

			if ($cektoken) {
				if (time() - $cekuser['waktubuat'] < (60 * 60)) {
					$this->db->set('aktivasi', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('token', ['email' => $email]);

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Verifikasi Berhasil, silahkan login!
		  			</div>');
					redirect('auth');
				} else {
					$this->db->delete('token', ['email' => $this->input->post('email')]);
					$this->db->delete('user', ['email' => $this->input->post('email')]);


					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Verifikasi telah kadaluarsa, silahkan daftar kembali!
		  			</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Verifikasi gagal, token salah!
		  		</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Verifikasi gagal, email salah!
		  	</div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Anda berhasil Logout!
		  	</div>');
		redirect('auth');
	}

	public function lupapassword()
	{
		// sudahlogin();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('tamplates/headerauth');
			$this->load->view('auth/lupapassword');
			$this->load->view('tamplates/footerauth');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'aktivasi' => 1])->row_array();
			if ($user) {
				$token = base64_encode(random_bytes(32));
				$data = [
					'email' => $email,
					'token' => $token,
					'waktubuat' => time()
				];
				$this->db->insert('token', $data);

				//kirim email
				$this->_kirimemail($token, 'lupapassword');

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				silahkan cek email anda untuk mereset password!
		  		</div>');
				redirect('auth/lupapassword');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Email belum terdaftar atau teraktifasi.
		  		</div>');
				redirect('auth/lupapassword');
			}
		}
	}


	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$cek = $this->db->get_where('token', ['email' => $email, 'token' => $token])->row_array();
		if ($cek) {
			if (time() - $cek['waktubuat'] < (60 * 60)) {
				$this->session->set_userdata('email', $email);
				$this->ubahpassword();
			} else {
				$this->db->delete('token', ['email' => $email]);
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Url halaman telah kadaluarsa.
			  	</div>');
				redirect('auth/lupapassword');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Url halaman tidak valid.
			</div>');
			redirect('auth/lupapassword');
		}
	}

	public function ubahpassword()
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|trim|matches[konfirmasipassword]');
		$this->form_validation->set_rules('konfirmasipassword', 'Password', 'required|min_length[5]|trim|matches[password]');

		$email = $this->session->userdata('email');
		if ($email) {
			if ($this->form_validation->run() == false) {
				$this->load->view('tamplates/headerauth');
				$this->load->view('auth/resetpassword');
				$this->load->view('tamplates/footerauth');
			} else {
				$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$ubah = $this->db->update('user');
				if ($ubah) {
					$this->db->delete('token', ['email' => $email]);

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Password berhasil diubah.
				</div>');
					$this->session->unset_userdata('email');
					redirect('auth');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Password gagal diubah.
				</div>');
					$this->session->unset_userdata('email');
					redirect('auth/resetpassword');
				}
			}
		} else {
			redirect('auth');
		}
	}
}
