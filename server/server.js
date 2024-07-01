// server/server.js
const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });
const wss2 = new WebSocket.Server({ port: 50000 });
const wss3 = new WebSocket.Server({ port: 50100 });
const wss4 = new WebSocket.Server({ port: 50200 });

const fs = require('fs');

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz json file-a
let documentContent = '';
fs.stat("aktuarski.json", (err, stat) => {
  if (!err) {
    documentContent = fs.readFileSync('aktuarski.json', 'utf8');
  }
});

wss.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent);
    //spremanje u json file
    let json=JSON.stringify(JSON.parse(documentContent), null, 2);
    fs.writeFile('aktuarski.json', json, err => {
      if (err) {
        console.error(err);
      }
    });

    // Broadcast promjene svim povezanim klijentima
    wss.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz json file-a
let documentContent2 = '';
fs.stat("doktorski.json", (err, stat) => {
  if (!err) {
    documentContent2 = fs.readFileSync('doktorski.json', 'utf8');
  }
});

wss2.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent2);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent2 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent2);
    //spremanje u json file
    let json=JSON.stringify(JSON.parse(documentContent2), null, 2);
    fs.writeFile('doktorski.json', json, err => {
      if (err) {
        console.error(err);
      }
    });

    // Broadcast promjene svim povezanim klijentima
    wss2.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent2);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz json file-a
let documentContent3 = '';
fs.stat("praktikumi.json", (err, stat) => {
  if (!err) {
    documentContent3 = fs.readFileSync('praktikumi.json', 'utf8');
  }
});

wss3.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent3);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent3 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent3);
    //spremanje u json file
    let json=JSON.stringify(JSON.parse(documentContent3), null, 2);
    fs.writeFile('praktikumi.json', json, err => {
      if (err) {
        console.error(err);
      }
    });

    // Broadcast promjene svim povezanim klijentima
    wss3.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent3);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz json file-a
let documentContent4 = '';
fs.stat("snimanja.json", (err, stat) => {
  if (!err) {
    documentContent4 = fs.readFileSync('snimanja.json', 'utf8');
  }
});

wss4.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent4);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent4 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent4);
    //spremanje u json file
    let json=JSON.stringify(JSON.parse(documentContent4), null, 2);
    fs.writeFile('snimanja.json', json, err => {
      if (err) {
        console.error(err);
      }
    });

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
