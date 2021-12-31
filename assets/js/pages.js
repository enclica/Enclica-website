var delayInMilliseconds = 500;
var v = document.getElementById("lv");
var load = function(url) {
    var v = document.getElementById("lv");
    $.get(url).done(function(data) {
        setTimeout(function() {
            v.currentTime = 0;
            $("#application").html(data);
            $('#preload').hide();
        }, delayInMilliseconds);
    });

};
$(window).on('load', function() {
    $('#preload').hide();
    $('#lv').attr('currentTime', 0);
    $(document).on('click', 'a:not(.n-o)', function(e) {

        if ($(this).attr("href") === undefined) { return true; } else {

            e.preventDefault();
            var v = document.getElementById("lv");
            v.currentTime = 0;
            $('#preload').show();
            var $this = $(this),
                url = $this.attr("href"),
                title = $this.text();

            history.pushState({
                url: url,
                title: title,
            }, title, url);

            document.title = title;

            load(url, function() { $('#preload').hide(); });
        }

    });

    $(window).on('popstate', function(e) {
        var state = e.originalEvent.state;
        if (state !== null) {
            document.title = state.title;

            load(state.url);
        } else {

            load("/");

            history.pushState({
                url: "homepage",
                title: "Enclica"
            }, title, url);

        }
    });
});
document.addEventListener('load', function() {
    $('#preload').hide();
})