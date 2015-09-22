<?php

class Country extends DataObject{

	static $db = array(
		'Name' => 'Varchar',
		'ISO1A2' => 'Varchar(2)', //ISO 3166-1 alpha-2
		'ISO1A3' => 'Varchar(3)', //ISO 3166-1 alpha-3
		'ISO1N' => 'Int', //ISO 3166-1 numeric
		'Continent' => "Enum(array('AF','EU','AS','NA','SA','AN','OC'))", //Africa, Europe, Asia, North America, South America, Antartica, Oceania
		'Latitude' => 'Decimal(18,12)',
		'Longitude' => 'Decimal(18,12)'
	);

	static $has_many = array(
		'Subdivisions' => 'CountrySubdivison'
	);

	static $summary_fields = array(
		'Name',
		'ISO1A2',
		'ISO1A3',
		'ISO1N',
		//'Continent'
	);

	static $field_labels = array(
		'ISO1A2' => 'ISO alpha-2',
		'ISO1A3' => 'ISO alpha-3',
		'ISO1N' => 'ISO numeric'
	);

	static $defaults = array(
		'Continent' => null
	);

	static function get_by_isocode($code,$alpha = 2){
		if(!$code)
			return null;
		$field = ($alpha == 3) ? "ISO1A3" : "ISO1A2";
		return DataObject::get_one("Country","\"$field\" = '$code'");
	}

}