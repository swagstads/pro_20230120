import React from 'react'
import '../../assets/css/home/container3.css'
import quoteSvg from "../../assets/media/svg/quote.svg"

function Container3() {
  return (
    <>
         <div className="home-container-3">
           
            <div className="heading">
                    <div className="line1">In short, we produce</div>
                    <div className="line2 col-blue">Magic</div>
            </div>
            <div className="content">
                    <div className="left">
                        
                    </div>
                    <div className="right">
                        <div className="quote-content">
                            <div className="quote-img">
                                <img src={quoteSvg} alt="Quote" />
                            </div>
                            <div className="quote-text">
                                “We strive to fly like an eagle”
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </>
  )
}

export default Container3