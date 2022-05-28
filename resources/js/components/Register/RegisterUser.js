import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import _ from 'lodash'

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

    const [error, setError] = useState({
        name: '',
        surname: '',
        email: '',
        password: '',
        passwordAgain: '',
    })

    const submitHandler = e => {
        let hasError = false

        let newError = { ...error };
        if (_.isEmpty(details.name)) {
            newError.name = "Ievadiet vārdu!"
            hasError = true
        }
        if (_.isEmpty(details.surname)) {
            newError.surname = "Ievadiet uzvārdu!"
            hasError = true
        }
        if (_.isEmpty(details.email)) {
            newError.email = "Ievadiet e-pastu!"
            hasError = true
        }
        if (_.isEmpty(details.password)) {
            newError.password = "Ievadiet paroli!"
            hasError = true
        }
        if (_.isEmpty(details.passwordAgain)) {
            newError.passwordAgain = "Ievadiet paroli atkārtoti!"
            hasError = true
        }

        setError(newError)

        if ( ! hasError) {
            let data = {
                name: details.name,
                surname: details.surname,
                email: details.email,
                password: details.password,
                password_confirmation: details.passwordAgain,
            }
            axios
                .post('/api/register', data)
                .then(resp => {
                    navigate('/login')
                })
                .catch(err => console.log(err))
        }
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
                        className={"form-control mb-3" + (_.isEmpty(error.name) ? "" : " is-invalid")}
                    />

                    <h5>Uzvārds</h5>
                    <input
                        onChange={e => setDetails({ ...details, surname: e.target.value })}
                        value={details.surname}
                        type="text"
                        className={"form-control mb-3" + (_.isEmpty(error.surname) ? "" : " is-invalid")}
                    />

                    <h5>E-pasts</h5>
                    <input
                        onChange={e => setDetails({ ...details, email: e.target.value })}
                        value={details.email}
                        type="email"
                        className={"form-control mb-3" + (_.isEmpty(error.email) ? "" : " is-invalid")}
                    />

                    <h5>Parole</h5>
                    <input
                        onChange={e => setDetails({ ...details, password: e.target.value })}
                        value={details.password}
                        type="password"
                        className={"form-control mb-3" + (_.isEmpty(error.password) ? "" : " is-invalid")}
                    />

                    <h5>Parole atkārtoti</h5>
                    <input
                        onChange={e => setDetails({ ...details, passwordAgain: e.target.value })}
                        value={details.passwordAgain}
                        type="password"
                        className={"form-control mb-3" + (_.isEmpty(error.passwordAgain) ? "" : " is-invalid")}
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