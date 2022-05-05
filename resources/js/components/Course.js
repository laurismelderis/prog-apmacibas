import React, { useEffect } from 'react'
import { useDispatch } from 'react-redux'

import { getCourseByPath } from '../services/courses'
import { setIsInCourse } from '../state/actions'

function Course({ path }) {
    const dispatch = useDispatch()

    const course = getCourseByPath(path)

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