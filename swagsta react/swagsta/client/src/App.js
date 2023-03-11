  import './App.css';
  import '.'
  import Index from './layout';
  import { BrowserRouter, Routes, Route } from 'react-router-dom';
  import MemoryGame from './components/game/memory_game';
  import NavigationBar from './components/fixed/nav';
  import Footer from './components/fixed/footer';
  import BlogsPage from './layout/blogs';
  import AboutPage from './components/about/about';
  // import Puzzle from './components/puzzle/puzzle';

  function App() {
    return (
      <> 
          <BrowserRouter>
          <div className="App">
            <div className='page-nav-container' >
              <NavigationBar />
            </div>
            <div className='body-content'>
            <Routes>
              <Route element={<Index />} path='/' />
              <Route element={<BlogsPage />} path='/blogpage' />
              <Route element={<AboutPage />} path='/about' />
            </Routes>
            </div>
            <div className='page-footer-container'>
              <Footer />
            </div>
          </div>  
          </BrowserRouter> 
      </>
    );
  }

  export default App;
