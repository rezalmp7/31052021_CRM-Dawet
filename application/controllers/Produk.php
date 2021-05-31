<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
	 * @see https://codeigniter.com/produk_guide/general/urls.html
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
        $header['page'] = 'produk';
        $header['name_page'] = 'Produk';

        $data['produk'] = $this->M_admin->select_all('produk')->result();

        $this->load->view('layout/header', $header);
		$this->load->view('produk', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'produk';
        $header['name_page'] = 'Tambah Produk';

        $this->load->view('layout/header', $header);
        $this->load->view('produk_tambah');
        $this->load->view('layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'], 
            'harga' => $post['harga'], 
        );

        $this->M_admin->insert_data('produk', $data);

        redirect(base_url('produk'));
    }
    public function edit()
    {
        $header['page'] = 'produk';
        $header['name_page'] = 'Edit Produk';

        $get = $this->input->get();
        
        $where = array('id' => $get['id'], );
        $data['produk'] = $this->M_admin->select_where('produk', $where)->row();

        $this->load->view('layout/header', $header);
        $this->load->view('produk_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where = array('id' => $post['id'], );

        $set = array(
            'nama' => $post['nama'],
            'harga' => $post['harga'] 
        );

        $this->M_admin->update_data('produk', $set, $where);

        redirect(base_url('produk'));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where = array('id' => $get['id'], );
        $where_pesanan = array('id_produk' => $get['id'], );

        $this->M_admin->delete_data('pesanan', $where_pesanan);
        $this->M_admin->delete_data('produk', $where);

        redirect(base_url('produk'));
    }
}
