import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';

import { BrowserRouter, Route, Routes } from 'react-router-dom';
import LoginForm from './Login/LoginForm'
import Home from './Home'
import Navbar from './Navbar/Navbar';
import store from '../state/state'

import "../../css/App.css"

function App() {
    return (
        <div className='main-container'>
            <Navbar />
            <div className='main-content'>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/login" element={<LoginForm />} />
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