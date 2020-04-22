<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Mining_model extends CI_Model {

    public function data_itemset()
    {
        return $this->db->select('id, no_inv, nama_barang')
                        ->from('itemset')
                        ->get();
    }

    public function jumlah_apriori()
    {
        $this->db->select(
            'td.kode_item AS items, b.nama_barang, COUNT(td.kode_item) AS jumlah_items'
        );
        $this->db->from('transaksi AS t');
        $this->db->join('transaksi_det as td', 'td.no_inv = t.no_inv');
        $this->db->join('barang AS b', 'b.id_barang = td.kode_item');
        $this->db->group_by('td.kode_item');
        return $this->db->get();
    }

    public function jumlah_transaksi()
    {
        $this->db->select('COUNT(transaksi.no_inv) AS total');
        $this->db->from('transaksi');
        return $this->db->get();
    }

    public function data_itemset1($sesi)
    {
        return $this->db->select('*')
                        ->from('itemset1')
                        ->where('session', $sesi)
                        ->get();
    }

    public function data_itemset1_lolos($sesi)
    {
        return $this->db->select('id, atribut, jumlah, support, input_support')
                        ->from('itemset1')
                        ->where('lolos', 1)
                        ->where('session', $sesi)
                        ->get();
    }

    public function data_itemset2($sesi)
    {
        return $this->db->select('*')
                        ->from('itemset2')
                        ->where('session', $sesi)
                        ->get();
    }

    public function data_itemset2_lolos($sesi)
    {
        return $this->db->select('id, atribut1, atribut2, jumlah, support, input_support')
                        ->from('itemset2')
                        ->where('lolos', 1)
                        ->where('session', $sesi)
                        ->get();
    }
}