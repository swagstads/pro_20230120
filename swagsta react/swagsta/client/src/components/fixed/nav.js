import React, { useEffect, useRef, useState } from 'react'
import { HashLink } from "react-router-hash-link";
import { Link, Outlet } from 'react-router-dom';
import '../../assets/css/fixed/navbar.css'

function NavigationBar() {
    const [isActive, setIsActive] = useState(true)
    const mobileMenuRef = useRef();

    useEffect(()=>{
        showMobileMenu()
    },[isActive])

    function showMobileMenu(){
        if(isActive){
            mobileMenuRef.current.style.left = "-100%";
        }
        else{
            mobileMenuRef.current.style.left = 0
        }
    }
    return (
        <>
            <nav>
            <div className="nav">
                <div className="nav-logo nav-items--js">
                    <HashLink to="/#home">
                        <h1>Swagsta</h1>
                    </HashLink>
                </div>
                <ul id="menu-main-menu" className="nav-links">
                    <li id="menu-item-21"
                        className="menu-item menu-item-type-post_type menu-item-object-page menu-item-21 nav-links--item">
                        <HashLink to="/about#about"><span className='link-title'>About</span><span className="linkDesc">All about the creative studio for the passionately
                                curious</span></HashLink>
                    </li>
                    <li id="menu-item-24"
                        className="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-13 current_page_item menu-item-24 nav-links--item">
                        <HashLink to="/#projects" aria-current="page"><span className='link-title'>Projects</span><span className="linkDesc">The mesmerizing work we do
                                for our global clients</span></HashLink>
                    </li>
                    <li id="menu-item-23"
                        className="menu-item menu-item-type-post_type menu-item-object-page menu-item-23 nav-links--item">
                        <HashLink to="/#experiments"><span className='link-title'>Experiments</span><span className="linkDesc">The experiments we do to get our
                                creative juices
                                flowing</span></HashLink>
                    </li>
                    <li id="menu-item-22"
                        className="menu-item menu-item-type-post_type menu-item-object-page menu-item-22 nav-links--item">
                        <HashLink to="/#contact"><span className='link-title'>Contact</span><span className="linkDesc">A guide to reaching our hearts, souls and our
                                office</span></HashLink>
                    </li>
                    <li id="menu-item-22"
                        className="menu-item menu-item-type-post_type menu-item-object-page menu-item-22 nav-links--item">
                        <HashLink to="blogpage#blogpage">
                            <span className='link-title'>Blogs</span><span className="linkDesc">A guide to reaching our hearts, souls and our office</span>
                        </HashLink>
                    </li>
                </ul>
                <div className="mobileMenu-container">
                    <div className="nav-menuBtn">
                        {/* <button className="menu">
                            <svg viewBox="0 0 64 48">
                                <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
                                <path d="M19,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
                                <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
                            </svg>
                        </button> */}
                        <div className="all-btn" onClick={e=>showMobileMenu()}>
                            <div className={isActive == true ? "menu-btn-3" : "menu-btn-3 active"} onClick={e=>setIsActive(prevState => !prevState)}>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div id="nav-overlay"></div>
                    <nav id="nav-fullscreen" ref={mobileMenuRef}>
                        <div className="menu-mobile-menu-container">
                            <ul id="menu-mobile-menu" className="mobileMenu-container">
                                <li id="menu-item-879"
                                    className="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-879">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/#home">Home</HashLink>
                                </li>
                                <li id="menu-item-880"
                                    className="menu-item menu-item-type-post_type menu-item-object-page menu-item-880">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/about#about">About</HashLink>
                                </li>
                                <li id="menu-item-883"
                                    className="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-13 current_page_item menu-item-883">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/#projects" aria-current="page">Projects</HashLink>
                                </li>
                                <li id="menu-item-882"
                                    className="menu-item menu-item-type-post_type menu-item-object-page menu-item-882">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/#experiments">Experiments</HashLink>
                                </li>
                                <li id="menu-item-881"
                                    className="menu-item menu-item-type-post_type menu-item-object-page menu-item-881">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/blogpage#blogpage">Blogs</HashLink>
                                </li>
                                <li id="menu-item-881"
                                    className="menu-item menu-item-type-post_type menu-item-object-page menu-item-881">
                                    <HashLink onClick={e=>setIsActive(true)}  to="/#contact">Contact</HashLink>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </nav>
        </>
    )
}

export default NavigationBar