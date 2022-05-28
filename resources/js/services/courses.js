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
import axios from 'axios';
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

export const getCourses = async () => {
    return axios.get("/api/course")
}

export const getCourseById = (id) => {
    return axios.get(`/api/course/${id}/attempt`).then(resp => {
        const attempts = resp.data
        if ( ! _.isEmpty(attempts)) {
            const data = axios.get(`/api/course/${id}/attempt/${attempts[attempts.length - 1].id}`)
            return data
        } else {
            console.log('New attempt')
            return axios.post(`/api/course/${id}/attempt`).then(response => {
                const data = axios.get(`/api/course/${id}/attempt/${response.data.id}`)
                return data
            })
        }
    })
}