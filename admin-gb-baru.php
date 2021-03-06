<?php 
$hal = 'admin-produk';
include('layout/header.php'); 

protect_admin();

?>

<div class="row">

<div class="col-md-12" data-animation="hierarchical-display">
	<script src="<?php echo base_url; ?>/assets/tinymce/tinymce.min.js"></script>
	   <script type="text/javascript">
	    tinyMCE.init({
		selector: "textarea.deskripsi",

		plugins: [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
	         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
	         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code jbimages"
	   ],
	   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect jbimages",
	   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
	   
	   relative_urls: false

	    });
	</script>

		<h3>Buat Produk Baru</h3>

		<hr>

		<div class="col-md-8 col-lg-8">
		<form action="<?php echo base_url; ?>/admin/publish-gb" method='post' enctype="multipart/form-data">

			<!-- BEGIN FORM -->

			  <div class="form-group">
			    <label class="control-label" for="nama-item">Nama item</label>
			    <input type="text" class="form-control input-lg" id="nama-item" placeholder="Nama Item GB" required autofocus name="judul" autocomplete="off">
			  </div>
			  <div class="form-group">
			  	<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><?php echo base_url.'/gb/'; ?></span>
				<input type="text" class="form-control" id="slug" placeholder="Slug = what will be the URL of this item" required name="slug" readonly>
			  </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label" for="deskripsi">Deskripsi </label>
			    <textarea class="form-control deskripsi" id="deskripsi" rows="20" placeholder="Deskripsi Lengkap" name="deskripsi"></textarea>
			  </div>

		</div> <!-- END COL MD 8 -->

		<!-- BEGIN COL MD 4 -->
		<div class="col-md-4 col-lg-4">

			<!-- BEGIN PANEL 1 -->
			<div class="panel panel-default panel-gbid animated bounceInRight">
			<div class="panel-heading">Harga & Minimum Entry</div>
				<div class="panel-body">

						<div class="form-group">
							<label class="control-label" for="kategori">Status</label>
							<select class="form-control" id="kategori" name="status">
								<option value="open">Open</option>
								<option value="closed">Closed</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="kategori">Kategori</label>
							<select class="form-control" id="kategori" name="kategori">
								<option value="">Pilih Kategori !</option>
								
								<?php foreach ($base_kategori as $kategori): ?>
									<option value="<?php echo $kategori->id; ?>"><?php echo $kategori->judul; ?></option>
								<?php endforeach ?>
								
							</select>
						</div>


					  <div class="form-group">
					    <label class="control-label" for="harga-item">Harga</label>
					    <input type="number" class="form-control input-lg" id="harga-item" placeholder="Harga Item GB" name="harga" required>
					  </div>
					  <div class="form-group">
					    <label class="control-label" for="harga-item">Target Entry</label>
					    <input type="number" class="form-control" id="harga-item" placeholder="Target Entry GB" name="target" required>
					    <span id="helpBlock" class="help-block">Target minimal entry pada groupbuy ini.</span>
					  </div>


				</div>
			</div>

			<!-- END PANEL 1 -->
			<!-- BEGIN PANEL 2 -->
			<div class="panel panel-default panel-gbid animated bounceInRight">

			<div class="panel-heading">Berkas Gambar</div>
				<div class="panel-body">


					<div class="form-group">
						<label class="control-label" for="thumb">Cover</label>
						<input type="file" id="thumb" name="cover" required>
						<p class="help-block">Ukuran Cover 800px x 500px.</p>
					</div>



					<button type="submit" class="btn btn-success btn-block">Publish GroupBuy</button>
					
					</form>
					<!-- END FORM -->

				</div>
			</div>
			<!-- END PANEL 2 -->

		</div>
		<!-- END COL MD 4 -->


</div>
</div>

<?php include('layout/footer.php'); ?>