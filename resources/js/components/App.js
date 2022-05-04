import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import LoginForm from './Login/LoginForm'
import Home from './Home'
import Navbar from './Navbar';

import "../../css/App.css"

function App() {
    return (
        <div className='main-container'>
            <Navbar />
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/login" element={<LoginForm />} />
            </Routes>
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(
        <BrowserRouter>
            <App />
        </BrowserRouter>,
        document.getElementById('app'));
}