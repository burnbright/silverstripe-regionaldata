<?php

class CountriesBulkLoader extends CsvBulkLoader{

	public $columnMap = array(
		"ISO 3166-1 COUNTRY NAME" => "Name",
		"COUNTRY ALTERNATE NAMES" => "AlternateNames",
		"ISO 3166-1 COUNTRY CHAR 2 CODE" => "ISO1A2",
		"ISO 3166-1 COUNTRY CHAR 3 CODE" => "ISO1A3",
		"ISO 3166-1 COUNTRY NUMBER CODE" => "ISO1N",
		"FIPS COUNTRY CODE" => "FIPSCC",
		"FIPS COUNTRY NAME" => "FIPSCN",
		"UN REGION" => "UNREG",
		"UN SUB REGION NAME" => "UNSUBREG",
		"CDH ID" => "CDHID",
		"COMMENTS" => "Comments",
		"GPS LATITUDE" => "Latitude",
		"GPS LONGITUDE" => "Longitude"
	);

	public $duplicateChecks = array(
		'ISO 3166-1 COUNTRY NAME' => 'ISO1A2',
	);

}