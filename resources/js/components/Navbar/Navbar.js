import React from 'react'
import Logo from './Logo'
import UserInformation from './UserInformation'

import '../../../css/Navbar.css'
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faHome } from '@fortawesome/free-solid-svg-icons'
import { useSelector } from 'react-redux'

function Navbar() {
    let isInCourse = false

    const isLoggedIn = useSelector(state => state.isLoggedIn)

    return (
        <div className='navbar-flex'>
            <div className='navbar-logo'>
                <Logo />
                {isInCourse
                    ?
                    <button>
                        <FontAwesomeIcon icon={faHome}/>
                        {" "}
                        Uz galveno lapu
                    </button>
                    :
                    <></>
                }
            </div>
            {isLoggedIn
                ?
                <div className='navbar-user'>
                    <UserInformation />
                </div>
                :
                <></>
            }
        </div>
    )
}

export default Navbar