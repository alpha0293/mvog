/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'fr';
	config.uiColor = '#AADC6E';
	config.skin= 'office2013';
     config.extraPlugins = 'imageresize';
     
	$config['accessControl'][] = array(
     'role'               => '*',
     'resourceType'       => '*',
     'folder'             => '/',
 
     'FOLDER_VIEW'        => true,
     'FOLDER_CREATE'      => true,
     'FOLDER_RENAME'      => true,
     'FOLDER_DELETE'      => true,
 
     'FILE_VIEW'          => true,
     'FILE_CREATE'        => true,
     'FILE_RENAME'        => true,
     'FILE_DELETE'        => true,
 
     'IMAGE_RESIZE'        => true,
     'IMAGE_RESIZE_CUSTOM' => true
 );

};

// CKEDITOR.config.extraPlugins = 'imageresize';
