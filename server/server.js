// server/server.js
const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });
const wss2 = new WebSocket.Server({ port: 50000 });
const wss3 = new WebSocket.Server({ port: 50100 });
const wss4 = new WebSocket.Server({ port: 50200 });

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

let documentContent2 = '';

wss2.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent2);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent2 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent2);

    // Broadcast promjene svim povezanim klijentima
    wss2.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent2);
      }
    });
  });
});

let documentContent3 = '';

wss3.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent3);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent3 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent3);

    // Broadcast promjene svim povezanim klijentima
    wss3.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent3);
      }
    });
  });
});

let documentContent4 = '';

wss4.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent4);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent4 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent4);

    // Broadcast promjene svim povezanim klijentima
    wss4.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent4);
      }
    });
  });
});

console.log('WebSocket server started on ws://localhost:8080');
console.log('WebSocket server started on ws://localhost:50000');
console.log('WebSocket server started on ws://localhost:50100');
console.log('WebSocket server started on ws://localhost:50200');
