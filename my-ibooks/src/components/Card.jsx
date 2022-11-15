import React from "react"
import "../assets/css/style.css"
import { FaBook, FaBuilding, FaGlobe, FaPen, FaPlus, FaQrcode, FaTrash } from 'react-icons/fa';
import Button from './Button';

export default props =>
    <div className="min-w-[85%] max-h-300px items-center content-center justify-center mb-2">
        <div href="#" class="flex-col flex w-full content-center bg-white rounded-lg border shadow-md sm:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            
            {/* imagem */}
            <img className = "object-cover m-1 max-h-64 w-80 h-80  flex rounded md:h-auto md:w-48 shadow-2xl invisible sm:visible" src={props.img} alt="Capa do Livro"/>

            {/* dados */}
            <div className = "w-full flex-wrap ml-7 ">
                {/* titulo */}
                <div className = "flex mt-3 mb-4 flex text-5xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <h1>{props.titulo}</h1>
                </div>

                {/* dados */}
                <div className = "flex flex-wrap mt-4 mb-0 content-center text-center items-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <div className = "mr-3 items-center">
                        <h2>Exemplares</h2>
                        <h2>{props.exemplares}</h2>
                    </div>
                    <div className = "mr-3 items-center">
                        <h2>Disponiveis</h2>
                        <h2>{props.disponiveis}</h2>
                    </div>
                    <div className = "mr-3 items-center">
                        <h2>Ocupados</h2>
                        <h2>{props.emprestados}</h2>
                    </div>
                </div>
                
                {/* icons */}
                <div className = "flex flex-wrap mt-14 mb-0 text-center items-center text-1xl font-bold tracking-tight text-gray-900 dark:text-white align-bottom">
                    <div className = "flex-wrap justify-center w-40">
                        <div className="flex justify-center">
                            <p>Numero de Paginas</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{<FaBook/>}</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{props.tPaginas} Paginas</p>
                        </div>
                    </div>

                    <div className = "flex-wrap justify-center w-40">
                        <div className="flex justify-center">
                            <p>Idioma</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{<FaGlobe/>}</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{props.idioma}</p>
                        </div>
                    </div>

                    <div className = "flex-wrap justify-center w-40">
                        <div className="flex justify-center">
                            <p>Editora</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{<FaBuilding/>}</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{props.editora}</p>
                        </div>
                    </div>

                    <div className = "flex-wrap justify-center w-40">
                        <div className="flex justify-center">
                            <p>ISBN-10</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{<FaQrcode/>}</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{props.isbn10}</p>
                        </div>
                    </div>

                    <div className = "flex-wrap justify-center w-40">
                        <div className=" flex justify-center">
                            <p>ISBN-13</p>
                        </div>
                        <div className=" flex justify-center">
                            <p>{<FaQrcode/>}</p>
                        </div>
                        <div className="flex justify-center">
                            <p>{props.isbn13}</p>
                        </div>
                    </div>
                </div>
            </div>

            {/* botoes de alterar */}
            <div className = "flex w-12 h-12 mt-5 mr-3">
                <Button icone={<FaPen/>} texto ="" bgColor="#3F00A6" tColor="#fff"/>
            </div>

            {/* botao de excluir */}
            <div className = "flex w-12 h-12 mt-5 mr-5">
                <Button icone={<FaTrash/>} texto ="" bgColor="#CE0000" tColor="#fff"/>
            </div>
        </div>
    </div>