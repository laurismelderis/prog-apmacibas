import axios from 'axios';
import _ from 'lodash'

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
            return axios.post(`/api/course/${id}/attempt`).then(response => {
                const data = axios.get(`/api/course/${id}/attempt/${response.data.id}`)
                return data
            })
        }
    })
}