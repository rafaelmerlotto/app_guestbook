

const giocatore1 = document.querySelector('.giocatore1');
const giocatore2 = document.querySelector('.giocatore2');
const btn = document.querySelector('.btn');
const messaggio = document.querySelector('.messaggio')
const user1 = document.querySelector(".user1");
const user2 = document.querySelector(".user2");
const listato = document.querySelector(".listato");
const counter = document.querySelector('.counter')
let punteggio1 = 0;
let punteggio2 = 0;
const body = document;
const party = new JSConfetti({ body });

btn.addEventListener('click', mossePossibile);

function mossePossibile() {
    const armi = ['🪨', '📄', '✂️'];
    const giocata1 = armi[Math.floor(Math.random() * armi.length)];
    const giocata2 = armi[Math.floor(Math.random() * armi.length)];

    giocatore1.innerText = giocata1;
    giocatore2.innerText = giocata2;

    determinaVittoria(giocata1, giocata2);
}

function determinaVittoria(mossaGiocatore1, mossaGiocatore2) {
    if (
        (mossaGiocatore1 === "📄" && mossaGiocatore2 === "🪨") ||
        (mossaGiocatore1 === "✂️" && mossaGiocatore2 === "📄") ||
        (mossaGiocatore1 === "🪨" && mossaGiocatore2 === "✂️")
    ) {
        punteggio1++;
        if (punteggio1 === 3) {
            party.addConfetti();
            messaggio.innerText = `${user1.value} ha vinto 🎉`
        }
    } else if (
        (mossaGiocatore1 === "🪨" && mossaGiocatore2 === "📄") ||
        (mossaGiocatore1 === "📄" && mossaGiocatore2 === "✂️") ||
        (mossaGiocatore1 === "✂️" && mossaGiocatore2 === "🪨")
    ) {
        punteggio2++;
        if (punteggio2 === 3) {
            party.addConfetti();
            messaggio.innerText = `${user2.value} ha vinto 🎉`
        }
    } else {
        messaggio.innerText = "Pareggio";
    }
    counter.innerText = `${user1.value} ${punteggio1} X ${punteggio2} ${user2.value} `
}

