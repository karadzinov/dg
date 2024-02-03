$(document).ready(function() {

    if ( $( "#description" ).length ) {
        CKEDITOR.replace( 'elm1', {
            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            magicline: false,
            basicEntities: false,
            fillEmptyBlocks: false,
            countHTML: false,
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '/ckfinder/browser',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '/ckfinder/connector'
        });

    }

    if ( $( "#elm1" ).length ) {
        CKEDITOR.replace( 'elm1', {
            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            magicline: false,
            basicEntities: false,
            fillEmptyBlocks: false,
            countHTML: false,
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '/ckfinder/browser',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '/ckfinder/connector'
        });

    }

    if ( $( "#elm2" ).length ) {
        CKEDITOR.replace( 'elm2', {
            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            magicline: false,
            basicEntities: false,
            fillEmptyBlocks: false,
            countHTML: false
        });
    }
    if ( $( "#elm3" ).length ) {
        CKEDITOR.replace( 'elm3', {
            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            magicline: false,
            basicEntities: false,
            fillEmptyBlocks: false,
            countHTML: false
        });
    }
    if ( $( "#elm4" ).length ) {
        CKEDITOR.replace( 'elm4', {
            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            magicline: false,
            basicEntities: false,
            fillEmptyBlocks: false,
            countHTML: false
        });
    }

    if ( $( "#subtitle" ).length ) {
        CKEDITOR.replace( 'subtitle', {
            toolbar: [
                ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','SpecialChar','Scayt'],
                '/',
            ],
            enterMode	: Number(2),
            // removePlugins: 'wsc',

            height: 60,

            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            basicEntities: false,
            fillEmptyBlocks: false,
            magicline: false,
            countHTML: false

        });
    }
    if ( $( "#title" ).length ) {
        CKEDITOR.replace( 'title', {
            toolbar: [
                ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','SpecialChar','Scayt'],
                '/',
            ],
            enterMode	: Number(2),
            // removePlugins: 'wsc',
            height: 60,

            scayt_autoStartup: true,
            scayt_maxSuggestions: 3,
            showWordCount: true,
            showCharCount: true,
            basicEntities: false,
            fillEmptyBlocks: false,
            magicline: false,
            countHTML: false


        });
    }
});
