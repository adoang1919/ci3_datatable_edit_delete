<!DOCTYPE html>
<html>
<head>
	<title>DataTables AJAX Pagination with Search and Sort in CodeIgniter</title>

	<!-- Datatable CSS -->
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Datatable JS -->
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<body>
<p><button id="addRow">Add new row</button></p>


	<!-- Table -->
	<table id='empTable' class='cell-border dataTable'>

	  <thead>
	    <tr>
	      <th>Hostname</th>
	      <th>IP ADDRESS</th>
	      <th>VIP Address</th>
	      <th>Database Type</th>
	      <th>Database Name</th>
	      <th>Database Version</th>
		  <th>OS Type</th>
		  		  <th></th>

	    </tr>
	  </thead>
	</table>

	<!-- Script -->
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
               return '<button class="editBtn" data-id="' +
row.id
+ '">Edit</button>' +
                      '&nbsp;&nbsp;&nbsp;<button class="deleteBtn" data-id="' +
row.id
+ '">Delete</button>';
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
</body>
</html>






