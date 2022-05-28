import React from 'react'
import { useSelector } from 'react-redux'

import '../../css/CourseFinished.css'

function CourseFinished({ setCurrentPage, setIsCourseFinished }) {
    const course = useSelector(state => state.course)

    const exercises = course.questions.filter(question => question.theory === 0)

    return (
        <div>
            <h1>{course.name.charAt(0).toUpperCase() + course.name.slice(1)} kursa rezultāti</h1>
            <br />
            {exercises.map((exercise, index) => (
                <div className="result" key={index}>
                    <div>{index+1}. uzdevums</div>
                    <div>{"x"} jautājumi no {"x"} atbildēti pareizi</div>
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
            ))}
            <br />
            <h4>Kopējais kursa vērtējums: {"x"} jautājumi no {"x"} atbildēti pareizi</h4>
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