import React from 'react'
import '../../assets/css/home/container2.css'
import arrow from "../../assets/media/images/curve_arrow_down.png"

function Container2() {
  return (
    <>
    
    <div id='about' className="home-container-2">
        <div className="grid-3 home-container-2-content">
            
            <div className="what-do-we-offer">
                What do we <span className='col-blue'>offer</span>?
            </div>

            <div className="offers">

                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span className="arrow-container">
                            <img className="arrow" src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">A growth accelerator</div>
                        </span>
                    </div>
                </div>

                <div className="title">
                    Digital Marketing
                </div>
                <div className="desc">
                    Advertise, analyze, and optimize! We make better ideas, happen fast.
                </div>
            </div>
            <div className="offers">
                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span className="arrow-container">
                            <img className="arrow" src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">A strategic approach</div>
                        </span>
                    </div>
                </div>
                <div className="title">
                    Website
                </div>
                <div className="desc">
                    We create websites that reflect a powerful blend of creativity and technology.
                </div>
            </div>
            <div className="offers">
                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span className="arrow-container">
                            <img className="arrow" src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">A captivating visual</div>
                        </span>
                    </div>
                </div>
                <div className="title">
                    Graphic Design
                </div>
                <div className="desc">
                    We create engaging designs that leave an impression.
                </div>
            </div>
            <div className="offers">
                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span className="arrow-container">
                            <img className="arrow" src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">A mesmerising story</div>
                        </span>
                    </div>
                </div>
                <div className="title">
                    Video Editing
                </div>
                <div className="desc">
                    We create stunning visuals that tell your story.
                </div>
            </div>
            <div className="offers">
                <div className="pointed-text">
                    <div className="pointed-text-container">
                        <span className="arrow-container">
                            <img className="arrow" src={arrow} alt="" />
                        </span>
                        <span>
                            <div className="text">An engaging audience</div>
                        </span>
                    </div>
                </div>
                <div className="title">
                    Content
                </div>
                <div className="desc">
                    We create content that makes your brand seen, heard, and recognized.
                </div>
            </div>
        </div>
    </div>

    </>
  )
}

export default Container2