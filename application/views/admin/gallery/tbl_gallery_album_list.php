<style>

.stage{
  max-width:80%;margin:60px 10%;
  position:relative;  
}
.folder-wrap{
  display: flex;
  flex-wrap:wrap;
}
.folder-wrap::before{
  content: attr(data-content);
  display: block;
  position: absolute;
  top:-40px;
}
.folder-wrap:first-child::before{
  content:'Home (top of file structure)';
  display: block;
  position: absolute;
  top:-40px;
}
.tile{
    border-radius: 3px;
    margin-bottom: 23px;
    text-align: center;
    border: 1px solid #eeeeee;
    transition: 0.2s all cubic-bezier(0.4, 0.0, 0.2, 1);
    position: relative;
    padding: 16px 10px 8px;
    margin-right: 17px;
    cursor: pointer;
}
.tile:hover{
  box-shadow: 0px 7px 5px -6px rgba(0, 0, 0, 0.12);
}
.tile i{
    color: #00A8FF;
    height: 55px;
    margin-bottom: 20px;
    font-size: 55px;
    display: block;
    line-height: 54px;
    cursor: pointer;
}
.tile i.mdi-file-document{
  color:#8fd9ff;
}

.back{
  font-size: 26px;
  border-radius: 50px;
  background: #00a8ff;
  border: 0;
  color: white;
  width: 60px;
  height: 60px;
  margin: 20px 20px 0;
  outline:none;
  cursor:pointer;
}

.option-menu-ul {
    position: absolute;
    top: 30px;
    right: 4px;
    background: white;
    padding: 10px 32px;
    border: 1px solid #eeeeee;
    border-radius: 8px;
    display: none;
}

.option-menu-ul.active {
    display: block !important;
}

