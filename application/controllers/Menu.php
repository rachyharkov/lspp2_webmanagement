<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Menu extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Tuk_model');
		$this->load->model('Kalender_kegiatan_model');
		$this->load->library('template');
    }

	public function index()
	{
		$this->home();
	}

	// public function get_page($what_page = NULL)
	// {
	// 	if ($what_page == 'home' || $what_page == null) {
	// 		$this->home();
	// 	}

	// 	if ($what_page == 'profil') {
	// 		$this->profil();
	// 	}

	// 	if ($what_page == 'skema_sertifikasi') {
	// 		$this->skema_sertifikasi();
	// 	}

	// 	if ($what_page == 'informasi') {
	// 		$this->informasi();
	// 	}

	// 	if ($what_page == 'post') {
	// 		$this->post();
	// 	}

	// 	if ($what_page == 'galeri') {
	// 		$this->galeri();
	// 	}

	// 	if ($what_page == 'kontak') {
	// 		$this->kontak();
	// 	}
	// }

	// public function get_full_page($page = null)
	// {
	// 	if ($page == null) {
	// 		$data = array(
	// 			'title_page' => 'LSP P2 - Pupuk Indonesia',
	// 			'classnyak' => $this,
	// 			'laman' => 'home'
	// 		);
	// 		$this->load->view('visitor/wrapper', $data);
	// 	} else {
	// 		$data = array(
	// 			'title_page' => 'LSP P2 - Pupuk Indonesia',
	// 			'classnyak' => $this,
	// 			'laman' => $page
	// 		);
	// 		$this->load->view('visitor/wrapper', $data);
	// 	}
	// }

	public function ceknavactive($value)
	{
		$last = $this->uri->total_segments();
		$v = $this->uri->segment($last);
		
		if ($v == $value) {
			return 'nav-active';
		} else {
			return '';
		}
	}

	//page

	public function home()
	{
		$data = array(
			'title_page' => 'LSP P2 - Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Beranda',
			'list_gambar' => $this->db->select('*')->group_by('album_id','ASC')->limit(5)->get('tbl_gallery')->result(),
			'list_sertifikasi' => $this->db->select('*')->get('tbl_sertifikasi')->result()
		);

		$this->template->load('visitor/home/isi', $data);
	}

	public function profil()
	{
		$data = array(
			'title_page' => 'Profil - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Profil',
		);
		$this->template->load('visitor/profil/isi', $data);
	}


	public function skema_sertifikasi($id_skema_sertifikasi = NULL)
	{
		if (!$id_skema_sertifikasi) {
			$data = array(
				'title_page' => 'Skema Sertifikasi - LSP P2 Pupuk Indonesia',
				'classnyak' => $this,
				'laman' => 'Skema Sertifikasi',
				'list_sertifikasi' => $this->db->select('*')->get('tbl_sertifikasi')->result()
			);
			$this->template->load('visitor/skema_sertifikasi/isi', $data);
		} else {

			$datasertifikasi = $this->db->select('*')->where('id', $id_skema_sertifikasi)->get('tbl_sertifikasi')->row();

			$data = array(
				'title_page' => 'Skema Sertifikasi '. $datasertifikasi->kode_sertifikasi.' - LSP P2 Pupuk Indonesia',
				'classnyak' => $this,
				'laman' => 'Skema Sertifikasi Detail',
				'data_sertifikasi' => $datasertifikasi
			);

			$this->template->load('visitor/skema_sertifikasi/detail', $data);
		}
	}
	

	public function informasi()
	{
		$data = array(
			'title_page' => 'Informasi - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Informasi',
		);

		$this->template->load('visitor/informasi/isi', $data);
	}
	

	public function post($tipepost = NULL, $id_post = NULL, $judul_post = NULL)
	{
		$laman = '';

		if ($tipepost == 0) { //artikel
			$laman = 'Artikel';
		}

		if ($tipepost == 1) { //pengumuman
			$laman = 'Pengumuman';
		}

		if ($tipepost == 2) { //berita
			$laman = 'Berita';
		}

		if (!$id_post) {

			$data = array(
				'title_page' => $laman.' - LSP P2 Pupuk Indonesia',
				'classnyak' => $this,
				'laman' => $laman,
				'posts' => $this->db->select('*')->where('jenis_post', $tipepost)->get('tbl_post')->result(),
				'recommendation_post' => $this->db->select('*')->where('jenis_post', $tipepost)->order_by('dilihat','ASC')->limit(3)->get('tbl_post')->result()
			);

			$this->template->load('visitor/post/isi',$data);
		} else {

			$getpost = $this->db->where('id', $id_post)->get('tbl_post')->row();

			$viewssekarang = intval($getpost->dilihat);

			$updateview = array(
				'dilihat' => $viewssekarang + 1
			);

			$this->db->where('id',$getpost->id)->update('tbl_post',$updateview);

			if ($getpost) {
				$data = array(
					'title_page' => $laman.' - LSP P2 Pupuk Indonesia',
					'classnyak' => $this,
					'laman' => $laman,
					'isi_post' => $getpost
				);

				$this->template->load('visitor/post/read_post',$data);
			} else {
				$this->not_found();
			}
		}

	}
	
	
	public function galeri()
	{
		$data = array(
			'title_page' => 'Galeri - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'list_gambar' => $this->db->select('*')->get('tbl_gallery')->result(),
			'laman' => 'Galeri',
		);

		$this->template->load('visitor/galeri/isi',$data);
	}
	
	public function kontak()
	{
		$data = array(
			'title_page' => 'Kontak - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Kontak',
		);

		$this->template->load('visitor/kontak/isi',$data);
	}

	public function jadwal_kegiatan()
	{

		$data = array(
			'title_page' => 'Jadwal Kegiatan - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Jadwal Kegiatan',
		);

		$this->template->load('visitor/jadwal_kegiatan/isi', $data);
	}


	function getallschedule()
	{
		$stringobject = '';
		$getall = $this->Kalender_kegiatan_model->get_all();
		foreach ($getall as $key => $value) {
			
			$tanggal_mulai = new DateTime($value->tanggal_mulai);
			$tanggal_selesai = new DateTime($value->tanggal_akhir);
			$color = '';

			if ($value->priority == 0) {
				$color = '#04c142';
			}

			if ($value->priority == 1) {
				$color = '#ff7b01';
			}

			if ($value->priority == 2) {
				$color = '#ff3502';
			}

			$stringobject.=
				'{
					id: "'. $value->id.'",
					title: "'. $value->judul_kegiatan.'",
					start: "'. $tanggal_mulai->format('Y-m-d H:i').'",
					end: "'. $tanggal_selesai->format('Y-m-d H:i').'",
					color: "' .$color.'"
				},';
		}

		echo $stringobject;
	}

	function getdetailschedule($id)
	{
		$data = $this->Kalender_kegiatan_model->get_by_id($id);

		$arr = array(
			'id' => $data->id,
			'judul_kegiatan' => $data->judul_kegiatan,
			'tanggal_mulai' => $data->tanggal_mulai,
			'tanggal_akhir' => $data->tanggal_akhir,
			'detail_kegiatan' => $data->detail_kegiatan
		);

		echo json_encode($arr);
	}

	function getdetailtuk($id)
	{
		$data = $this->Tuk_model->get_by_id($id);

		$arr = array(
			'id' => $data->id,
			'nama_tuk' => $data->nama_tuk,
			'alamat_tuk' => $data->alamat_tuk,
			'kota_tuk' => $data->kota_tuk,
			'nomor_telepon_tuk' => $data->nomor_telepon_tuk
		);

		echo json_encode($arr);
	}

	public function asesor()
	{
		$data = array(
			'title_page' => 'Asesor - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Asesor',
			'asesor_list' => $this->db->select('*')->get('tbl_asesor')->result()
		);

		$this->template->load('visitor/asesor/isi', $data);
	}

	public function tuk()
	{
		$data = array(
			'title_page' => 'Tempat Uji Kompetensi - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Tempat Uji Kompetensi',
			'tuk_list' => $this->db->select('*')->get('tbl_tuk')->result()
		);

		$this->template->load('visitor/tuk/isi', $data);
	}


	public function not_found()
	{
		$data = array(
			'title_page' => 'Not Found - LSP P2 Pupuk Indonesia',
			'classnyak' => $this,
			'laman' => 'Not Found',
		);

		$this->template->load('error_404',$data);
	}
	
}