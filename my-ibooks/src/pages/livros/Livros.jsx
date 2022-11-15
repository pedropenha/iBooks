import { useState } from 'react'
import { FaBook, FaBuilding, FaGlobe, FaPen, FaPlus, FaQrcode, FaTrash } from 'react-icons/fa';
import Button from '../../components/Button';
import Card from '../../components/Card';
import Nav from '../../components/Nav';
import Modal from '../../components/Modal';


function Livro() {
  const [visible,setVisible]=useState(false)
  // const [count, setCount] = useState(0)

  return (
    <>
      <div className='flex mb-5'>
        <Nav/>
      </div>
      <div className='px-20'>
        <div className='flex mb-5 justify-end w-full mr-4'>
        <Button icone={<FaPlus/>} texto ="Cadastrar Livros" bgColor="#58E3C2" tColor="#fff" onClick={()=>setVisible(true)}/>
        </div> 
        <div className='flex justify-center flex mt-10'>
        <ul>
          <li>
            <Card titulo="Hunter x Hunter - 11"
              exemplares="20"
              emprestados="5"
              disponiveis="15"
              tPaginas="200"
              idioma="Portugues"
              editora="JBC"
              isbn10="101010"
              isbn13="131313"
              img="./src/assets/images/capa.jpg">
            </Card>
          </li>
          <li>
            <Card titulo="Berserk - 39"
              exemplares="20"
              emprestados="5"
              disponiveis="15"
              tPaginas="216"
              idioma="Portugues"
              editora="Panini"
              isbn10="8542612272"
              isbn13="978-8542612271"
              img="./src/assets/images/berserk39.jpg">
            </Card>
          </li>
          <li>
            <Card titulo="Vagabond - 34"
              exemplares="20"
              emprestados="5"
              disponiveis="15"
              tPaginas="216"
              idioma="Portugues"
              editora="Panini"
              isbn10="8542612272"
              isbn13="978-8542612271"
              img="./src/assets/images/vagabond34.jpg">
            </Card>
          </li>
        </ul>
        </div>
      </div>
      
      
    {/* <button onClick={()=>setVisible(true)}>Open Modal</button> */}
    <Modal visible={visible} />
    </>
  )}
  
export default Livro;