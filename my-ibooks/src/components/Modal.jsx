import React from "react"
import "../assets/css/style.css"
import { FaBook, FaBuilding, FaGlobe, FaPen, FaPlus, FaQrcode, FaTrash } from 'react-icons/fa';
import Button from './Button';


export default props =>
// <!-- Modal toggle -->

<div className="w-screen">
    {props.visible && <div className="w-full h-full fixed top-0 left-0 overflow-hidden z-20" style={{backgroundColor: "rgba(0, 0, 0, 0.4)"}}></div>}
    {props.visible &&

        <div id="authentication-modal" tabindex="-1" className="flex w-full justify-center items-center z-50 overflow-y-auto overflow-x-hidden fixed p-4 md:inset-0 h-modal md:h-full">
            <div className="relative w-full max-w-md h-full md:h-auto">
                {/* <!-- Modal content --> */}
                <div className="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" className="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal" onClick={props.funcao}>
                        <svg aria-hidden="true" className="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span className="sr-only">Close modal</span>
                    </button>
                    <div className="py-6 px-6 lg:px-8">
                        <h3 className="mb-4 text-xl font-medium text-gray-900 dark:text-white text-center">Cadastrar Livro</h3>
                        <form className="space-y-6" action="#">
                            <div>
                                <label for="capa" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capa</label>
                                <input type="file" name="capa" id="capa" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>

                                <button type="submit" className="mt-2 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar Capa</button>
                            </div>
                            <div>
                                <label for="titulo" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                                <input type="text" name="titulo" id="titulo" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Berserk" required/>
                            </div>
                            <div>
                                <label for="editora" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Editora</label>
                                <input type="text" name="editora" id="editora" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Panini" required/>
                            </div>
                            <div>
                                <label for="password" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de paginas</label>
                                <input type="password" name="password" id="password" placeholder="300" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>
                            </div>
                            <div>
                                <label for="idioma" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idioma</label>
                                <input type="text" name="idioma" id="idioma" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Portugues" required/>
                            </div>
                            <div>
                                <label for="isbn-10" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN-10</label>
                                <input type="text" name="isbn10" id="isbn10" placeholder="9999999999" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>
                            </div>
                            <div>
                                <label for="isbn-13" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN-13</label>
                                <input type="text" name="isbn13" id="isbn13" placeholder="999-9999999999" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>
                            </div>
                            <button type="submit" className="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    }
</div>
