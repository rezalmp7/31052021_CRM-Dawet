<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_admin');
    }
	public function index()
	{
		$this->load->view('login');
	}
    function login_aksi()
    {
        $post = $this->input->post();

        $password = md5($post['password']);

        $where_cek = array(
            'username' => $post['username'],
            'password' => $password 
        );

        $sql = $this->M_admin->select_where('user', $where_cek);

        $cek_num = $sql->num_rows();
        $cek_row = $sql->row_array();

        if($cek_num > 0)
        {

            $data_session = array(
					'dawet_status' => "dawet_login",
					'dawet_nama' => $cek_row['nama'],
					'dawet_id' => $cek_row['id'],
                    'dawet_username' => $cek_row['username'],
                    'dawet_level' => $cek_row['level']
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('dashboard'));
        }
        else {
            redirect(base_url('login?error=Username dan Password tidak ditemukan'));
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
