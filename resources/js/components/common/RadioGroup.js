import React from 'react'
import { useState } from 'react'

function RadioGroup({ options, name }) {
    const [optionSelected, setOptionSelected] = useState()

    console.log(optionSelected)

    return (
        <>
            {options.map((option, index) => (
                <div className="option" key={index}>
                    <input 
                        name={name}
                        type={option.type}
                        value={option.id}
                        onChange={e => setOptionSelected(e.target.value)}
                    />
                    {option.text}
                </div>
            ))}
        </>
    )
}

export default RadioGroup