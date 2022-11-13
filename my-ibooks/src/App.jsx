import { useState } from 'react'
import './App.css'
import Livro from './pages/livros/livros'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
    <Livro/>
    </>
  )
}

export default App;
