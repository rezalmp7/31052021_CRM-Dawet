<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
	 * @see https://codeigniter.com/pelanggan_guide/general/urls.html
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
        $header['page'] = 'pelanggan';
        $header['name_page'] = 'Pelanggan';

        $data['pelanggan'] = $this->M_admin->select_all('pelanggan')->result_array();

        if($data['pelanggan'] != null)
        {
            foreach($data['pelanggan'] as $a) {
                $id = $a['id'];
                $where_jml_transaksi = array('id_pelanggan' => $id, );
                $data['jml_transaksi'][$id] = $this->M_admin->select_where('transaksi', $where_jml_transaksi)->num_rows();
            }
        }

        $this->load->view('layout/header', $header);
		$this->load->view('pelanggan', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'pelanggan';
        $header['name_page'] = 'Tambah Pelanggan';

        $max_id = $this->M_admin->select_select('max(id) as max_id', 'pelanggan')->row_array();

        if($max_id['max_id'] != null)
        {
            $data['id'] = $max_id['max_id']+1   ;
        }
        else {
            $data['id'] = 1;
        }

        $this->load->view('layout/header', $header);
        $this->load->view('pelanggan_tambah', $data);
        $this->load->view('layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $password = md5($post['password']);

        $data = array(
            'id' => $post['id'],
            'nama' => $post['nama'], 
            'username' => $post['username'],
            'password' => $password,
            'no_telp' => $post['no_telp'], 
            'alamat' => $post['alamat'], 
        );

        $this->M_admin->insert_data('pelanggan', $data);

        redirect(base_url('pelanggan'));

    }
    public function edit()
    {
        $header['page'] = 'pelanggan';
        $header['name_page'] = 'Edit Pelanggan';

        $get = $this->input->get();

        $where = array('id' => $get['id'], );

        $data['pelanggan'] = $this->M_admin->select_where('pelanggan', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('pelanggan_edit', $data);
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
            'no_telp' => $post['no_telp'], 
            'alamat' => $post['alamat'], 
        );

        $this->M_admin->update_data('pelanggan', $set, $where);

        redirect(base_url('pelanggan'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );
        $where_pesanan = array('id_pelanggan' => $get['id'], );
        
        $this->M_admin->delete_data('pelanggan', $where);
        $this->M_admin->delete_data('pesanan', $where_pesanan);

        redirect(base_url('pelanggan'));
    }
}
