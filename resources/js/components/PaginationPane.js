import React from 'react'
import { useSelector } from 'react-redux'

import '../../css/PaginationPane.css'

function PaginationPane({ currentPage, updateLastPage }) {
    const course = useSelector(state => state.course)
    const questions = course.questions

    return (
        <>
            <div className='panel'>
                {questions.map((question, index) => {
                    let color = ""
                    if (index+1 < currentPage) {
                        color = "page-green"
                    } else if (index + 1 === currentPage) {
                        color = "page-light-green"
                    }
                    
                    return (
                        <div 
                            key={index+1}
                            className={'page ' + color}
                            onClick={() => updateLastPage(index+1)}
                        >
                            {index+1}
                        </div>
                    )
                })}
            </div>
        </>
    )
}

export default PaginationPane