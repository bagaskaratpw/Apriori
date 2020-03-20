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

        // Set Session
        $session    = [
            'min_sup'   => $this->input->post('min_sup'),
            'min_conf'  => $this->input->post('min_conf'),
            'sesi_id'   => session_id()
        ];
        $this->session->set_userdata($session);

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

    public function mining2()
    {
        $sesi       = session_id();
        $jumlah_transaksi   = $this->mining->jumlah_transaksi()->row_array();
        $itemset2 = $this->db->select('*')
                            ->from('itemset1')
                            ->where('lolos', 1)
                            ->where('session', $sesi)
                            ->get()->result_array();
        // print_r($itemset2);
        $itemset2_p = $this->db->select('atribut')
                            ->from('itemset1')
                            ->where('lolos', 1)
                            ->where('session', $sesi)
                            ->get()->result_array();
        foreach($itemset2 as $i2)
        {
            $arr1[] = $i2['atribut'];
        }
        foreach($itemset2_p as $i2p)
        {
            $arr2[] = $i2p['atribut'];
        }

        for($i=0; $i < count($arr1); $i++)
        {
            for($j=0; $j < count($arr2); $j++)
            {
                $x = $arr1[$i];
                $y  = $arr2[$j];
                if($x === $y)
                {
                    continue;
                }
                $a = $x.','.$y;
                $b = $y.','.$x;
                $c = $a <=> $b;
                if($c == 1)
                {
                    continue;
                }
                $data[]   = explode(',', $a);
            }
        }
        print_r($this->session->userdata());
        // foreach($data as $p)
        // {
        //     $get  = $this->db->select('COUNT(items) AS jumlah')
        //                 ->from('itemset')
        //                 ->like('items', $p[0])
        //                 ->like('items', $p[1])
        //                 ->get()->row_array();
        //     $data_insert[]  = [
        //         'atribut1'  => $p[0],
        //         'atribut2'  => $p[1],
        //         'jumlah'    => $get['jumlah'],
        //         'support'   => $supp = round($get['jumlah']/$jumlah_transaksi['total']*100, 2),
        //         'lolos'     => $supp < 15 ? 0 : 1,
        //         'session'   => $sesi,
        //     ];
        // }
        // if(!empty($data_insert))
        // {
        //     $this->db->insert_batch('itemset2', $data_insert);
        // }
        // redirect(base_url('welcome/pros_apr'));
    }

    public function find_itemset2()
    {
        $a  = $this->db->select('COUNT(items) AS jumlah')
                        ->from('itemset')
                        ->like('items', 1001)
                        ->like('items', 1019)
                        ->get()->row_array();
        print_r($a);
    }

    public function tes()
    {
        $arr1 = ['A','B','C','D','E'];
        $arr2 = ['A','B','C','D','E'];
        print_r($arr1);
        for ($i=0; $i < count($arr1); $i++) {
            for ($j=0; $j < count($arr2); $j++) {
                $x = $arr1[$i];
                $y = $arr2[$j];
                if ($x === $y ) {
                    continue;
                }
                $a = $x.','.$y;
                $b = $y.','.$x;
                $c = $a <=> $b;
                if ($c == 1) {
                    continue;
                }
                echo $a;
                echo '<br>';
            } 
        }
    }
}