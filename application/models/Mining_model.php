<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Mining_model extends CI_Model {

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

    public function data_itemset1()
    {
        return $this->db->get('itemset1');
    }

    public function data_itemset1_lolos()
    {
        return $this->db->select('id, atribut, jumlah, support, input_support')
                        ->from('itemset1')
                        ->where('lolos', 1)
                        ->get();
    }
}