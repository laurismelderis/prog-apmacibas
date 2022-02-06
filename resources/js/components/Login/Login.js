import React from 'react';
import ReactDOM from 'react-dom';

function Login () {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8 mt-4">
                    <div className="card p-3">
                        <h5>E-pasts</h5>
                        <input type="email" className="form-control mb-3"/>
                        <h5>Parole</h5>
                        <input type="password" className="form-control mb-3"/>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;

if (document.getElementById('Login')) {
    ReactDOM.render(<Login />, document.getElementById('Login'));
}
