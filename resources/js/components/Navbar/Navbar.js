import React from 'react'
import Logo from './Logo'
import UserInformation from './UserInformation'

import '../../../css/Navbar.css'
import { Link } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faHome } from '@fortawesome/free-solid-svg-icons'
import { useSelector } from 'react-redux'

function Navbar() {
    const isInCourse = useSelector(state => state.isInCourse)

    const isLoggedIn = useSelector(state => state.isLoggedIn)

    return (
        <div className='navbar-flex'>
            <div className='navbar-logo'>
                <Logo />
                {isInCourse
                    ?
                    <Link to={"/"}>
                        <FontAwesomeIcon icon={faHome}/>
                        {" "}
                        Uz galveno lapu
                    </Link>
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