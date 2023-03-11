import React from 'react'
import '../assets/css/home/home.css'
import Experiments from '../components/home/experiments'
import Container1 from '../components/home/container1'
import Container2 from '../components/home/container2'
import Container3 from '../components/home/container3'
import Projects from '../components/home/projects'
import BrandAcross from '../components/home/brand_across_world'
import GetInTouch from '../components/contact/get_in_touch'
import BlogsPage from './blogs'

function Index() {
  return (
    <>
      <Container1 />
      <Container2 />
      <Container3 />
      <Projects />
      <Experiments />
      {/* <BrandAcross /> */}
      <GetInTouch />
    </>
  )
}

export default Index