import React from 'react';
import { useDispatch } from 'react-redux';
import { BrowserRouter,Routes,Route } from "react-router-dom"
import Calendar from './Admin/Pages/Calendar';
import Clients from './Admin/Pages/Clients';
import Dashboard from './Admin/Pages/Dashboard';
import Evenement from './Admin/Pages/Evenement';
import Reservation from './Admin/Pages/Reservation';
import Settings from './Admin/Pages/Settings';
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
                <Route path='/calendrier' element={<Calendar/>}/>
                <Route path='/clients' element={<Clients/>}/>
                <Route path='/reservation' element={<Reservation/>}/>
                <Route path='/settings' element={<Settings/>}/>
            </Routes>
        </BrowserRouter>
    );
};

export default App;