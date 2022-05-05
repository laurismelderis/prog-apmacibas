import React from 'react';
import { Link } from 'react-router-dom';
import getCourses from '../services/courses'

import '../../css/Home.css'
import { fill } from 'lodash';
import { useSelector } from 'react-redux';

function Home() {
    const courses = getCourses()

    const getBackground = (progress) => {
        let fillAmount = progress * 100
        if (!progress) fillAmount = 0
        if (fillAmount > 100) fillAmount = 100
        if (fillAmount < 0) fillAmount = 0
        return `linear-gradient(to right, green ${fillAmount}%, rgb(39, 39, 39) ${fillAmount}% 80%)`
    }

    return (
        <>
            <h1 style={{textAlign: "center"}}>
                Tavi kursi
            </h1>
            <hr />
            <div className='course-box-wrapper'>
                {courses.map((course, index) => (
                    <Link to={course.path} key={index}>
                        <div 
                            className="course-outer-box"
                            style={{
                                background: getBackground(course.completion)
                            }}
                        >
                            <div className="course-inner-box">{course.name}</div>
                        </div>
                    </Link>
                ))}
            </div>
        </>
    );
}

export default Home;
