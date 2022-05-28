export const SET_IS_LOGGED_IN = 'setIsLoggedIn'
export const SET_IS_IN_COURSE = 'setIsInCourse'
export const SET_COURSE = 'setCourse'

export const setIsLoggedIn = (value) => ({ type: SET_IS_LOGGED_IN, value })
export const setIsInCourse = (value) => ({ type: SET_IS_IN_COURSE, value })
export const setCourse = (value) => ({ type: SET_COURSE, value })