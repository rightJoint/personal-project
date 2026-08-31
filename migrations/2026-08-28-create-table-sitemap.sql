CREATE TABLE `siteMap_dt` (
	`maploc` VARCHAR(128) NOT NULL COLLATE 'utf8_unicode_ci',
	`lastmod` DATE NULL DEFAULT NULL,
	`changefreq` VARCHAR(36) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`priority` TINYINT(4) NULL DEFAULT NULL,
	`comment` VARCHAR(128) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`use_flag` TINYINT(1) NULL DEFAULT NULL,
	`date_created` DATETIME NULL DEFAULT NULL,
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`maploc`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
