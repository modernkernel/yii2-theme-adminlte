setInterval(serverTime, 1000);
var timestamp = $(".server-time").data("timestamp");
var datetime;
function serverTime() {
    datetime = moment.unix(timestamp);
    $(".server-time").html(moment().format('L LTS'));
    timestamp += 1;
}
serverTime();
$(".sidebar-toggle").on("click", function () {
    $.ajax({
        method: 'GET',
        url: $("body").data("toggle-url"),
        data: { classname: $("body").attr("class")}
    })
});

