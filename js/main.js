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
    clickEvents();
}


function scrollToToday() {
    var day_offset = -7;

    var position = $(".gantt-day").width() * (day_offset + 0.5);

    $(".gantt-data").scrollTo("time", 1500, {
        offset: position,
        easing: 'easeOutQuad'
    });
}


function overScroll() {
    $('section.gantt-data').overscroll({
        direction: 'horizontal'
    });
}

function clickEvents() {
    $('#gototoday').click(function(e) {
        scrollToToday();
        e.preventDefault();
    });
}
