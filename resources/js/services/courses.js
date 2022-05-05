// Example
/*
    const course = [
        {
            name: "Python", // Name of the course
            completion: 0.2, // ranges from 0 to 1
            path: "/python", // URI for the course
        }
    ]
*/
import _ from 'lodash'

const courses = [
    {
        name: "Python",
        completion: 0.2, // from 0 to 1
        path: "/python",
    },
    {
        name: "Java",
        completion: 0.5, // from 0 to 1
        path: "/java",
    },
]

export const getCourses = () => {
    return courses;
}

export const getCourseByPath = (path) => {
    return _.find(courses, {path: path})
}