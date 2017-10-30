# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.0] - 2017-06-20
### Added
- New version 2 of the Elasticsearch API, which acts as the native Elasticsearch search API.
- New version 2 of the SQL API, which enables POST and GET of a JSON wrapped query.
- New modern dark theme for Admin.
- Create "retina" tiles option in tile cache settings.
- This change log.


### Changed
- Back-end rewritten for PHP 7.x. MapScript is no longer used.
- Better handling of exceptions in REST API.
- New routing framework. Routes are now added with full URI paths.
- Better Meta API. Can now be called with tags, multiple relation names and combos.
- Extension mechanism for the REST API.
- Admin URI is changed from /store to /admin.
- Upgraded to QGIS-server 2.18 LTR. Upload of 2.14 QGS files will work.
- Dedicated MapFile for WFS, so it works for QGIS-Server based layers.
- SQLite3 is now default cache type for MapCache. Each layers gets a db.
- The advanced layer panel is moved from right side to the left.
- Some rearrangement of buttons.
- "Private" tags with prefix "_". These will not be added to CKAN.
- HTML title changed to "GC2 Admin"

### Deprecated
- Version 1 of the Elasticsearch API
- Version 2 of the SQL API

### Removed

### Fixed

### Security
