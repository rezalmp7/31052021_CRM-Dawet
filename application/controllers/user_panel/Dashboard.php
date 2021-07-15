<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		
		if($this->session->userdata('dawet_status') != "user_login")
		{
			redirect(base_url('login/logout'));
		}

        $this->load->model('M_admin');
    }
	public function index()
	{
        $header['page'] = 'dashboard';
        $header['name_page'] = 'Dashboard';

        $id_pengguna = $this->session->userdata('dawet_id');
		// bar
		$where_menunggu = array('status' => 'menunggu', 'id_pelanggan' => $id_pengguna);
		$data['menunggu'] = $this->M_admin->select_where('transaksi', $where_menunggu)->num_rows();

		$where_proses = array('status' => 'proses', 'id_pelanggan' => $id_pengguna);
		$data['proses'] = $this->M_admin->select_where('transaksi', $where_proses)->num_rows();

		$where_selesai = array('status' => 'selesai', 'id_pelanggan' => $id_pengguna);
		$data['selesai'] = $this->M_admin->select_where('transaksi', $where_selesai)->num_rows();

		$where_daftar = array('id_pelanggan' => $id_pengguna );
		$pesanan = $this->M_admin->select_select_where_orderBy('*', 'transaksi', $where_daftar, 'status ASC')->result_array();
		$data['jumlah_pesanan'] = $this->M_admin->select_select_where_orderBy('*', 'transaksi', $where_daftar, 'status ASC')->num_rows();
		$data['pesanan'] = $pesanan;

		$produk_pesanan = array();
		foreach ($pesanan as $a) {
			$id = $a['id'];
			$select_where = array('id_transaksi' => $a['id'], );
			$produk_pesanan[$id] = $this->M_admin->select_select_where_join_2table_type('pesanan.id, produk.nama, produk.harga, pesanan.qty', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $select_where, 'left')->result_array();
		}

		$data['produk_pesanan'] = $produk_pesanan;


		$data['jml_pelanggan'] = $this->M_admin->select_all('pelanggan')->num_rows();


        $this->load->view('layout/header', $header);
		$this->load->view('user_panel/dashboard', $data);
        $this->load->view('layout/footer');
	}
}
