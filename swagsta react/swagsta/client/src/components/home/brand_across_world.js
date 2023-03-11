import React, { useRef } from 'react'
import '../../assets/css/home/brand_across.css'
import globe from "../../assets/media/images/globe.png"
import quoteSVG from "../../assets/media/svg/quote.svg"
import axios from 'axios'

function BrandAcross() {

    let compNameRef = useRef();
    let personNamePositionRef = useRef()
    let testimonialsRef = useRef()

    function changeTestimonials(){

        let testimonials = [
            {
                "company_name":"Company 2",
                "person_name_position":"John Dae | Manager, Global Communication",
                "testimonials":"It was an absolute pleasure working with Swagsta. The team is great at visualization and creating awesome creatives. What was distinct was their on-call strategy and brainstorming session and their deep dive into our business to unearth insights and key speaking points."
            },
            {
                "company_name":"Company 3",
                "person_name_position":"Dwayne Johnson | Manager, Global Communication",
                "testimonials":"I have nothing but great things to say about Swagsta. They worked directly with our marketing, assisting with graphic design for digital content. Their responsiveness and turn-around time was top notch. More importantly, the design work has high quality and is creative. I highly recommend Sagar and his team for any organization that develops a lot of digital content as part of their marketing strategy"
            },
            {
                "company_name":"Company 4",
                "person_name_position":"Dwayne Johnson | Manager, Global Communication",
                "testimonials":"Swagsta did a fabulous job at bringing our brand to life in the digital sector. It was the first time that XYZ went digital, so the credit goes to the team for managing the whole campaign so beautifully and helping us to set a benchmark for an engaging and integrated campaign amongst the existing XYZ brands on Social Media. They are incredibly enthusiastic, energetic, and self-motivated to handle the dynamic brand requirements in an extremely competitive market scenario.” "
            },
            {
                "company_name":"Company 1",
                "person_name_position":"Dwayne Johnson | Manager, Global Communication",
                "testimonials":"We are very pleased with the business relationship we share with Swagsta Digital. Their attention to detail and willingness to listen to our needs as well as their creativity is highly appreciated. They are relentless and the two areas in particular which differentiate them from others are the quality of work and relationship with customers to guarantee a successful project. I wish them the best of luck"
            }
        ]

        const totalTestimonials = testimonials.length;
        let count = 0
        setInterval(()=>{
            testimonialsRef.current.textContent =  testimonials[count].testimonials 
            compNameRef.current.textContent =  testimonials[count].company_name
            personNamePositionRef.current.textContent =  testimonials[count].person_name_position
            count++;
            count = count <= (totalTestimonials -1) ? count : 0; 
        },10000)

    }

    changeTestimonials()
  return (
    <>
    
        <div className="brand-accross-world-wrapper">
            <div className="background-img">
                <img src={globe} alt="" />
            </div>
            <div className="brand-accross-world-conatiner">
                <div className="left">
                        Our work defines our vision
                </div>
                <div className="right">
                    {/* Content 1 */}
                    <div className="quote-svg-container">
                        <div className="top">
                            <div className="quote-img">
                                <img src={quoteSVG} alt="" />
                            </div>
                            <div className="company">
                                <div ref={compNameRef} className="comp-name">
                                    Company 1
                                </div>
                                <div ref={personNamePositionRef} className="person-name-position">
                                    Dwayne Johnson | Manager, Global Communication
                                </div>
                            </div>
                        </div>
                        <div ref={testimonialsRef} className="bottom">
                            "We are very pleased with the business relationship we share with Swagsta Digital. Their attention to detail and willingness to listen to our needs as well as their creativity is highly appreciated. They are relentless and the two areas in particular which differentiate them from others are the quality of work and relationship with customers to guarantee a successful project. I wish them the best of luck"
                        </div>
                    </div>
                
                </div>


            </div>
        </div>
        <div className='client-company-logo-container'>
            <div className='client-company-logo'>
                <div>Company 1</div>
                <div>Company 2</div>
                <div>Company 3</div>
                <div>Company 4</div>
            </div>
        </div>
    </>
  )
}

export default BrandAcross