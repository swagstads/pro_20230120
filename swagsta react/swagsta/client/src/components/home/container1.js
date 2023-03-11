import React from 'react'
import '../../assets/css/home/container1.css'
import arrow from "../../assets/media/images/curve_arrow_down.png"
import MemoryGame from '../game/memory_game'

function Container1() {
  return (
    <>
        <div id='home' className="home-container-1">
        <div className="grid-2">
            <div className="left">
                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span>
                            <img src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">We Create Magic</div>
                        </span>
                    </div>
                </div>
                <div className="company-name">Swagsta</div>
                <div className="company-tagline">
                    Building impactful brands through excellence and efficiency.
                </div>
            </div>
            <div className="right">
                <MemoryGame /> 
            </div>
        </div>
    </div>
    </>
  )
}

export default Container1