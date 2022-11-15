import React from "react"
import "../assets/css/style.css"

export default props =>
    <button className={`text-white drop-shadow-lg rounded-md p-3 justify-items-center btnhover`}
            style ={{backgroundColor: `${props.bgColor}`, color:`${props.tColor}`}} onClick={props.onClick}>
        <span className="flex items-center">
            {props.icone}
        {props.texto  && <span className='pl-1'>
            {props.texto}
        </span>}
            
        </span>
    </button>
