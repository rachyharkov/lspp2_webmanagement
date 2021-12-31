<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
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
            $config['base_url'] = base_url() . 'post/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'post/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'post/index.html';
            $config['first_url'] = base_url() . 'post/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Post_model->total_rows($q);
        $post = $this->Post_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'post_data' => $post,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load_adm_template('admin/post/tbl_post_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Post_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul_post' => $row->judul_post,
		'jenis_post' => $row->jenis_post,
		'tanggal_post' => $row->tanggal_post,
		'tag' => $row->tag,
		'penulis_post' => $row->penulis_post,
		'foto_sampul' => $row->foto_sampul,
		'isi_post' => $row->isi_post,
		'dilihat' => $row->dilihat,
	    );
            $this->template->load_adm_template('admin/post/tbl_post_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('post/create_action'),
	    'id' => set_value('id'),
	    'judul_post' => set_value('judul_post'),
	    'jenis_post' => set_value('jenis_post'),
	    'tanggal_post' => set_value('tanggal_post'),
	    'tag' => set_value('tag'),
	    'penulis_post' => set_value('penulis_post'),
	    'foto_sampul' => set_value('foto_sampul'),
	    'isi_post' => set_value('isi_post'),
	    'dilihat' => set_value('dilihat'),
	);
        $this->template->load_adm_template('admin/post/tbl_post_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $this->load->library('upload'); //call library upload 

            if($_FILES['foto_sampul']['name']){
                $filenamee = 'sampul-'.date('ymdhms').'-'.substr(sha1(rand()),0,10);

                $config['upload_path']          = './assets/images/blog-asset'; 
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 5000;
                $config['file_name']            = $filenamee;

                $_FILES['file']['name'] = $_FILES['foto_sampul']['name'];
                $_FILES['file']['type'] = $_FILES['foto_sampul']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['foto_sampul']['tmp_name'];
                $_FILES['file']['error'] = $_FILES['foto_sampul']['error'];
                $_FILES['file']['size'] = $_FILES['foto_sampul']['size'];
                $this->upload->initialize($config);
                $this->upload->do_upload('file');
                $uploadData = $this->upload->data();
                $data = array(
                    'judul_post' => $this->input->post('judul_post',TRUE),
                    'jenis_post' => $this->input->post('jenis_post',TRUE),
                    'tanggal_post' => $this->input->post('tanggal_post',TRUE),
                    'tag' => $this->input->post('tag',TRUE),
                    'penulis_post' => $this->session->userdata('userid'),
                    'foto_sampul' => $uploadData['file_name'],
                    'isi_post' => $this->input->post('isi_post',FALSE),
                    'dilihat' => 0,
                );

                $this->Post_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('post'));
            } else {
                echo 'no files for'.$_FILES['attachment']['name'].'???';
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('post/update_action'),
		'id' => set_value('id', $row->id),
		'judul_post' => set_value('judul_post', $row->judul_post),
		'jenis_post' => set_value('jenis_post', $row->jenis_post),
		'tanggal_post' => set_value('tanggal_post', $row->tanggal_post),
		'tag' => set_value('tag', $row->tag),
		'penulis_post' => set_value('penulis_post', $row->penulis_post),
		'foto_sampul' => set_value('foto_sampul', $row->foto_sampul),
		'isi_post' => set_value('isi_post', $row->isi_post),
		'dilihat' => set_value('dilihat', $row->dilihat),
	    );
            $this->template->load_adm_template('admin/post/tbl_post_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul_post' => $this->input->post('judul_post',TRUE),
		'jenis_post' => $this->input->post('jenis_post',TRUE),
		'tanggal_post' => $this->input->post('tanggal_post',TRUE),
		'tag' => $this->input->post('tag',TRUE),
		'penulis_post' => $this->input->post('penulis_post',TRUE),
		'foto_sampul' => $this->input->post('foto_sampul',TRUE),
		'isi_post' => $this->input->post('isi_post',TRUE),
		'dilihat' => $this->input->post('dilihat',TRUE),
	    );

            $this->Post_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('post'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Post_model->get_by_id($id);

        if ($row) {
            $this->Post_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('post'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('post'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_post', 'judul post', 'trim|required');
	$this->form_validation->set_rules('jenis_post', 'jenis post', 'trim|required');
	$this->form_validation->set_rules('tanggal_post', 'tanggal post', 'trim|required');
	$this->form_validation->set_rules('tag', 'tag', 'trim|required');

	$this->form_validation->set_rules('isi_post', 'isi post', 'trim|required');


	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_post.xls";
        $judul = "tbl_post";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Post");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Post");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Post");
	xlsWriteLabel($tablehead, $kolomhead++, "Tag");
	xlsWriteLabel($tablehead, $kolomhead++, "Penulis Post");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Sampul");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Post");
	xlsWriteLabel($tablehead, $kolomhead++, "Dilihat");

	foreach ($this->Post_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_post);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jenis_post);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_post);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tag);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penulis_post);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_sampul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_post);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dilihat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function uploadBlogImageasset()
    {
        if(isset($_FILES['upload']['name']))
        {
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . '.' . $extension;
            $allowed_extension = array("jpg", "jpeg", "png","PNG","JPEG","JPG");
            if(in_array($extension, $allowed_extension))
            {
                move_uploaded_file($file, './assets/images/blog-asset/' . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = base_url().'assets/images/blog-asset/' . $new_image_name;
                $message = '';
                echo"<script>window.parent.CKEDITOR.tools.callFunction('$function_number','$url','$message')</script>";

            }
        }
    }

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-12-31 08:36:59 */
/* http://harviacode.com */