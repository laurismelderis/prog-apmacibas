import React from 'react'
import { Navigate } from 'react-router-dom'

import { isEmpty } from 'lodash'

function ProtectedRoute({ children }) {
    if (isEmpty(authUser)) {
        return <Navigate to="/login" replace />
    }
    return children
}

export default ProtectedRoute