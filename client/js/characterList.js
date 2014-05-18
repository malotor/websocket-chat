var characterList = {

	list: $("#userList"),

	addCharater : function (character) {
		app.characters.push(character);
		$("#userList").append('<p style="color: ' + character.color + '" >' + character.name + '</p>');
	}

}