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
            'total_transaksi'   => $jumlah_transaksi['total'],
            'sesi_id'   => session_id()
        ];
        $this->session->set_userdata($session);

        // Proses Itemset 2
        $this->proses_itemset2();

        redirect(base_url('mining/mining_itemset1'));   
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

    public function tes()
    {
        $arr1 = ['A','B','C','D','E', 'F'];
        $arr2 = ['A','B','C','D','E', 'F'];
        // print_r($arr1);

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

    public function tes2()
    {
        $itemset = $this->db->select('atribut1, atribut2')->from('itemset2')->where('session', session_id())->where('lolos', 1)->distinct()->get()->result_array();
        $atribut1 = $this->db->select('atribut1')->from('itemset2')->where('session', session_id())->where('lolos', 1)->get()->result_array();
        $atribut2 = $this->db->select('atribut2')->from('itemset2')->where('session', session_id())->where('lolos', 1)->get()->result_array();

        $tigaVariasi = [];
        echo "<b>Itemset 3</b><br>";
        foreach($itemset as $item)
        {
            echo $item['atribut1'].", ".$item['atribut2']."<br>";
            // $arr[] = $item['atribut1'].", ".$item['atribut2'];
        }

        // for($i=0; $i<count($arr); $i++)
        // {
        //     for($j=0; $j<count($arr); $j++)            
        //     {
        //         $itemset1a = $arr[$i];
        //         $itemset1b = $arr[$j];
        //         if($itemset1a === $itemset1b)
        //         {
        //             continue;
        //         }
        //         $a = $itemset1a.", ".substr($itemset1b, 6);
        //         $b = substr($itemset1b, 6).", ".$itemset1a;
        //         $c = $a <=> $b;
        //         if($c === 1){
        //             continue;
        //         }
        //         $d = substr($itemset1b, 6).", ".$itemset1a;
        //         $e = $a <=> $d;
        //         if($e === 1){
        //             continue;
        //         }
        //         $f = $itemset1b.", ".substr($itemset1a, 0, 4);
        //         $g = $a <=> $f;
        //         if($g === 1){
        //             continue;
        //         }
        //         $h = $itemset1a <=> $itemset1b;
        //         if($h === 1){
        //             continue;
        //         }
        //         // echo $a."<br>";
        //         $res[] = $a."<br>";
        //     }
        // }
        // $zz = array_unique($res);
        // foreach($zz as $p)
        // {
        //     echo $p;
        // }
	}
	
	public function tes3()
	{
		$item1 = $this->db->select('atribut1')
							->distinct()
							->from('itemset2')
							->where('lolos', 1)
							->where('session', session_id())				
							->get()
							->result_array();
		$item2 = $this->db->select('atribut2')
							->distinct()
							->from('itemset2')
							->where('lolos', 1)
							->where('session', session_id())				
							->get()
							->result_array();
		echo 'data_1 = ';
		foreach($item1 as $item)
        {
            $arr1[] = $item['atribut1'];
            echo $item['atribut1'];
			echo ' | ';
		}
		echo '<br>';
		echo 'data_2 = ';
		foreach ($item2 as $item) {
			$arr2[] = $item['atribut2'];
			$arr3[] = $item['atribut2'];
			echo $item['atribut2'];
			echo ' | ';
		}
		echo '<hr>';
		foreach ($arr1 as $x) {
			foreach ($arr2 as $y) {
				foreach ($arr3 as $z) {					
					if ($x === $y && $y === $z && $x === $z) {
						continue;
					}
					$a = $x.','.$y.','.$z;
					$b = $x.','.$z.','.$y;
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
	public function iden($arr1,$arr2)
	{
		sort( $arr1 );
		sort( $arr2 );
		return $arr1 == $arr2;
	}
}
