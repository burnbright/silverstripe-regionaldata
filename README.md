# Regional Data Module

Provides reusable models, data, and fields for hierarichal geographical region classification of countries, and their subdivisons.
The module should help to close the gap between known data, and arbitrary (possibly invalid) data entered by visitors.

A strong focus has been put on following the [ISO 3166 standard](http://en.wikipedia.org/wiki/ISO_3166). 
Most data has been sourced from [commondatahub.com](http://www.commondatahub.com/live).

This module is not intended to replace zend_locale.

## Installation

 * Unzip to your silverstripe root / regionaldata.
 * Visit yoursite.tld/dev/tasks/LoadRegionalData
 
You should now be able to see countries and subdivisions in yoursite.tld/admin/regions

## Possible Uses

 * Auto-completion country and state fields
 * Drop-down fields for validation
 * Connect with other models for regionalisation
 * Addressing systems 

## Note

 * [2nd level subdivisons](http://en.wikipedia.org/wiki/Administrative_division) have different names, eg: area, district, parish, county.
 * Data is generally supplied as-is. There may be some clean-up needed.

## Future

 * Translation of names
 * 3rd-level post/zip code storage model