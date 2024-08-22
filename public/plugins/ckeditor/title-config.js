/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */





 CKEDITOR.editorConfig = function( config ) {



 toolbar = [
   ['Styles','Format','Font','FontSize'],
   '/',
   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print'],
   '/',
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
  // ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
] ;


 	config.scayt_autoStartup = true;
 	config.extraPlugins = 'wordcount';


 	config.wordcount = {

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,

     // Whether or not to include Html chars in the Char Count
     countHTML: false
 };

 config.width = 570;  
 config.height = 50;  


	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'jscripts/ckfinder/ckfinder.htm';
	config.filebrowserImageBrowseUrl = 'jscripts/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'jscripts/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'jscripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'jscripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'jscripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};


