<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller {

  public function __construct()
    {
      parent::__construct();
      $this->load->model('User_m');
      $this->load->model('Setting_app_model');
    }

  public function index()
  {
    check_already_login();
    $this->load->view('admin/login');
  }

  public function process()
  {
    $post =$this->input->post(null, TRUE);
    if (isset($post['login'])){
      $this->load->model('user_m');
      $query =$this->user_m->login($post);
      if($query->num_rows() > 0){
        $row = $query->row();
        $params = array(
          'userid' => $row->user_id,
          'status' => 'loggedin'
        );
        $this->session->set_userdata($params);
        echo "<script>window.location='".site_url('dashboard')."'</script>";
      } else {
        $this->session->set_flashdata('message', 'Login gagal, username atau password salah');
        redirect(site_url('auth'));
      }
    }
  }

  public function logout()
  {
    $params = array('userid');
    $this->session->unset_userdata($params);
    redirect('auth');

  }

  public function edit_profil($id){
        $data = array(
            'name'            =>$this->input->post('name',true),
            'address'         =>$this->input->post('address',true),
            'email'         =>$this->input->post('email',true),
        );
        $this->user_m->ubah_data($data,$id);
         echo "<script> alert('Data Berhasil diupdate')</script>";
         echo"<script>window.location='".site_url('auth/profile')."'</script>";
         
    }

    public function edit_password($id){
        if (sha1($this->input->post('lama'))==$this->fungsi->user_login()->password) {
            $data = array(
                'password'          => sha1($this->input->post('password',true)),
            );
            $this->user_m->ubah_data($data,$id);
            echo "<script> alert('Data Password Berhasil diupdate')</script>";
            echo"<script>window.location='".site_url('auth/logout')."'</script>";
        }else{
            echo "<script> alert('Password Lama Salah')</script>";
            echo"<script>window.location='".site_url('auth/profile')."'</script>";
        } 
    }


  public function rubah_password(){
  if(!$this->session->userdata('reset_email')){
    redirect('login');
  }
  $this->form_validation->set_rules('password','password', 'required');
  $this->form_validation->set_rules('passcon','passcon', 'required');
  if($this->form_validation->run() == false){
    $data = array(
      'sett_apps' =>$this->Setting_app_model->get_by_id(1),
    );
    $this->load->view('rubah_password',$data);
  }else{
    $password = sha1($this->input->post('password',true));
    $email    = $this->session->userdata('reset_email');
    $this->db->set('password',$password);
    $this->db->where('email', $email);
    $this->db->update('user');
    $this->db->delete('user_token',['email' =>$email]);
    $this->session->unset_userdata('reset_email');
    echo "<script>
        alert('Password berhasil di rubah, Silahkan Login');
        window.location='".site_url('auth')."'</script>";
  }
}


}