<?php

class Mining extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mining_model', 'mining');
    }

    public function index()
    {
        // Retrieving Data from GET
        $min_sup    = $_GET['min_sup'];
        $min_conf   = $_GET['min_conf'];

        $jumlah_apriori   = $this->mining->jumlah_apriori()->result_array();
        $jumlah_transaksi   = $this->mining->jumlah_transaksi()->row_array();

        $data   = [
            'jumlah_apriori'  => $jumlah_apriori,
            'jumlah_transaksi'  => $jumlah_transaksi,
        ];
        $this->load->view('mining', $data);
    }

    public function proses_itemset1()
    {
        $jumlah_apriori   = $this->mining->jumlah_apriori()->result_array();
        $jumlah_transaksi   = $this->mining->jumlah_transaksi()->row_array();

        foreach($jumlah_apriori as $ja)
        {
            $data_insert[]    =   [
                'atribut'   => $ja['items'],
                'jumlah'    => $ja['jumlah_items'],
                'support'   => $supp = round($ja['jumlah_items']/$jumlah_transaksi['total']*100, 2),
                'input_support' => $this->input->post('min_sup'),
                'lolos'     => $supp < $this->input->post('min_sup') ? 0 : 1,
                'session'   => session_id()
            ];
        }
        if(!empty($data_insert))
        {
            $this->db->insert_batch('itemset1', $data_insert);
        }
        redirect(base_url('mining/mining_itemset1'));   
    }

    public function mining_itemset1()
    {
        $sesi   = session_id();
        $data_itemset1  = $this->mining->data_itemset1($sesi)->result_array();
        $data_itemset1_lolos = $this->mining->data_itemset1_lolos($sesi)->result_array();

        $data   = [
            'data_itemset1' => $data_itemset1,
            'data_itemset1_lolos'   => $data_itemset1_lolos,
        ];

        $this->load->view('mining_itemset1', $data);
    }
}