/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  config.filebrowserBrowseUrl = 'ckeditor/ckfinder/browse.php?opener=ckeditor&type=files';
  config.filebrowserImageBrowseUrl = 'ckeditor/ckfinder/browse.php?opener=ckeditor&type=images';
  config.filebrowserFlashBrowseUrl = 'ckeditor/ckfinder/browse.php?opener=ckeditor&type=flash';
  config.filebrowserUploadUrl = 'ckeditor/ckfinder/upload.php?opener=ckeditor&type=files';
  config.filebrowserImageUploadUrl = 'ckeditor/ckfinder/upload.php?opener=ckeditor&type=images';
  config.filebrowserFlashUploadUrl = 'ckeditor/ckfinder/upload.php?opener=ckeditor&type=flash';

  config.extraPlugins = 'eqneditor';
  config.toolbarGroups = [
{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
{ name: 'links' },
{ name: 'insert' },
{ name: 'forms' },
{ name: 'tools' },
{ name: 'document',	groups: [ 'mode', 'document', 'doctools' ] },
{ name: 'others' },
'/',
{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
{ name: 'styles' },
{ name: 'colors' },
{ name: 'about' }
];


};
