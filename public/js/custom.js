 //here we  get real time  new notifications from friends which you have friended
  
  //display none on first page reload
  document.getElementById("countvisitsbadge").style.display = 'none';
if(typeof(EventSource) !== "undefined") {
    //"{{ route('messagesse') }}"
    //"{{url('messagesse')}}"
var source = new EventSource("/messagesse");
  source.onmessage = function(event) {

var data = JSON.parse(event.data);

console.log(data);
if(data.TotalVisitors=="0"){
document.getElementById("countvisitsbadge").style.display = 'none';
}

if(data.TotalVisitors!="0"){
  document.getElementById("countvisitsbadge").innerHTML = data.TotalVisitors;
document.getElementById("countvisitsbadge").style.display = '';
}

  };
} else {
    alert("Sorry, your browser does not support server-sent events...")
  //document.getElementById("latest-notifications-ul").innerHTML = "Sorry, your browser does not support server-sent events...";
}