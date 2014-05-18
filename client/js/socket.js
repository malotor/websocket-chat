
var server = new EventDispatcher('ws://awesome.dev:8080');

// bind to server events
server.bind('close', function(data){
  chat.log("Disconected - status: " + server.status());
});

// bind to server events
server.bind('open', function(data){
  
  chat.log("Conected - status: " + server.status());
  
  app.getCharacters();

  app.createCharacter();

});

// bind to server events
server.bind('user_connected', function(data){
	chat.log('<span style="color:blue">System message:' +data.msg + '</span>');
});

// bind to server events
server.bind('character_created', function(data){

	//console.log("add piece:");
	//console.log(data);
	//characterId = data.id;
	
	var pieceA = new piece(data.name, data.x, data.y ,data.color);
  board.addPiece(pieceA);
  board.drawPieces();

  chat.log('<span style="color:blue">Warning:' + data.msg + '</span>');

});

// bind to server events
server.bind('character_says', function(data){

	chat.log('<span style="color:' + data.color +'">' +data.user + ' say:' +data.msg + '</span>');

});

// bind to server events
server.bind('character_moves', function(data){

	chat.log('<span style="color:' + data.color +'">' +data.msg + '</span>');

	var piece = board.getPiece(data.name);

	piece.x = data.x;
	piece.y = data.y;

	board.drawPieces();
	
});


// bind to server events
server.bind('server_message', function(data){

	chat.log('<span style="color:blue">Warning:' + data.msg + '</span>');

});

// bind to server events
server.bind('server_warning', function(data){

	chat.log('<span style="color:red">Warning:' + data.msg + '</span>');

});

// bind to server events
server.bind('characters_list', function(data){

	data.characters.forEach(function(character) {
	  var pieceA = new piece(character.name ,character.posx, character.posy,character.color);
  	board.addPiece(pieceA);
  	characterList.addCharater(character);
	});

	board.drawPieces();

});