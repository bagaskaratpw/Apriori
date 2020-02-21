<?php

class Transaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
    }

    public function tambah_checkout()
    {
        $data = [
            'tgl_trans' => $this->input->post('date'),
            'kode_item' => $this->input->post('barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'unit' => $this->input->post('unit'),
            'quantity' => $this->input->post('quantity'),
            'amount' => (int) $this->input->post('harga') * $this->input->post('quantity')
        ];
        $this->db->insert('transaksi_temp', $data);
        redirect(base_url('welcome/dat_trans'));
    }

    public function tambah_transaksi()
    {
        // Tambah ke Tabel Transaksi
        $data_transaksi   = [
            'tgl_trans' => $this->input->post('c_tgl_trans'),
            'waktu_trans' => date('H:i:s'),
        ];
        $insert_transaksi = $this->db->insert('transaksi', $data_transaksi);
        $no_inv = $this->db->insert_id();

        // Tambah ke Tabel Transaksi Detail
        $kode_item = $this->input->post('c_kode_item');
        foreach($kode_item as $item => $key)
        {
            $data[] = [
                'no_inv'    => $no_inv,
                'kode_item' => $key,
                'quantity'  => $this->input->post('c_quantity')[$item],
                'amount'    => $this->input->post('c_amount')[$item],
            ];
        }
        $insert_batch = $this->db->insert_batch('transaksi_det', $data);
        if(!empty($insert_batch))
        {
            echo "Berhasil";
            $this->db->empty_table('transaksi_temp');
            redirect(base_url('welcome/dat_trans'));
        }
        else
        {
            echo "Tidak Berhasil";
        }
    }

    public function coba()
    {
        $this->db->select('*');
        $this->db->from('transaksi_det');
        $this->db->join('transaksi', 'transaksi.no_inv = transaksi_det.no_inv');
        $this->db->join('barang', 'barang.id_barang = transaksi_det.kode_item');
        $this->db->where('transaksi_det.no_inv', $this->input->get('no_inv'));
        $get = $this->db->get()->result_array();
        // foreach($get as $row)
        // {
        //     $tbody      = [];
        //     $tbody[]    = $row['no_inv'];
        //     $tbody[]    = $row['kode_item'];
        //     $tbody[]    = $row['nama_barang'];
        //     $tbody[]    = $row['unit'];
        //     $tbody[]    = $row['harga'];
        //     $tbody[]    = $row['quantity'];
        //     $tbody[]    = $row['amount'];
        //     $data[]     = $tbody;
        // }
        // echo json_encode([
        //     'data' => $data
        // ]);
        echo json_encode($get);
    }
    public function hapus_keranjang($unique){
       
	    $unique = array('id' => $unique);
	    
		$this->data_model->Delete('transaksi_temp', $unique);
	    redirect('Welcome/dat_trans');
	
    }
    public function hapus_transaksi ($unique)
	{
	    $unique = array('no_inv' => $unique);
	    
        $this->data_model->Delete('transaksi', $unique);
        $this->data_model->Delete('transaksi_det',$unique);
	    redirect('Welcome/dat_trans','refresh');
	}
}