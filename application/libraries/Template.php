<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
  function load($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['contentnya'] = $this->_ci->load->view($content, $data, TRUE);

        $data['preloader'] = $this->_ci->load->view('preloader', $data, TRUE);
        
        $this->_ci->load->view('visitor/template', $data);
    }
}
?>