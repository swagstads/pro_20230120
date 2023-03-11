import React from 'react'
import "../assets/css/blogs/blogs.css"
import BlogCard from '../components/blogs/blogCard'
import blogImg from '../assets/media/images/blog/111.jpg'
import blogImg2 from '../assets/media/images/blog/222.jpg'
import blogImg3 from '../assets/media/images/blog/333.jpg'
import blogImg4 from '../assets/media/images/blog/444.jpg'
import blogImg5 from '../assets/media/images/blog/555.jpg'
import blogImg6 from '../assets/media/images/blog/666.jpg'
import QuoteCard from '../components/blogs/quoteCard'


function BlogsPage() {
  return (
    <>
        <h3 id='blogpage'  className='blogs_heading'>Blogs</h3>
        <div className='blogs-container'>
            <div className='child1'>
                <BlogCard 
                    img={blogImg} 
                    title="Blog Title 1" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child2'>
                <QuoteCard quoteText="This is quote" />
            </div>
            <div className='child3'>
                <BlogCard 
                    img={blogImg2} 
                    title="Blog Title 2" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child4'>
                <BlogCard 
                    img={blogImg3} 
                    title="Blog Title 3" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child5'>
                <BlogCard 
                    img={blogImg4} 
                    title="Blog Title 4" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child6'>
            <QuoteCard quoteText="This is quote" />
            </div>
            <div className='child7'>
                <BlogCard 
                    img={blogImg6} 
                    title="Blog Title 6" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child8'>
                <BlogCard 
                    img={blogImg} 
                    title="Blog Title 7" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child9'>
                <QuoteCard quoteText="This is quote" />
            </div>
            <div className='child10'>
                <BlogCard 
                    img={blogImg2} 
                    title="Blog Title 8" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='chil11'>
                <BlogCard 
                    img={blogImg3} 
                    title="Blog Title 9" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child11'>
                <BlogCard 
                    img={blogImg4} 
                    title="Blog Title 10" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child12'>
                <BlogCard 
                    img={blogImg6} 
                    title="Blog Title 11" 
                    description="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere eum facilis consectetur odio sint, molestias expedita numquam accusamus illo? corporis molestias facere necessitatibus vero? Est tempore vero veritatis." 
                />
            </div>
            <div className='child13'>
            <QuoteCard quoteText="This is quote" />
            </div>
        </div>
    </>
  )
}

export default BlogsPage