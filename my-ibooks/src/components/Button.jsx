import React from "react"

export default props =>
    <button className="bg-[#58E3C2] text-white drop-shadow-lg rounded-md p-3 justify-items-center" >
        <span className="flex">
            {props.children}
        </span>
    </button>
