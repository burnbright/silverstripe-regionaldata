<?php

class CountrySubdivisionsBulkLoader extends CsvBulkLoader{

	public $columnMap = array(
		"COUNTRY NAME" => "CountryName",
		"ISO 3166-2 SUB-DIVISION/STATE CODE" => "ISO2",
		"ISO 3166-2 SUBDIVISION/STATE NAME" => "Name",
		"ISO 3166-2 PRIMARY LEVEL NAME" => "->processType",
		"SUBDIVISION/STATE ALTERNATE NAMES" => "AlternativeNames",
		"ISO 3166-2 SUBDIVISION/STATE CODE (WITH *)" => "SubdivisionWithStar",
		"SUBDIVISION CDH ID" => "SubdivisionCDHID",
		"COUNTRY CDH ID" => "CountryCDHID",
		"COUNTRY ISO CHAR 2 CODE" => "CountryISO1A2",
		"COUNTRY ISO CHAR 3 CODE" => "CountryISO1A3"
	);

	public $duplicateChecks = array(
		"ISO 3166-2 SUB-DIVISION/STATE CODE" => "ISO2"
	);

	public $relationCallbacks = array(
		'CountryISO1A2' => array(
			'relationname' => 'Country',
			'callback' => 'countryByISO2'
		)
	);

	function countryByISO2(&$obj, $val, $record) {
		return Country::get_by_isocode($val);
	}

	function processType(&$obj, $val, $record) {
		$obj->Type = trim(ucwords($val)); //cleanup
	}

}