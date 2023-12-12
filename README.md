# ci3_datatable_edit_delete --- pay attection emp_view.php at below script. and change in module also

	<script type="text/javascript">
			$(document).ready(function(){
			   	$('#empTable').DataTable({
			      	'processing': true,
			      	'serverSide': true,
			      	'serverMethod': 'post',
			      	'ajax': {
			          'url':'<?=base_url()?>index.php/Employee/empList'
			      	},
			      	'columns': [
			         	{ data: 'hostname' },
			         	{ data: 'ipadd' },
			         	{ data: 'vipadd' },
			         	{ data: 'db_type' },
			         	{ data: 'db_name' },
			         	{ data: 'db_version' },
			         	{ data: 'os_type' },
							   {
		           data: null,
		           render: function(data, type, row) {
		               return '<button class="editBtn" data-id="' +	row.id 	+ '">Edit</button>' +
		                      '&nbsp;&nbsp;&nbsp;<button class="deleteBtn" data-id="' + row.id 	+ '">Delete</button>';
		           }
		       }
		   ]
		});
		// Edit and Delete event handlers
		$('#empTable tbody').on('click', '.editBtn', function () {
		   var id = $(this).data('id');
		   // Redirect or show modal for editing using the 'id'
		});
		$('#empTable tbody').on('click', '.deleteBtn', function () {
		   var id = $(this).data('id');
		   // Implement delete logic using AJAX request and 'id'
		});		
		});
	</script>
