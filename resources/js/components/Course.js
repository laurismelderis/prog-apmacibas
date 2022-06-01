import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { useParams, useNavigate } from 'react-router-dom'

import { getCourseById } from '../services/courses'
import { setIsInCourse, setCourse } from '../state/actions'
import PaginationPane from './PaginationPane';
import _, { update } from 'lodash'
import Options from './Options'
import '../../css/Course.css'
import CourseFinished from './CourseFinished'
import axios from 'axios'

function Course() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const params = useParams()
    const courseId = params.course
    const course = useSelector(state => state.course)
    const [currentPage, setCurrentPage] = useState()
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
            const lastPage = data.attempts[data.attempts.length - 1].last_page
            if (lastPage !== null) setCurrentPage(lastPage)
            else setCurrentPage(1)
            setIsCourseFinished(data.attempts[data.attempts.length - 1].submitted_at != null)
        }

        getData().catch((err) => {
            console.log(err)
            navigate('/')
        })

        dispatch(setIsInCourse(true))
    }, [])

    const finishCourse = () => {
        setIsCourseFinished(true)
        
        axios.get(`/api/course/${courseId}/attempt`).then(resp => {
            const attemptId = resp.data[0].id
            let newDate = new Date()
            let date = newDate.getDate();
            let month = newDate.getMonth() + 1;
            let year = newDate.getFullYear();

            let data = {
                submittedAt: `${year}-${month}-${date}`
            }
            
            axios.put(`/api/course/${courseId}/attempt/${attemptId}`, data)
        })
    }

    const updateLastPage = (page) => {
        axios.get(`/api/course/${courseId}/attempt`).then(resp => {
            const attemptId = resp.data[0].id
            
            let data = {
                page: page
            }
            
            axios.put(`/api/course/${courseId}/attempt/${attemptId}`, data)
            setCurrentPage(page)
        })
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
                                <div className="course-content" dangerouslySetInnerHTML={{__html: question.text}} />
                                { ! question.isTheory
                                    ?
                                        <Options
                                            name={currentQuestion.id}
                                            type={optionType}
                                            options={options}
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
                                onClick={() => updateLastPage(currentPage-1)}
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
                                onClick={() => updateLastPage(currentPage+1)}
                            >
                                {"==>"}
                            </button>
                    }
                </div>
                <PaginationPane 
                    currentPage={currentPage}
                    updateLastPage={updateLastPage}
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