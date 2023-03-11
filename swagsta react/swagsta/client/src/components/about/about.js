import React, { useRef } from 'react'
import { HashLink } from 'react-router-hash-link'
import '../../assets/css/about/about.css'
import founderImg from "../../assets/media/images/about/sagarshah.jpg"
import teamImg from "../../assets/media/images/about/team.png"
import Container2 from "../home/container2"
import bgVideo from '../../assets/media/images/about/bg.mp4'
function AboutPage() {
    let container1Ref = useRef()
    let container2Ref = useRef()
    let container3Ref = useRef()
    let container4Ref = useRef()
    function autoScrollFunc(ev){
        function findPosition(obj) {
            var currenttop = 0;
            if (obj.offsetParent) {
                do {
                    currenttop += obj.offsetTop;
                } 
                while ((obj = obj.offsetParent));
                return currenttop;
            }
        }

        let currentScroll = window.pageYOffset || document.body.scrollTop;
        // console.log(currentScroll);
        if(currentScroll < 2000){
            console.log("Redirecting to top container")
            // alert("Hello")
            window.screenTop = currentScroll
            // container3Ref.current.click()
            // window.scroll(0,findPosition(container3Ref))
            // window.scrollBy(0,100)
            // container3Ref.current.scrollIntoView({behavior: "smooth"});
        }
    }
  return (
    <>
        <div  id='about' className='about-page-conatiner'>
            <div className='scroller-dots'>
                <HashLink to="#about">
                <svg id='container3_hash_link' xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
                    <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z"/>
                </svg>
                </HashLink>
                <HashLink to="#container2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-2-circle" viewBox="0 0 16 16">
                    <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z"/>
                </svg>
                </HashLink>
                <HashLink  to="#container3">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-3-circle" viewBox="0 0 16 16">
                    <path d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z"/>
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z"/>
                </svg>
                </HashLink>
                <HashLink to="#container4">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-2-circle" viewBox="0 0 16 16">
                    <path d="M7.519 5.057c.22-.352.439-.703.657-1.055h1.933v5.332h1.008v1.107H10.11V12H8.85v-1.559H4.978V9.322c.77-1.427 1.656-2.847 2.542-4.265ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z"/>
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Z"/>
                </svg>
                </HashLink>
            </div>
            <div ref={container1Ref} id='container1'></div>
            <div className='about-title-container'>
                <div className='about-title-bg'>
                    <video className='bg-video' autoPlay loop muted>
                        <source src={bgVideo} type="video/mp4" />
                    </video>
                </div>
                <div className='about-title'>
                        We create <span className='col-blue no-stroke'>&nbsp;designs&nbsp;</span> that leave an <span className='col-blue no-stroke'> Impression.</span>
                </div>
            </div>
            <div ref={container2Ref} id='container2'></div>
            <div  className='founder-container'>
                <div className='left'>
                    <div className='title'>
                        Here’s a bit about <span className='col-blue'>Sagar Shah</span>, the founder of <span className='col-blue'>Swagsta Digital Solution</span>
                    </div>
                    <div className='desc'>
                    Sagar Shah is a graphic designer by passion and the owner of Swagsta Digital, by profession. Sagar is currently pursuing M.Des in 3D at Maya Academy of Advanced Cinematics (MAAC) while freelancing as a graphic designer. Swagsta was founded, while still freelancing as a graphic designer in 2018. 2022 saw an office space and an outsourced team to keep up with the work flowing in. Today, Sagar heads a team of about 8 people acing the designing, branding, and social media marketing your brand/start-up needs.

                    </div>
                </div>
                <div className='right'>
                    <div className='img-container'>
                        <img src={founderImg} className="founder-img" alt="Founder of swagsta" />
                    </div>
                </div>
            </div>
            <div ref={container3Ref} id='container3'></div>
            <div className='team-says'>
                <div className='left'>
                    <div className='img-container'>
                        <img src={teamImg} className="founder-img" alt="Founder of swagsta" />
                    </div>
                </div>
                <div className='right'>
                    <div className='title'>
                        What our team has to say about Sagar
                    </div>
                    <div className='desc'>
                        The guy with a minimal sense of style that clearly shows in his designs. He views the world in shades of black and white, which gets interesting since he is our Head Graphic Designer, and we are all about colour!<br/>
                        He is the master of AI (not robotics, man it's Adobe Illustrator). He spends weekends watching series, working, or sometimes both. Believes Hollywood churns out the best music in the world. He is a big fan of getting things done.<br/>
                        He is a dreamer and believes he can accomplish all his dreams through hard work and sincerity. He relies on his self-confidence to achieve any goal set for him and that’s why he is a great inspiration for all of us!<br/>
                    </div>
                </div>
            </div>
        </div>
        <div ref={container4Ref} id='container4'></div>
        <div onScroll={(e)=>autoScrollFunc(e)} className='what-do-we-offer-container'>
            <Container2 />
        </div>
    </>
  )
}

export default AboutPage