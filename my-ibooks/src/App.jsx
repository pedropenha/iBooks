import { useState } from 'react'
import './App.css'

import {Routes, Route} from 'react-router-dom'

import Livro from './pages/livros/livros'
import Sobre from './pages/sobre/Sobre'
import Patrimonio from './pages/patrimonio/Patrimonio'
import Login from './pages/login/Login'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <Routes>
        <Route path='/livro' element={ <Livro/> }/>
        <Route path='/sobre' element={ <Sobre/> }/>
        <Route path='/patrimonio' element={ <Patrimonio/>}/>
        <Route path='/login' element={ <Login/> } />
      </Routes>
    </>
  )
}

export default App;
