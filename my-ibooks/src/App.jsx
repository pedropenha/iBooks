import { useState } from 'react'
import './App.css'

import {Routes, Route} from 'react-router-dom'

import Livro from './pages/livros/livros'
import Sobre from './pages/sobre/Sobre'
import Patrimonio from './pages/patrimonio/Patrimonio'
import Login from './pages/login/Login'
import Paramet from './pages/parametro/Paramet'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <Routes>
        <Route path='/livro' element={ <Livro/> }/>
        <Route path='/sobre' element={ <Sobre/> }/>
        <Route path='/patrimonio' element={ <Patrimonio/>}/>
        <Route path='/login' element={ <Login/> } />
        <Route path="/parametriza" element={ <Paramet/>}/>
      </Routes>
    </>
  )
}

export default App;
