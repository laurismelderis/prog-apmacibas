import axios from 'axios'
import React, { useState } from 'react'
import { useSelector } from 'react-redux'
import _ from 'lodash'

function RadioGroup({ name, options }) {
    const course = useSelector(state => state.course)

    const [selectedOption, setSelectedOption] = useState(() => {
        for (let i = 0; i < options.length; i++) {
            if ( ! _.isEmpty(options[i].answers)) {
                return options[i].id
            }
        }
    })

    const deletePreviousAnswers = (options) => {
        for (let i = 0; i < options.length; i++) {
            if ( ! _.isEmpty(options[i].answers)) {
                axios.delete(`/api/answer/${options[i].answers[0].id}`)
                options[i].answers = []
            }
        }
        return false
    }

    const setOption = (option) => {
        const answers = option.answers
        
        let data = {
            optionId: option.id,
            courseId: course.id,
        }
        
        deletePreviousAnswers(options)
        
        if (_.isEmpty(answers)) {
            axios
            .post('/api/answer', data)
            .then(response => {
                answers.push(response.data)
            })
        }
    }
    
    return (
        <div>
            {options.map((option, index) => {
                return <div className="option" key={index}>
                    <input 
                        name={'n' + name}
                        type={option.type}
                        value={option.id}
                        id={option.id}
                        onChange={(e) => {
                            setOption(option)
                            setSelectedOption(e.target.value)
                        }}
                        checked={selectedOption == option.id}
                    />
                    {option.text}
                </div>
            })}
        </div>
    )
}

export default RadioGroup