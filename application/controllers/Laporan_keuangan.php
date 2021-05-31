<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_keuangan extends CI_Controller {

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
	 * @see https://codeigniter.com/laporan_laporan_keuangan_guide/general/urls.html
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
        $header['page'] = 'laporan_keuangan';
        $header['name_page'] = 'Laporan Keuangan';

		$where_selesai = array('transaksi.status' => 'selesai', );
        $data['transaksi'] = $this->M_admin->select_select_where_join_2table_type_orderBy('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.done_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where_selesai, 'left', 'transaksi.create_at ASC, transaksi.status DESC')->result_array();

		if($data['transaksi'] != null)
        {
            foreach ($data['transaksi'] as $a) {
                $id_transaksi = $a['id'];
                $where_pesanan = array('pesanan.id_transaksi' => $id_transaksi, );
                $data['pesanan'][$id_transaksi] = $this->M_admin->select_select_where_join_2table_type('pesanan.id_transaksi, pesanan.qty, produk.id, produk.nama as nama_produk, produk.harga as harga_produk', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $where_pesanan, 'left')->result_array();
            }
        }

        $this->load->view('layout/header', $header);
		$this->load->view('laporan_keuangan', $data);
        $this->load->view('layout/footer');
	}
	public function cetak()
	{
		$post = $this->input->post();

		
		$dateFirst = $post['tanggal_awal'];
		$dateSecond = $post['tanggal_akhir'];

		$data['tgl_awal'] = $dateFirst;
		$data['tgl_akhir'] = $dateSecond;

		$where_selesai = 'transaksi.status = "selesai" AND transaksi.done_at';
        $data['transaksi'] = $this->M_admin->select_select_join_2table_wherebeetween2('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.done_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where_selesai, $dateFirst, $dateSecond)->result_array();

		if($data['transaksi'] != null)
        {
            foreach ($data['transaksi'] as $a) {
                $id_transaksi = $a['id'];
                $where_pesanan = array('pesanan.id_transaksi' => $id_transaksi, );
                $data['pesanan'][$id_transaksi] = $this->M_admin->select_select_where_join_2table_type('pesanan.id_transaksi, pesanan.qty, produk.id, produk.nama as nama_produk, produk.harga as harga_produk', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $where_pesanan, 'left')->result_array();
            }
        }

		$this->load->view('cetak_laporan_keuangan', $data);
	}
}
