<?php
class Order_model extends CI_Model {

    public function get_orders() {
        $this->db->select('tb_order.*, tb_produk.product_name, tb_produk.price, user.name, user.email');
        $this->db->from('tb_order');
        $this->db->join('tb_produk', 'tb_produk.id = tb_order.id_produk');
        $this->db->join('user', 'user.id = tb_order.id_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_order($data) {
        return $this->db->insert('tb_order', $data);
    }
}
?>

