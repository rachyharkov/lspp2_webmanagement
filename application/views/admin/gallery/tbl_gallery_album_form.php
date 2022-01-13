
    <div class="container-fluid">
        <h2 style="margin-top:0px">Tbl_gallery_album <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="nama_album">Nama Album <?php echo form_error('nama_album') ?></label>
            <textarea class="form-control" rows="3" name="nama_album" id="nama_album" placeholder="Nama Album"><?php echo $nama_album; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tag">Tag <?php echo form_error('tag') ?></label>
            <textarea class="form-control" rows="3" name="tag" id="tag" placeholder="Tag"><?php echo $tag; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gallery') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>