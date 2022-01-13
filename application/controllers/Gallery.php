<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_album_model');
        $this->load->library('form_validation');
        is_login();
        $this->load->model('User_m');
        $this->load->library('template');
    }

    public function index()
    {
        // $gallery = $this->Gallery_album_model->get_limit_data($config['per_page'], $start, $q);
        $gallery = $this->Gallery_album_model->get_all();
        $data = array(
            'gallery_data' => $gallery,
        );
        $this->template->load_adm_template('admin/gallery/tbl_gallery_album_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Gallery_album_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_album' => $row->nama_album,
		'tag' => $row->tag,
	    );
            $this->template->load_adm_template('admin/gallery/tbl_gallery_album_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }
        
    public function fetch_list_of_album()
    {

        $output = '';

        $gallery_data = $this->Gallery_album_model->get_all();

        foreach ($gallery_data as $gallery)
        {
            $judul = strlen($gallery->nama_album) > 14 ? substr($gallery->nama_album,0,14).'...' : $gallery->nama_album;

            $output.= '
            <div style="position: relative; width: calc(25% - 17px);">
                <div class="tile folder" id="'.$gallery->id.'" data-foldername="'.$gallery->nama_album.'">
                    <i class="fas fa-folder"></i>
                    <h3 style="font-size: 12px;">'.$judul.'</h3>
                    <p style="font-size: 13px;"><span class="badge bg-primary text-white">'.$gallery->tag.'</span></p>
                </div>
                <button class="btn btn-option" style="position: absolute;
right: 17px;
top: 3px;"><i class="fas fa-ellipsis-v"></i></button>
                <ul class="option-menu-ul">
                    <li style="list-style: none;"><a href="#" class="edit-href" id="'.$gallery->id.'" data-tag="'.$gallery->tag.'" data-namaalbum="'.$gallery->nama_album.'" style="text-decoration: none; color: black;">Edit</a></li>
                    <li style="list-style: none;"><a href="#" id="'.$gallery->id.'" class="delete-href" style="text-decoration: none; color: red;">Delete</a></li>
                </ul>
            </div>
            ';
        }

        $arr = array(
            'status' => 'ok',
            'list_of_album' => $output
        );

        echo json_encode($arr);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_album' => $this->input->post('nama_album',TRUE),
                'tag' => $this->input->post('tag',TRUE),
            );

            $this->Gallery_album_model->insert($data);

            $this->fetch_list_of_album();
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gallery_album_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('gallery/update_action'),
		'id' => set_value('id', $row->id),
		'nama_album' => set_value('nama_album', $row->nama_album),
		'tag' => set_value('tag', $row->tag),
	    );
            $this->template->load_adm_template('admin/gallery/tbl_gallery_album_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }
    
    public function update_action() 
    {
       
        $data = array(
    		'nama_album' => $this->input->post('nama_album',TRUE),
    		'tag' => $this->input->post('tag',TRUE),
	    );

        $this->Gallery_album_model->update($this->input->post('id_album', TRUE), $data);
        $this->fetch_list_of_album();
    }
    
    public function delete() 
    {
        $id = $this->input->post('album_id', TRUE);

        $row = $this->Gallery_album_model->get_by_id($id);

        if ($row) {
            $this->Gallery_album_model->delete($id);
            $this->fetch_list_of_album();
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gallery'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_album', 'nama album', 'trim|required');
	$this->form_validation->set_rules('tag', 'tag', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function get_all_picture_by_album_id($album_id)
    {
        $listgambar = $this->Gallery_album_model->get_all_picture_by_album($album_id);

        $list_gambarnya = '
        <div style="position: relative; width: calc(25% - 17px);">
            <div class="tile" id="'.$album_id.'" style="overflow: hidden;">
                <i class="fas fa-upload"></i>
                <h3 style="font-size: 12px;">Upload</h3>
                <input type="file" name="gambarny" id="'.$album_id.'" class="preview_bfr_upload" style="font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;"/>
            </div>
        </div>';

        foreach ($listgambar as $value) {

            $ng = strlen($value->judul_gambar) > 14 ? substr($value->judul_gambar,0,14)."..." : $value->judul_gambar;

            $list_gambarnya .= '
            <div style="position: relative; width: calc(25% - 17px);">
                <div class="tile form show_picture" id="'.$value->id.'" data-filename="'.$value->gambar.'" data-captiongambar="'.$value->caption_gambar.'">
                    <i class="fas fa-image"></i>
                    <h3 style="font-size: 12px;">'.$ng.'</h3>
                </div>
                <button class="btn btn-option" style="position: absolute;
                right: 17px;
                top: 3px;"><i class="fas fa-ellipsis-v"></i></button>
                <ul class="option-menu-ul">
                    <li style="list-style: none;"><a href="#" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: black;">Preview on web</a></li>
                    <li style="list-style: none;"><a href="#" id="'.$value->id.'" class="delete-picture-href" style="text-decoration: none; color: red;">Delete</a></li>
                </ul>
            </div>';
        }

        echo $list_gambarnya;
    }

    public function get_picture($id)
    {
        $datagmbar = $this->db->where('id', $id)->get('tbl_gallery')->row();

        $arr = array(
            'id' => $datagmbar->id,
            'nama_gambar' => $datagmbar->gambar,
            'judul_gambaar' => $datagmbar->judul_gambar
        );

        echo json_encode($arr, true);
    }

    public function upload_picture()
    {
        $album_id = $this->input->post('id_album');
        $judul_gambar = $this->input->post('judul_gambar');
        $caption_gambar = $this->input->post('caption_gambar');

        $config['upload_path']="./assets/images/gallery";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("gambarny")){
            $data = array('upload_data' => $this->upload->data());

            $imagedata = array(
                'album_id' => $album_id,
                'gambar' => $data['upload_data']['file_name'],
                'judul_gambar' => $judul_gambar,
                'caption_gambar' => $caption_gambar
            ); 
             
            $result= $this->Gallery_album_model->insert_gambar($imagedata);

            $this->get_all_picture_by_album_id($album_id);
        }
    }

    public function delete_picture()
    {

        $id = $this->input->post('picture_id');

        $datagmbar = $this->db->where('id', $id)->get('tbl_gallery')->row();

        $album_id = $datagmbar->album_id;

        $judul_gambar = $datagmbar->gambar;

        unlink('assets/images/gallery/'.$judul_gambar);

        $this->Gallery_album_model->delete_picture($id);

        $this->get_all_picture_by_album_id($album_id);
    }
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-01-10 08:10:27 */
/* http://harviacode.com */