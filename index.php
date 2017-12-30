<?php 
include "database.php";
include "func_database.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP-upload</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style type="text/css">
	.gallery
	{
		display: inline-block;
		margin-top: 20px;
	}
</style>
</head>
<body>
	<div class="container">
		<h3>Upload</h3>
		<div class="row">
			<form method="POST" class="form-horizontal" action="php_upload.php" enctype="multipart/form-data">
				<fieldset>
					<div class="col-md-6">
						<div class="jumbotron">
							<!-- File Button --> 
							<div class="control-group container-fluid text-center">
								<!-- <label class="control-label" for="filebutton">Video File</label> -->
								<center>
									<input type="file" name="fileImg" id="fileimg"  class="input-file" required="">
								</center>
							</div>	
						</div>
					</div>
					<div class="col-md-6">
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="title">Title</label>
							<div class="controls">
								<input id="title" name="title" type="text" placeholder="Title" class="input-xlarge" required="">
							</div>
						</div>
						<!-- Text input-->
						<div class="control-group">
							<label class="control-label" for="alt text">Alt text</label>
							<div class="controls">
								
								<input id="alttext" name="alttext" type="text" placeholder="Alternative text" class="input-xlarge" required="">
							</div>
						</div>
						<!-- Textarea -->
						<!-- <div class="control-group">
							<label class="control-label" for="Description">Description</label>
							<div class="controls">                     
								<textarea id="Description" name="Description">Description</textarea>
							</div>
						</div> -->
						<!-- Button -->
						<div class="control-group">
							<label class="control-label" for="singlebutton"></label>
							<div class="controls">
								<input type="submit" id="singlebutton" name="submit" class="btn btn-info"value="Upload">
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<hr>
	</div>
	<!-- Gallery -->
	<div class="container">
		<div class="row">
			<div class='list-group gallery'>
				<?php
				/*image*/
				$images=GetImages();
				while ($r=$images->fetch_assoc()) {
				?>
				<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
					<!-- Modal -->
					<div class="modal fade" id="myModalimg<?php print $r['id'] ?>" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Detail</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-md-6">
											<!-- <img class="img-responsive" alt="" src="http://placehold.it/320x320" /> -->
											<img class="img-responsive" alt="" src="uploads/<?php print $r['imgname'] ?>" />
										</div>
										<div class="col-md-6">
											<p>Lengkapi data gambar agar gambar lebih SEO.</p>
											<form method="POST" action="php_upload.php">
												<input type="hidden" name="id" value="<?php print $r['id'] ?>">
												<label class="control-label" for="imgname">Title</label><br>
												<input type="text" name="title" placeholder="Title" value="<?php print $r['title'] ?>"><br>
												<label class="control-label" for="alttext">Alt text</label><br>
												<input type="text" name="alttext" placeholder="Alternative text" value="<?php print $r['alttext'] ?>"><br><br>
												<input class="btn btn-default" type="submit" name="submit" value="Simpan">
											</form>
										</div>
									</div>
								</div>
						        <!-- <div class="modal-footer">
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div> -->
						  </div>

						</div>
					</div>
					<a class="thumbnail fancybox" rel="ligthbox" href="#" data-toggle="modal" data-target="#myModalimg<?php print $r['id'] ?>">
						<!-- <img class="img-responsive" alt="" src="http://placehold.it/320x320" /> -->
						<img class="img-responsive" alt="<?php print $r['alttext'] ?>" src="uploads/<?php print $r['imgname'] ?>" />
						<div class='text-right'>
							
							<small class='text-muted'><?php print $r['title'] ?></small>
						</div> <!-- text-right / end -->
					</a>
				</div> <!-- col-6 / end -->
				<?php 
				} 
				?>
			</div> <!-- list-group / end -->
		</div> <!-- row / end -->
	</div> <!-- container / end -->


	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>