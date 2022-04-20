import React from 'react';
import { BrowserRouter,Routes,Route } from "react-router-dom"
import Dashboard from './Admin/Pages/Dashboard';
import Evenement from './Admin/Pages/Evenement';
import Home from './pages/Home';

const App = (props) => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Home/>}/>
                <Route path='/admin' element={<Dashboard/>}/>
                <Route path='/evenement' element={<Evenement/>}/>
            </Routes>
        </BrowserRouter>
    );
};

export default App;