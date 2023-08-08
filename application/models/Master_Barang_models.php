<?php

class Master_Barang_models extends CI_Model
{
    public function createProduct($name, $stock, $siteId)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'barang_name' => $name,
            'barang_stock' => $stock,
            'site_id' => $siteId,
            'date' => date('d-m-Y H:i:s')
        );

        return $this->db->insert('master_barang', $data);
    }

    public function getProduct($siteId)
    {
        return $this->db->get_where('master_barang', array('site_id' => $siteId))->result_array();
    }

    public function updateProduct($id, $name, $stock)
    {
        return $this->db->update('master_barang', array('barang_name' => $name, 'barang_stock' => $stock), array('barang_id' => $id));
    }

    public function deleteProduct($id)
    {
        return $this->db->delete('master_barang', array('barang_id' => $id));
    }

}