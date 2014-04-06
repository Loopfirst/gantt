$(document).ready(kickoff);


$(document).tooltip({
    tooltipClass: "tooltip",
    hide: false,
    show: {
        duration: 100,
        delay: 500
    },
    track: true,

});


function kickoff() {
    scrollToToday();
    overScroll();
}


function scrollToToday() {
    $(".charts > div").each(function() {
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


function overScroll() {
    $('section.gantt-data').overscroll({
        direction: 'horizontal'
    });
}

function clickEvents() {
    $('')
}
