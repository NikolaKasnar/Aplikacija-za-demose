// server/server.js
const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });

let documentContent = ''; // Inicijalizacija praznog dokumenta

wss.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent);

    // Broadcast promjene svim povezanim klijentima
    wss.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent);
      }
    });
  });
});

console.log('WebSocket server started on ws://localhost:8080');
