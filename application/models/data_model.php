<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Data_model extends CI_Model
{
  public function Insert($table,$data)
  {
    $res = $this->db->insert($table, $data);
    return $res; 
  }
  public function get($table)
  {
      return $this->db->get($table)->result_array();
  }
  public function data_trans()
  {
    return $this->db->get('transaksi')->result_array();
  }
  public function tampil_detail($unique)
  {
    $this->db->select('*');
    $this->db->from('transaksi_det');
    $this->db->where('no_inv',$unique);
    return $this->db->get()->result_array();
  }

  // SELECT
  // t.no_inv`, GROUP_CONCAT(td.`kode_item` SEPARATOR ", ") AS items, GROUP_CONCAT(b.`nama_barang` SEPARATOR ", ")
  // FROM transaksi AS t
  // JOIN transaksi_det AS td
  // ON td.`no_inv` = t.`no_inv`
  // JOIN barang AS b
  // ON b.`id_barang` = td.`kode_item`
  // GROUP BY t.`no_inv`

  public function data_apriori()
  {
      $this->db->select(
        't.no_inv, GROUP_CONCAT(td.kode_item SEPARATOR ", ") AS items, GROUP_CONCAT(b.nama_barang SEPARATOR ", ") AS nama_barang'
      );
      $this->db->from('transaksi AS t');
      $this->db->join('transaksi_det AS td', 'td.no_inv = t.no_inv');
      $this->db->join('barang AS b', 'b.id_barang = td.kode_item');
      $this->db->group_by('t.no_inv');
      return $this->db->get();
  }

  public function count_items()
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

  public function total_transaksi()
  {
      $this->db->select('COUNT(transaksi.no_inv) AS total');
      $this->db->from('transaksi');
      return $this->db->get();
  }

  public function Delete($table, $where){
    $data = $this->db->delete($table, $where); 
    return $data;
  }
  public function GetWhere($table, $where)
  {
    $res = $this->db->get_where($table, $where);
    return $res->result_array();
  }
  public function Update($table, $data, $where){
    $data = $this->db->update($table, $data, $where);
    return $data;
  }

   public function edit_barang($unique)
   {
      $data= array(            
        'id_barang'    => $this->input->post('editid'),
        'nama_barang'    => $this->input->post('editnama'),
        'unit'    => $this->input->post('editunit'),
        'harga' => $this->input->post('editharga'),         
    );
      $this->db->select('*');
      $this->db->from('barang');
      $this->db->where('id_barang', $unique);
     
       return $this->db->update('barang', $data);             
    }
   
    public function barangDetail($unique)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_barang', $unique);
        return $this->db->get()->row_array();
    }

    public function tampil_kode()
    {
        return $this->db->get('barang')->result_array();
    }
    public function ajax_kode($where)
    {
        $this->db->where('id_barang', $where);
        return $this->db->get('barang')->row();
    }
}