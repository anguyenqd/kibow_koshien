/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function(config) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/kibow_koshien/js/kcfinder/browse.php?type=files';
	config.filebrowserImageBrowseUrl = '/kibow_koshien/js/kcfinder/browse.php?type=images';
	config.filebrowserFlashBrowseUrl = '/kibow_koshien/js/kcfinder/browse.php?type=flash';
	config.filebrowserUploadUrl = '/kibow_koshien/js/kcfinder/upload.php?type=files';
	config.filebrowserImageUploadUrl = '/kibow_koshien/js/kcfinder/upload.php?type=images';
	config.filebrowserFlashUploadUrl = '/kibow_koshien/js/kcfinder/upload.php?type=flash';
};
