var conn = new WebSocket('ws://localhost:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    var text = "";
    var msg = JSON.parse(e.data);
    console.log(msg.type);
    text = "Type " + msg.type;
    var node = document.createElement("LI");                 // Create a <li> node
    var textnode = document.createTextNode(text);         // Create a text node
    node.appendChild(textnode);                              // Append the text to <li>
    document.getElementById("ul").appendChild(node);  
};