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
        <Button>
            <span className="flex space-x-20">
              <FaPlus/>
              teste de gay
              </span>
        </Button>
      </div>
    </main>
    
    </>
  )
}

export default Livro;