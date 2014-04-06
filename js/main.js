$(document).ready(kickoff);

$(document).tooltip({
    tooltipClass: "tooltip",
    hide: false,
    show: false,
    track: true
});

function kickoff() {
    scrollToToday();
    hoverForInfo();
}

function scrollToToday() {
    $("body > div[id]").each(function() {
        var id = "#" + $(this).attr('id');

        try {
            $(id + " .today")[0].scrollIntoView();

            var scrollLeft = $(id + " .gantt-data").scrollLeft();
            var position = $(id + " .today").position().left - $(id + " .gantt-day").width() * 7;
            $(id + " .gantt-data").scrollLeft(scrollLeft + position);
        } catch (e) {
            null;
        }
    });

    $(document).scrollTop(0);
}


function hoverForInfo() {
    // $('.gantt-block').hover();
    null;
}
