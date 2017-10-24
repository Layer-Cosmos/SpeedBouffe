
var conn = new ab.Session('ws://localhost:8080',
    function() {
        conn.subscribe('Mademoiselle', function(topic, data) {
            var text = "";
            var msg = data;
            console.log(msg.title);
            text = "Nouvelle commande de " + msg.Civilite + ". " + msg.Nom + " " + msg.Prenom;
            var node = document.createElement("LI");                 // Create a <li> node
            var textnode = document.createTextNode(text);         // Create a text node
            node.appendChild(textnode);                              // Append the text to <li>
            document.getElementById("ul").appendChild(node);  
            // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
            console.log('New article published to category "' + topic + '" : ' + data.title);
        });
    },
    function() {
        console.warn('WebSocket connection closed');
    },
    {'skipSubprotocolCheck': true}
);







/*var conn = new WebSocket('ws://localhost:8080');
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
};*/