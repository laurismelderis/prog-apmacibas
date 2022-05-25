import React from 'react'
import RadioGroup from './common/RadioGroup'

function Options({ type, name, options }) {
    if (type === 'radio') 
        return <RadioGroup options={options} name={name} />
        
    return (
        <></>
    )
}

export default Options