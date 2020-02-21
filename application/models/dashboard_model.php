<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Dashboard_model extends CI_Model
{
  public function __construct()
  {
      parent ::__construct();
  }

  public function total_barang()
  {
    $this->db->select('*');
    $this->db->from('barang');
    return $this->db->get();
  }

  public function total_transaksi()
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    return $this->db->get();
  }

  
}