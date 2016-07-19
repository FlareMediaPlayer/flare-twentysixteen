

jQuery(function ($) { 
    $('pre code').each(function () {
        hljs.highlightBlock(this, '    ');
    });
});