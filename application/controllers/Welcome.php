<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this
            ->load
            ->model('data_model');
        $this
            ->load
            ->model('dashboard_model');
    }

    public function index()
    {
        $barang = $this
            ->dashboard_model
            ->total_barang()
            ->num_rows();
        $transaksi = $this
            ->dashboard_model
            ->total_transaksi()
            ->num_rows();

        $data = array(
            'barang' => $barang,
            'transaksi' => $transaksi,
        );
        $this
            ->load
            ->view('index', $data);
    }
    public function dat_trans()
    {
        $dataquery = $this
            ->db
            ->get('transaksi')
            ->result_array();
        $data1 = $this
            ->data_model
            ->tampil_kode();
        $data_checkout = $this
            ->db
            ->get('transaksi_temp')
            ->result_array();
        $data = array(
            'trans' => $dataquery,
            'kode' => $data1,
            'data_checkout' => $data_checkout,
        );

        $this
            ->load
            ->view('data_transaksi', $data);
    }
    public function ajax_kode($kode)
    {
        $data = $this
            ->data_model
            ->ajax_kode($kode);
        echo json_encode($data);
    }

    // function get()
    // {
    // 	$unique = $this->input->get('id');
    // 	$data = $this->data_transaksi($unique);
    // 	echo json_encode($data);
    // }
    public function pros_apr()
    {
        session_destroy();
        $dataquery = $this
            ->data_model
            ->data_apriori()
            ->result_array();
        $total_items = $this
            ->data_model
            ->count_items()
            ->result_array();
        $total_transaksi = $this
            ->data_model
            ->total_transaksi()
            ->row_array();

        $data = array(
            'data' => $dataquery,
            'total_items' => $total_items,
            'total_transaksi' => $total_transaksi
        );
        // print_r($data['total_items']);
        // print_r($data['total_transaksi']);
        $this
            ->load
            ->view('proses_apriori', $data);
    }
    public function table_itemset()
    {
        $total_items = $this
            ->data_model
            ->count_items()
            ->result_array();
        $total_transaksi = $this
            ->data_model
            ->total_transaksi()
            ->row_array();

        $data = array(
            'total_items' => $total_items,
            'total_transaksi' => $total_transaksi
        );
        $this
            ->load
            ->view('table_itemset', $data);
    }
    public function hasil_apr()
    {
        $this
            ->load
            ->view('hasil_apriori');
    }

    public function daftar_barang()
    {
        $dataquery = $this
            ->db
            ->get('barang')
            ->result_array();

        $data = array(
            'data' => $dataquery,
        );
        $this
            ->load
            ->view('daftar_barang', $data);
    }
    public function tambah_barang()
    {
        $data = array(
            'id_barang' => $this
                ->input
                ->post('id_barang') ,
            'nama_barang' => $this
                ->input
                ->post('nama_barang') ,
            'unit' => $this
                ->input
                ->post('unit') ,
            'harga' => $this
                ->input
                ->post('harga') ,
        );
        $data = $this
            ->db
            ->insert('barang', $data);
        redirect('Welcome/daftar_barang');
    }

    public function hapus_barang($unique)
    {
        $unique = array(
            'id_barang' => $unique
        );

        $this
            ->data_model
            ->Delete('barang', $unique);
        redirect('Welcome/daftar_barang');
    }

    function get()
    {
        $id = $this
            ->input
            ->get('id'); // ini kan dah dpt id nya
        // Harusnya bikin funsi lagi yang buat cari detail barang dari id yang di dpt
        // nyontek gostand ae
        $data = $this
            ->data_model
            ->barangDetail($id);
        echo json_encode($data);
    }

    public function editbarang()
    {

        $unique = $this
            ->input
            ->post('editid');

        $this
            ->data_model
            ->edit_barang($unique);

        redirect('Welcome/daftar_barang');
	}
	
	public function update_data_apriori()
	{
		$data	= $this->data_model->data_apriori();
		if($data->num_rows() > 0)
		{
			$this->db->empty_table('itemset');
			foreach($data->result_array() as $row)
			{
				$data_insert[]	= [
					'no_inv'	=> $row['no_inv'],
					'items'		=> $row['items'],
					'nama_barang'	=> $row['nama_barang'],
				];
			}
			if(!empty($data_insert))
			{
				$this->db->insert_batch('itemset', $data_insert);
			}
			redirect(base_url('welcome/pros_apr'));
		}
		else
		{
			foreach($data->result_array() as $row)
			{
				$data_insert[]	= [
					'no_inv'	=> $row['no_inv'],
					'items'		=> $row['items'],
					'nama_barang'	=> $row['nama_barang'],
				];
			}
			if(!empty($data_insert))
			{
				$this->db->insert_batch('itemset', $data_insert);
			}
			redirect(base_url('welcome/pros_apr'));
		}
		
	}

}