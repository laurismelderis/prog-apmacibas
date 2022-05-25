import React, { useEffect, useState } from 'react'
import { useDispatch } from 'react-redux'
import { useParams, useNavigate } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse } from '../state/actions'
import PaginationPane from './PaginationPane';
import _ from 'lodash'
import Options from './Options'
import '../../css/Course.css'
import CourseFinished from './CourseFinished'

function Course() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const params = useParams()
    const courseId = params.course
    const [course, setCourse] = useState({})
    const [currentPage, setCurrentPage] = useState(1)
    const questions = course.questions || []
    const currentQuestion = questions.find(question => question.id === currentPage) || {}

    const isTheory = currentQuestion.theory === 1 ? true : false
    const isFirstPage = currentPage === 1
    const isLastPage = currentPage === questions.length
    const [isCourseFinished, setIsCourseFinished] = useState(true)

    const options = currentQuestion.options || []
    const optionType = options[0] === undefined ? '' : options[0].type

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

    const finishCourse = () => {
        setIsCourseFinished(true)
    }

    console.log(options)

    if ( ! _.isEmpty(course)) {
        if (isCourseFinished) {
            return (
                <CourseFinished 
                    course={course}
                    setCurrentPage={setCurrentPage}
                    setIsCourseFinished={setIsCourseFinished}    
                />
            )
        }

        return (
            <>
                <h1>{course.description}</h1>
                <h5>{currentQuestion.text}</h5>
                { isTheory
                    ?
                        <Options options={options} name={currentQuestion.id} type={optionType}/>
                    :
                        <></>
                }
                <div className="navigation">
                    {isFirstPage
                        ?
                            <div></div>
                        :
                            <button
                                className="navigation-left"
                                onClick={() => setCurrentPage(currentPage-1)}
                            >
                                {"<=="}
                            </button>
                    }
                    {isLastPage
                        ?
                            <button onClick={finishCourse}>Pabeigt kursu</button>
                        :
                            <button 
                                className="navigation-right"
                                onClick={() => setCurrentPage(currentPage+1)}
                            >
                                {"==>"}
                            </button>
                    }
                </div>
                <PaginationPane 
                    currentPage={currentPage}
                    setCurrentPage={setCurrentPage}
                    questions={questions}
                />
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