import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';

function LoginForm() {
  const navigate = useNavigate();
  const [details, setDetails] = useState({ name: '', email: '', password: '' })

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
        navigate("/")
      })

    console.log(details)
  }

  const test = e => {
    axios
      .get('/api/user')
      .then(response => {
        console.log(response.data)
      })
  }

  const logOut = e => {
    axios
      .post('/api/logout')
  }

  return (
    <div className="container">
      <div className="row justify-content-center">
        <div className="col-md-8 mt-4">
          <div className="card p-3">
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

            <button
              className="btn btn-primary"
              onClick={submitHandler}
            >
              Ielogoties
            </button>
          </div>

          <button
            onClick={logOut}
          >
            Izlogoties
          </button>

          <button
            onClick={test}
          >
            tests 
          </button>
        </div>
      </div>
    </div>
  );
}

export default LoginForm;

if (document.getElementById('LoginForm')) {
  ReactDOM.render(<LoginForm />, document.getElementById('LoginForm'));
}
