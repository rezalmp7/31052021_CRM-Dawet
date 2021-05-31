<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

		if($this->session->userdata('dawet_status') != "dawet_login")
		{
			redirect(base_url('login/logout'));
		}

        $this->load->model('M_admin');
    }
	public function index()
	{
        $header['page'] = 'user';
        $header['name_page'] = 'User';

        $data['user'] = $this->M_admin->select_all('user')->result();

        $this->load->view('layout/header', $header);
		$this->load->view('user', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'user';
        $header['name_page'] = 'Tambah User';

        $this->load->view('layout/header', $header);
        $this->load->view('user_tambah');
        $this->load->view('layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $password = md5($post['password']);

        $create_at = date('Y-m-d H:i:s');

        $data = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => $password,
            'level' => $post['level'],
            'create_at' => $create_at
        );

        $this->M_admin->insert_data('user', $data);

        redirect(base_url('user'));
    }
    public function edit()
    {
        $header['page'] = 'user';
        $header['name_page'] = 'Edit User';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['user'] = $this->M_admin->select_where('user', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('user_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        if($post['password'] != null)
        {
            $password = md5($post['password']);
        }
        else {
            $password = $post['password_lama'];
        }

        $where = array('id' => $post['id'], );

        $set = array(
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => $password,
            'level' => $post['level'],
        );

        $this->M_admin->update_data('user', $set, $where);

        redirect(base_url('user'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $this->M_admin->delete_data('user', $where);

        redirect(base_url('user'));
    }
}
