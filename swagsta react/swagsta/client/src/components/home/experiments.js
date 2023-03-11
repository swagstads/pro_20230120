import React from 'react'
import "../../assets/css/home/experiments.css"
import expCardImg1 from "../../assets/media/images/exp1.png"
import expCardImg2 from "../../assets/media/images/exp2.png"
import expCardImg3 from "../../assets/media/images/exp3.png"

function Experiments() {
  return (
    <>
    <div id='experiments' className="experiments-container">
        <div className="heading col-grey">EXPERIMENTS</div>
        <div className="experiments-card-container">
            <div className="experiments-cards">

                <div className="card card-1">
                    <div className="top">
                        <div className="card-image">
                            <img src={expCardImg1} alt="Alt text" />
                        </div>
                    </div>
                    <div className="bottom">
                        <div className="text">
                            <div className="title">
                                Card Title 
                            </div>
                            <div className="desc">
                                Lorem, ipsum dolor sit amet consectetur
                            </div>  
                        </div>
                    </div>
                </div>


                <div className="card card-2">
                    <div className="top">
                        <div className="card-image">
                            <img src={expCardImg2} alt="Alt text" />
                        </div>
                    </div>
                    <div className="bottom">
                        <div className="text">
                            <div className="title">
                                Card Title
                            </div>
                            <div className="desc">
                                Lorem, ipsum dolor sit amet consectetur
                            </div>  
                        </div>
                    </div>
                </div>


                <div className="card card-3">
                    <div className="top">
                        <div className="card-image">
                            <img src={expCardImg3} alt="Alt text" />
                        </div>
                    </div>
                    <div className="bottom">
                        <div className="text">
                            <div className="title">
                                Card Title
                            </div>
                            <div className="desc">
                                Lorem, ipsum dolor sit amet consectetur
                            </div>  
                        </div>
                    </div>
                </div>

                <div className="card card-4">
                    <div className="top">
                        <div className="card-image">
                            <img src={expCardImg3} alt="Alt text" />
                        </div>
                    </div>
                    <div className="bottom">
                        <div className="text">
                            <div className="title">
                                Card Title
                            </div>
                            <div className="desc">
                                Lorem, ipsum dolor sit amet consectetur
                            </div>  
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div className='view-more-bttn'>
            <span>
                <button>View more</button>
            </span>
        </div>

    </div>

    </>
  )
}

export default Experiments