import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';

import { BrowserRouter, Route, Routes } from 'react-router-dom';
import LoginForm from './Login/LoginForm'
import Home from './Home'
import Course from './Course';
import Navbar from './Navbar/Navbar';
import store from '../state/state'
import { getCourses } from '../services/courses';

import "../../css/app.css"

function App() {
    const courses = getCourses()

    return (
        <div className='main-container'>
            <Navbar />
            <div className='main-content'>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/login" element={<LoginForm />} />
                    {courses.map((course, index) => (
                        <Route path={course.path} element={<Course path={course.path} key={index} />} />
                    ))}
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