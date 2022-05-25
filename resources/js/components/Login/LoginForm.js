import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { useDispatch } from 'react-redux';
import { setIsLoggedIn } from '../../state/actions';
import _ from 'lodash'

import '../../../css/LoginForm.css'

function LoginForm() {
    const navigate = useNavigate()

    const [details, setDetails] = useState({ name: '', email: '', password: '' })
    const [loginFailed, setLoginFailed] = useState(false)

    const dispatch = useDispatch()

    const submitHandler = e => {
        e.preventDefault()
        axios
        .get('/sanctum/csrf-cookie')
        .then(response => {
            axios
                .post('/api/login', {
                    email: details.email,
                    password: details.password
                })
                .then(({ data }) => {
                    if (_.isEmpty(data)) {
                        dispatch(setIsLoggedIn(false))
                    } else {
                        authUser = data
                        dispatch(setIsLoggedIn(true))
                        setLoginFailed(false)
                        navigate("/")
                    }
                })
                .catch(err => {
                    setLoginFailed(true)
                })
        })
    }

    useEffect(() => {
        if (authUser) {
            navigate('/')
        }
    }, [])

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8 mt-4">
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
                    
                        {loginFailed
                        ?
                            <div style={{color: "red", marginBottom: "1em"}}>
                                E-pasts vai parole nav pareiza
                            </div>  
                        :
                            <></>
                        }
                    

                    <div
                        className='login-div'
                        onClick={submitHandler}
                    >
                        Ieiet portālā
                    </div>
                    <div className='register-div'>Pieteikties kā individuālais lietotājs</div>
                    <div className='register-div'>Pieteikties kā institūcija / organizācija</div>
                </div>
            </div>
        </div>
    );
}

export default LoginForm;

if (document.getElementById('LoginForm')) {
    ReactDOM.render(<LoginForm />, document.getElementById('LoginForm'));
}
