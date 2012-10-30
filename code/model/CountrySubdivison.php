<?php
/**
 * 2nd-level administrative region of a country, as defined by ISO 3166-2 standard
 */
class CountrySubdivison extends DataObject{

	static $db = array(
		'Name' => 'Varchar',
		'AlternativeNames' => 'Varchar',
		'ISO2' => 'Varchar(4)', //ISO 3166-2
		'Type' => "Varchar",
		'Latitude' => 'Decimal(18,12)',
		'Longitude' => 'Decimal(18,12)'
	);

	static $has_one = array(
		'Country' => 'Country'
	);
	
	static $summary_fields = array(
		'Country.Name',
		'Name',
		'ISO2',
		'Type'
	);
	
}