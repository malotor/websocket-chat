var EventDispatcher = function(url){

  var conn = new WebSocket(url);
 
  var callbacks = {};
 
  // dispatch to the right handlers
  conn.onmessage = function(evt){
    var json = JSON.parse(evt.data);
    //chat.log("Event received: " + json.event);
    console.log(json.event);
    console.log(json.data);
    dispatch(json.event, json.data);
  };
 
  conn.onclose = function(evt){
    dispatch('close',null)
  }
  conn.onopen = function(evt){
    //Save the connectionid
    //characterId = this
    dispatch('open',null)
  }

  this.bind = function(event_name, callback){
    callbacks[event_name] = callbacks[event_name] || [];
    callbacks[event_name].push(callback);
    return this;// chainable
  };
 
  this.send = function(event_name, event_data){
    var payload = JSON.stringify({event:event_name, data: event_data});
    //chat.log("Sended: " + payload);
    conn.send( payload );
    return this;
  };

 
  var dispatch = function(event_name, message){
    var chain = callbacks[event_name];
    if(typeof chain == 'undefined') return; // no callbacks for this event
    for(var i = 0; i < chain.length; i++){
      chain[i]( message )
    }
  }

  this.status = function() {
    return conn.readyState;
  }

  this.close = function() {
    conn.close();
  }
  
};