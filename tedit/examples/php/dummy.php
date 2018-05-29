
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
Field::inst( 'task.gst' )->validator( 'Validate::notEmpty' )

)
	->leftJoin('project','task.project_id', '=', 'project.id')
	->leftJoin('suppliers','task.supplier_id', '=', 'suppliers.id')
	->leftJoin('category','task.category_id', '=', 'category.id')
	->process( $_POST )
	->json();
