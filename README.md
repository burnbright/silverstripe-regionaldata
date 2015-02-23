# Regional Data Module

Provides reusable models, data, and fields for hierarichal geographical region classification of countries, and their subdivisons.
The module should help to close the gap between known data, and arbitrary (possibly invalid) data entered by visitors.

A strong focus has been put on following the [ISO 3166 standard](http://en.wikipedia.org/wiki/ISO_3166). 

This module is not intended to replace zend_locale.

## Installation

 * Unzip to your silverstripe root / regionaldata.
 * Visit yoursite.tld/dev/tasks/LoadRegionalData
 
You should now be able to see countries and subdivisions in yoursite.tld/admin/regions

## Possible Uses

 * Auto-completion country and state fields
 * Drop-down fields for entering valid data
 * Connect with other models for regionalisation
 * Addressing systems 

## Javascript Field Updater

Require the following script to templates / forms which have Country and State fields:
`regionaldata/javascript/updater.jquery.js`

If you are using the shop module, a good place to include this is in an extension of `Address`:
```
function updateFormFields(FieldList $fields, $nameprefix = ""){
    Requirements::javascript('regionaldata/javascript/updater.jquery.js');
}
```

## Provided Data Set

[2nd level subdivisons](http://en.wikipedia.org/wiki/Administrative_division) have different names,
eg: area, district, parish, county.

Most data has been sourced from [commondatahub.com](http://www.commondatahub.com/live).

In the provided dataset, some countries have multiple types of subregion. There aer about 100 different
subregions all toegether. In one case (United Kingdom), 11 types of sub region are present.
This results in a very confusing 'Region/State' dropdown.You will probably not want to make every type
available to users, so some cleanup will be needed.

This query will identify every type of sub region:

```
	SELECT DISTINCT `Type`
	FROM `CountrySubdivison` WHERE 1
	ORDER BY `Type`
```

Running this query will show the countries with multiple subregion types:

``` 
	SELECT *, COUNT(DISTINCT `Type`) as `Types`
	FROM `CountrySubdivison`
	GROUP BY `CountryID`
	HAVING `Types` > 1
	ORDER BY `Types` DESC
```

## Future TODO / Ideas

 * Write a SQL query to clean up data set
 * Store address formats. Some countries don't require all address fields, others do.
 * Translation of names
 * 3rd-level post/zip code storage model
