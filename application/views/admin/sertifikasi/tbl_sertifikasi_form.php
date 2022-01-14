<style>
    
.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
    border: 2px dashed black;
    height: 160px;
    width: 160px;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>

<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>


<div class="container-fluid">
    <h2 style="margin-top:0px"><?php echo $button ?> Skema Sertifikasi</h2>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <div class="upload-btn-wrapper">
                        <p style="margin: auto;">Upload Logo</p>
                        <img id="frame" src="<?php echo $logo ? base_url().'assets/images/skema_ic/'.$logo : '' ?>" style="object-fit: cover; height: 100%; width: 100%;position: absolute;top: 0;">
                        <input type="file" name="logo" id="logo" placeholder="Foto Sampul" accept=".png,.jpeg,.jpg" onchange="preview(this)"/>
                        <input type="hidden" name="logo_old" value="<?php echo $logo ?>">
                    </div>
                </div>  
            </div>
            <div class="col-5">
        	    <div class="form-group">
                    <label for="nama_sertifikasi">Nama Sertifikasi <?php echo form_error('nama_sertifikasi') ?></label>
                    <input class="form-control" value="<?php echo $nama_sertifikasi; ?>" name="nama_sertifikasi" id="nama_sertifikasi" placeholder="Nama Sertifikasi"/>
                </div>
        	    <div class="form-group">
                    <label for="kode_sertifikasi">Kode Sertifikasi <?php echo form_error('kode_sertifikasi') ?></label>
                    <input class="form-control" value="<?php echo $kode_sertifikasi; ?>" name="kode_sertifikasi" id="kode_sertifikasi" placeholder="Kode Sertifikasi"/>
                </div>
            </div>
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
        <div class="form-group">
            <label for="file_skema">Dokumen Skema <?php if ($button == 'Update') {
                ?>
                <span style="color: red; font-size: 9px;">(Biarkan kosong jika menggunakan skema lama)</span>
                <?php
            } ?></label>
            <input class="form-control" type="file" name="file_skema" id="file_skema" accept=".pdf" placeholder="file_skema" />
            <input type="hidden" name="file_skema_old" value="<?php echo $file_skema ?>">
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sertifikasi') ?>" class="btn btn-default">Cancel</a>
   </form>
</div>

<script>
    CKEDITOR.replace('deskripsi', {
        height: '60vh',
        filebrowserUploadUrl: '<?php echo base_url('post/uploadBlogImageasset') ?>',
    });

    function preview(s) {
        if(s.files[0].size > 2097152){
           s.value = ""
           frame.style.display = "none"
           alert("Maksimal lampiran 2 MB")
        } else {

            var ext = s.value.match(/\.([^\.]+)$/)[1];
            switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
                $('#frame').css('height','215px')
                frame.style.display = "block"
                frame.src=URL.createObjectURL(event.target.files[0]);
                break;
            default:
                $('#frame').css('height','0px')
                alert('Not allowed');
                this.value = '';
            }
        }
    }
</script>