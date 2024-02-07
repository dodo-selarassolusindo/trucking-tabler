<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_job_order_model extends CI_Model
{

    public $table = 't30_job_order';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,tanggal_job_order,nomor,customer,shipper,tanggal_muat,lokasi');
        $this->datatables->from('t30_job_order');
        //add this line for join
        //$this->datatables->join('table2', 't30_job_order.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t30_job_order/read/$1'),'Read')." | ".anchor(site_url('t30_job_order/update/$1'),'Update')." | ".anchor(site_url('t30_job_order/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function json2()
    {
        $columns = array(
            array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {return '';}),
            array('db' => 'tanggal_job_order', 'dt' => 1, 'formatter' => function($d) {
                return date_to_dmy($d);
                }),
            array('db' => 'nomor', 'dt' => 2),
            array('db' => 'customer', 'dt' => 3, 'formatter' => function($d) {
                return $this->T01_customer_model->get_by_id($d)->nama;
                }),
            array('db' => 'shipper', 'dt' => 4, 'formatter' => function($d) {
                return $this->T02_shipper_model->get_by_id($d)->nama;
                }),
            array('db' => 'tanggal_muat', 'dt' => 5, 'formatter' => function($d) {
                return date_to_dmy($d);
                }),
            array('db' => 'lokasi', 'dt' => 6, 'formatter' => function($d) {
                return $this->T00_lokasi_model->get_by_id($d)->nama;
                }),
            array('db' => 'id', 'dt' => 7, 'formatter' => function($d, $row) {
                return '
                    <a href="'.site_url().'t30_job_order/read/'.$d.'">Read</a> |
                    <a href="'.site_url().'t30_job_order/update/'.$d.'">Update</a> |
                    <a href="'.site_url().'t30_job_order/delete/'.$d.'" onclick="javascript: return confirm(\'Are you sure ?\')">Delete</a>
                    ';
            }),
        );

        $this->load->database();
        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db' => $this->db->database,
            'host' => $this->db->hostname,
        );
        return json_encode(SSP::simple($_GET, $sql_details, $this->table, $this->id, $columns));
    }

    function get_by_id_json($id)
    {
        $this->db->select($this->table.'.*');
        $this->db->select('t01_customer.nama as customer_nama');
        $this->db->select('t02_shipper.nama as shipper_nama');
        $this->db->select('t00_lokasi.nama as lokasi_nama');
        $this->db->select('t31_job_order_detail.*');
        $this->db->select('t04_armada.merk, t04_armada.nomor_polisi');
        $this->db->from($this->table);
        $this->db->where($this->table.'.'.$this->id, $id);
        $this->db->join('t01_customer', 't01_customer.id = '.$this->table.'.customer');
        $this->db->join('t02_shipper', 't02_shipper.id = '.$this->table.'.shipper');
        $this->db->join('t00_lokasi', 't00_lokasi.id = '.$this->table.'.lokasi');
        $this->db->join('t31_job_order_detail', 't31_job_order_detail.job_order = '.$this->table.'.id', 'left');
        $this->db->join('t04_armada', 't04_armada.id = t31_job_order_detail.armada');
        return json_encode($this->db->get()->result());
    }

    function get_all_not_in_cost_sheet()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where_not_in('(select job_order from t32_cost_sheet_detail group by job_order)');
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('tanggal_job_order', $q);
        $this->db->or_like('nomor', $q);
        $this->db->or_like('customer', $q);
        $this->db->or_like('shipper', $q);
        $this->db->or_like('tanggal_muat', $q);
        $this->db->or_like('lokasi', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('tanggal_job_order', $q);
        $this->db->or_like('nomor', $q);
        $this->db->or_like('customer', $q);
        $this->db->or_like('shipper', $q);
        $this->db->or_like('tanggal_muat', $q);
        $this->db->or_like('lokasi', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file T30_job_order_model.php */
/* Location: ./application/models/T30_job_order_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-02 04:29:09 */
/* http://harviacode.com */
