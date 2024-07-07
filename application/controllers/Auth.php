<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	// dapat diakses semuanya
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// login
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'valid_email' => 'Your email is not valid!',
			'required' => 'Email must be filled in!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password must be filled in!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login to user account';

			$this->load->view('templates/header', $data);
			$this->load->view('auth/login1');
			$this->load->view('templates/footer', $data);
		} else {
			// validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// Jika usernya ada
		if ($user) {
			// Jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					redirect('user');
				} else {
					$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
					<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Info</span>
					<div>
					  <span class="font-medium">Wrong Password!</span>
					</div>
				  </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
				<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<span class="sr-only">Info</span>
				<div>
				  <span class="font-medium">Your account has not be activated!</span>
				</div>
			  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
			<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div>
			  <span class="font-medium">Your account is not registered!</span>
			</div>
		  	</div>');
			redirect('auth');
		}
	}

	// registration
	public function registration()
	{
		$this->load->helper('string');

		if ($this->session->userdata('email')) {
			redirect('user');
		}
		// FORM VALIDASI
		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Your name must be filled in!'
		]);
		$this->form_validation->set_rules('referral_code', 'Referral_code', 'trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'valid_email' => 'Your email is not valid!',
			'is_unique' => 'Your email has registered before!',
			'required' => 'Email must be filled in!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'The password is incorrect!',
			'min_length' => 'The password is too short!',
			'required' => 'Password must be filled in!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'required' => 'Password must be filled in!',
			'matches' => 'The password is incorrect!'
		]);
		// END FORM VALIDASI

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration user account';
			$this->load->view('templates/header', $data);
			$this->load->view('auth/registration1', $data);
			$this->load->view('templates/footer', $data);
		} else {
			// Register sukses
			$data = [
				'code_account' => random_string('numeric', 6),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'point' => 0,
				'referral_code' => htmlspecialchars($this->input->post('referral_code', true)),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->_referral();

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
			<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
			<span class="sr-only">Info</span>
			<div>
			  <span class="font-medium">Your account is successfully registered!</span>
			</div>
		  	</div>');
			redirect('auth');
		}
	}

	private function _referral()
	{
		$referral = $this->input->post('referral_code');

		// Jika Kode Referral Kosong
		if ($referral == "") {
		} else {

			$user = $this->db->get_where('user', ['code_account' => $referral])->row_array();

			// Jika usernya ada
			if ($user) {
				// Jika usernya aktif
				if ($user['is_active'] == 1) {
					// menambah point
					if ($user['code_account'] == $referral) {
						$data = [
							'point' => $user['point'] + 1
						];

						$this->db->where('code_account', $referral);
						$this->db->update('user', $data);
					} else {
						$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
						<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
						<span class="sr-only">Info</span>
						<div>
						  <span class="font-medium">Your referral code is incorrect!</span>
						</div>
					  </div>');
						redirect('auth/registration');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
					<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
					<span class="sr-only">Info</span>
					<div>
					  <span class="font-medium">The user code is not active!</span>
					</div>
					  </div>');
					redirect('auth/registration');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
				<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<span class="sr-only">Info</span>
				<div>
				  <span class="font-medium">Your referral code is incorrect!</span>
				</div>
				  </div>');
				redirect('auth/registration');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="flex p-4 mb-4 border border-slate-300 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
		<svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
		<span class="sr-only">Info</span>
		<div>
		  <span class="font-medium">Logout successfull!</span>
		</div>
	  </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title'] = 'Access Blocked';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('auth/blocked', $data);
		$this->load->view('templates/footer', $data);
	}
}