/* Transitioning */
.folder-wrap{
  position: absolute;
  width: 100%;
  transition: .365s all cubic-bezier(.4,0,.2,1);
  pointer-events: none;
  opacity: 0;
  top: 0;
}
.folder-wrap.level-up{
  transform: scale(1.2);
    
}
.folder-wrap.level-current{
  transform: scale(1);
  pointer-events:all;
  opacity:1;
  position:relative;
  height: auto;
  overflow: visible;
}
.folder-wrap.level-down{
  transform: scale(0.8);  
}
</style>


    <div class="container-fluid">
        <button class="back">
          <i class="fas fa-chevron-left"></i>
        </button>
        <button class="btn btn-primary btn-add-something add-album">
          <i class="fas fa-folder-plus"></i> Album Baru
        </button>
        <div class="stage">
          <!-- initially hidden right-click menu -->
          <div class="folder-wrap level-current scrolling">
            <?php
            foreach ($gallery_data as $gallery)
            {
                ?>
                <div style="position: relative; width: calc(25% - 17px);">
                    <div class="tile folder" id="<?php echo $gallery->id ?>" data-foldername="<?php echo $gallery->nama_album ?>">
                        <i class="fas fa-folder"></i>
                        <h3 style="font-size: 12px;"><?php echo strlen($gallery->nama_album) > 14 ? substr($gallery->nama_album,0,14)."..." : $gallery->nama_album; ?></h3>
                        <p style="font-size: 13px;"><span class="badge bg-primary text-white"><?php echo $gallery->tag ?></span></p>
                    </div>
                    <button class="btn btn-option" style="position: absolute;
    right: 17px;
    top: 3px;"><i class="fas fa-ellipsis-v"></i></button>
                    <ul class="option-menu-ul">
                        <li style="list-style: none;"><a href="#" class="edit-href" id="<?php echo $gallery->id ?>" data-tag="<?php echo $gallery->tag ?>" data-namaalbum="<?php echo $gallery->nama_album ?>" style="text-decoration: none; color: black;">Edit</a></li>
                        <li style="list-style: none;"><a href="#" id="<?php echo $gallery->id ?>" class="delete-href" style="text-decoration: none; color: red;">Delete</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="folder-wrap level-down">
                
            </div><!-- .folder-wrap -->
        </div><!-- .stage -->
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 742px !important;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
<div class="modal fade" id="formAlbumModal" tabindex="-1" role="dialog" aria-labelledby="formAlbumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="form_album_add">
          <div class="modal-header">
            <h5 class="modal-title" id="formAlbumModalLabel">Tambah Album</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <input type="text" required class="form-control" id="nama_album" name="nama_album" placeholder="Masukan nama album">
            </div>
            <div class="form-group">
                <input type="text" required class="form-control" id="tag" name="tag" placeholder="Tag">
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="album_id" name="id_album" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="formImageUploadtoalbumModal" tabindex="-1" role="dialog" aria-labelledby="formImageUploadtoalbumModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="form_album_add">
          <div class="modal-header">
            <h5 class="modal-title" id="formImageUploadtoalbumModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <input type="text" required class="form-control" id="nama_album" name="nama_album" placeholder="Masukan nama album">
            </div>
            <div class="form-group">
                <input type="text" required class="form-control" id="tag" name="tag" placeholder="Tag">
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="album_id" name="id_album" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="formImageUpload" tabindex="-1" role="dialog" aria-labelledby="formImageUploadLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form id="form_image_add">
          <div class="modal-header">
            <h5 class="modal-title" id="formImageUploadLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img id="frame_preview_image" src="" />
            <div class="form-group" style="margin-top: 2vh;">
                <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar">
            </div>
            <div class="form-group">
                <textarea name="caption_gambar" class="form-control" rows="3" placeholder="Masukan Caption"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="album_id_toupload" name="id_album" value="">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
    </div>
  </div>
</div>

    <script>
$(document).ready(function() {
  // Folder on click
    $(document).on('click','.folder', function() {
        
        const album_id = $(this).attr('id')

        const album_name = $(this).data('foldername')

        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>Gallery/get_all_picture_by_album_id/" + album_id,
            success: function(data){
                console.log( "Drill down" )
                $('.btn-add-something').hide()
                $('.level-up').removeClass('level-up')
                $('.level-current').addClass('level-up')
                $('.level-current').removeClass('level-current')       
                $('.level-down').addClass('level-current');
                $('.level-down').removeClass('level-down').next().addClass('level-down')
                $('.folder-wrap').attr('data-content',album_name)
                $('.level-current').html(data)
            },
            error: function(error) {
                Swal.fire({
                  icon: 'error',
                  title: "Oops!",
                  text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                })
            }
        });
    });

    $(document).on('click', '.add-album', function() {
        $('#nama_album').val('')
        $('#tag').val('')
        $('#formAlbumModal').find('h5').text('Tambah Album Baru')
        $('#formAlbumModal').find('form').attr('id','form_album_add')
        $('#formAlbumModal').modal('toggle')
    })

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    $(document).on('submit', '#form_album_add', function(e) {
        e.preventDefault()
                
        if ($(this).valid) return false;

        var a = this

        var btnselected = $(document.activeElement)

        btnselected.html('<i class="fas fa-sync fa-spin"></i>').addClass('disabled').attr('disabled')

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Gallery/create_action",
            data:new FormData(a), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                var dt = JSON.parse(data)

               Toast.fire({
                  icon: 'success',
                  title: 'Album berhasil ditambahkan'
                })
                btnselected.html('Simpan').removeClass('disabled').removeAttr('disabled')

                $('.level-current').html(dt.list_of_album);
                $('#formAlbumModal').modal('toggle')
            },
            error: function(error) {
                Swal.fire({
                  icon: 'error',
                  title: "Oops!",
                  text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                })
                btnselected.html('Simpan').removeClass('disabled').removeAttr('disabled')
            }
        }) 
    })

    $(document).on('submit', '#form_album_update', function(e) {
        e.preventDefault()
                
        if ($(this).valid) return false;

        var a = this

        var btnselected = $(document.activeElement)

        btnselected.html('<i class="fas fa-sync fa-spin"></i>').addClass('disabled').attr('disabled')

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Gallery/update_action",
            data:new FormData(a), //penggunaan FormData
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                var dt = JSON.parse(data)

                Toast.fire({
                  icon: 'success',
                  title: 'Album berhasil diedit'
                })
                btnselected.html('Simpan').removeClass('disabled').removeAttr('disabled')

                $('.level-current').html(dt.list_of_album);
                $('#formAlbumModal').modal('toggle')
            },
            error: function(error) {
                Swal.fire({
                  icon: 'error',
                  title: "Oops!",
                  text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                })
                btnselected.html('Simpan').removeClass('disabled').removeAttr('disabled')
            }
        }) 
    })


    $(document).on('change','.preview_bfr_upload', function() {

        var thiselin = $(this)

        var album_id = $(this).attr('id')

        if(thiselin.get(0).files[0].size > 2097152){
           thiselin.get(0).value = ""
           $('#frame_preview_image').get(0).style.display = "none"
           alert("Maksimal lampiran 2 MB")
        } else {

            var ext = thiselin.get(0).value.match(/\.([^\.]+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'jpeg':
                case 'png':
                    alert('sip, INITIALIZING...')
                    $('#frame_preview_image').css('width','100%')
                    $('#frame_preview_image').get(0).style.display = "block"
                    $('#frame_preview_image').get(0).src=URL.createObjectURL(event.target.files[0]);
                    $('#formImageUpload').find('form').attr('id','form_image_add')
                    $('#formImageUpload').modal('toggle')
                    $('#album_id_toupload').val(album_id)
                    break;
                default:
                    $('#frame_preview_image').css('width','0px')
                    alert('Not allowed');
                    thiselin.get(0).value = '';
            }
        }
    })

    $(document).on('submit', '#form_image_add', function(e) {
        e.preventDefault()

        if ($(this).valid) return false;

        var a = this

        var formData = new FormData(a);

        formData.append("gambarny", $('.preview_bfr_upload').get(0).files[0])

        var btnselected = $(document.activeElement)

        btnselected.html('<i class="fas fa-sync fa-spin"></i>').addClass('disabled').attr('disabled')

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Gallery/upload_picture",
            data: formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function(data){
                $('#formImageUpload').modal('toggle')
               
                Toast.fire({
                  icon: 'success',
                  title: 'Gambar berhasil ditambahkan'
                })

                btnselected.html('Upload').removeClass('disabled').removeAttr('disabled')

                $('.level-current').html(data);
            },
            error: function(error) {
                Swal.fire({
                  icon: 'error',
                  title: "Oops!",
                  text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                })
                btnselected.html('Upload').removeClass('disabled').removeAttr('disabled')
            }
        }) 
    })
    
    $(document).on('click','.show_picture', function() {
        $('#exampleModal').modal('toggle')

        const picture_id = $(this).attr('id')

        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>Gallery/get_picture/" + picture_id,
            success: function(data){

                var dt = JSON.parse(data)

                $('.modal-body').html(`
                    <div>
                        <img src="<?php echo base_url().'assets/images/gallery/${dt.nama_gambar}' ?>" style="width: 100%;">
                    </div>
                    `)
            },
            error: function(error) {
                Swal.fire({
                  icon: 'error',
                  title: "Oops!",
                  text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                })
            }
        });
    })    

    $(document).on('click',function() {
        // alert('clicked outside');
        $('.option-menu-ul').removeClass('active')
    });

    $(document).on('click', '.btn-option',function(event) {
        $('.option-menu-ul').removeClass('active')
        // alert('clicked inside');
        $(this).next().toggleClass('active')
        event.stopPropagation();
    });

    $(document).on('click','.edit-href', function() {

        var nama_album = $(this).data('namaalbum')
        var tag = $(this).data('tag')
        var album_id = $(this).attr('id')

        $('#nama_album').val(nama_album)
        $('#tag').val(tag)
        $('#album_id').val(album_id)

        $('#formAlbumModal').find('h5').text('Edit Album')
        $('#formAlbumModal').find('form').attr('id','form_album_update')
        $('#formAlbumModal').modal('toggle')
    })

    $(document).on('click','.delete-href', function() {
        var album_id = $(this).attr('id')

        Swal.fire({
          title: 'Yakin ingin menghapus album ini?',
          text: "Tindakan ini tidak dapat dibatalkan kembali jika diinisiasikan",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>Gallery/delete",
                data:{
                    album_id: album_id
                }, //penggunaan FormData
                success: function(data){
                    var dt = JSON.parse(data)

                    Toast.fire({
                      icon: 'success',
                      title: 'Album berhasil dihapus'
                    })

                    $('.level-current').html(dt.list_of_album);
                },
                error: function(error) {
                    Swal.fire({
                      icon: 'error',
                      title: "Oops!",
                      text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                    })
                }
            }) 
          }
        })
    })

    $(document).on('click','.delete-picture-href', function() {

        var picture_id = $(this).attr('id')

        Swal.fire({
          title: 'Yakin ingin menghapus gambar ini?',
          text: "Tindakan ini tidak dapat dibatalkan kembali jika diinisiasikan",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Gallery/delete_picture/",
                    data:{
                        picture_id: picture_id
                    }, //penggunaan FormData
                    success: function(data){

                        Toast.fire({
                          icon: 'success',
                          title: 'Gambar berhasil dihapus'
                        })

                        $('.level-current').html(data);
                    },
                    error: function(error) {
                        Swal.fire({
                          icon: 'error',
                          title: "Oops!",
                          text: 'Tidak dapat tersambung dengan server, pastikan koneksi anda aktif, jika masih terjadi hubungi admin IT'
                        })
                    }
                })
            }
        })
    })

  // Back on Click
    $('.back').on("click", function() {
        if($('.level-current').is(':first-child')){
           console.log( "Current is top" );
        } 
        else {
          console.log( "Drill back up" );
          $('.btn-add-something').show()
          $('.level-down').removeClass('level-down')
          $('.level-current').addClass('level-down');
          $('.level-current').removeClass('level-current');
          $('.level-up').addClass('level-current');
          $('.level-up').removeClass('level-up').prev().addClass('level-up');
        }

    });
});
    </script>