import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import LoginForm from './Login/LoginForm'

function App() {

    const [user, setUser] = useState({ name: '', email: '' })
    const [error, setError] = useState("")

    const Login = details => {
        console.log(details)
    }

    const  Logout = () => {
        console.log("Logout")
    }

    return (
        <React.Fragment>
            <LoginForm 
                Login={Login} 
                error={error}
            />
        </React.Fragment>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}