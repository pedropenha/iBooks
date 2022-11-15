import { useState } from 'react'
import { FaBook, FaBuilding, FaGlobe, FaPen, FaPlus, FaQrcode, FaTrash } from 'react-icons/fa';
import Button from '../../components/Button';
import Card from '../../components/Card';
import Nav from '../../components/Nav';


function Livro() {
  const [count, setCount] = useState(0)

  return (
    <>
      {/* <div className='mb-5'>
        <Nav/>
      </div> */}
      <div>
        <Button icone={<FaTrash/>} texto ="" bgColor="#CE0000" tColor="#fff"/>
      </div> 
      {/* <div className='justify-center flex mt-10'>
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
            <Card titulo="Berserk - 27"
              exemplares="20"
              emprestados="5"
              disponiveis="15"
              tPaginas="216"
              idioma="Portugues"
              editora="Panini"
              isbn10="8542612272"
              isbn13="978-8542612271"
              img="./src/assets/images/capaBerserk.jpg">
            </Card>
          </li>
        </ul>
      </div> */}

    </>
  )
}

export default Livro;