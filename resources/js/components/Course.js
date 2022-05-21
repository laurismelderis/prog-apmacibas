import React, { useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import { useParams, useNavigate } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse } from '../state/actions'
import _ from 'lodash'

function Course() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const params = useParams()
    const courseId = params.course
    const [course, setCourse] = useState({})

    useEffect(async () => {
        const getData = async () => {
            const { data } = await getCourseById(courseId)
            setCourse(data)
        }
        getData().catch((err) => {
            navigate('/')
        })

        dispatch(setIsInCourse(true))
    }, [])
    
    console.log(course)

    if ( ! _.isEmpty(course)) {
        return (
            <>
                <h1>{course.description}</h1>
                {course.questions.map((question, index) => {
                    return (
                        <div key={index}>
                            <h5>{index+1}. {question.text}</h5>
                            {question.options.map((option, oIndex) => {
                                return <h6 key={`${index}-${oIndex}`}>{JSON.stringify(option.text)}</h6>
                            })}
                        </div>
                    )
                })}
            </>
        )
    } else {
        return (
            <>
                <h2>Ielāde ...</h2>
            </>
        )
    }
}

export default Course