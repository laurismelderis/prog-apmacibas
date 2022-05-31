import axios from 'axios'
import React, { useEffect } from 'react'

import { useState } from 'react'
import { useSelector } from 'react-redux'
import _ from 'lodash'

function InputText({ questionId, options }) {
    const option = options[options.length - 1]
    const course = useSelector(state => state.course)
    const [text, setText] = useState(() => {
        const answer = option.answers[0] || {}
        return answer.text || ""
    })
    const [hasTyped, setHasTyped] = useState(false)
    const [currentAnswerId, setCurrentAnswerId] = useState()


    const setInputText = (newText) => {
        let data = {
            optionId: option.id,
            courseId: course.id,
            text: newText
        }

        if(!hasTyped && _.isEmpty(option.answers)) {
            axios.post('/api/answer', data).then(resp => {
                options[options.length - 1].answers.push(resp.data)
                setCurrentAnswerId(resp.data.id)
            })
        } else {
            const answer = option.answers[0] || {}
            const answerId = answer.id || currentAnswerId
            axios.put(`/api/answer/${answerId}`, data).then(resp => {
                options[options.length - 1].answers.shift()
                options[options.length - 1].answers.push(resp.data)
                setCurrentAnswerId(resp.data.id)
            })
        }
        setHasTyped(true)
        setText(newText)
    }

    return (
        <input 
            type='text'
            style={{width: "50%"}}
            onChange={e=> setInputText(e.target.value)}
            value={text}
        />
    )
}

export default InputText