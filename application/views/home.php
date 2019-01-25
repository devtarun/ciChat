<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style>
		.table-holder {
		    max-height: 370px;
		    height: 370px;
		    overflow-y: scroll;
		    border: 1px solid;
		    margin-top: 2em;
		    margin-bottom: 2em;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="<?php echo base_url('home/logout') ?>" class="btn btn-danger" style="margin-top: 2em">Log Out</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="table-holder">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>User Name</th>
								<th>Date/Time</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<button type="button" onclick="sayHi(120)" class="btn btn-success btn-flat">Say Hi!</button>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	

	<script>
		$(document).ready(function(){
			// var lastId = 0;
			getMsgs();
		});

		function sayHi(lastId){
			$.getJSON("<?php echo base_url('home/sayhi/' . $this->session->userdata['uid']) ?>", function(currentId){
				$('table.table tbody').empty();
				getMsgs();
			});
		}

		function updateMsg(lid){
			getLastMsgsURI = "<?php echo base_url('home/getLastMsgs/') ?>" + lid;
			console.log(getLastMsgsURI);
			$.getJSON(getLastMsgsURI, function(res){
				$.each( res, function( key, val ) {
					var o = "<tr>" + 
								"<td>" + 
									val.id + 
								"</td>" + 
								"<td>" + 
									val.un + 
								"</td>" + 
								"<td>" + 
									val.mcd + 
								"</td>" + 
							"</tr>";

					$('table.table tbody').append(o);
				});
			});
		}

		function getMsgs(){
			$.getJSON("<?php echo base_url('home/getMsgs') ?>", function(data){
				$.each( data, function( key, val ) {
					var o = "<tr>" + 
								"<td>" + 
									val.id + 
								"</td>" + 
								"<td>" + 
									val.un + 
								"</td>" + 
								"<td>" + 
									val.mcd + 
								"</td>" + 
							"</tr>";

					$('table.table tbody').append(o);
				});
			});
		}

	</script>

</body>
</html>