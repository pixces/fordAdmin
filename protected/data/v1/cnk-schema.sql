ALTER TABLE `content` ADD `is_submitted` TINYINT( 4 ) NULL DEFAULT '0';

ALTER TABLE `social_auths` CHANGE `access_token` `access_token` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
CHANGE `access_secret` `access_secret` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL;

ALTER TABLE `content` CHANGE `status` `status` ENUM( 'pending', 'active', 'inactive', 'deleted', 'rejected', 'approved', 'under_review', 'processing', 'error' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'pending';
