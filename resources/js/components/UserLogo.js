import React from 'react'

function UserLogo({ src }) {
    return (
        <img
            src={src}
            width={"100em"}
            height={"100em"}
            alt="logo"
            style={{border: "1px solid black"}}
        />
    )
}

export default UserLogo