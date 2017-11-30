var nbCommand = 1;



var conn = new ab.Session('ws://localhost:8080',
    function() {
        conn.subscribe('done', function(topic, data) {

            var el = document.querySelector('.js-fade');
            if (el.classList.contains('is-paused')){
                el.classList.remove('is-paused');
            }

            var text = "";
            var msg = data;

            console.log(msg);

            /*console.log(msg.Civilite);
            text = "Nouvelle commande de " + msg.Civilite + ". " + msg.Nom + " " + msg.Prenom;
            var node = document.createElement("article");                 // Create a <li> node
            node.classList.add("commande");
            var nodeH3 = document.createElement("h3");
            nodeH3.appendChild(document.createTextNode("Salut"));
            var nodeUl = document.createElement("ul");
            nodeUl.classList.add("info-commande");
            var nodeLi = [];
            var nodeLi = document.createElement("li");
            var nodeI = document.createElement("i");
            nodeI.classList.add("fa-user");
            nodeI.classList.add("fa");
            var nodeSpan = document.createElement("span");
            nodeSpan.classList.add("gras");
            nodeSpan.appendChild(document.createTextNode(" Nom du client : "));
            //nodeLi.classList.add("fa fa-user");
            nodeLi.appendChild(nodeI);
            nodeLi.appendChild(nodeSpan);
            nodeLi.appendChild(document.createTextNode(msg.Nom));
            nodeUl.appendChild(nodeLi);
            var textnode = document.createTextNode(text);         // Create a text node
            node.appendChild(nodeH3);
            node.appendChild(nodeUl);// Append the text to <li>
            document.getElementById("liste-commande").appendChild(node);
            // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
            console.log('New article published to category "' + topic + '" : ' + data.title);*/

            var node = document.getElementsByClassName("commande");
            var cln = node[0].cloneNode(true);

            cln.style.display = "block";
            //console.log(cln);

            cln.childNodes[1].textContent = nbCommand++;

            cln.childNodes[3].childNodes[1].childNodes[2].textContent = " " + msg[0].name + " " + msg[0].first_name;
            var command = "";
            for(var i = 0; i < msg[2].length; i++){
                if(i != 0 ){
                    command += " | "+msg[2][i].meal;
                }
                else {
                    command += msg[2][i].meal;
                }

            }

            //console.log(command);

            cln.childNodes[3].childNodes[3].childNodes[3].textContent = " " + command;
            cln.childNodes[3].childNodes[5].childNodes[2].textContent = " " + msg[0].age;
            //node[0].childNodes[1].textContent = "salut";

            //console.log(cln);

            document.getElementById("liste-commande").appendChild(cln);
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