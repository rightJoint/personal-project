CREATE TABLE `blogArts` (
	`art_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`artCat` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`artRef` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`artName_en` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`artName_ru` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`artMeta_en` TEXT NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`artMeta_ru` TEXT NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`artImg` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`activeFlag` TINYINT(1) NULL DEFAULT NULL,
	`indexFlag` TINYINT(1) NULL DEFAULT NULL,
	`pubDate` DATE NOT NULL,
	`refreshDate` DATE NULL DEFAULT NULL,
	`commentsFlag` TINYINT(1) NULL DEFAULT NULL,
	`popFlag` TINYINT(1) NULL DEFAULT NULL,
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`art_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
CREATE TABLE `blogAtrTags` (
	`art_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`tag_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`art_id`, `tag_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
CREATE TABLE `blogCats` (
	`cat_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`catAlias` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`catName_en` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`catName_ru` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`catMeta_en` TEXT NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`catMeta_ru` TEXT NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`catImg` VARCHAR(256) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`activeFlag` TINYINT(1) NULL DEFAULT NULL,
	`indexFlag` TINYINT(1) NULL DEFAULT NULL,
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`cat_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
CREATE TABLE `blogComments` (
	`comment_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`commentP_id` VARCHAR(36) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`art_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`content` TEXT NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`activeFlag` TINYINT(1) NULL DEFAULT NULL,
	`addDate` DATETIME NOT NULL,
	PRIMARY KEY (`comment_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
CREATE TABLE `blogCommentsLikes` (
	`comment_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`addDate` DATETIME NOT NULL,
	PRIMARY KEY (`comment_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
CREATE TABLE `blogTags` (
	`tag_id` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	`tag_en` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`tag_ru` VARCHAR(256) NOT NULL COLLATE 'utf8_unicode_ci',
	`created_by` VARCHAR(36) NOT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`tag_id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM;
