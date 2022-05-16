import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import { Provider, useDispatch, useSelector } from 'react-redux';

import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import LoginForm from './Login/LoginForm'
import Home from './Home'
import Course from './Course';
import Navbar from './Navbar/Navbar';
import store from '../state/state'

import "../../css/App.css"
import NotFound from './NotFound';
import ProtectedRoute from './ProtectedRoute';
import { setIsLoggedIn } from '../state/actions';

function App() {
    const dispatch = useDispatch()

    if (authUser) {
        dispatch(setIsLoggedIn(true))
    }
    return (
        <div className='main-container'>
            <Navbar />
            <div className='main-content'>
                <Routes>
                    <Route path="/" element={
                        <ProtectedRoute >
                            <Home />
                        </ProtectedRoute>
                    } />
                    <Route path="courses/:course" element={
                        <ProtectedRoute >
                            <Course />
                        </ProtectedRoute>
                    } />
                    <Route path="login" element={<LoginForm />} />
                    <Route path="not-found" element={<NotFound />} />
                    <Route path="*" element={<Navigate to={"not-found"} />}/>
                </Routes>
            </div>
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(
        <Provider store={store}>
            <BrowserRouter>
                <App />
            </BrowserRouter>
        </Provider>,
        document.getElementById('app'));
}
