<?php

include( "php/DataTables.php" );
 
use DataTables\Editor;


?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Local</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/editor.dataTables.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="examples/resources/demo.css">
	<style type="text/css" class="init">
	
	td.editable {
		font-weight: bold;
	}

	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="examples/resources/editor-demo.js"></script>
	<script type="text/javascript" language="javascript" class="init"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row" style="margin-top: 100px;">
	<div class="clearfix"></div>
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<table class="table" id="example">
		<thead>
			<tr>
				<th>Task</th>
				<th>Category</th>
				<th>Supplier</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Start Budget</th>
				<th>End Budget </th>
				<th>Start Actual</th>
				<th>End Actual</th>
				<th>Cost Code</th>
				<th>GST</th>
				
			</tr>
		</thead>
		<tbody>
					 					
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
	</div>
	
</div>
	
<script>

$(document).ready(function() {
	$.ajax({
		type:'POST',
		dataType:'JSON',
		url:'getCatSupp.php',
		error:function(e){
			console.log(e);
		},
		success:function(response)
		{
			// console.log(response[1],response[0]);
			// InitializeEditor(response[1],response[0]);
		}
	})

	// function InitializeEditor (catArr,supArr) {
	// 	var catSelect = [];
	// 	var supSelect = [];
	// 	for(var index=0;index<catArr.length;index++)
	// 	{
	// 		catSelect.push({label:catArr[index].name,value:catArr[index].id})
	// 	}
	// 	for(var index=0;index<supArr.length;index++)
	// 	{
	// 		supSelect.push({label:supArr[index].company_name,value:supArr[index].id})
	// 	}
	// 	editor = new $.fn.dataTable.Editor( {
	// 	ajax: "examples/php/staff.php",
	// 	table: "#example",
	// 	fields: [ {
	// 			label: "Task",
	// 			name: "task.name"
	// 		}, {
	// 			label: "Category",
	// 			name: "category.name",
	// 			   type:  "select",
 //                options:catSelect
	// 		}, {
	// 			label: "Supplier",
	// 			name: "suppliers.company_name",
	// 			type:  "select",
	// 			options:supSelect
	// 		},
	// 		{
	// 			label:'Start Date',
	// 			name:'task.start_date',
	// 			 type:  'datetime',
 //                def:   function () { return new Date(); }
	// 		},
	// 		{
	// 			label:'End Date',
	// 			name:'task.end_date',
	// 			 type:  'datetime',
 //                def:   function () { return new Date(); }
	// 		},
	// 		{
	// 			label:'Start Budget',
	// 			name:'task.start_budget',
				 
	// 		},
	// 		{
	// 			label:'End Budget',
	// 			name:'task.end_budget',
	// 		},
	// 		{
	// 			label:'Start Actual ',
	// 			name:'task.start_actual',
	// 		},
	// 		{
	// 			label:'End Actual',
	// 			name:'task.end_actual',

	// 		},
	// 		{
	// 			label: "Cost Code",
	// 			name: "task.cost_code"
	// 		}, {
	// 			label: "GST",
	// 			name: "task.gst"
	// 		}
	// 	]
	// } );

	// }

	editor = new $.fn.dataTable.Editor( {
		ajax: "examples/php/staff.php",
		table: "#example",
		fields: [ {
				label: "Task",
				name: "task.name"
			}, {
				label: "Category",
				name: "category.name",
				   type:  "select",
                options: [
                    { label: "1 (highest)", value: "1" },
                    { label: "2",           value: "2" },
                    { label: "3",           value: "3" },
                    { label: "4",           value: "4" },
                    { label: "5 (lowest)",  value: "5" }
                ]
			}, {
				label: "Supplier",
				name: "suppliers.company_name"
			},
			{
				label:'Start Date',
				name:'task.start_date',
				 type:  'datetime',
                def:   function () { return new Date(); }
			},
			{
				label:'End Date',
				name:'task.end_date',
				 type:  'datetime',
                def:   function () { return new Date(); }
			},
			{
				label:'Start Budget',
				name:'task.start_budget',
				 
			},
			{
				label:'End Budget',
				name:'task.end_budget',
			},
			{
				label:'Start Actual ',
				name:'task.start_actual',
			},
			{
				label:'End Actual',
				name:'task.end_actual',

			},
			{
				label: "Cost Code",
				name: "task.cost_code"
			}, {
				label: "GST",
				name: "task.gst"
			}
		]
	} );

	 
	  $('#example').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
 
        editor.remove( $(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        } );
    } );
	    $('#example').on( 'click', 'tbody td', function (e) {
        editor.inline( this, {
            buttons: { label: '&gt;', fn: function () { this.submit(); } }
        } );
    } );
	$('#example').DataTable( {
		dom: 'Bfrtip',
		ajax: 'examples/php/staff.php',
		columns: [
			// {
			// 	data: null,
			// 	defaultContent: '',
			// 	className: 'select-checkbox',
			// 	orderable: false
			// },
			{ data: 'task.name', className: 'editable' },
			{ data: 'category.name', className: 'editable' },
			{ data: 'suppliers.company_name',className:'editable' },
			{ data: 'task.start_date', className: 'editable' },
			{ data: 'task.end_date',className:'editable' },
			{ data: 'task.start_budget',render: $.fn.dataTable.render.number( ',', '.', 0, '$' ), className: 'editable' },
			{ data: 'task.end_budget',render: $.fn.dataTable.render.number( ',', '.', 0, '$' ), className: 'editable' },
			{ data: 'task.start_actual', render: $.fn.dataTable.render.number( ',', '.', 0, '$' ), className: 'editable' },
			{ data: 'task.end_actual',render: $.fn.dataTable.render.number( ',', '.', 0, '$' ), className: 'editable' },
			{ data: 'task.cost_code',className:'editable' },
			{ data: 'task.gst',className:'editable' }
			
		],
		select: {
			style:    'os',
			selector: 'td:first-child'
		},
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );



</script>
</body>
</html>
<!-- php code
Editor::inst( $db, 'task' )
// 	->fields(
// Field::inst( 'task.name' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'category.name' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'suppliers.company_name' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.start_date' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.end_date' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.start_budget' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.end_budget' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.start_actual' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.end_actual' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.cost_code' )->validator( 'Validate::notEmpty' ),
// Field::inst( 'task.gst' )

// )
// 	->leftJoin('category','task.category_id', '=', 'category.id')
// 	->leftJoin('project','task.project_id', '=', 'project.id')
// 	->leftJoin('suppliers','task.supplier_id', '=', 'suppliers.id')
	
// 	->process( $_POST )
// 	->json();
 -->