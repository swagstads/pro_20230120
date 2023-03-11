import React from 'react'
import '../../assets/css/blogs/blogcard.css'

function BlogCard(props) {
  return (
    <>
        <div className='blog-card-container'>
            <div className='blog-card'>
                <div className='top'>
                    <div className='img-overlay'>
                        <img src={props.img} />
                    </div>
                </div>
                <div className='bottom'>
                    <div className='title'>
                        {props.title}
                    </div>
                    <div className='desc'>
                        {props.description}
                    </div>
                </div>
            </div>
        </div>
    </>
  )
}

export default BlogCard