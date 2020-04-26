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
                'support'   => $supp = round($ja['jumlah_items']/$jumlah_transaksi['no_inv']*100, 2),
                'input_support' => $this->input->post('min_sup'),
                'lolos'     => $supp < $this->input->post('min_sup') ? 0 : 1,
                'session'   => session_id()
            ];
        }
        print_r($data_insert);
        
        // if(!empty($data_insert))
        // {
        //     $this->db->insert_batch('itemset1', $data_insert);
        // }

        // Set Session
        // $session    = [
        //     'min_sup'   => $this->input->post('min_sup'),
        //     'min_conf'  => $this->input->post('min_conf'),
        //     'total_transaksi'   => $jumlah_transaksi['total'],
        //     'sesi_id'   => session_id()
        // ];
        // $this->session->set_userdata($session);

        // Proses Itemset 2
        // $this->proses_itemset2();

        // redirect(base_url('mining/mining_itemset1'));   
    }

    public function mining_itemset1()
    {
        $sesi   = session_id();
        $data_itemset1  = $this->mining->data_itemset1($sesi)->result_array();
        $data_itemset1_lolos = $this->mining->data_itemset1_lolos($sesi)->result_array();
        $data_itemset2  = $this->mining->data_itemset2($sesi)->result_array();
        $data_itemset2_lolos = $this->mining->data_itemset2_lolos($sesi)->result_array();

        $data   = [
            'data_itemset1' => $data_itemset1,
            'data_itemset1_lolos'   => $data_itemset1_lolos,
            'data_itemset2' => $data_itemset2,
            'data_itemset2_lolos'   => $data_itemset2_lolos,
        ];

        $this->load->view('mining_itemset1', $data);
    }

    public function proses_itemset2()
    {
        $sesi       = session_id();
        $jumlah_transaksi   = $this->mining->jumlah_transaksi()->row_array();
        $itemset2 = $this->db->select('*')
                            ->from('itemset1')
                            ->where('lolos', 1)
                            ->where('session', $sesi)
                            ->get()->result_array();
        
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
        foreach($data as $p)
        {
            $get  = $this->db->select('COUNT(items) AS jumlah')
                        ->from('itemset')
                        ->like('items', $p[0])
                        ->like('items', $p[1])
                        ->get()->row_array();
            $data_insert[]  = [
                'atribut1'  => $p[0],
                'atribut2'  => $p[1],
                'jumlah'    => $get['jumlah'],
                'support'   => $supp = round($get['jumlah']/$jumlah_transaksi['total']*100, 2),
                'input_support' => $this->session->userdata('min_sup'),
                'lolos'     => $supp < $this->session->userdata('min_sup') ? 0 : 1,
                'session'   => $this->session->userdata('sesi_id'),
            ];
        }
        if(!empty($data_insert))
        {
            return $this->db->insert_batch('itemset2', $data_insert);
        }
        // redirect(base_url('mining/mining_itemset2'));
    }

    public function mining_itemset2()
    {
        $sesi   = session_id();
        $data_itemset1  = $this->mining->data_itemset1($sesi)->result_array();
        $data_itemset1_lolos = $this->mining->data_itemset1_lolos($sesi)->result_array();
        $data_itemset2  = $this->mining->data_itemset2($sesi)->result_array();
        $data_itemset2_lolos = $this->mining->data_itemset2_lolos($sesi)->result_array();

        $data   = [
            'data_itemset1' => $data_itemset1,
            'data_itemset1_lolos'   => $data_itemset1_lolos,
            'data_itemset2' => $data_itemset2,
            'data_itemset2_lolos'   => $data_itemset2_lolos,
        ];

        $this->load->view('mining_itemset2', $data);
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
    
    public function hasil()
    {
        $session                = session_id();
        $itemset1           = $this->mining->data_itemset1($session)->result_array();
        $itemset1_lolos     = $this->mining->data_itemset1_lolos($session)->result_array();
        $itemset2           = $this->mining->data_itemset2($session)->result_array();
        $itemset2_lolos     = $this->mining->data_itemset2_lolos($session)->result_array();
        $itemset3           = $this->mining->data_itemset3($session)->result_array();
        $itemset3_lolos     = $this->mining->data_itemset3_lolos($session)->result_array();
        $confidence2        = $this->mining->confidence('2', $session)->result_array();
        $confidence3        = $this->mining->confidence('3', $session)->result_array();
        $confidence_lolos   = $this->mining->confidence_lolos($session)->result_array();
        $data = [
            'itemset1'          => $itemset1,
            'itemset1_lolos'    => $itemset1_lolos,
            'itemset2'          => $itemset2,
            'itemset2_lolos'    => $itemset2_lolos,
            'itemset3'          => $itemset3,
            'itemset3_lolos'    => $itemset3_lolos,
            'confidence2'       => $confidence2,
            'confidence3'       => $confidence3,
            'confidence_lolos'  => $confidence_lolos
        ];
        $this->load->view('hasil', $data);
    }

    public function a()
    {
        // $min_sup = 9;
        // $min_conf = 15;
        // $jml_transaksi = $this->db->get('itemset')->num_rows();
        // echo $min_sup/$jml_transaksi;
        echo session_id();
    }
}
