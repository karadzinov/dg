/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 // CKEDITOR.timestamp='ABCD';

CKEDITOR.on('dialogDefinition', function(dialogDefinitionEvent) {
    //if ('link' == dialogDefinitionEvent.data.name) {
        var dialogDefinition = dialogDefinitionEvent.data.definition;
        // Get rid of annoying confirmation dialog on cancel
        dialogDefinition.dialog.on('cancel', function(cancelEvent) {
            return false;
        }, this, null, -1);
    //}
});




 CKEDITOR.editorConfig = function( config ) {
    config.skin = 'icy_orange';
    config.scayt_autoStartup = true;
    config.extraPlugins = 'wordcount,mediaembed,lineutils,widget,notification,notificationaggregator,embedbase,embed';
    config.removePlugins = 'magicline';
    config.fillEmptyBlocks = false;
    config.tabSpaces = 0;
 //	config.autosave_saveDetectionSelectors = "a[href^='javascript:__doPostBack'][id*='Save'],a[id*='Cancel']";
 config.wordcount = {

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,

     // Whether or not to include Html chars in the Char Count
     countHTML: false
 };


 config.keystrokes = [

 [ CKEDITOR.CTRL + 75, 'link' ],
   // [ CKEDITOR.CTRL + 107, null ],                       // CTRL + L

   ];


   config.toolbar =
   [
   { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
   { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
   { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
   { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
   'HiddenField' ] },
   '/',
   { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
   { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
   '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
   { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
   { name: 'insert', items : [ 'Embed','Image','MediaEmbed', 'oEmbed','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
   '/',
   { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
   { name: 'colors', items : [ 'TextColor','BGColor' ] },
   { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
   ];

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/ckfinder/browser';
	config.filebrowserImageBrowseUrl = '/ckfinder/browser?type=Images';
	config.filebrowserFlashBrowseUrl = '/ckfinder/browser?type=Flash';
	config.filebrowserUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';






};


