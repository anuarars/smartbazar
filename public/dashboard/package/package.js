function play() {
    var audio = new Audio('storage/audio/notification.mp3');
    audio.play();
}

function show(order){
    if(order){
        $('#order_id').val(order);
        $('#no-order').css("display", "none");
    }
    $('.notification_form').css("display", "block");
}

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('97d23a3ea33fb50a7a35', {
    cluster: 'eu'
});

var channel = pusher.subscribe('my-channel');
channel.bind('App\\Events\\PackerEvent', function(data) {
    var order = data.order_id
    play();
    show(order);
});