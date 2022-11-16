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
                                <label for="capa" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patrimônio</label>
                                <input type="file" name="Patrimonio" id="PatrimonioCap" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>

                                <button type="submit" className="mt-2 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar foto</button>
                            </div>
                            <div>
                                <label for="titulo" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome Patrimônio:</label>
                                <input type="text" name="Nome" id="NomePat" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Notebook Samsung" required/>
                            </div>
                            <div>
                                <label for="editora" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria:</label>
                                <input type="text" name="Categoria" id="Categoria" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Informática" required/>
                            </div>
                            <div>
                                <label for="password" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor (R$):</label>
                                <input type="number" name="valor" id="valor" placeholder="99,90" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>
                            </div>
                            <div>
                                <label for="idioma" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nº Patrimônio:</label>
                                <input type="text" name="Numero Patrimonio" id="NPat" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="12331331" required/>
                            </div>
                            <div>
                                <label for="isbn-10" className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da aquisição:</label>
                                <input type="date" name="Data aquisição" id="DatAq" className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required/>
                            </div>
                            <button type="submit" className="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    }
</div>
