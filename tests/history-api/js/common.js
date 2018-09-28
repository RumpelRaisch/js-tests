$(function()
{
    var undefined,
        fn      = {},
        $links  = $('a[data-history]'),
        $output = $('#output');

    fn.load = function(href)
    {
        console.log('href', href);

        $links
            .removeClass('active')
            .blur()
            .closest('li')
            .removeClass('active');

        if (href) {
            $('a[data-history][href="' + href + '"]')
                .addClass('active')
                .closest('li')
                .addClass('active');
        } else {
            href = '';
        }

        $.post('./data.php', {route: href})
            .done(function(response, status, xhr)
            {
                console.log('response', response);

                document.title = response.title;

                $output.text(response.text);
            })
            .fail(function(xhr, status, errorThrown)
            {
                document.title = xhr.status + ' ' + xhr.statusText;

                $output.text(xhr.status + ' ' + xhr.statusText + ' - ' + xhr.responseText);
            });
    };

    $links.on('click', function(e)
    {
        e.preventDefault();

        var href = $(this).attr('href');

        history.pushState(href, href, href);
        fn.load(href);
    });

    $(window).on('popstate', function(e)
    {
        if (null !== e.originalEvent.state) {
            fn.load(e.originalEvent.state);
        } else {
            fn.load();
        }
    });
});
