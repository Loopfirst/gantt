$(document).ready(kickoff);




function kickoff() {
    scrollToToday();
}


function scrollToToday() {
    $("body > div[id]").each(function() {
        var id = "#" + $(this).attr('id');
        console.log(id);

        try {
            $(id + " .today")[0].scrollIntoView();

            var scrollLeft = $(id + " .gantt-data").scrollLeft();
            var position = $(id + " .today").position().left - $(id + " .gantt-day").width() * 1;
            $(id + " .gantt-data").scrollLeft(scrollLeft + position);
        } catch (e) {
            null;
        }
    });

    $(document).scrollTop(0);
}
