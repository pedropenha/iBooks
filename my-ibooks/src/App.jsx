import { useState } from 'react'
import './App.css'

import {Routes, Route} from 'react-router-dom'

import Livro from './pages/livros/livros'
import Sobre from './pages/sobre/Sobre'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <Routes>
        <Route path='/livro' element={ <Livro/> }/>
        <Route path='/sobre' element={ <Sobre/> }/>
      </Routes>
    </>
  )
}

export default App;
