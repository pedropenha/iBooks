import { useState } from 'react'
import { FaBook, FaBuilding, FaGlobe, FaPen, FaPlus, FaQrcode, FaTrash } from 'react-icons/fa';
import Button from '../../components/Button';
import CardPat from '../../components/CardPat';
import Nav from '../../components/Nav';
import ModalPat from '../../components/ModalPat';
import ExcModal from '../../components/ExcModal';


function Patrimonio() {
  const [visible,setVisible]=useState(false)
  // const [count, setCount] = useState(0)

  return (
    <>
      <div className='flex mb-5'>
        <Nav/>
      </div>
      <div className='px-20'>
        <div className='flex mb-5 justify-end w-full mr-4'>
          <Button icone={<FaPlus/>} texto ="Cadastrar Patrimônio" bgColor="#58E3C2" tColor="#fff" onClick={()=>setVisible(true)}/>
        </div> 
        <div className='justify-center mt-10'>
          <ul>
            <li>
              <CardPat titulo="Cadeira escritório (executivo) - 11"
                patrimonio = "123456"
                valor = "799,90"
                img="./src/assets/images/cadeira.webp">
              </CardPat>
            </li>
            <li>
              <CardPat titulo='Monitor Acer 32" '
                patrimonio="1345678"
                valor="1900,00"
                img="./src/assets/images/Acer 32.webp">
              </CardPat>
            </li>
            <li>
              <CardPat titulo="Mesa escritório (nogal)"
                patrimonio="100909"
                valor="499,90"
                img="./src/assets/images/Mesa.jpg">
              </CardPat>
            </li>
          </ul>
        </div>
      </div>
      
    <ModalPat visible={visible} funcao={()=>setVisible(false)}/>
    </>
  )}
  
export default Patrimonio;