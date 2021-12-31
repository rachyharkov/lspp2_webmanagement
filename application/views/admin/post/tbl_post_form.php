<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>

    <div class="container-fluid">
        <h2 style="margin-top:0px">Tbl_post <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="judul_post">Judul Post <?php echo form_error('judul_post') ?></label>
            <input type="text" class="form-control" name="judul_post" id="judul_post" placeholder="Judul Post"><?php echo $judul_post; ?></input>
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
                        <label for="int">Jenis Post <?php echo form_error('jenis_post') ?></label>
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
                        <input type="date" class="form-control" name="tanggal_post" id="tanggal_post" placeholder="Tanggal Post" value="<?php echo $tanggal_post; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag <?php echo form_error('tag') ?></label>
                        <input class="form-control" type="text" name="tag" id="tag" placeholder="Tag"><?php echo $tag; ?></input>
                    </div>

                    <div class="form-group">
                        <label for="foto_sampul">Foto Sampul <?php echo form_error('foto_sampul') ?></label>
                        <img id="frame" src="<?php echo base_url().'assets/images/blog-asset/'.$foto_sampul ?>" style="object-fit: cover; display: <?php echo $action == 'form_update_action' ? 'block':'none' ?>; width: 100%; height: 0px;" />
                        <input type="file" class="form-control" name="foto_sampul" id="foto_sampul" placeholder="Foto Sampul" accept=".png,.jpeg,.jpg" onchange="preview(this)"><?php echo $foto_sampul; ?></input>
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
                $('#frame').css('height','200px')
                $('#frame-pdf').css('height','0px')
                frame.style.display = "block"
                frame.src=URL.createObjectURL(event.target.files[0]);
                break;
            default:
                $('#frame').css('height','0px')
                $('#frame-pdf').css('height','0px')
                alert('Not allowed');
                this.value = '';
            }
        }
    }
    </script>