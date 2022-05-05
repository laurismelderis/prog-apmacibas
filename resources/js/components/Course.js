import React, { useEffect } from 'react'
import { useDispatch } from 'react-redux'
import { useParams } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse } from '../state/actions'

function Course({ match }) {
    const dispatch = useDispatch()
    const params = useParams()

    const courseName = params.course

    const course = getCourseById(courseName)

    useEffect(() => {
        dispatch(setIsInCourse(true))
    }, [dispatch])

    return (
        <>
            <div>{JSON.stringify(course)}</div>
        </>
    )
}

export default Course