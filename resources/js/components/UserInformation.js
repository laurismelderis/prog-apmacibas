import React from 'react'

import UserLogo from './UserLogo'
import user_default from '../../img/user-default.png';

function UserInformation() {
    const user = {
        name: "Lauris",
        surname: "Melderis",
        type: "student"
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
                <button>
                    Apskatīties rezultātus
                </button>
            </div>
            <div>
                <UserLogo src={user_default} />
                <button
                    style={{width: "100%"}}
                >
                    Iziet
                </button>
            </div>
        </>
    )
}

export default UserInformation