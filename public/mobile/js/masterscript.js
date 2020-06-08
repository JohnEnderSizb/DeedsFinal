//const DOMAIN = "http://192.168.43.17:8000/"
const DOMAIN = "http://192.168.43.56:8000/"

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('e7c46f5ef37b56e7c6f7', {
  cluster: 'ap2',
  forceTLS: true
});

var channel = pusher.subscribe(getUserEmail());
    channel.bind('App\\Events\\Notify', function(data) {
      //alert(data.message.id);
      message = JSON.parse(data.message);
      id = message.id;
      scanner_name = message.scanner_name;
      deed_title = message.deed_title;
      out = deed_title + " scanned by " + scanner_name;
      JSReceiver.beep(out);
    });


function getUserEmail(){
    return JSReceiver.getUserEmail()
}

function restartActivity(){
    //alert("Food")
    JSReceiver.restartActivity();
}

function getDomain(){
    alert(DOMAIN);
  }

/*
Tabs:
Home > Scan Button and Logs > Logs Hosted On Live
Notification > Hosted on live > Easier
Messages > Hosted On Live > Live is easier
Settings Menu: Not Today, sir
*/
