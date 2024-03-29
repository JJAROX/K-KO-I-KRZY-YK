const mainBoard = document.querySelector('.board')
const inputO = document.querySelector('.input-o')
const inputX = document.querySelector('.input-x')
const selectionDiv = document.querySelector('.selection')
for (let i = 1; i < 10; i++) {
  const area = document.createElement('div')
  switch (i) {
    case 1:
      area.style.borderRight = '1px solid black'
      break;
    case 3:
      area.style.borderLeft = '1px solid black'
      break;
    case 4:
      area.style.borderTop = '1px solid black'
      area.style.borderBottom = '1px solid black'
      break;
    case 5:
      area.style.border = '1px solid black'
      break;
    case 6:
      area.style.borderTop = '1px solid black'
      area.style.borderBottom = '1px solid black'
      break;
    case 8:
      area.style.borderLeft = '1px solid black'
      area.style.borderRight = '1px solid black'
      break;
    default:
      break;
  }
  area.style.textAlign = 'center'
  mainBoard.appendChild(area)
}
const addUser = (user) => {
  fetch('index2.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json; charset=utf-8',
    },
    body: JSON.stringify({ user: user }),
  })
    .then(response => response.text())
    .then(data => {
      console.log(data);
    })
    .catch(error => {
      console.error('Błąd', error);
    });
};

inputO.addEventListener("click", () => {
  console.log('test1');
  const playerInfo = document.createElement('p')
  playerInfo.append('Wybrałeś O')
  while (selectionDiv.firstChild) {
    selectionDiv.removeChild(selectionDiv.firstChild);
  }
  addUser('O');
  selectionDiv.appendChild(playerInfo)
});

inputX.addEventListener("click", () => {
  console.log('test2');
  const playerInfo = document.createElement('p')
  playerInfo.append('Wybrałeś X')
  while (selectionDiv.firstChild) {
    selectionDiv.removeChild(selectionDiv.firstChild);
  }
  selectionDiv.appendChild(playerInfo)
  addUser('X');
});
function fetchRecordCount() {
  fetch('records_counter.php')
    .then(response => response.json())
    .then(data => {
      console.log('Liczba rekordów:', data.count);
      console.log('Znaki:', data.signs);
    })
    .catch(error => {
      console.error('Błąd', error);
    });
}
setInterval(fetchRecordCount, 1000)