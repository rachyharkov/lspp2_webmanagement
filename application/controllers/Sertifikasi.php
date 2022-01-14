<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sertifikasi_model');
        $this->load->library('form_validation');
        is_login();
        $this->load->model('User_m');
        $this->load->library('template');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sertifikasi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sertifikasi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sertifikasi';
            $config['first_url'] = base_url() . 'sertifikasi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sertifikasi_model->total_rows($q);
        $sertifikasi = $this->Sertifikasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sertifikasi_data' => $sertifikasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load_adm_template('admin/sertifikasi/tbl_sertifikasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sertifikasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_sertifikasi' => $row->nama_sertifikasi,
		'kode_sertifikasi' => $row->kode_sertifikasi,
		'deskripsi' => $row->deskripsi,
		'logo' => $row->logo,
	    );
            $this->template->load_adm_template('admin/sertifikasi/tbl_sertifikasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sertifikasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sertifikasi/create_action'),
    	    'id' => set_value('id'),
    	    'nama_sertifikasi' => set_value('nama_sertifikasi'),
    	    'kode_sertifikasi' => set_value('kode_sertifikasi'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'logo' => set_value('logo'),
            'file_skema' => set_value('file_skema'),
    	);
        $this->template->load_adm_template('admin/sertifikasi/tbl_sertifikasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->load->library('upload'); //call library upload 
        $nama_sertifikasi = $this->input->post('nama_sertifikasi',TRUE);
        $kode_sertifikasi = $this->input->post('kode_sertifikasi',TRUE);
        
        $file_logo = '';
        $file_dokumenskema = '';
        if($_FILES['logo']['name']){

            $filenamee = $kode_sertifikasi.'-'. str_replace(' ', '', strtolower($nama_sertifikasi)).'-'.substr(sha1(rand()),0,3);

            $config['upload_path']          = './assets/images/skema_ic'; 
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 5000;
            $config['file_name']            = $filenamee;

            $_FILES['file']['name'] = $_FILES['logo']['name'];
            $_FILES['file']['type'] = $_FILES['logo']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['logo']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['logo']['error'];
            $_FILES['file']['size'] = $_FILES['logo']['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();

            $file_logo = $uploadData['file_name'];
        }

        if($_FILES['file_skema']['name']){

            $filenamee = $kode_sertifikasi.'-'. str_replace(' ', '', strtolower($nama_sertifikasi)).'-'.substr(sha1(rand()),0,3);

            $config['upload_path']          = './assets/documents'; 
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 30000;
            $config['file_name']            = $filenamee;

            $_FILES['file']['name'] = $_FILES['file_skema']['name'];
            $_FILES['file']['type'] = $_FILES['file_skema']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['file_skema']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['file_skema']['error'];
            $_FILES['file']['size'] = $_FILES['file_skema']['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();

            $file_dokumenskema = $uploadData['file_name'];
        }

        $data = array(
            'nama_sertifikasi' => $this->input->post('nama_sertifikasi',TRUE),
            'kode_sertifikasi' => $kode_sertifikasi,
            'deskripsi' => $this->input->post('deskripsi',FALSE),
            'logo' => $file_logo,
            'file_skema' => $file_dokumenskema,
        );

        $this->Sertifikasi_model->insert($data);
        $this->session->set_flashdata('message', 'Sukses menambahkan sertifikasi');
        redirect(site_url('sertifikasi'));
    }
    
    public function update($id) 
    {
        $row = $this->Sertifikasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sertifikasi/update_action'),
        		'id' => set_value('id', $row->id),
        		'nama_sertifikasi' => set_value('nama_sertifikasi', $row->nama_sertifikasi),
        		'kode_sertifikasi' => set_value('kode_sertifikasi', $row->kode_sertifikasi),
        		'deskripsi' => set_value('deskripsi', $row->deskripsi),
        		'logo' => set_value('logo', $row->logo),
                'file_skema' => set_value('file_skema', $row->file_skema),
    	    );
            $this->template->load_adm_template('admin/sertifikasi/tbl_sertifikasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sertifikasi'));
        }
    }
    
    public function update_action() 
    {
        $this->load->library('upload');

        $logoold = $this->input->post('logo_old');
        $dokumenskemaold = $this->input->post('file_skema_old');

        $nama_sertifikasi = $this->input->post('nama_sertifikasi',TRUE);

        $file_logo = $logoold;
        $file_dokumenskema = $dokumenskemaold;
        if($_FILES['logo']['name']){

            $filenamee = $this->input->post('kode_sertifikasi',TRUE).'-'. str_replace(' ', '', strtolower($nama_sertifikasi)).'-'.substr(sha1(rand()),0,3);

            unlink('assets/images/skema_ic/'.$logoold);

            $config['upload_path']          = './assets/images/skema_ic'; 
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 5000;
            $config['file_name']            = $filenamee;

            $_FILES['file']['name'] = $_FILES['logo']['name'];
            $_FILES['file']['type'] = $_FILES['logo']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['logo']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['logo']['error'];
            $_FILES['file']['size'] = $_FILES['logo']['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();

            $file_logo = $uploadData['file_name'];
        }

        if($_FILES['file_skema']['name']){

            $filenamee = $this->input->post('kode_sertifikasi',TRUE).'-'. str_replace(' ', '', strtolower($nama_sertifikasi)).'-'.substr(sha1(rand()),0,3);

            unlink('assets/documents/'.$dokumenskemaold);

            $config['upload_path']          = './assets/documents'; 
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 30000;
            $config['file_name']            = $filenamee;

            $_FILES['file']['name'] = $_FILES['file_skema']['name'];
            $_FILES['file']['type'] = $_FILES['file_skema']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['file_skema']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['file_skema']['error'];
            $_FILES['file']['size'] = $_FILES['file_skema']['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();

            $file_dokumenskema = $uploadData['file_name'];
        }

        $data = array(
            'nama_sertifikasi' => $this->input->post('nama_sertifikasi',TRUE),
            'kode_sertifikasi' => $this->input->post('kode_sertifikasi',TRUE),
            'deskripsi' => $this->input->post('deskripsi',FALSE),
            'logo' => $file_logo,
            'file_skema' => $file_dokumenskema
        );

        $this->Sertifikasi_model->update($this->input->post('id', TRUE), $data);

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('sertifikasi'));
    }
    
    public function delete($id) 
    {
        $row = $this->Sertifikasi_model->get_by_id($id);

        if ($row) {

            unlink('assets/images/skema_ic'.$row->logo);
            unlink('assets/documents/'.$row->file_skema);

            $this->Sertifikasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sertifikasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sertifikasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sertifikasi', 'nama sertifikasi', 'trim|required');
	$this->form_validation->set_rules('kode_sertifikasi', 'kode sertifikasi', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_sertifikasi.xls";
        $judul = "tbl_sertifikasi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sertifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Sertifikasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");

	foreach ($this->Sertifikasi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sertifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_sertifikasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logo);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Sertifikasi.php */
/* Location: ./application/controllers/Sertifikasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-14 05:13:06 */
/* http://harviacode.com */