import React from "react"
import "../assets/css/style.css"

export default props =>
    <div className="vw-100 items-center content-center justify-center">
        <div href="#" class="flex-lin flex-nowrap min-w-[50%] max-w-[80%]w-full flex items-center content-center bg-white rounded-lg border shadow-md sm:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <img class="object-cover w-80 h-80 rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="./src/assets/CapaLivroP.svg" alt=""/>
            <div class="flex justify-center p-4 leading-normal w-full">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-80">{props.titulo}</h1>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-80">Exemplares : {props.qntExemplares}</h2>
                <h3 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white w-80">Emprestados : {props.emprestados} || Disponiveis : {props.disponiveis}</h3>
            </div>
            <div class="flex flex-lin justify-between p-4 leading-normal">
            {props.children}
            </div>
        </div>
    </div>
    