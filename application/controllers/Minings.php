<?php

class Minings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mining_model', 'mining');
    }

    public function is_exist_variasi_itemset($array_item1, $array_item2, $item1, $item2)
    {
        $bool1 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item1));
        $bool2 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item2));
        $bool3 = array_keys(array_map('strtoupper', $array_item2), strtoupper($item1));
        $bool4 = array_keys(array_map('strtoupper', $array_item1), strtoupper($item2));
        
        foreach ($bool1 as $key => $value) {
            $aa = array_search($value, $bool2);
            if(is_numeric($aa)){
                return true;
            }
        }
        
        foreach ($bool3 as $key => $value) {
            $aa = array_search($value, $bool4);
            if(is_numeric($aa)){
                return true;
            }
        }
        
        return false;
    }

    public function is_exist_variasi_on_itemset3($array, $tiga_variasi)
    {
        $return = false;
        
        foreach ($array as $key => $value) {
            $jml=0;
            foreach ($value as $key1 => $val1) {
                foreach ($tiga_variasi as $key2 => $val2) {
                    if(strtoupper($val1) == strtoupper($val2)){
                        $jml++;
                    }
                }
            }
            if($jml==3){
                $return=true;
                break;
            }
        }
        
        return $return;
    }

    public function get_variasi_itemset3($array_itemset3, $item1, $item2, $item3, $item4)
    {
        $return = array();
        
        $return1 = array();
        if(!in_array(strtoupper($item1), array_map('strtoupper', $return1))){
            $return1[] = $item1;
        }
        if(!in_array(strtoupper($item2), array_map('strtoupper', $return1))){
            $return1[] = $item2;
        }
        if(!in_array(strtoupper($item3), array_map('strtoupper', $return1))){
            $return1[] = $item3;
        }
        
        $return2 = array();
        if(!in_array(strtoupper($item1), array_map('strtoupper', $return2))){
            $return2[] = $item1;
        }
        if(!in_array(strtoupper($item2), array_map('strtoupper', $return2))){
            $return2[] = $item2;
        }
        if(!in_array(strtoupper($item4), array_map('strtoupper', $return2))){
            $return2[] = $item4;
        }
        
        $return3 = array();
        if(!in_array(strtoupper($item1), array_map('strtoupper', $return3))){
            $return3[] = $item1;
        }
        if(!in_array(strtoupper($item3), array_map('strtoupper', $return3))){
            $return3[] = $item3;
        }
        if(!in_array(strtoupper($item4), array_map('strtoupper', $return3))){
            $return3[] = $item4;
        }
        
        $return4 = array();
        if(!in_array(strtoupper($item2), array_map('strtoupper', $return4))){
            $return4[] = $item2;
        }
        if(!in_array(strtoupper($item3), array_map('strtoupper', $return4))){
            $return4[] = $item3;
        }
        if(!in_array(strtoupper($item4), array_map('strtoupper', $return4))){
            $return4[] = $item4;
        }
        
        if(count($return1)==3){
            if(!$this->is_exist_variasi_on_itemset3($return, $return1)){
                if(!$this->is_exist_variasi_on_itemset3($array_itemset3, $return1)){
                    $return[] = $return1;
                }
            }
        }
        if(count($return2)==3){
            if(!$this->is_exist_variasi_on_itemset3($return, $return2)){
                if(!$this->is_exist_variasi_on_itemset3($array_itemset3, $return2)){
                    $return[] = $return2;
                }
            }
        }
        if(count($return3)==3){
            if(!$this->is_exist_variasi_on_itemset3($return, $return3)){
                if(!$this->is_exist_variasi_on_itemset3($array_itemset3, $return3)){
                    $return[] = $return3;
                }
            }
        }
        if(count($return4)==3){
            if(!$this->is_exist_variasi_on_itemset3($return, $return4)){
                if(!$this->is_exist_variasi_on_itemset3($array_itemset3, $return4)){
                    $return[] = $return4;
                }
            }
        }
        return $return;
    }

    public function jumlah_itemset1($transaksi_list, $produk){
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = ",".strtoupper($data['nama_barang']);
            $item_cocok = ",".strtoupper($produk).",";
            $pos = strpos($items, $item_cocok);
            if($pos!==false){//was found at position $pos
                $count++;
            }
        }
        return $count;
    }

    public function jumlah_itemset2($transaksi_list, $variasi1, $variasi2){
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = ",".strtoupper($data['nama_barang']);
            $item_variasi1 = ",".strtoupper($variasi1).",";
            $item_variasi2 = ",".strtoupper($variasi2).",";
            
            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);
            if($pos1!==false && $pos2!==false){//was found at position $pos
                $count++;
            }
        }
        return $count;
    }

    public function jumlah_itemset3($transaksi_list, $variasi1, $variasi2, $variasi3){
        $count = 0;
        foreach ($transaksi_list as $key => $data) {
            $items = ",".strtoupper($data['nama_barang']);
            $item_variasi1 = ",".strtoupper($variasi1).",";
            $item_variasi2 = ",".strtoupper($variasi2).",";
            $item_variasi3 = ",".strtoupper($variasi3).",";
            
            $pos1 = strpos($items, $item_variasi1);
            $pos2 = strpos($items, $item_variasi2);
            $pos3 = strpos($items, $item_variasi3);
            if($pos1!==false && $pos2!==false && $pos3!==false){//was found at position $pos
                $count++;
            }
        }
        return $count;
    }

    public function hitung_confidence($supp_xuy, $min_support, $min_confidence,
    $atribut1, $atribut2, $atribut3, $dataTransaksi, $jumlah_transaksi)
    {
        $jml_itemset2 = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $nilai_support_x = ($jml_itemset2/$jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1." , ".$atribut2;
        $kombinasi2 = $atribut3;
        $supp_x = $nilai_support_x;//$row1_['support'];
        $conf = ($supp_xuy/$supp_x)*100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence)? 1:0;
        
        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset3($dataTransaksi, $atribut1, $atribut2, $atribut3);
        $PAUB = $jumlah_kemunculanAB/$jumlah_transaksi;
        
        $jumlah_kemunculanA = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $jumlah_kemunculanB = $this->jumlah_itemset1($dataTransaksi, $atribut3);
        
        //$nilai_uji_lift = $PAUB / $jumlah_kemunculanA * $jumlah_kemunculanB;
        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA/$jumlah_transaksi) * ($jumlah_kemunculanB/$jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift<1)?"korelasi negatif":"korelasi positif";
        if($nilai_uji_lift==1){
            $korelasi_rule = "tidak ada korelasi";
        }
        
        $data_confidence = [
            'kombinasi1' => $kombinasi1,
            'kombinasi2' => $kombinasi2,
            'support_xuy' => $supp_xuy,
            'support_x' => $supp_x,
            'confidence' => $conf,
            'lolos' => $lolos,
            'min_support' => $min_support,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA/$jumlah_transaksi),
            "py" => ($jumlah_kemunculanB/$jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset"=>3,
            'session'   => session_id(),
        ];
        return $this->db->insert('confidence', $data_confidence);
    }

    public function hitung_confidence1($supp_xuy, $min_support, $min_confidence,
    $atribut1, $atribut2, $atribut3, $dataTransaksi, $jumlah_transaksi)
    {
        $jml_itemset1 = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $nilai_support_x = ($jml_itemset1/$jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2." , ".$atribut3;
        $supp_x = $nilai_support_x;//$row4_['support'];
        $conf = ($supp_xuy/$supp_x)*100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence)? 1:0;
        
        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset3($dataTransaksi, $atribut1, $atribut2, $atribut3);
        $PAUB = $jumlah_kemunculanAB/$jumlah_transaksi;

        $jumlah_kemunculanA = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $jumlah_kemunculanB = $this->jumlah_itemset2($dataTransaksi, $atribut2, $atribut3);

        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA/$jumlah_transaksi) * ($jumlah_kemunculanB/$jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift<1)?"korelasi negatif":"korelasi positif";
        if($nilai_uji_lift==1){
            $korelasi_rule = "tidak ada korelasi";
        }

        $data_confidence = [
            "kombinasi1" => $kombinasi1,
            "kombinasi2" => $kombinasi2,
            "support_xUy" => $supp_xuy,
            "support_x" => $supp_x,
            "confidence" => $conf,
            "lolos" => $lolos,
            "min_support" => $min_support,
            "min_confidence" => $min_confidence,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA/$jumlah_transaksi),
            "py" => ($jumlah_kemunculanB/$jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset"=>3,
            'session'   => session_id(),
        ];
        return $this->db->insert('confidence', $data_confidence);
    }

    public function hitung_confidence2($supp_xuy, $min_support, $min_confidence,
    $atribut1, $atribut2, $dataTransaksi, $jumlah_transaksi)
    {
        $jml_itemset1 = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $nilai_support_x = ($jml_itemset1/$jumlah_transaksi) * 100;

        $kombinasi1 = $atribut1;
        $kombinasi2 = $atribut2;
        $supp_x = $nilai_support_x;//$row1_['support'];
        $conf = ($supp_xuy/$supp_x)*100;
        //lolos seleksi min confidence itemset3
        $lolos = ($conf >= $min_confidence)? 1:0;
        
        //hitung korelasi lift
        $jumlah_kemunculanAB = $this->jumlah_itemset2($dataTransaksi, $atribut1, $atribut2);
        $PAUB = $jumlah_kemunculanAB/$jumlah_transaksi;

        $jumlah_kemunculanA = $this->jumlah_itemset1($dataTransaksi, $atribut1);
        $jumlah_kemunculanB = $this->jumlah_itemset1($dataTransaksi, $atribut2);

        $nilai_uji_lift = $PAUB / (($jumlah_kemunculanA/$jumlah_transaksi) * ($jumlah_kemunculanB/$jumlah_transaksi));
        $korelasi_rule = ($nilai_uji_lift<1)?"korelasi negatif":"korelasi positif";
        if($nilai_uji_lift==1){
            $korelasi_rule = "tidak ada korelasi";
        }

        $data_confidence = [
            "kombinasi1" => $kombinasi1,
            "kombinasi2" => $kombinasi2,
            "support_xUy" => $supp_xuy,
            "support_x" => $supp_x,
            "confidence" => $conf,
            "lolos" => $lolos,
            "min_support" => $min_support,
            "min_confidence" => $min_confidence,
            "nilai_uji_lift" => $nilai_uji_lift,
            "korelasi_rule" => $korelasi_rule,
            "jumlah_a" => $jumlah_kemunculanA,
            "jumlah_b" => $jumlah_kemunculanB,
            "jumlah_ab" => $jumlah_kemunculanAB,
            "px" => ($jumlah_kemunculanA/$jumlah_transaksi),
            "py" => ($jumlah_kemunculanB/$jumlah_transaksi),
            "pxuy" => $PAUB,
            "from_itemset"=>2,
            'session'   => session_id(),
        ];
        return $this->db->insert('confidence', $data_confidence);
    }

    public function mining_process()
    {
        // $min_support, $min_confidence, $id_process
        $min_support = $this->input->get('min_sup');
        $min_confidence = $this->input->get('min_conf');
        $id_process = 1;

        $transaksi  = $this->mining->data_itemset()->result_array();
        $dataTransaksi = $item_list = array();
        $jumlah_transaksi = $this->mining->jumlah_transaksi()->num_rows();
        $min_support_relative = ($min_support/$jumlah_transaksi)*100;
        $x = 0;
        foreach($transaksi as $trans)
        {
            $item_produk = $trans['nama_barang'].",";

            $item_produk = str_replace(" ,", ",", $item_produk);
            $item_produk = str_replace("  ,", ",", $item_produk);
            $item_produk = str_replace("   ,", ",", $item_produk);
            $item_produk = str_replace("    ,", ",", $item_produk);
            $item_produk = str_replace(", ", ",", $item_produk);
            $item_produk = str_replace(",  ", ",", $item_produk);
            $item_produk = str_replace(",   ", ",", $item_produk);
            $item_produk = str_replace(",    ", ",", $item_produk);


            $dataTransaksi[$x]['nama_barang'] = $item_produk;
            $produk = explode(",", $trans['nama_barang']);

            foreach($produk as $key => $value)
            {
                if(!in_array(strtoupper($value), array_map('strtoupper', $item_list)))
                {
                    if(!empty($value))
                    {
                        $item_list[] = $value;
                    }
                }
            }
            $x++;
        }

        $itemset1 = $jumlahItemset1 = $supportItemset1 = $valueIn = array();
        $x=1;
        foreach($item_list as $key => $item)
        {
            $jumlah = $this->jumlah_itemset1($dataTransaksi, $item);
            $support = round(($jumlah/$jumlah_transaksi)*100);
            // $lolos = ($support >= $min_support_relative) ? "1" : "0";
            $lolos  = $support > $min_support ? "1" : "0";
            if($lolos){
                $itemset1[] = $item;//item yg lolos itemset1
                $jumlahItemset1[] = $jumlah;
                $supportItemset1[] = $support;
            }
            $valueIn[] = [
                'atribut'   => $item,
                'jumlah'    => $jumlah,
                'support'   => $support,
                'input_support' => $min_support,
                'lolos'     => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
                'session'   => session_id(),
            ];
            $data_1[] = [
                'no' => $x++,
                'item'  => $item,
                'jumlah'    => $jumlah,
                'support'   => $support,
                'keterangan'     => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
            ];
        }
        $value_insert = $valueIn;
        $insert_itemset1 = $this->db->insert_batch('itemset1', $value_insert);

        // Konfigurasi ItemSet2
        $NilaiAtribut1 = $NilaiAtribut2 = array();
        $itemset2_var1 = $itemset2_var2 = $jumlahItemset2 = $supportItemset2 = array();
        $valueIn_itemset2 = array();
        $no = 1;
        for($a=0; $a<count($itemset1); $a++)
        {
            for($b=0; $b<count($itemset1); $b++)
            {
                $variance1 = $itemset1[$a];
                $variance2 = $itemset1[$b];
                if (!empty($variance1) && !empty($variance2)) {
                    if ($variance1 != $variance2) {
                        if(!$this->is_exist_variasi_itemset($NilaiAtribut1, $NilaiAtribut2, $variance1, $variance2)) {
                            $jml_itemset2 = $this->jumlah_itemset2($dataTransaksi, $variance1, $variance2);
                            $NilaiAtribut1[] = $variance1;
                            $NilaiAtribut2[] = $variance2;
    
                            $support2 = round(($jml_itemset2/$jumlah_transaksi) * 100);
                            // $lolos = ($support2 >= $min_support_relative) ? 1:0;

                            $lolos  = $support2 > $min_support ? "1" : "0";
                            
                            if($lolos){
                                $itemset2_var1[] = $variance1;
                                $itemset2_var2[] = $variance2;
                                $jumlahItemset2[] = $jml_itemset2;
                                $supportItemset2[] = $support2;
                            }
                            $valueIn_itemset2[] = [
                                'atribut1'      => $variance1,
                                'atribut2'      => $variance2,
                                'jumlah'        => $jml_itemset2,
                                'support'       => $support2,
                                'input_support' => $min_support,
                                'lolos'         => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
                                'session'       => session_id(),
                            ];
                            $data_2[] = [
                                'no' => $no++,
                                'variance1' => $variance1,
                                'variance2' => $variance2,
                                'jumlah'    => $jml_itemset2,
                                'support'   => $support2,
                                'keterangan'     => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
                            ];
                        }
                    }
                }
            }
        }
        $value_insert_itemset2 = $valueIn_itemset2;
        $insert_itemset2 = $this->db->insert_batch('itemset2', $value_insert_itemset2);

        // Konfigurasi ItemSet3
        $tigaVariasiItem = $valueIn_itemset3 = array();
        $itemset3_var1 = $itemset3_var2 = $itemset3_var3 = $jumlahItemset3 = $supportItemset3 = array();
        $no = 1;
        for($a=0; $a < count($itemset2_var1); $a++)
        {
            for($b=0; $b < count($itemset2_var1); $b++)
            {
                if($a != $b)
                {
                    $itemset1a = $itemset2_var1[$a];
                    $itemset1b = $itemset2_var1[$b];

                    $itemset2a = $itemset2_var2[$a];
                    $itemset2b = $itemset2_var2[$b];

                    if (!empty($itemset1a) && !empty($itemset1b)&& !empty($itemset2a) && !empty($itemset2b))
                    {
                        
                        $temp_array = $this->get_variasi_itemset3($tigaVariasiItem, 
                                $itemset1a, $itemset1b, $itemset2a, $itemset2b);
                        
                        if(count($temp_array)>0){
                            //variasi-variasi itemset isi ke array
                            $tigaVariasiItem = array_merge($tigaVariasiItem, $temp_array);
                            
                            foreach ($temp_array as $idx => $val_nilai) {
                                $itemset1 = $itemset2 = $itemset3 = "";
                                
                                $aaa=0;
                                foreach ($val_nilai as $idx1 => $v_nilai) {
                                    if($aaa==0){
                                        $itemset1 = $v_nilai;
                                    }
                                    if($aaa==1){
                                        $itemset2 = $v_nilai;
                                    }
                                    if($aaa==2){
                                        $itemset3 = $v_nilai;
                                    }
                                    $aaa++;
                                }
                                
                                //jumlah item set3 dan menghitung supportnya
                                $jml_itemset3 = $this->jumlah_itemset3($dataTransaksi, $itemset1, $itemset2, $itemset3);
                                $support3 = round(($jml_itemset3/$jumlah_transaksi) * 100);
                                // $lolos = ($support3 >= $min_support_relative)? 1:0;

                                $lolos = $support3 > $min_support ? "1" : "0";
                                
                                if($lolos){
                                    $itemset3_var1[] = $itemset1;
                                    $itemset3_var2[] = $itemset2;
                                    $itemset3_var3[] = $itemset3;
                                    $jumlahItemset3[] = $jml_itemset3;
                                    $supportItemset3[] = $support3;
                                }

                                $valueIn_itemset3[] = [
                                    'atribut1'      => $itemset1,
                                    'atribut2'      => $itemset2,
                                    'atribut3'      => $itemset3,
                                    'jumlah'        => $jml_itemset3,
                                    'support'       => $support3,
                                    'input_support' => $min_support,
                                    'lolos'         => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
                                    'session'       => session_id(),
                                ];

                                $data_3[] = [
                                    'no'            => $no++,
                                    'variance1'      => $itemset1,
                                    'variance2'      => $itemset2,
                                    'variance3'      => $itemset3,
                                    'jumlah'        => $jml_itemset3,
                                    'support'       => $support3,
                                    'keterangan'    => (($lolos==1) ? "Lolos" : "Tidak Lolos"),
                                ];
                            }
                        }
                    }
                }
            }
        }
        $value_insert_itemset3 = $valueIn_itemset3;
        $insert_itemset3 = $this->db->insert_batch('itemset3', $value_insert_itemset3);

        // Confidence
        $itemset3_lolos         = $this->mining->data_itemset3_lolos(session_id());
        $jumlah_itemset3_lolos  = $itemset3_lolos->num_rows(); 
        if($jumlah_itemset3_lolos > 0){
            $confidence_from_itemset = 3;

            foreach($itemset3_lolos->result_array() as $row_3)
            {
                $atribut1 = $row_3['atribut1'];
                $atribut2 = $row_3['atribut2'];
                $atribut3 = $row_3['atribut3'];
                $supp_xuy = $row_3['support'];
                
                //1,2 => 3
                $this->hitung_confidence($supp_xuy, $min_support, $min_confidence, 
                        $atribut1, $atribut2, $atribut3, $dataTransaksi, $jumlah_transaksi);
                
                //2,3 => 1
                $this->hitung_confidence($supp_xuy, $min_support, $min_confidence, 
                        $atribut2, $atribut3, $atribut1, $dataTransaksi, $jumlah_transaksi);
                
                //3,1 => 2
                $this->hitung_confidence($supp_xuy, $min_support, $min_confidence, 
                        $atribut3, $atribut1, $atribut2, $dataTransaksi, $jumlah_transaksi);
                
                
                //1 => 3,2
                $this->hitung_confidence1($supp_xuy, $min_support, $min_confidence, 
                        $atribut1, $atribut3, $atribut2, $dataTransaksi, $jumlah_transaksi);
                
                //2 => 1,3
                $this->hitung_confidence1($supp_xuy, $min_support, $min_confidence,
                        $atribut2, $atribut1, $atribut3, $dataTransaksi, $jumlah_transaksi);
                
                //3 => 2,1
                $this->hitung_confidence1($supp_xuy, $min_support, $min_confidence,
                        $atribut3, $atribut2, $atribut1, $dataTransaksi, $jumlah_transaksi);  
            }
        }

        //dari itemset 2
        $itemset2_lolos     = $this->mining->data_itemset2_lolos(session_id());
        $jumlah_itemset2_lolos  = $itemset2_lolos->num_rows();
        
        if($jumlah_itemset2_lolos > 0){
            $confidence_from_itemset = 2;

            foreach($itemset2_lolos->result_array() as $row_2)
            {
                $atribut1 = $row_2['atribut1'];
                $atribut2 = $row_2['atribut2'];
                $supp_xuy = $row_2['support'];
                
                //1 => 2
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut1, $atribut2, $dataTransaksi, $jumlah_transaksi);
                
                //2 => 1
                $this->hitung_confidence2($supp_xuy, $min_support, $min_confidence, $atribut2, $atribut1, $dataTransaksi, $jumlah_transaksi);
            }
        }
        redirect(base_url('mining/hasil'), 'refresh');
    }
}