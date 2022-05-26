import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import '../../../css/LoginForm.css'

function RegisterUser() {
    const navigate = useNavigate()

    const [details, setDetails] = useState({
        name: '',
        surname: '',
        email: '',
        password: '',
        passwordAgain: '',
    })

    const submitHandler = e => {
        e.preventHandler()
    }

    useEffect(() => {
        if (authUser) {
            navigate('/')
        }
    }, [])

    return (
        <div className="container">
            <br />
            <h1 style={{textAlign: "center"}}>Reģistrēties</h1>
            <div className="row justify-content-center">
                <div className="col-md-8 mt-4">
                    <h5>Vārds</h5>
                    <input
                        onChange={e => setDetails({ ...details, name: e.target.value })}
                        value={details.name}
                        type="text"
                        className="form-control mb-3"
                    />

                    <h5>Uzvārds</h5>
                    <input
                        onChange={e => setDetails({ ...details, surname: e.target.value })}
                        value={details.surname}
                        type="text"
                        className="form-control mb-3"
                    />

                    <h5>E-pasts</h5>
                    <input
                        onChange={e => setDetails({ ...details, email: e.target.value })}
                        value={details.email}
                        type="email"
                        className="form-control mb-3"
                    />

                    <h5>Parole</h5>
                    <input
                        onChange={e => setDetails({ ...details, password: e.target.value })}
                        value={details.password}
                        type="password"
                        className="form-control mb-3"
                    />

                    <h5>Parole atkārtoti</h5>
                    <input
                        onChange={e => setDetails({ ...details, passwordAgain: e.target.value })}
                        value={details.passwordAgain}
                        type="password"
                        className="form-control mb-3"
                    />
                    <br />
                    <div
                        className='login-div'
                        onClick={submitHandler}
                    >
                        Reģistrēties
                    </div>
                    <div className='register-div' onClick={() => navigate('/login')}>Atgriezties</div>
                </div>
            </div>
        </div>
    )
}

export default RegisterUser