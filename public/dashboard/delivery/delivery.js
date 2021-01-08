function show(order){
  	if(order){
		$('#order_id').val(order);
		$('#no-order').css("display", "none");
  	}
  	$('.notification_form').css("display", "block");
}

function play() {
	var audio = new Audio('storage/audio/notification.mp3');
	audio.play();
}

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('97d23a3ea33fb50a7a35', {
  	cluster: 'eu'
});

var channel = pusher.subscribe('delivery-channel');
channel.bind('App\\Events\\DeliveryEvent', function(data) {
  	console.log(data);
  	var order = data.order_id;
	show(order);
	play();
});