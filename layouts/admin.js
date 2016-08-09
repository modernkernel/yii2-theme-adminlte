setInterval(serverTime, 1000);
var timestamp = $(".server-time").data("timestamp");
var datetime;
function serverTime() {
    datetime = moment.unix(timestamp);
    $(".server-time").html(moment().format('LLLL'));
    timestamp += 1;
}
serverTime();

