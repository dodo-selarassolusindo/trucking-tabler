<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T05_satuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T05_satuan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('ssp');
    }

    public function index()
    {
        $data['_sub_judul'] = 'Master';
        $data['_judul'] = ucfirst(substr('t05_satuan', 4));
        $data['_view'] = 't05_satuan/t05_satuan_list';
        $this->load->view('welcome/welcome_message', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T05_satuan_model->json();
    }

    public function json2()
    {
        echo $this->T05_satuan_model->json2();
    }

    public function read($id)
    {
        $row = $this->T05_satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'judul_form' => 'Detail Data',
                'id' => $row->id,
                'kode' => $row->kode,
                'nama' => $row->nama,
                'tipe' => $row->tipe,
            );
            $data['_sub_judul'] = 'Master';
            $data['_judul'] = ucfirst(substr('t05_satuan', 4));
            $data['_view'] = 't05_satuan/t05_satuan_read';
            $this->load->view('welcome/welcome_message', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_satuan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t05_satuan/create_action'),
            'id' => set_value('id'),
            'kode' => set_value('kode'),
            'nama' => set_value('nama'),
            'tipe' => set_value('tipe'),
        );
        $data['_sub_judul'] = 'Master';
        $data['_judul'] = ucfirst(substr('t05_satuan', 4));
        $data['_view'] = 't05_satuan/t05_satuan_form';
        $this->load->view('welcome/welcome_message', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'tipe' => $this->input->post('tipe',TRUE),
            );

            $this->T05_satuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t05_satuan'));
        }
    }

    public function update($id)
    {
        $row = $this->T05_satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t05_satuan/update_action'),
                'id' => set_value('id', $row->id),
                'kode' => set_value('kode', $row->kode),
                'nama' => set_value('nama', $row->nama),
                'tipe' => set_value('tipe', $row->tipe),
            );
            $data['_sub_judul'] = 'Master';
            $data['_judul'] = ucfirst(substr('t05_satuan', 4));
            $data['_view'] = 't05_satuan/t05_satuan_form';
            $this->load->view('welcome/welcome_message', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_satuan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode' => $this->input->post('kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'tipe' => $this->input->post('tipe',TRUE),
            );

            $this->T05_satuan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t05_satuan'));
        }
    }

    public function delete($id)
    {
        $row = $this->T05_satuan_model->get_by_id($id);

        if ($row) {
            $this->T05_satuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t05_satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t05_satuan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t05_satuan.xls";
        $judul = "t05_satuan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Kode");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Tipe");
        foreach ($this->T05_satuan_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->tipe);
            $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

}

/* End of file T05_satuan.php */
/* Location: ./application/controllers/T05_satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-02 04:24:54 */
/* http://harviacode.com */