import { useState } from 'react'
import { FaBeer, FaPlus } from 'react-icons/fa';
import Button from '../../components/Button';


function Livro() {
  const [count, setCount] = useState(0)

  return (
    <>
    <header>
      
    </header>
    <main>
      <div>
        <Button icone={<FaPlus/>} texto ="sei la" bgColor="red" tColor="#000"/>
      </div>
    </main>
    
    </>
  )
}

export default Livro;