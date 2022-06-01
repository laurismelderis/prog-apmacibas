import React from 'react'

import UserLogo from './UserLogo'
import user_default from '../../../img/user-default.png';
import axios from 'axios';
import { useDispatch } from 'react-redux';
import { setIsLoggedIn } from '../../state/actions';
import { useNavigate } from 'react-router-dom';

function UserInformation() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const user = {
        name: authUser.name,
        surname: authUser.surname,
    }

    const logout = () => {
        axios
            .post('/api/logout')
            .then(resp => {
                authUser = {}
                navigate("/login")
                dispatch(setIsLoggedIn(false))
            })
    }

    const testApi = () => {
        axios
            .get('/api/course/1/attempt/1')
            .then(response => {
                console.log(response.data)
            })
    }

    let canCheckResults = false

    let typeElement
    
    if (user.type === "client") {
        canCheckResults = true
        typeElement = <></>
    }

    if (user.type === "teacher") {
        canCheckResults = true
        typeElement = <>
            <h5>Rīgas 84. vidusskola</h5>
        </>
    }

    if (user.type === "student") {
        typeElement = <>
            <h5>Rīgas 84. vidusskola</h5>
            <h5>12. klase</h5>
        </>
    }

    if (user.type === "org_lead") {
        canCheckResults = true
        typeElement = <>
            <h5>SIA Organizācija</h5>
        </>
    }

    if (user.type === "org_student") {
        typeElement = <>
            <h5>SIA Organizācija</h5>
        </>
    }

    return (
        <>
            <div>
                <h5>
                    {user.name}
                    {" "}
                    {user.surname}
                </h5>
                {typeElement}
                {/* <button>
                    Apskatīties rezultātus
                </button> */}
            </div>
            <div>
                <UserLogo src={user_default} />
                <button
                    style={{width: "100%"}}
                    onClick={logout}
                >
                    Iziet
                </button>
            </div>
            {/* <div>
                <button
                    style={{width: "100%"}}
                    onClick={testApi}
                >
                    Test API
                </button>
            </div> */}
        </>
    )
}

export default UserInformation