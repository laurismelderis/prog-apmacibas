import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { useParams, useNavigate } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse, setCourse } from '../state/actions'
import PaginationPane from './PaginationPane';
import _ from 'lodash'
import Options from './Options'
import '../../css/Course.css'
import CourseFinished from './CourseFinished'
import RadioGroup from './common/RadioGroup'

function Course() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const params = useParams()
    const courseId = params.course
    const course = useSelector(state => state.course)
    const [currentPage, setCurrentPage] = useState(1)
    const questions = course.questions || []
    const currentQuestion = questions.find(question => question.id === currentPage) || {}

    const isFirstPage = currentPage === 1
    const isLastPage = currentPage === questions.length
    const [isCourseFinished, setIsCourseFinished] = useState(false)

    const options = currentQuestion.options || []
    const optionType = options[0] === undefined ? '' : options[0].type

    useEffect(() => {
        const getData = async () => {
            const { data } = await getCourseById(courseId)
            dispatch(setCourse(data))
        }

        getData().catch((err) => {
            navigate('/')
        })
        
        dispatch(setIsInCourse(true))
    }, [])

    const finishCourse = () => {
        setIsCourseFinished(true)
    }


    if ( ! _.isEmpty(course)) {
        if (isCourseFinished) {
            return (
                <CourseFinished 
                    setCurrentPage={setCurrentPage}
                    setIsCourseFinished={setIsCourseFinished}    
                />
            )
        }

        return (
            <>
                {questions.map((question, index) => {
                    if (question.id === currentPage) {
                        return (
                            <div key={index}>
                                <h1>{course.description}</h1>
                                <h5>{question.text}</h5>
                                { ! question.isTheory
                                    ?
                                        <Options
                                            name={currentQuestion.id}
                                            type={optionType}
                                        />
                                    :
                                        <></>
                                }
                            </div>
                        )
                    }
                })}
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