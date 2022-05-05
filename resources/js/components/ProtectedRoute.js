import React from 'react'
import { Navigate } from 'react-router-dom'

import { isEmpty } from 'lodash'

function ProtectedRoute({ user, children }) {
    // if (isEmpty(user)) {
        // return <Navigate to="/login" replace />
    // }
    return children
}

export default ProtectedRoute