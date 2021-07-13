<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

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
	 * @see https://codeigniter.com/pesanan_guide/general/urls.html
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
        $header['page'] = 'pesanan';
        $header['name_page'] = 'Pesanan';

        $data['pesanan'] = array();
        $data['transaksi'] = $this->M_admin->select_select_join_2table_type_orderBy('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.harga, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', 'left', 'transaksi.create_at ASC, transaksi.status DESC')->result_array();

        if($data['transaksi'] != null)
        {
            foreach ($data['transaksi'] as $a) {
                $id_transaksi = $a['id'];
                $where_pesanan = array('pesanan.id_transaksi' => $id_transaksi, );
                $data['pesanan'][$id_transaksi] = $this->M_admin->select_select_where_join_2table_type('pesanan.id_transaksi, pesanan.qty, produk.id, produk.nama as nama_produk, produk.harga as harga_produk', 'pesanan', 'produk', 'pesanan.id_produk = produk.id', $where_pesanan, 'left')->result_array();
            }
        }

        $where_menunggu = array('transaksi.status' => 'menunggu', );
        $data['transaksi_menunggu'] = $this->M_admin->select_select_where_join_2table_type_orderBy('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where_menunggu, 'left', 'transaksi.create_at ASC, transaksi.status DESC')->result_array();

        
        $where_proses = array('transaksi.status' => 'proses', );
        $data['transaksi_proses'] = $this->M_admin->select_select_where_join_2table_type_orderBy('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where_proses, 'left', 'transaksi.create_at ASC, transaksi.status DESC')->result_array();

        
        $where_selesai = array('transaksi.status' => 'selesai', );
        $data['transaksi_selesai'] = $this->M_admin->select_select_where_join_2table_type_orderBy('transaksi.id, pelanggan.nama as nama_pelanggan, pelanggan.no_telp as no_telp_pelanggan, pelanggan.alamat as alamat_pelanggan, transaksi.disc, transaksi.total, transaksi.create_at, transaksi.pesanan_tgl, transaksi.status', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where_selesai, 'left', 'transaksi.create_at ASC, transaksi.status DESC')->result_array();

        $this->load->view('layout/header', $header);
		$this->load->view('pesanan', $data);
        $this->load->view('layout/footer');
	}
    public function tambah()
    {
        $header['page'] = 'pesanan';
        $header['name_page'] = 'Tambah Pesanan';

        $data['pelanggan'] = $this->M_admin->select_all('pelanggan')->result();
        $data['produk'] = $this->M_admin->select_all('produk')->result();

        // ID Pelanggan
        $max_id_pelanggan = $this->M_admin->select_select('max(id) as max_id', 'pelanggan')->row_array();

        if($max_id_pelanggan['max_id'] != null)
        {
            $data['id_pelanggan'] = $max_id_pelanggan['max_id']+1;
        }
        else {
            $data['id_pelanggan'] = 1;
        }

        // ID Transaksi
        $max_id_transaksi = $this->M_admin->select_select('max(id) as max_id', 'transaksi')->row_array();
        
        if($max_id_transaksi['max_id'] != null)
        {
            $data['id_transaksi'] = $max_id_transaksi['max_id']+1;
        }
        else {
            $data['id_transaksi'] = 1;
        }

        $this->load->view('layout/header', $header);
        $this->load->view('pesanan_tambah', $data);
        $this->load->view('layout/footer');
    }
    function tambah_aksi()
    {
        $post = $this->input->post();

        $date_now = date('Y-m-d H:i:s');

        if($post['pelanggan'] != 'tambah_pelanggan')
        {
            $where_select_pelanggan = array(
                'id' => $post['pelanggan'], 
            );
            $select_pelanggan = $this->M_admin->select_where('pelanggan', $where_select_pelanggan)->row_array();

            $total_produk = 0;
            $i = 0;
            foreach ($post['produk'] as $a) {
                $where_harga_produk = array('id' => $a, );
                $harga_produk = $this->M_admin->select_where('produk', $where_harga_produk)->row_array();
                $total_produk = $total_produk+($harga_produk['harga']*$post['qty'][$i]);
                $i++;
            }
            
            $total = $total_produk-($total_produk*$post['discount']/100);

            $data_transaksi = array(
                'id' => $post['id'],
                'id_pelanggan' => $post['pelanggan'],
                'harga' => $total_produk,
                'disc' => $post['discount'],
                'total' => $total,
                'status' => 'menunggu',
                'pesanan_tgl' => $post['tgl_pesanan'],
                'create_at' => $date_now,
                'proses_at' => null,
                'done_at' => null
            );
            $data_pesanan = array();
            
            $j=0;
            foreach ($post['produk'] as $b) {
                $data_pesanan[] = array(
                    'id_transaksi' => $post['id'], 
                    'id_produk' => $b,
                    'qty' => $post['qty'][$j], 
                );
                $j++;
            }

            $this->M_admin->insert_data('transaksi', $data_transaksi);
            $this->M_admin->insertBatch('pesanan', $data_pesanan);
            
            redirect(base_url('pesanan'));
        }
        else {
            $password = md5($post['password']);
            $data_pelanggan = array(
                'id' => $post['id_pelanggan'],
                'nama' => $post['nama_pelanggan'],
                'username' => $post['username'],
                'password' => $password,
                'no_telp' => $post['no_telp_pelanggan'],
                'alamat' => $post['alamat_pelanggan'],
            );

            $total_produk = 0;
            $i = 0;
            foreach ($post['produk'] as $a) {
                $where_harga_produk = array('id' => $a, );
                $harga_produk = $this->M_admin->select_where('produk', $where_harga_produk)->row_array();
                $total_produk = $total_produk+($harga_produk['harga']*$post['qty'][$i]);
                $i++;
            }

            $total = $total_produk-($total_produk*$post['discount']/100);

            $data_transaksi = array(
                'id' => $post['id'],
                'id_pelanggan' => $post['id_pelanggan'],
                'harga' => $total_produk,
                'disc' => $post['discount'],
                'total' => $total,
                'status' => 'menunggu',
                'pesanan_tgl' => $post['tgl_pesanan'],
                'create_at' => $date_now,
                'proses_at' => null,
                'done_at' => null
            );
            $data_pesanan = array();
            
            $j=0;
            foreach ($post['produk'] as $b) {
                $data_pesanan[] = array(
                    'id_transaksi' => $post['id'], 
                    'id_produk' => $b,
                    'qty' => $post['qty'][$j], 
                );
                $j++;
            }

            $this->M_admin->insert_data('pelanggan', $data_pelanggan);
            $this->M_admin->insert_data('transaksi', $data_transaksi);
            $this->M_admin->insertBatch('pesanan', $data_pesanan);

            redirect(base_url('pesanan'));
        }
    }
    function proses()
    {
        $get = $this->input->get();

        $date_now = date('Y-m-d H:i:s');

        $where = array('id' => $get['id'], );
        $set = array(
            'status' => 'proses',
            'proses_at' => $date_now 
        );

        $this->M_admin->update_data('transaksi', $set, $where);
        redirect(base_url('pesanan'));
    }
    function selesai()
    {
        $get = $this->input->get();
        $date_now = date('Y-m-d H:i:s');

        $where = array('id' => $get['id'], );
        $set = array(
            'status' => 'selesai', 
            'done_at' => $date_now
        );

        $this->M_admin->update_data('transaksi', $set, $where);
        
        redirect(base_url('pesanan'));
    }
    public function info()
    {
        $header['page'] = 'pesanan';
        $header['name_page'] = 'Info Pesanan';

        $get = $this->input->get();

        $where = array('transaksi.id' => $get['id'], );
        $data['transaksi'] = $this->M_admin->select_select_where_join_2table_type('transaksi.id, transaksi.status, transaksi.disc, transaksi.pesanan_tgl, transaksi.create_at, transaksi.proses_at, transaksi.done_at, pelanggan.nama, pelanggan.no_telp, pelanggan.alamat', 'transaksi', 'pelanggan', 'transaksi.id_pelanggan=pelanggan.id', $where, 'left')->row();

        $where_pesanan = array('pesanan.id_transaksi' => $get['id'], );
        $data['pesanan'] = $this->M_admin->select_select_where_join_2table_type('pesanan.id, pesanan.qty, produk.nama, produk.harga', 'pesanan', 'produk', 'pesanan.id_produk=produk.id', $where_pesanan, 'left')->result();

        $this->load->view('layout/header', $header);
        $this->load->view('pesanan_info', $data);
        $this->load->view('layout/footer');
    }
    public function edit()
    {
        $header['page'] = 'pesanan';
        $header['name_page'] = 'Edit Pesanan';

        // ID Pelanggan
        $max_id_pelanggan = $this->M_admin->select_select('max(id) as max_id', 'pelanggan')->row_array();

        if($max_id_pelanggan['max_id'] != null)
        {
            $data['id_pelanggan'] = $max_id_pelanggan['max_id']+1;
        }
        else {
            $data['id_pelanggan'] = 1;
        }

        $get = $this->input->get();

        $data['pelanggan'] = $this->M_admin->select_select('id, nama', 'pelanggan')->result();
        $data['produk'] = $this->M_admin->select_all('produk')->result();

        $where_transaksi = array('transaksi.id' => $get['id'], );
        $data['transaksi'] = $this->M_admin->select_where('transaksi', $where_transaksi)->row();
        $where_pesanan = array('id_transaksi' => $get['id']);
        $data['pesanan'] = $this->M_admin->select_where('pesanan', $where_pesanan)->result();

        $this->load->view('layout/header', $header);
        $this->load->view('pesanan_edit', $data);
        $this->load->view('layout/footer');
    }
    function edit_aksi()
    {
        $post = $this->input->post();

        $where_hapus_pesanan = array('id_transaksi' => $post['id'], );

        $this->M_admin->delete_data('pesanan', $where_hapus_pesanan);

        $total_produk = 0;
        $i = 0;
        foreach ($post['produk'] as $a) {
            $where_harga_produk = array('id' => $a, );
            $harga_produk = $this->M_admin->select_where('produk', $where_harga_produk)->row_array();
            $total_produk = $total_produk+($harga_produk['harga']*$post['qty'][$i]);
            $i++;
        }

        $where_pelanggan = array('id' => $post['pelanggan'], );

        $total = $total_produk-($total_produk*$post['discount']/100);

        $where_transaksi = array(
            'id' => $post['id'], 
        );
        
        $set_transaksi = array(
            'id_pelanggan' => $post['pelanggan'],
            'harga' => $total_produk,
            'disc' => $post['discount'],
            'total' => $total,
            'status' => 'menunggu',
            'pesanan_tgl' => $post['tgl_pesanan'],
            'proses_at' => null,
            'done_at' => null
        );

        $data_pesanan = array();
            
        $j=0;
        foreach ($post['produk'] as $b) {
            $data_pesanan[] = array(
                'id_transaksi' => $post['id'], 
                'id_produk' => $b,
                 'qty' => $post['qty'][$j], 
             );
            $j++;
        }

        
        $this->M_admin->update_data('transaksi', $set_transaksi, $where_transaksi);
        $this->M_admin->insertBatch('pesanan', $data_pesanan);

        redirect(base_url('pesanan'));
    }
    function hapus_produk()
    {
        $get = $this->input->get();

        $where = array(
            'id' => $get['id']
        );

        $this->M_admin->delete_data('pesanan', $where);

        redirect(base_url('pesanan/edit?id='.$get['id_transaksi']));
    }
    function hapus()
    {
        $get = $this->input->get();

        $where_transaksi = array('id' => $get['id'], );
        $where_pesanan = array('id_transaksi' => $get['id'], );

        $this->M_admin->delete_data('pesanan', $where_pesanan);
        $this->M_admin->delete_data('transaksi', $where_transaksi);

        redirect(base_url('pesanan'));
    }
}
