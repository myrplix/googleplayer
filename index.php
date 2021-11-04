<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Panel Drive 2020</title>
	<link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/ITunes_12.2_logo.png/600px-ITunes_12.2_logo.png" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script type="text/javascript" src="assets/js/apicodes.min.js"></script>
</head>
<body>
	<div class="container">
	     <br>
	     <br>
		<form id="action-form" action="action.php" method="POST" accept-charset="utf-8">
			<div class="form-group">
				<label class="font-weight-bold">Link Google Drive:</label>
				<input type="text" name="link" class="form-control" placeholder="https://drive.google.com/file/d/1qOG3i5zWjLZLLebLnQ-YngvAkw0c8IWf/view"this.select()" required>
			</div>

			<div class="row">

				<div class="col-md-11" id="sub">
					<div id="sub-block">
						<div class="row">
						    <div class="col-md-7">
						        <div class="form-group">
						        	<label class="font-weight-bold">Subtitle</label>
						        	<input type="text" class="form-control" name="sub[0]" placeholder="Ex: name.com/the.boss.baby.srt (optional)" onclick="this.select()"> 
						        </div>
						    </div>
						    
						    <div class="col-md-4">
						        <div class="form-group">
						        	<label class="font-weight-bold">Idioma</label>
						        	<input type="text" class="form-control" name="label[0]" placeholder="Ex: English (optional)" onclick="this.select()"> 
						        </div>
						    </div>
						    
						    <div class="col-md-1" style="margin-top: 30px">
						    <button type="button" id="add_new_sub" data-total="1" class="btn btn-success btn-block"><i class="fa fa-plus"></i></button>
						    </div>
						</div>
					</div>
				</div>

			</div>

			<div class="form-group">
				<label class="font-weight-bold">Url Imagen:</label>
				<input type="text" name="poster" class="form-control" placeholder="Ex: name.com/1546933662_826942_1546935400_noticia_normal.jpg" onclick="this.select()">
			</div>

			<div class="form-group">
				<button type="submit" id="action-submit" class="btn btn-dark"> <span id="fa-loading"></i></span> Encriptar Link</button>
			</div>
		</form>
		
		<div class="form-group">
			<label class="font-weight-bold">URL Directo:</label>
			<input type="text" id="url-encode" class="form-control" placeholder="La URL después de la codificación se mostrará aquí ..." onclick="this.select()">
		</div>

		<div class="form-group">
			<label class="font-weight-bold">Iframe:</label>
			<textarea rows="5" class="form-control" id="iframe-encode" placeholder="La URL con iframe después de la codificación se mostrará aquí ..." onclick="this.select()"></textarea>
		</div>
		<?php  $domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); ?>
		<script type="text/javascript">
			jQuery(function ($) {
				$('#action-form').submit(function(e) {
					e.preventDefault();
					$('#action-submit').prop('disabled', !0);
					$('#fa-loading').html('<i class="fa fa-spinner fa-spin"></i>');
		       		var b = $(this).serializeArray(), c = $(this).attr('action');
					$.ajax({
				        type: 'POST',
				        dataType: 'text',
				        url: c,
				        data: b,
						error: function (result) {
							alert("Something went wrong. Please try again!");
							$('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
							$('#action-submit').removeAttr('disabled');
						},
						success: function (result) {
							$('#url-encode').val('<?php echo $domainServer . '/embed.php?data=' ?>'+result+'');
							$('#iframe-encode').html('<iframe src="<?php echo $domainServer . '/embed.php?data=' ?>'+result+'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>');
							$('#fa-loading').html('<i class="fa fa-arrow-circle-right"></i>');
							$('#action-submit').removeAttr('disabled');
						}
					});
				});
			});
		</script>

		<hr>
		<footer class="footer">
		</footer>
	</div><!-- /.container -->
</body>
</html>