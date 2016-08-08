setInterval(serverTime, 1000);
var timestamp = $(".server-time").data("timestamp");
var datetime;
function serverTime() {
    datetime = moment.unix(timestamp);
    $(".server-time").html(moment().format('DD/MM/YYYY, hh:mm:ss'));
    timestamp += 1;
}

