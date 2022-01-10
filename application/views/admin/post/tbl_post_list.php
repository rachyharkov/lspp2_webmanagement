
    <div class="container-fluid">
        <h2 style="margin-top:0px"><?php echo $title_head; ?> List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('post?action=add&type='.$typepost),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div class="flash-data" data-flashdata="<?= $this->session->userdata('message'); ?>">
                                        
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('post/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <input type="hidden" class="form-control" name="type" value="<?php echo $typepost; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('post'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div id="table-wrapper">
            <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th>No</th>
                    <th>Judul Post</th>
                    <th>Tanggal Post</th>
                    <th>Penulis</th>
                    <th><i class="fas fa-eye"></i></th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($post_data as $post)
                {
                    ?>
                    <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $post->judul_post ?> <span class="badge bg-primary"><?php echo $post->tag ?></span></td>
                <td><?php echo $post->tanggal_post ?></td>
                <td><?php echo $classnyak->get_username($post->penulis_post)->username ?></td>
                <td><?php echo $post->dilihat ?></td>
                <?php

                $awo = 'artikel';

                if ($post->jenis_post == 1) {
                    $awo = 'pengumuman';
                }

                if ($post->jenis_post == 2) {
                    $awo = 'berita';
                }

                ?>
                <td style="text-align:center" width="200px">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                        <a href="<?php echo site_url($awo.'/'.$post->id.'/'.strtolower(str_replace(' ', '-', $post->judul_post))) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="<?php echo site_url('post/update/'.$post->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <button href="<?php echo site_url('post/delete/'.$post->id) ?>" id="<?php echo $post->id ?>" class="btn btn-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('post/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        $('.btn-delete').on('click', function() {

            const idpost = $(this).attr('id')

            Swal.fire({
                title: 'Yakin ingin menghapus postingan?',
                text: "Tindakan ini tidak dapat dibatalkan jika sudah terhapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = '<?php echo base_url().'post/delete/'?>' + idpost
                }
            })
        })
    </script>