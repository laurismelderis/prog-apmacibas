import React from 'react'
import RadioGroup from './common/RadioGroup'

function Options({ type, name }) {

    if (type === 'radio') 
        return <RadioGroup name={name} />
        
    return (
        <></>
    )
}

export default Options