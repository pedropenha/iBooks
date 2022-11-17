import { useState } from 'react'
    
function Paramet() {
  const [count, setCount] = useState(0)

  return (
    <>
      <div className='w-screen h-screen overflow-hidden back flex items-center justify-center'>
        <div className='h-[45%] w-[30%] bg-white rounded-md '>
          <span className='grid'>  
            <img src='../public/Logo.svg' className='w-44 justify-self-center -my-4'></img>
            <form className="justify-self-center">
              <input type="text" placeholder="Nome da Empresa" className="h-10 px-2 w-80 border-2 border-gray-300 rounded my-2 "></input>
              <br></br>
              <input type="Number" placeholder="CNPJ"  className="h-10 w-80 border-2 px-2 border-gray-300 rounded mb-2"></input>
            </form>
            <button className='bg-[#4F46E5] text-white h-10 w-80 rounded justify-self-center mb-2' onClick={() => {}}>Salvar Dados</button>
            <span className='w-80 justify-self-center border-t'></span>
            <a href='#' className='text-[#4F46E5] justify-self-center mt-2'>Precisa de ajuda?</a>
          </span>
          
        </div>          
      </div>
    </>
  )
}

export default Paramet;
