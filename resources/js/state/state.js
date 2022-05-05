import { configureStore } from "@reduxjs/toolkit"
import * as A from './actions'

// Initial global state values
function createInitialState() {
    return {
        isLoggedIn: false,
    }
}

export function reducer(state = createInitialState(), action) {
    function reduce() {
        switch (action.type) {
            case A.SET_IS_LOGGED_IN: {
                return { ...state, isLoggedIn: action.value }
            }
            default: {
                return state
            }
        }
    }
    return Object.freeze(reduce())
}

export default configureStore({
    reducer: reducer
})