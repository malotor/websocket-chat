//var clientID = null;


var app = {

	init: function() {
		board.init('board');
	}
};

var UI = {
	say: function () {

		var msg = $("#msg").val();
		var charname = $("#character_name").val();

		var message = {
			id: characterId,
			message : msg
		};

		socket.send( 'say', message );

	},

	move: function () {

		var charname = $("#character_name").val();
		var x = $("#posX").val();
		var y = $("#posY").val();

		var message = {
			id: characterId,
			posx : x,
			posy : y,

		};

		socket.send( 'move', message );
	}

};

var server = {
	createCharacter: function () {
		messagesend = {
			attributes : {
				name : $('#character_name').val()
			}
		};
		
		socket.send( 'create', messagesend );
	},

	getCharacters: function () {		
		socket.send( 'getCharacters', {} );
	},

	quit: function (){

	},

	reconnect: function () {
	},

};


function onkey(event){ if(event.keyCode==13){ UI.say(); } }