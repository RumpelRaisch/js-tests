$(function()
{
    var undefined,
        fn      = {},
        title   = document.title,
        $links  = $('a[data-history]'),
        $output = $('#output');

    fn.load = function(data)
    {
        document.title = data.title;

        $links
            .removeClass('active')
            .blur()
            .closest('li')
            .removeClass('active');

        $('a[data-history][href="' + data.href + '"]')
            .addClass('active')
            .closest('li')
            .addClass('active');

        $output.text(data.text);
    };

    $links.on('click', function(e)
    {
        e.preventDefault();

        var $this = $(this),
            data  = {};

        data.href  = $this.attr('href');
        data.text  = $this.text();
        data.title = title + ' - ' + data.text;

        history.pushState(data, data.title, data.href);
        fn.load(data);
    });

    $(window).on('popstate', function(e)
    {
        var state = e.originalEvent.state;

        if (null !== state) {
            fn.load(state);
        } else {
            fn.load({
                text : 'default',
                title: title
            });
        }
    });
});
