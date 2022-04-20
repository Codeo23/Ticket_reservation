import React from 'react';
import { BrowserRouter,Routes,Route } from "react-router-dom"
import Dashboard from './Admin/Pages/Dashboard';
import Home from './pages/Home';

const App = (props) => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Home/>}/>
                <Route path='/admin' element={<Dashboard/>}/>
            </Routes>
        </BrowserRouter>
    );
};

export default App;