
const cells = document.querySelectorAll('[data-cell]');
const gameStatus = document.getElementById('gameStatus');
const endGameStatus = document.getElementById('endGameStatus');
const playerOne = 'X'; const playerTwo = 'O';
let playerTurn = playerOne;
const winning = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

cells.forEach(cell => {
    cell.addEventListener('click' , playGame,{ once: true });
});

function playGame(e) {
    e.target.innerHTML = playerTurn;

    if(checkWin(playerTurn)) {
        updateGameStatus("wins"+ playerTurn);
        return endGame();
    }else if(checkDraw()){
        updateGameStatus("draw");
        return endGame();
    }

    updateGameStatus(playerTurn);

    playerTurn == playerOne ? playerTurn = playerTwo : playerTurn = playerOne;

}

function checkWin(playerTurn){
    return winning.some(combination=>{
        return combination.every(index =>{
            return cells[index].innerHTML == playerTurn;
        });
    });
}

function checkDraw(){
    return [...cells].every(cell =>{
        return cell.innerHTML == playerOne || cell.innerHTML == playerTwo;
    });
}

function updateGameStatus(status) {
    let statusText;

    switch (status) {
        case 'X' :
        statusText = "Au tour du joueur 2 (O)";
        break;
        case 'O' :
        statusText = "Au tour du joueur 1 (X)";
        break;
        case 'winsX' :
        statusText = "Le joueur 1 (X) a gagné";
        break;
        case 'winsO' :
        statusText = "Le joueur 2 (O) a gagné";
        break;
        case 'draw' :
        statusText = "Match nul";
        break;
    }

    gameStatus.innerHTML = statusText;
    endGameStatus.innerHTML = statusText;
}

function endGame(){
document.getElementById('gameEnd').style.display="block"
}
function reloadGame(){
window.location.reload()
}


















// let board =[['','',''],
//             ['','',''],
//             ['','','']
//         ];
        
    
//         let currentPlayer = 'x'

//         function makeMove(row, col){
//             if(board[row][col] === ''){
//                 board[row][col] = currentPlayer;

//                 displayBoard();

//                 if(checkWin(currentPlayer)){
//                     alert("Le joueur $(currentPlayer) a gagné !")
//                     resetGame();
//                     return;
//                 }

//                 if(checkDraw()){
//                     alert("Match nul");
//                     resetGame();
//                     return;
//                 }

//                 currentPlayer = (currentPlayer === 'x') ? 'O' : 'x';
//             }
//         }

//         function checkWin(player){
//             for(let row = 0; row < 3; row++){
//                 if(board[row][0] === player && board [row][1] === player && board[row][2] === player){
//                       return true;
//                 }
              
//             }
//             for(let col = 0; col < 3; col++){
//                 if(board[0][col] === player && board [1][col] === player && board[2][col] === player){
//                    return true; 
//                 }
                
//             }
//             if (board[0][0] === player && board[1][1]=== player && board [2][2]=== player){
//                return true;
//                alert('You win');

//             }
            
//             if (board[0][2] === player && board[1][1]=== player && board [2][0]=== player){
//                return true; 
//             }
//             return false;
//         }

//         function checkDraw(){
//             for (let row = 0; row < 3; row++){
//                 for (let col = 0; col < 3; col++){
//                     if (board [row][col] === '' ){
//                         return false;
//                     }
//                 }
//             }
//             return true;
//         }

//         function displayBoard(){
//             const boardContainer = document.querySelector('#board')
//             boardContainer.innerHTML = '';

//             for (let row = 0; row < 3; row++){
//                 for (let col = 0; col < 3; col++){
//                   const cell = document.createElement('div');
//                   cell.classList.add("cell");
//                   cell.textContent = board [row][col];

//                   cell.addEventListener('click', function(){
//                     makeMove(row, col);
//                   });

//                   boardContainer.appendChild(cell)
//                 }
//             }

//         }
//         function resetGame(){
//             board =[['','',''],
//                     ['','',''],
//                     ['','','']
//             ];
//             currentPlayer = 'X';
//             displayBoard();
            
//         }
//         displayBoard();