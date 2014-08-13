<?php 

class RegionAdmin extends ModelAdmin{

	private static $menu_icon = 'regionaldata/images/cmsicon.png';
	
	static $url_segment = 'regions';
	static $menu_title = 'Regions';
	
	static $managed_models = array('Country','CountrySubdivison');
	
	public static $model_importers = array(
		'Country' => 'CountriesBulkLoader',
		'CountrySubdivison' => 'CountrySubdivisionsBulkLoader'
	);
	
}