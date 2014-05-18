var app = {

	characters : [],

	init: function() {
		board.init('board');
	},
	
	say: function () {

		var msg = $("#msg").val();
		var charname = $("#character_name").val();
		
		$("#msg").val("");

		var message = {
			message : msg
		};

		server.send( 'say', message );

	},

	move: function () {

		var charname = $("#character_name").val();
		var x = $("#posX").val();
		var y = $("#posY").val();

		var message = {
			posx : x,
			posy : y,
		};

		server.send( 'move', message );
	}, 

	createCharacter: function () {
		var message = {
			attributes : {
				name : $('#character_name').val()
			}
		};
		
		server.send( 'create', message );
	},

	getCharacters: function () {		
		server.send( 'getCharacters', {} );
	},

	quit: function (){
		if (server != null) {
			chat.log("Goodbye!");
			server.close();
		}
	},

	reconnect: function () {
		this.quit();
	},

	clearLog: function () {
		chat.clear();
	},

};

