import React from 'react'
import { Link } from 'react-router-dom'

function NotFound() {
    return (
        <>
            <h1>Lapu nevar atrast</h1>
            <Link to="/">Atgriezties uz sākumlapu</Link>
        </>
    )
}

export default NotFound