setInterval(serverTime, 1000);
var timestamp = $(".server-time").data("timestamp");
var datetime;
function serverTime() {
    datetime = moment.unix(timestamp);
    $(".server-time").html(moment().format('L LTS'));
    timestamp += 1;
}
serverTime();

