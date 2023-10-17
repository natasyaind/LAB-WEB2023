let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;


// get element
const startGameButton = document.getElementById("btn-start");
const takeCardButton = document.getElementById("btn-hit");
const holdCardsButton = document.getElementById("btn-hold");
const resetButton = document.getElementById("btn-reset");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

const botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

const resultElement = document.getElementById("result");

window.onload = () => {
  buildUserCards();
  shuffleCards();
  takeCardButton.setAttribute("disabled", true);
  holdCardsButton.setAttribute("disabled", true);
};

function buildUserCards() {
  let cardTypes = ["C", "D", "H", "S"];
  let cardValues = [
    "A",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
    "10",
    "K",
    "Q",
    "J",
  ];
  cards = [];

  for (let i = 0; i < cardTypes.length; i++) {
    for (let j = 0; j < cardValues.length; j++) {
      cards.push(cardValues[j] + "-" + cardTypes[i]);
    }
  }
}

function shuffleCards() {
  for (let i = 0; i < cards.length; i++) {
    let randomNum = Math.floor(Math.random() * cards.length);
    let temp = cards[i];
    cards[i] = cards[randomNum];
    cards[randomNum] = temp;
  }
}

startGameButton.addEventListener("click", function () {
  const inputMoneyValue = inputMoney.value.trim();
  if (!inputMoneyValue) {
    alert("Input your bet first!");
    return;
  }

  const moneyAmount = parseInt(inputMoneyValue);

  if (isNaN(moneyAmount) || moneyAmount <= 0) {
    alert("Masukkan jumlah uang yang valid (angka positif).");
    return;
  }

  if (parseInt(myMoney.textContent) <= 0) {
    alert("Uang Anda Habis WKWK");
    return
  } 
  if (moneyAmount > parseInt(myMoney.textContent)) {
    alert("Maaf, uang Anda tidak cukup:(");
    return;
  }

  if (startGameButton.textContent === "TRY AGAIN") {
    botSums = 0;
    mySums = 0;
    botASCards = 0;
    myASCards = 0;
    isCanHit = true;
    message = "";
    botSumsElement.textContent = '';

    // Hapus semua kartu yang ada di myCards
    const myCards = document.getElementsByClassName("my-cards")[0];
    while (myCards.firstChild) {
      myCards.removeChild(myCards.firstChild);
    }

    // Hapus semua kartu yang ada di botCards
    const botCards = document.getElementsByClassName("bot-cards")[0];
    while (botCards.firstChild) {
      botCards.removeChild(botCards.firstChild);
    }

    let cardImg = document.createElement("img");
    cardImg.src = "/Images/cards/BACK.png";
    cardImg.className = "hidden-card";
    botCardsElement.append(cardImg);

    buildUserCards();
    shuffleCards();
  }

  takeCardButton.disabled = false;
  holdCardsButton.disabled = false;
  startGameButton.textContent = "TRY AGAIN";
  startGameButton.setAttribute("disabled", true);

  // Hapus semua kartu yang ada di myCards
  const myCards = document.getElementsByClassName("my-cards")[0];
  while (myCards.firstChild) {
    myCards.removeChild(myCards.firstChild);
  }

  // Reset mySums menjadi 0
  mySums = 0;

  for (let i = 0; i < 2; i++) {
    if (cards.length > 0) {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/Images/cards/${card}.png`;
      mySums += getValueOfCard(card);
      myASCards += checkASCard(card);
      mySumsElement.textContent = mySums;
      myCardsElement.append(cardImg);
    }
  }
  resultElement.textContent = message;
});

takeCardButton.addEventListener("click", function () {
  if (!isCanHit) return;

  let cardImg = document.createElement("img");
  let card = cards.pop();
  cardImg.src = `/Images/cards/${card}.png`;
  myASCards += checkASCard(card); // Menambah kartu AS (jika kartu adalah AS)
  mySums += getValueOfCard(card);
  
  // Mengurangi nilai kartu AS jika jumlah kartu melebihi 21
  while (mySums > 21 && myASCards > 0) {
    mySums -= 10;
    myASCards--;
  }

  mySumsElement.textContent = mySums;
  myCardsElement.append(cardImg);

  if (mySums > 21) {
    takeCardButton.disabled = true;
    holdCardsButton.disabled = true;
    startGameButton.disabled = false;
    resultElement.textContent = "YOU LOSE!";
    myMoney.textContent -= inputMoney.value;
  }
});

holdCardsButton.addEventListener("click", function () {
  takeCardButton.disabled = true;
  setTimeout(() => {
    document.getElementsByClassName("hidden-card")[0].remove();
  }, 1000);

  const addBotCards = () => {
    setTimeout(() => {
      let cardImg = document.createElement("img");
      let card = cards.pop();
      cardImg.src = `/Images/cards/${card}.png`;
      botASCards += checkASCard(card); // Menambah kartu AS (jika kartu adalah AS)
      botSums += getValueOfCard(card);

      // Mengurangi nilai kartu AS jika jumlah kartu melebihi 21
      while (botSums > 21 && botASCards > 0) {
        botSums -= 10;
        botASCards--;
      }

      botCardsElement.append(cardImg);
      botSumsElement.textContent = botSums;

      if (botSums <= mySums && botSums < 21 ) {
        addBotCards();
      } else {
        botSums = reduceASCardValue(botSums, botASCards);
        mySums = reduceASCardValue(mySums, myASCards);
        isCanHit = false;

        let message = "";
        if (mySums > 21 || mySums % 22 < botSums % 22) {
          message = "YOU LOSE!";
          myMoney.textContent -= inputMoney.value;
        } else if (botSums > 21 || mySums % 22 > botSums % 22) {
          message = "YOU WIN!";
          myMoney.textContent = parseInt(myMoney.textContent) + parseInt(inputMoney.value *2);
        } else if (mySums === botSums) message = "TIE";

        resultElement.textContent = message;
        startGameButton.disabled = false;
        
        holdCardsButton.disabled = true;
      }
    }, 1000);
  };

  addBotCards();
});


resetButton.addEventListener('click', function () {
  myMoney.textContent = '5000';

  // Hapus semua kartu dari pemain
  const myCards = document.getElementsByClassName('my-cards')[0];
  while (myCards.firstChild) {
    myCards.removeChild(myCards.firstChild);
  }

  // Hapus semua kartu dari bot
  const botCards = document.getElementsByClassName('bot-cards')[0];
  while (botCards.firstChild) {
    botCards.removeChild(botCards.firstChild);
  }

   const botSums = document.getElementsByClassName('bot-sums')[0];
  while (botSums.firstChild) {
    botSums.removeChild(botSums.firstChild);
  }

  const mySums = document.getElementsByClassName('my-sums')[0];
  while (mySums.firstChild) {
    mySums.removeChild(mySums.firstChild);
  }

  // Reset semua variabel game
  botASCards = 0;
  myASCards = 0;
  isCanHit = true;
  resultElement.textContent = '';

  // Kembali mengaktifkan tombol start game
  startGameButton.disabled = false;
  startGameButton.textContent = 'START GAME';

  // Bersihkan nilai input uang
  inputMoney.value = '';

  // Kembali mengatur ulang tumpukan kartu
  buildUserCards();
  shuffleCards();

  // Tampilkan kartu belakang bot
  let hiddenCard = document.createElement('img');
  hiddenCard.src = '/Images/cards/BACK.png';
  hiddenCard.className = 'hidden-card';
  botCards.appendChild(hiddenCard);

  // Tampilkan kartu belakang mycard
  let hiddenCard1 = document.createElement('img');
  hiddenCard1.src = '/Images/cards/BACK.png';
  hiddenCard1.className = 'hidden-card';
  myCards.appendChild(hiddenCard1);

  // Menonaktifkan tombol take card dan hold cards
  takeCardButton.disabled = true;
  holdCardsButton.disabled = true;
});

function getValueOfCard(card) {
  let cardDetail = card.split("-");
  let value = cardDetail[0];

  if (isNaN(value)) {
    // Kartu AS
    if (value == "A") 
    return 11;
    // Kartu K, Q, J
    else return 10;
  }

  return parseInt(value);
}

function checkASCard(card) {
  if (card[0] == "A") return 1;
  else return 0;
}

function reduceASCardValue(sums, asCards) {
  while (sums > 21 && asCards > 0) {
    sums -= 10;
    asCards -= 1;
  }
  return sums;
}