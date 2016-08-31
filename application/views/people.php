<!doctype html>
<html>
	<head>
		<title>Show People</title>
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
	  <div class="container">
			<h2>Showing All The People</h2>
			<table class="table">
				<tr>
					<th>ID</th>
					<th>First</th>
					<th>Last</th>
					<th>DOB</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($results as $row): ?>
				<tr>
					<td><?=$row->id?></td>
					<td><?=$row->first?></td>
					<td><?=$row->last?></td>
					<td><?=$row->dob?></td>
					<td><button type="button" class="btn details" data-id="<?=$row->id?>">Details</button></td>
				</tr>
				<?php endforeach; ?>
			</table>
	  </div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">View Person Details</h4>
		      </div>
		      <div class="modal-body">
		      	<h3 id="personStatus"></h3>
		      	<div class="row">
			      	<label class="col-sm-6">Name</label>
			      	<span class="col-sm-6" id="personName"></span>
		      	</div>
		      	<div class="row">
			      	<label class="col-sm-6">Birthday</label>
			      	<span class="col-sm-6" id="personDob"></span>
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<script>
$(document).ready(function() {
	$('button.details').on('click', function() {
		$('#personStatus').text('Loading...');
		$('#personName').text('');
		$('#personDob').text('');
		var uri = '/index.php/people/detail/' + $(this).data('id');
		$.getJSON(uri, function(data) {
			if (data) {
				var person = data[0];
				$('#personStatus').text('');
				$('#personName').text(person.first + ' ' + person.last);
				$('#personDob').text(person.dob);
				$('#myModal').modal('show');
			}
		});
	});
});			
		</script>

	</body>
</html>
