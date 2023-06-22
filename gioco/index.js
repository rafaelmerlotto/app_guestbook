

const giocatore1 = document.querySelector('.giocatore1');
const giocatore2 = document.querySelector('.giocatore2');
const btn = document.querySelector('.btn');
const messaggio = document.querySelector('.messaggio')
const user1 = document.querySelector(".user1");
const user2 = document.querySelector(".user2");

btn.addEventListener('click', mossePossibile)

function mossePossibile() {


    const armi = ['🪨', '📄', '✂️'];
    const giocata1 = armi[Math.floor(Math.random() * armi.length)];
    const giocata2 = armi[Math.floor(Math.random() * armi.length)];


    determinaVittoria(giocata1, giocata2);

    giocatore1.innerText = giocata1;
    giocatore2.innerText = giocata2;



}



function determinaVittoria(mossaGiocatore1, mossaGiocatore2) {
    if (
        (mossaGiocatore1 === "📄" && mossaGiocatore2 === "🪨") ||
        (mossaGiocatore1 === "✂️" && mossaGiocatore2 === "📄") ||
        (mossaGiocatore1 === "🪨" && mossaGiocatore2 === "✂️")
    ) {
        const win1 = [messaggio.innerText = `${user1.value} ha vinto 🎉`];
    
            
        console.log(win1)


    } else if (
        (mossaGiocatore1 === "🪨" && mossaGiocatore2 === "📄") ||
        (mossaGiocatore1 === "📄" && mossaGiocatore2 === "✂️") ||
        (mossaGiocatore1 === "✂️" && mossaGiocatore2 === "🪨")
    ) {
        const win2  = `${user2.value} ha vinto 🎉`;
       
            const salva2 = [];
            salva2.push(win2);
            console.log(salva2)
    




    } else {
        messaggio.innerText = "Pareggio";

    }

}






