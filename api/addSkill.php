<?php
/**
 * Created by PhpStorm.
 * User: kofi
 * Date: 10/28/17
 * Time: 3:15 PM
 */

include_once( 'header.php' );
$temp  = $_POST['skill'];
$skill = array(
	"name" => ( (object) $temp[0] )->value,
	'icon' => ( (object) $temp[1] )->value
);
$skill = (object) $skill;
if ( $skill->name == '' || $skill->icon == '' ) {
	$data = array(
		'success' => false,
		'status'  => 200,
		'error'   => 'Input something'
	);

	echo json_encode( $data );
} else {

	$query = "INSERT INTO skills (id,name,icon) values (null,'{$skill->name}','{$skill->icon}')";
	if ( $con->query( $query ) ) {
		$data = array(
			'success' => true,
			'status'  => 200,
			'skill'   => $skill
		);

		echo json_encode( $data );
	} else {
		$data = array(
			'success' => false,
			'status'  => 200,
			'error'   => $con->error
		);

		echo json_encode( $data );
	};

	/*$data = array(
		'success' => true,
		'status' => 200,
		'skill'=>$skill
	);
	echo json_encode($data);*/
}