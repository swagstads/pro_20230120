import React, {useState , useEffect} from 'react'
import '../../assets/css/game/memory_game.css'

function MemoryGame() {
  function shuffle(array) {
    return [...array].sort(() => Math.random() - 0.5);
  }

  const squares = Array.from({ length: 16 }, (_, i) => i);

  const [randomSquares, setRandmoSquares] = useState([]);
  useEffect(() => {
    setRandmoSquares(() => shuffle(squares));
  }, []);

  function moveSquare(val) {
    let zeroIndex = randomSquares.indexOf(0);
    let valIndex = randomSquares.indexOf(val);

    if (valIndex + 4 === zeroIndex || valIndex - 4 === zeroIndex) {
      swap(valIndex, zeroIndex);
    } else if (valIndex + 1 === zeroIndex && zeroIndex % 4 !== 0) {
      swap(valIndex, zeroIndex);
    } else if (valIndex - 1 === zeroIndex && (zeroIndex + 1) % 4 !== 0) {
      swap(valIndex, zeroIndex);
    }
  }

  function swap(valIndex, zeroIndex) {
    let temArray = [...randomSquares];
    temArray[zeroIndex] = randomSquares[valIndex];
    temArray[valIndex] = 0;
    setRandmoSquares(() => [...temArray]);
  }

  return (
    <div className="memory-game-App">
      <header className="App-header">
        <div className="Container">
          {randomSquares.map((e, i) => {
            return (
              <div key={e} className="Container-Sub">
                <div
                  className={e === 0 ? "EmptySquare" : "FillSquare"}
                  onClick={() => moveSquare(e)}
                >
                  {e}
                </div>
              </div>
            );
          })}
        </div>
      </header>
    </div>
  );
}

export default MemoryGame