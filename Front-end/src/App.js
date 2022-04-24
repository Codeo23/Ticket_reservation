import React from 'react';
import { useDispatch } from 'react-redux';
import { BrowserRouter,Routes,Route } from "react-router-dom"
import Dashboard from './Admin/Pages/Dashboard';
import Evenement from './Admin/Pages/Evenement';
import Home from './pages/Home';
import Signin from './pages/Signin';
import Signup from './pages/Signup';
import { getEvents } from './store/event.reducer';

const App = (props) => {
    const dispatch = useDispatch();
    dispatch(getEvents());
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/signin' element={<Signin/>}/>
                <Route path='/signup' element={<Signup/>}/>
                <Route path='/' element={<Home/>}/>
                <Route path='/admin' element={<Dashboard/>}/>
                <Route path='/evenement' element={<Evenement/>}/>
            </Routes>
        </BrowserRouter>
    );
};

export default App;