<?php
/**
 * 2nd-level administrative region of a country, as defined by ISO 3166-2 standard
 */
class CountrySubdivison extends DataObject{

	static $db = array(
		'Name' => 'Varchar',
		'AlternativeNames' => 'Varchar',
		'ISO2' => 'Varchar(6)', //ISO 3166-2
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

	static $default_sort = "\"Type\" ASC, \"Name\" ASC";

	static function get_by_country($country) {
		$countryobj = null;
		if(is_string($country)) {
			if(strlen($country) === 2) {
				$countryobj = DataObject::get_one('Country',"\"ISO1A2\"  = '$country'");
			}elseif(strlen($country) === 3) {
				$countryobj = DataObject::get_one('Country',"\"ISO1A3\"  = '$country'");
			}
		}else{
			$countryobj = $country;
		}
		if(!($countryobj instanceof Country)) {
			return null;
		}
		return DataObject::get("CountrySubdivison","\"CountryID\" = ".$countryobj->ID);
	}

}
