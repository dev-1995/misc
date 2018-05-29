<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../../php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'task' )
	->fields(
Field::inst( 'task.name' )->validator( 'Validate::notEmpty' ),
Field::inst( 'category.name' )->validator( 'Validate::notEmpty' ),
Field::inst( 'suppliers.company_name' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.start_date' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.end_date' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.start_budget' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.end_budget' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.start_actual' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.end_actual' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.cost_code' )->validator( 'Validate::notEmpty' ),
Field::inst( 'task.gst' )

)
	->leftJoin('category','task.category_id', '=', 'category.id')
	->leftJoin('project','task.project_id', '=', 'project.id')
	->leftJoin('suppliers','task.supplier_id', '=', 'suppliers.id')
	
	->process( $_POST )
	->json();
