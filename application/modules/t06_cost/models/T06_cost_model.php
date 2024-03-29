<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T06_cost_model extends CI_Model
{

    public $table = 't06_cost';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,nama,akun');
        $this->datatables->from('t06_cost');
        //add this line for join
        //$this->datatables->join('table2', 't06_cost.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t06_cost/read/$1'),'Read')." | ".anchor(site_url('t06_cost/update/$1'),'Update')." | ".anchor(site_url('t06_cost/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function json2()
    {
        $columns = array(
            array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {return '';}),
            array('db' => 'nama', 'dt' => 1),
            array('db' => 'akun', 'dt' => 2),
            array('db' => 'id', 'dt' => 3, 'formatter' => function($d, $row) {
                return '
                    <a href="'.site_url().'t06_cost/read/'.$d.'">Read</a> |
                    <a href="'.site_url().'t06_cost/update/'.$d.'">Update</a> |
                    <a href="'.site_url().'t06_cost/delete/'.$d.'" onclick="javascript: return confirm(\'Are you sure ?\')">Delete</a>
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
        $this->db->or_like('nama', $q);
        $this->db->or_like('akun', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('akun', $q);
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

/* End of file T06_cost_model.php */
/* Location: ./application/models/T06_cost_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-02 10:09:18 */
/* http://harviacode.com */