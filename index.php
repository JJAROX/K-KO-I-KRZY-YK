<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kółko i Krzyżyk JJ4ic</title>
  <style>
    .board {
      margin: 0;
      padding: 0;
      width: 9.375rem;
      height: 9.375rem;
      display: grid;
      grid-template-columns: repeat(3, 33%);
      grid-template-rows: repeat(3, 33%);
    }

    .selection {
      display: flex;
      justify-content: center;
    }

    .selection-btn {
      height: 1.875rem;
      width: 1.875rem;
    }

    .main-container {
      display: flex;
      align-items: center;
      flex-direction: column;
    }

    .selection-input {
      border-radius: 0.125rem;
      border: none;
      background-color: rgba(245, 2, 1, 80%);
    }

    .selection-input:hover {
      background-color: rgba(245, 2, 1, 50%);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="main-container">
    <div class="selection">
      <p>Wybierz gracza:
        <button class="selection-input input-o">O</button>
        <button class="selection-input input-x">X</button>
      </p>
    </div>
    <br>
    <div class="board">

    </div>
    <h1 class="pogchamp"></h1>
  </div>
  <script>
    const mainBoard = document.querySelector('.board')
    const xhttp = new XMLHttpRequest()
    const inputO = document.querySelector('.input-o')
    const inputX = document.querySelector('.input-x')
    const h1 = document.querySelector('.pogchamp')
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
    inputO.addEventListener("click", () => {
      event.preventDefault();
      xhttp.onreadystatechange = () => {
        if (this.readyState == 4 && this.status >= 200) {
          h1.append(xhttp.responseText)
          document.body.appendChild(h1)
        }
      };
      xhttp.open("POST", "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("player=O");
    })
    inputX.addEventListener("click", () => {
      event.preventDefault();
      xhttp.onreadystatechange = () => {
        if (this.readyState == 4 && this.status >= 200) {
          h1.append(xhttp.responseText)
          document.body.appendChild(h1)
        }
      };
      xhttp.open("POST", "<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("player=X");
    })
  </script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['player']) {
    echo $_POST['player'];
  }
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//   echo 'lul';
//   if (isset($_POST['player'])) {
//     echo $_POST['player'];
//   }
// }
