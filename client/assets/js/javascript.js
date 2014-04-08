var socket;

function init() {
	var host = "ws://awesome.dev:8080"; // SET THIS TO YOUR SERVER
	try {
		socket = new WebSocket(host);
		log('WebSocket - status '+socket.readyState);
		socket.onopen    = function(msg) { 
							   log("Welcome - status "+this.readyState); 
							   //console.log(msg);
							   createCharacter();
							   //sayAll("Hello for all Characters");
						   };
		socket.onmessage = function(msg) { 
							   log("Received: "+msg.data); 
						   };
		socket.onclose   = function(msg) { 
							   log("Disconnected - status "+this.readyState); 
						   };

		

	}
	catch(ex){ 
		log(ex); 
	}
	$("msg").focus();
}

function send(){
	var txt,msg;
	txt = $("msg");
	msg = txt.value;
	if(!msg) { 
		alert("Message can not be empty"); 
		return; 
	}
	txt.value="";
	txt.focus();
	try { 

		jsonmessage = '{ "command": "say" , "args" : {  "character": "' + $('character_name').value + '", "msg" : "' + msg + '" } }';

		socket.send(jsonmessage); 
		//log('Sent: '+jsonmessage); 
	} catch(ex) { 
		log(ex); 
	}
}

function createCharacter() {
	try { 
		jsonmessage = '{ "command": "create" ,  "args" : { "name": "' + $('character_name').value + '" } }';
		socket.send(jsonmessage); 
		log('Sent Command: '+jsonmessage); 
	} catch(ex) { 
		log(ex); 
	}

}

function move() {
	try { 
		jsonmessage = '{ "command": "move"  , "args" : { "character": "' + $('character_name').value + '", "x": "' + $('posX').value + '", "y": "' + $('posY').value + '" } }';
		socket.send(jsonmessage); 
		log('Sent Command: '+jsonmessage); 
	} catch(ex) { 
		log(ex); 
	}

}

function quit(){
	if (socket != null) {
		log("Goodbye!");
		socket.close();
		socket=null;
	}
}

function reconnect() {
	quit();
	init();
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg){ $("log").innerHTML+="<br>"+msg; }
function onkey(event){ if(event.keyCode==13){ send(); } }