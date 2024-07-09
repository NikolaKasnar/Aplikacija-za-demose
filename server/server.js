// server/server.js
const fs = require('fs');
const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });
const wss2 = new WebSocket.Server({ port: 50000 });
const wss3 = new WebSocket.Server({ port: 50100 });
const wss4 = new WebSocket.Server({ port: 50200 });
const wss5 = new WebSocket.Server({ port: 50300 });
const wss6 = new WebSocket.Server({ port: 50400 });
const wss7 = new WebSocket.Server({ port: 50500 });
const wss8 = new WebSocket.Server({ port: 50600 });

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a

let documentContent = '';
fs.stat("aktuarski.vue", (err, stat) => {
  if (!err) {
    documentContent = fs.readFileSync('aktuarski.vue', 'utf8');
    documentContent=documentContent.slice(29,-11);
    console.log('Received:', documentContent);
  }
});

wss.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent);
    //spremanje u vue file
    if(documentContent.length!==0){
      //let vue=JSON.stringify("<script> export default { t: " + JSON.parse(documentContent) + "}</script> ", null, 2);
      //let vue1=JSON.stringify("<script> export default { t: ");
      //let vue2=JSON.stringify("}</script> ");
      //vue = "<script> export default { t: " + vue + "}</script> ";
      //vue=vue1+vue+vue2;
      let vue=JSON.stringify(JSON.parse(documentContent), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('aktuarski.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }

    // Broadcast promjene svim povezanim klijentima
    wss.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent2 = '';
fs.stat("doktorski.vue", (err, stat) => {
  if (!err) {
    documentContent2 = fs.readFileSync('doktorski.vue', 'utf8');
    documentContent2=documentContent2.slice(29,-11);
    console.log('Received:', documentContent2);
  }
});

wss2.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent2);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent2 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent2);
    //spremanje u vue file
    if(documentContent2.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent2), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('doktorski.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }

    // Broadcast promjene svim povezanim klijentima
    wss2.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent2);
      }
    });
  });
});


//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent3 = '';
fs.stat("praktikumi.vue", (err, stat) => {
  if (!err) {
    documentContent3 = fs.readFileSync('praktikumi.vue', 'utf8');
    documentContent3=documentContent3.slice(29,-11);
    console.log('Received:', documentContent3);
  }
});


wss3.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent3);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent3 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent3);
    //spremanje u vue file
    if(documentContent3.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent3), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('praktikumi.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss3.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent3);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent4 = '';
fs.stat("snimanja.vue", (err, stat) => {
  if (!err) {
    documentContent4 = fs.readFileSync('snimanja.vue', 'utf8');
    documentContent4=documentContent4.slice(29,-11);
    console.log('Received:', documentContent4);
  }
});


wss4.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent4);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent4 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent4);
    //spremanje u vue file
    if(documentContent4.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent4), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('snimanja.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss4.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent4);
      }
    });
  });
});

//tablice za iduci tjedan

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent5 = '';
fs.stat("aktuarski_iduci.vue", (err, stat) => {
  if (!err) {
    documentContent5 = fs.readFileSync('aktuarski_iduci.vue', 'utf8');
    documentContent5=documentContent5.slice(29,-11);
    console.log('Received:', documentContent5);
  }
});


wss5.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent5);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent5 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent5);
    //spremanje u vue file
    if(documentContent5.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent5), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('aktuarski_iduci.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss5.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent5);
      }
    });
  });
});


//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent6 = '';
fs.stat("doktorski_iduci.vue", (err, stat) => {
  if (!err) {
    documentContent6 = fs.readFileSync('doktorski_iduci.vue', 'utf8');
    documentContent6=documentContent6.slice(29,-11);
    console.log('Received:', documentContent6);
  }
});


wss6.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent6);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent6 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent6);
    //spremanje u vue file
    if(documentContent6.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent6), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('doktorski_iduci.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss6.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent6);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent7 = '';
fs.stat("praktikumi_iduci.vue", (err, stat) => {
  if (!err) {
    documentContent7 = fs.readFileSync('praktikumi_iduci.vue', 'utf8');
    documentContent7=documentContent7.slice(29,-11);
    console.log('Received:', documentContent7);
  }
});


wss7.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent7);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent7 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent7);
    //spremanje u vue file
    if(documentContent7.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent7), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('praktikumi_iduci.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss7.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent7);
      }
    });
  });
});

//ako nemamo vec nesto spremljeno, content je prazan
//ako imamo, cita iz vue file-a
let documentContent8 = '';
fs.stat("snimanja_iduci.vue", (err, stat) => {
  if (!err) {
    documentContent8 = fs.readFileSync('snimanja_iduci.vue', 'utf8');
    documentContent8=documentContent8.slice(29,-11);
    console.log('Received:', documentContent8);
  }
});


wss8.on('connection', ws => {
  // Pošalji trenutni dokument klijentu koji se tek povezao
  ws.send(documentContent8);

  // Obrada dolaznih poruka od klijenta
  ws.on('message', message => {
    documentContent8 = message.toString(); // Primljena poruka se sprema kao string, [object Blob] problem inače može nastati
    console.log('Received:', documentContent8);
    //spremanje u vue file
    if(documentContent8.length!==0){
      let vue=JSON.stringify(JSON.parse(documentContent8), null, 2);
      vue = "<script> export default { t: " + vue + "}</script> ";
      fs.writeFile('snimanja_iduci.vue', vue, err => {
        if (err) {
          //console.error(err);
        }
      });
    }


    // Broadcast promjene svim povezanim klijentima
    wss8.clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(documentContent8);
      }
    });
  });
});

console.log('WebSocket server started on ws://localhost:8080');
console.log('WebSocket server started on ws://localhost:50000');
console.log('WebSocket server started on ws://localhost:50100');
console.log('WebSocket server started on ws://localhost:50200');
console.log('WebSocket server started on ws://localhost:50300');
console.log('WebSocket server started on ws://localhost:50400');
console.log('WebSocket server started on ws://localhost:50500');
console.log('WebSocket server started on ws://localhost:50600');
