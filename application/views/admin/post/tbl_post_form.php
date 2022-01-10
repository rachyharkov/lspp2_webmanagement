<style>
    
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
<img id="frame" src="<?php echo base_url().'assets/images/blog-asset/'.$foto_sampul ?>" style="position: absolute;
    top: 65px;z-index: 1;object-fit: cover;<?php if($foto_sampul){echo 'display: block; width: 100%; height: 215px;';}else{echo 'display: none; width: 100%; height: 0px;';} ?>" />
    <div class="container-fluid" style="position: relative;z-index: 1;">
        <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
	    <div class="form-group" style="margin-bottom: 5vh;
                margin-top: 7vh;">
            <?php echo form_error('judul_post') ?>
            <input type="text" class="form-control" value="<?php echo $judul_post; ?>" name="judul_post" id="judul_post" placeholder="Judul Post" style="    background: #48484885;
                border: none;
                font-size: 3vw;
                color: white;"/>
        </div>
        <div class="container" style="padding: 0;">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="form-group">
                        <label for="isi_post"><?php echo form_error('isi_post') ?></label>
                         <textarea class="form-control" style="height: 80vh;" name="isi_post" id="isi_post" placeholder="Isi Post"><?php echo $isi_post; ?>
                        </textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="jenis_post"><?php echo form_error('jenis_post') ?></label>
                        <select class="form-control" name="jenis_post" id="jenis_post" placeholder="Jenis Post">
                            <option>-</option>
                            <?php
                            $arrjenispost = array(
                                0 => 'Artikel',
                                1 => 'Pengumuman',
                                2 => 'Berita'
                            );

                            foreach ($arrjenispost as $key => $value) {
                                ?>
                                <option value="<?php echo $key ?>" <?php echo $key == $jenis_post ? 'selected' : '' ?>><?php echo $value ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Tanggal Post <?php echo form_error('tanggal_post') ?></label>
                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                            <input type="text" name="tanggal_post" id="tanggal_post" placeholder="Tanggal Post" value="<?php echo $tanggal_post; ?>" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag <?php echo form_error('tag') ?></label>
                        <input class="form-control" type="text" name="tag" id="tag" placeholder="Tag"><?php echo $tag; ?></input>
                    </div>

                    <div class="form-group">
                        <div class="upload-btn-wrapper">
                          <button class="btn btn-secondary">Upload Cover</button>
                          <input type="file" name="myfile" />
                            <input type="file" name="foto_sampul" id="foto_sampul" placeholder="Foto Sampul" accept=".png,.jpeg,.jpg" onchange="preview(this)"/>
                        </div>
                        <input type="hidden" name="foto_sampul_old" id="foto_sampul_old" value="<?php echo $foto_sampul; ?>">
                    </div>
                </div>
            </div>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('post') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#tanggal_post').val('<?php echo $tanggal_post; ?>')
        })

        $('#datetimepicker2').datetimepicker({
            locale: 'id',
            icons: {
                time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right',
                today: 'fas fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'fas fa-times'
            }
        });

        CKEDITOR.replace('isi_post', {
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