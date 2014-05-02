var chat = {

  log: function(msg) {
    var chatWindow = document.getElementById('chat');
  	chatWindow.innerHTML+="<br>"+msg;
  },

}