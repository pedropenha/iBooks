import { useState } from 'react'
import './App.css'
import Logo from "../public/Fundo.svg"
function App() {
  const [count, setCount] = useState(0)

  return (
      <div className='w-screen h-screen overflow-hidden back place-self-center flex items-center justify-center'>
        <div className='h-[35%] w-[30%] bg-white rounded-md	'>
          <form className="items-center justify-center place-self-center">
            <input type="email" hover="E-mail" className="border-2 border-gray-300 rounded-md"></input>
            <br></br>
            <input type="password" hover="Senha"  className="border-2  border-gray-300 rounded-md	"></input>
          </form>
        </div>          
      </div>
  )
}

export default App;
