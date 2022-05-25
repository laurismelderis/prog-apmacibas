import React from 'react'

import '../../css/PaginationPane.css'

function PaginationPane({ currentPage, setCurrentPage, questions }) {
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
                            onClick={() => setCurrentPage(index+1)}
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