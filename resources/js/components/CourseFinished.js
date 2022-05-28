import _ from 'lodash'
import React from 'react'
import { useSelector } from 'react-redux'
import { useState } from 'react'

import '../../css/CourseFinished.css'

function CourseFinished({ setCurrentPage, setIsCourseFinished }) {
    const course = useSelector(state => state.course)

    const exercises = course.questions.filter(question => question.theory === 0)
    let correctAnswers = 0
    return (
        <div>
            <h1>{course.name.charAt(0).toUpperCase() + course.name.slice(1)} kursa rezultāti</h1>
            <br />
            {exercises.map((exercise, index) => {
                const correctOptions = exercise.options.filter((option) => option.is_correct)
                const correctOptionCount = correctOptions.length
                let count = 0
                correctOptions.forEach(option => {
                    if (! _.isEmpty(option.answers)) {
                        count++
                    }
                })
                const isCorrect = count === correctOptionCount
                if (isCorrect) correctAnswers++
                return <div className="result" key={index}>
                    <div>{index+1}. uzdevums</div>
                    <div>
                        {isCorrect
                            ?
                                "Atbildēts pareizi"
                            :
                                "Nepareizi atbildēts"
                        }
                    </div>
                    <div 
                        className="retry-course"
                        onClick={() => {
                            setCurrentPage(exercise.id)
                            setIsCourseFinished(false)
                        }}
                    >
                        Mēģināt vēlreiz
                    </div>
                </div>
            })}
            <br />
            <h4>Kopējais kursa vērtējums: {correctAnswers} jautājumi no {exercises.length} atbildēti pareizi</h4>
            <br />
            <div
                className="return-to-course"
                onClick={() => {
                    setCurrentPage(1)
                    setIsCourseFinished(false)
                }}
            >
                Atgriezties uz kursa sākumu
            </div>
        </div>
    )
}

export default CourseFinished