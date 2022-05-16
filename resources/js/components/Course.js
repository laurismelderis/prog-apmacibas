import React, { useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import { useParams, useNavigate } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse } from '../state/actions'

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
    return (
        <>
            <div>{JSON.stringify(course)}</div>
        </>
    )
}

export default Course