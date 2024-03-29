<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T32_cost_sheet_detail_model extends CI_Model
{

    public $table = 't32_cost_sheet_detail';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,job_order,vendor,cost,armada,keterangan,qty,nilai,nominal,nomor_ivr,is_hapus');
        $this->datatables->from('t32_cost_sheet_detail');
        //add this line for join
        //$this->datatables->join('table2', 't32_cost_sheet_detail.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t32_cost_sheet_detail/read/$1'),'Read')." | ".anchor(site_url('t32_cost_sheet_detail/update/$1'),'Update')." | ".anchor(site_url('t32_cost_sheet_detail/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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

        $table = '(select jo.* from (select job_order from '.$this->table.' group by job_order) csd join t30_job_order jo on csd.job_order = jo.id) csd_jo';
        return json_encode(SSP::simple($_GET, $sql_details, $table, $this->id, $columns));
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
        $this->db->or_like('job_order', $q);
        $this->db->or_like('vendor', $q);
        $this->db->or_like('cost', $q);
        $this->db->or_like('armada', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('nilai', $q);
        $this->db->or_like('nominal', $q);
        $this->db->or_like('nomor_ivr', $q);
        $this->db->or_like('is_hapus', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('job_order', $q);
        $this->db->or_like('vendor', $q);
        $this->db->or_like('cost', $q);
        $this->db->or_like('armada', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('nilai', $q);
        $this->db->or_like('nominal', $q);
        $this->db->or_like('nomor_ivr', $q);
        $this->db->or_like('is_hapus', $q);
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

/* End of file T32_cost_sheet_detail_model.php */
/* Location: ./application/models/T32_cost_sheet_detail_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-06 04:09:20 */
/* http://harviacode.com */
