<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T00_lokasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T00_lokasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        // $this->load->view('t00_lokasi/t00_lokasi_list');
        $data['_view'] = 't00_lokasi/t00_lokasi_list';
    	// $data['_caption'] = 'Dashboard';
    	$this->load->view('welcome/welcome_message', $data);
        // $this->load->view('t00_lokasi/t00_lokasi_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T00_lokasi_model->json();
    }

    public function read($id)
    {
        $row = $this->T00_lokasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama' => $row->nama,
            );
            $this->load->view('t00_lokasi/t00_lokasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_lokasi'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t00_lokasi/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
        );
        $this->load->view('t00_lokasi/t00_lokasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
            );

            $this->T00_lokasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t00_lokasi'));
        }
    }

    public function update($id)
    {
        $row = $this->T00_lokasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t00_lokasi/update_action'),
                'id' => set_value('id', $row->id),
                'nama' => set_value('nama', $row->nama),
            );
            $this->load->view('t00_lokasi/t00_lokasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_lokasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
            );

            $this->T00_lokasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t00_lokasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->T00_lokasi_model->get_by_id($id);

        if ($row) {
            $this->T00_lokasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t00_lokasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t00_lokasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t00_lokasi.xls";
        $judul = "t00_lokasi";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        foreach ($this->T00_lokasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file T00_lokasi.php */
/* Location: ./application/controllers/T00_lokasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-01-30 10:17:57 */
/* http://harviacode.com */
