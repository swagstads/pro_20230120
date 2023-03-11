import React from 'react'
import "../../assets/css/home/projects.css"
import cardImg1 from "../../assets/media/images/array.png"
import cardImg2 from "../../assets/media/images/mobile.png"
import blobSVG from "../../assets/media/svg/blob.svg"

function Projects() {
  return (
    <>
      <div id='projects' className="projects">
        <div className="projects-container">
            <div className="forehead-area">
                <div className="left">
                    <div className="vertical-text-container col-grey">
                        <span className="vertical-text">
                            PROJECTS
                        </span>
                    </div>
                </div>
                <div className="right">
                    <div className="text">
                        look around for
                        mesmerising projects
                    </div>
                </div>
            </div>

            <div className="project-card-container">
                                
                <div className='bg-line'>
                    <svg id="chart" width="300" height="225">
                        <line x1="0" y1="20" x2="20" y2="10000"></line>
                    </svg>
                </div>
                <div className="project-card">
                    <div className="left">
                        <div className="title">
                            Array Networks
                        </div>
                        <div className="desc">
                            Array Networks is an American networking hardware company that provides security and availability services
                        </div>
                        <div className="icons">

                        </div>
                    </div>
                    <div className="right">
                        <div className="img-overlay">
                            <div className="svg-blob">
                                <img src={blobSVG} alt="" />
                            </div>
                            <img className="card-img" src={cardImg1} alt="Array" />
                        </div>
                    </div>
                </div>

                <div className="project-card">
                    <div className="left">
                        <div className="title">
                            Curiousapiens
                        </div>
                        <div className="desc">
                            An edtech platform for students to explore professions and carrer paths
                        </div>
                        <div className="icons">

                        </div>
                    </div>
                    <div className="right">
                        <div className="img-overlay">
                            <div className="svg-blob">
                                <img src={blobSVG} alt="" />
                            </div>
                            <img className="card-img" src={cardImg2} alt="Array" />
                        </div>
                    </div>
                </div>

                <div className="view-more-bttn-container">
                    <button>View More Projects</button>
                </div>

            </div>

        </div>
   </div>
    </>
  )
}

export default Projects