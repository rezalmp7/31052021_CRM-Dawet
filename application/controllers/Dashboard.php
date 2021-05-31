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
		
		if($this->session->userdata('dawet_status') != "dawet_login")
		{
			redirect(base_url('login/logout'));
		}

        $this->load->model('M_admin');
    }
	public function index()
	{
        $header['page'] = 'dashboard';
        $header['name_page'] = 'Dashboard';

		// bar
		$where_menunggu = array('status' => 'menunggu', );
		$data['menunggu'] = $this->M_admin->select_where('transaksi', $where_menunggu)->num_rows();

		$where_proses = array('status' => 'proses', );
		$data['proses'] = $this->M_admin->select_where('transaksi', $where_proses)->num_rows();

		$where_selesai = array('status' => 'selesai', );
		$data['selesai'] = $this->M_admin->select_where('transaksi', $where_selesai)->num_rows();

		$data['jml_pelanggan'] = $this->M_admin->select_all('pelanggan')->num_rows();

		$year = date('Y');

		$where_month_1 = "month(create_at) = 1 AND year(create_at) = ".$year;
		$where_month_2 = "month(create_at) = 2 AND year(create_at) = ".$year;
		$where_month_3 = "month(create_at) = 3 AND year(create_at) = ".$year;
		$where_month_4 = "month(create_at) = 4 AND year(create_at) = ".$year;
		$where_month_5 = "month(create_at) = 5 AND year(create_at) = ".$year;
		$where_month_6 = "month(create_at) = 6 AND year(create_at) = ".$year;
		$where_month_7 = "month(create_at) = 7 AND year(create_at) = ".$year;
		$where_month_8 = "month(create_at) = 8 AND year(create_at) = ".$year;
		$where_month_9 = "month(create_at) = 9 AND year(create_at) = ".$year;
		$where_month_10 = "month(create_at) = 10 AND year(create_at) = ".$year;
		$where_month_11 = "month(create_at) = 11 AND year(create_at) = ".$year;
		$where_month_12 = "month(create_at) = 12 AND year(create_at) = ".$year;

		$data['month_1'] = $this->M_admin->select_where('transaksi', $where_month_1)->num_rows();
		$data['month_2'] = $this->M_admin->select_where('transaksi', $where_month_2)->num_rows();
		$data['month_3'] = $this->M_admin->select_where('transaksi', $where_month_3)->num_rows();
		$data['month_4'] = $this->M_admin->select_where('transaksi', $where_month_4)->num_rows();
		$data['month_5'] = $this->M_admin->select_where('transaksi', $where_month_5)->num_rows();
		$data['month_6'] = $this->M_admin->select_where('transaksi', $where_month_6)->num_rows();
		$data['month_7'] = $this->M_admin->select_where('transaksi', $where_month_7)->num_rows();
		$data['month_8'] = $this->M_admin->select_where('transaksi', $where_month_8)->num_rows();
		$data['month_9'] = $this->M_admin->select_where('transaksi', $where_month_9)->num_rows();
		$data['month_10'] = $this->M_admin->select_where('transaksi', $where_month_10)->num_rows();
		$data['month_11'] = $this->M_admin->select_where('transaksi', $where_month_11)->num_rows();
		$data['month_12'] = $this->M_admin->select_where('transaksi', $where_month_12)->num_rows();

        $this->load->view('layout/header', $header);
		$this->load->view('dashboard', $data);
        $this->load->view('layout/footer');
	}
}
