<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T32_cost_sheet_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T32_cost_sheet_detail_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('ssp');
        $this->load->model('t01_customer/T01_customer_model');
        $this->load->model('t02_shipper/T02_shipper_model');
        $this->load->model('t00_lokasi/T00_lokasi_model');
    }

    public function index()
    {
        $data['_sub_judul'] = 'Transaksi';
        $data['_judul'] = 'Cost Sheet'; // ucwords(str_replace('_', ' ', substr('t32_cost_sheet_detail', 4)));
        $data['_view'] = 't32_cost_sheet_detail/t32_cost_sheet_detail_list';
        $this->load->view('welcome/welcome_message', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->T32_cost_sheet_detail_model->json();
    }

    public function json2()
    {
        echo $this->T32_cost_sheet_detail_model->json2();
    }

    public function read($id)
    {
        $row = $this->T32_cost_sheet_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'judul_form' => 'Detail Data',
                'id' => $row->id,
                'job_order' => $row->job_order,
                'vendor' => $row->vendor,
                'cost' => $row->cost,
                'armada' => $row->armada,
                'keterangan' => $row->keterangan,
                'qty' => $row->qty,
                'nilai' => $row->nilai,
                'nominal' => $row->nominal,
                'nomor_ivr' => $row->nomor_ivr,
                'is_hapus' => $row->is_hapus,
            );
            $data['_sub_judul'] = 'Master';
            $data['_judul'] = ucwords(str_replace('_', ' ', substr('t32_cost_sheet_detail', 4)));
            $data['_view'] = 't32_cost_sheet_detail/t32_cost_sheet_detail_read';
            $this->load->view('welcome/welcome_message', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t32_cost_sheet_detail'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t32_cost_sheet_detail/create_action'),
            'id' => set_value('id'),
            'job_order' => set_value('job_order'),
            'vendor' => set_value('vendor'),
            'cost' => set_value('cost'),
            'armada' => set_value('armada'),
            'keterangan' => set_value('keterangan'),
            'qty' => set_value('qty'),
            'nilai' => set_value('nilai'),
            'nominal' => set_value('nominal'),
            'nomor_ivr' => set_value('nomor_ivr'),
            'is_hapus' => set_value('is_hapus'),
        );
        $data['_sub_judul'] = 'Master';
        $data['_judul'] = ucwords(str_replace('_', ' ', substr('t32_cost_sheet_detail', 4)));
        $data['_view'] = 't32_cost_sheet_detail/t32_cost_sheet_detail_form';
        $this->load->view('welcome/welcome_message', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'job_order' => $this->input->post('job_order',TRUE),
                'vendor' => $this->input->post('vendor',TRUE),
                'cost' => $this->input->post('cost',TRUE),
                'armada' => $this->input->post('armada',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
                'qty' => $this->input->post('qty',TRUE),
                'nilai' => $this->input->post('nilai',TRUE),
                'nominal' => $this->input->post('nominal',TRUE),
                'nomor_ivr' => $this->input->post('nomor_ivr',TRUE),
                'is_hapus' => $this->input->post('is_hapus',TRUE),
            );

            $this->T32_cost_sheet_detail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t32_cost_sheet_detail'));
        }
    }

    public function update($id)
    {
        $row = $this->T32_cost_sheet_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t32_cost_sheet_detail/update_action'),
                'id' => set_value('id', $row->id),
                'job_order' => set_value('job_order', $row->job_order),
                'vendor' => set_value('vendor', $row->vendor),
                'cost' => set_value('cost', $row->cost),
                'armada' => set_value('armada', $row->armada),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'qty' => set_value('qty', $row->qty),
                'nilai' => set_value('nilai', $row->nilai),
                'nominal' => set_value('nominal', $row->nominal),
                'nomor_ivr' => set_value('nomor_ivr', $row->nomor_ivr),
                'is_hapus' => set_value('is_hapus', $row->is_hapus),
            );
            $data['_sub_judul'] = 'Master';
            $data['_judul'] = ucwords(str_replace('_', ' ', substr('t32_cost_sheet_detail', 4)));
            $data['_view'] = 't32_cost_sheet_detail/t32_cost_sheet_detail_form';
            $this->load->view('welcome/welcome_message', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t32_cost_sheet_detail'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'job_order' => $this->input->post('job_order',TRUE),
                'vendor' => $this->input->post('vendor',TRUE),
                'cost' => $this->input->post('cost',TRUE),
                'armada' => $this->input->post('armada',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
                'qty' => $this->input->post('qty',TRUE),
                'nilai' => $this->input->post('nilai',TRUE),
                'nominal' => $this->input->post('nominal',TRUE),
                'nomor_ivr' => $this->input->post('nomor_ivr',TRUE),
                'is_hapus' => $this->input->post('is_hapus',TRUE),
            );

            $this->T32_cost_sheet_detail_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t32_cost_sheet_detail'));
        }
    }

    public function delete($id)
    {
        $row = $this->T32_cost_sheet_detail_model->get_by_id($id);

        if ($row) {
            $this->T32_cost_sheet_detail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t32_cost_sheet_detail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t32_cost_sheet_detail'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('job_order', 'job order', 'trim|required');
        $this->form_validation->set_rules('vendor', 'vendor', 'trim|required');
        $this->form_validation->set_rules('cost', 'cost', 'trim|required');
        $this->form_validation->set_rules('armada', 'armada', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('qty', 'qty', 'trim|required|numeric');
        $this->form_validation->set_rules('nilai', 'nilai', 'trim|required|numeric');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        $this->form_validation->set_rules('nomor_ivr', 'nomor ivr', 'trim|required');
        $this->form_validation->set_rules('is_hapus', 'is hapus', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t32_cost_sheet_detail.xls";
        $judul = "t32_cost_sheet_detail";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Job Order");
        xlsWriteLabel($tablehead, $kolomhead++, "Vendor");
        xlsWriteLabel($tablehead, $kolomhead++, "Cost");
        xlsWriteLabel($tablehead, $kolomhead++, "Armada");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        xlsWriteLabel($tablehead, $kolomhead++, "Qty");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai");
        xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
        xlsWriteLabel($tablehead, $kolomhead++, "Nomor Ivr");
        xlsWriteLabel($tablehead, $kolomhead++, "Is Hapus");
        foreach ($this->T32_cost_sheet_detail_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->job_order);
            xlsWriteNumber($tablebody, $kolombody++, $data->vendor);
            xlsWriteNumber($tablebody, $kolombody++, $data->cost);
            xlsWriteNumber($tablebody, $kolombody++, $data->armada);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty);
            xlsWriteNumber($tablebody, $kolombody++, $data->nilai);
            xlsWriteNumber($tablebody, $kolombody++, $data->nominal);
            xlsWriteLabel($tablebody, $kolombody++, $data->nomor_ivr);
            xlsWriteLabel($tablebody, $kolombody++, $data->is_hapus);
            $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

}

/* End of file T32_cost_sheet_detail.php */
/* Location: ./application/controllers/T32_cost_sheet_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-02-06 04:09:20 */
/* http://harviacode.com */
