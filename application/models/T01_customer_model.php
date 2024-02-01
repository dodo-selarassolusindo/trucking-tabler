<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T01_customer_model extends CI_Model
{

    public $table = 't01_customer';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,kode,nama,alamat,kota,contact_person,telepon,rentang_waktu');
        $this->datatables->from('t01_customer');
        //add this line for join
        //$this->datatables->join('table2', 't01_customer.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('t01_customer/read/$1'),'Read')." | ".anchor(site_url('t01_customer/update/$1'),'Update')." | ".anchor(site_url('t01_customer/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    function json2()
    {
        $columns = array(
            array('db' => 'id', 'dt' => 0, 'formatter' => function($d, $row) {return '';}),
            array('db' => 'kode', 'dt' => 1),
            array('db' => 'nama', 'dt' => 2),
            array('db' => 'alamat', 'dt' => 3),
            array('db' => 'kota', 'dt' => 4),
            array('db' => 'contact_person', 'dt' => 5),
            array('db' => 'telepon', 'dt' => 6),
            array('db' => 'rentang_waktu', 'dt' => 7),
            array('db' => 'id', 'dt' => 8, 'formatter' => function($d, $row) {
                return '
                    <a href="'.site_url().'t01_customer/read/'.$d.'">Read</a> |
                    <a href="'.site_url().'t01_customer/update/'.$d.'">Update</a> |
                    <a href="'.site_url().'t01_customer/delete/'.$d.'" onclick="javascript: return confirm(\'Are you sure ?\')">Delete</a>
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
        $this->db->or_like('kode', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kota', $q);
        $this->db->or_like('contact_person', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('rentang_waktu', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('kode', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kota', $q);
        $this->db->or_like('contact_person', $q);
        $this->db->or_like('telepon', $q);
        $this->db->or_like('rentang_waktu', $q);
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

/* End of file T01_customer_model.php */
/* Location: ./application/models/T01_customer_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-01 09:29:59 */
/* http://harviacode.com */