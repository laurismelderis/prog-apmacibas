import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import '../../../css/LoginForm.css'

function RegisterOrganization() {
    const navigate = useNavigate()

    const [details, setDetails] = useState({
        email: '',
        text: '',
    })
    useEffect(() => {
        if (authUser) {
            navigate('/')
        }
    }, [])
    return (
        <>
            <h5>Lai pieteiktos kā organizācija vai institūts lūdzu rakstiet pieteikumu uz programmesana@skola.lv</h5>
            <div className='register-div' onClick={() => navigate('/login')}>Atgriezties</div>
        </>
    )
}

export default RegisterOrganization