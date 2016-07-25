

jQuery(function ($) { 
    $('pre code').each(function () {
        hljs.highlightBlock(this, '    ');
    });
    
    

    if ($("#git").length) {
        var repo = $("#git").attr('data');
                console.log(repo);
       
        $.ajax({
            url: 'https://api.github.com/repos/flaremediaplayer/' + repo,
            success: function (data) {
                console.log(data);
                $("#git ul").append("<li><a href=\"" + data['html_url'] + "\">" + data['html_url']  +"</a></li>");
                //process the JSON data etc
            }
        })
        

    }
});