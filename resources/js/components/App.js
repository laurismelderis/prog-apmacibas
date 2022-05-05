import React from 'react';
import ReactDOM from 'react-dom';
import { Provider, useSelector } from 'react-redux';

import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import LoginForm from './Login/LoginForm'
import Home from './Home'
import Course from './Course';
import Navbar from './Navbar/Navbar';
import store from '../state/state'

import "../../css/App.css"
import NotFound from './NotFound';
import ProtectedRoute from './ProtectedRoute';

function App() {
    const user = useSelector(state => state.user)

    return (
        <div className='main-container'>
            <Navbar />
            <div className='main-content'>
                <Routes>
                    <Route path="/" element={
                        <ProtectedRoute user={user} >
                            <Home />
                        </ProtectedRoute>
                    } />
                    <Route path="courses/:course" element={
                        <ProtectedRoute user={user} >
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