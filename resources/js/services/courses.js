// Example
/*
    const course = [
        {
            name: 'Python', // Name of the course
            completion: 0.2, // ranges from 0 to 1
            path: '/python', // URI for the course
        }
    ]
*/
import _ from 'lodash'

const prefix = '/courses';

const courses = [
    {
        id: 'python',
        name: 'Python',
        completion: 0.2, // from 0 to 1
    },
    {
        id: 'java',
        name: 'Java',
        completion: 0.5, // from 0 to 1
    },
]

export const getCourses = () => {
    return courses;
}

export const getCourseById = (id) => {
    return _.find(courses, {id: id})
}