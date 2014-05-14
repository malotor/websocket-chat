var chat = {

  log: function(msg) {
    var chatWindow = $('#chat');
    var chatScroll = $('#chatScroll')
  	chatScroll.append("<br>"+msg);
  	chatWindow.scrollTop(chatScroll.innerHeight());
  },

  clear: function () {
  	var chatScroll = $('#chatScroll');
  	chatScroll.empty();
  }

}

//function onkey(event){ if(event.keyCode==13){ UI.say(); } }
