import React from 'react'
import InputText from './common/InputText'
import RadioGroup from './common/RadioGroup'

function Options({ type, name, options }) {

    if (type === 'radio') 
        return <RadioGroup name={name} options={options} />

    if (type === 'text')
        return <InputText options={options}/>

    return (
        <></>
    )
}

export default Options