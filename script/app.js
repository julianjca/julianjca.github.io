let playerHealth = 100;
let monsterHealth = 100;
let playerHealthDOM = document.getElementById('nyawaPlayer');
let monsterHealthDOM = document.getElementById('nyawaMonster');
let logging1 = document.getElementById('log1');
let logging2 = document.getElementById('log2');

function attack() {
  let playerDamage = calculateDamage(6,2);
   if(monsterHealth-playerDamage<0){
    monsterHealth = 0;
  } if(monsterHealth-playerDamage>=0){
    monsterHealth -= playerDamage;
  }
  monsterAttack();
  monsterHealthDOM.textContent = monsterHealth;
  monsterHealthDOM.style.width = `${monsterHealth}%`;
  printLog1('Player',playerDamage);
  checkWinning(playerHealth,monsterHealth);
}

function special() {
  let specialDamage = calculateDamage(10,6);
  if(monsterHealth-specialDamage<0){
    monsterHealth = 0;
  } if(monsterHealth-specialDamage>=0){
    monsterHealth -= specialDamage;
  }
  printLog1('Player',specialDamage);
  monsterAttack();
  monsterHealthDOM.textContent = monsterHealth;
  monsterHealthDOM.style.width = `${monsterHealth}%`;
  checkWinning(playerHealth,monsterHealth);
}

function calculateDamage(min, max){
  return Math.floor(Math.random()*(max-min)+min);
}

function monsterAttack() {
  let monsterDamage = calculateDamage(8,4);
  if(playerHealth-monsterDamage>=0){
    playerHealth -= monsterDamage;
  } if(playerHealth-monsterDamage<0){
    playerHealth = 0;
  }
  playerHealthDOM.textContent = playerHealth;
  playerHealthDOM.style.width = `${playerHealth}%`;
  printLog2('Monster',monsterDamage);
}

function heal() {
  if(playerHealth>90){
    playerHealth = 100;
  } if(playerHealth<=90){
    playerHealth += 10;
  }
  printLogHeal('Player',10);
  logging2.textContent = " ";
  playerHealthDOM.textContent = playerHealth;
  playerHealthDOM.style.width = `${playerHealth}%`;
}

function printLog1(who, howMuch){
  logging1.textContent = `${who} attack by ${howMuch}`;
}
function printLogHeal(who, howMuch){
  logging1.textContent = `${who} healed by ${howMuch}`;
}
function printLog2(who, howMuch){
  logging2.textContent = `${who} attack by ${howMuch}`;
}

function restart(){
  playerHealth = 100;
  monsterHealth = 100;
  monsterHealthDOM.textContent = monsterHealth;
  monsterHealthDOM.style.width = `${monsterHealth}%`;
  playerHealthDOM.textContent = playerHealth;
  playerHealthDOM.style.width = `${playerHealth}%`;
  logging1.textContent = " ";
  logging2.textContent = " ";
}

function checkWinning(pHealth,mHealth){
  if(mHealth===0){
    alert("You Win!");
  }
  if(pHealth===0){
    alert("You Lose!");
  }
}