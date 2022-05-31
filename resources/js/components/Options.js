import React from 'react'
import RadioGroup from './common/RadioGroup'

function Options({ type, name }) {

    if (type === 'radio') 
        return <RadioGroup name={name} />
        
    if (type === 'checkbox')
        console.log('checkbox')

    return (
        <></>
    )
}

export default Options