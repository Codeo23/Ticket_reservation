import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBell } from '@fortawesome/free-regular-svg-icons';
import { faList } from '@fortawesome/free-solid-svg-icons';
import { useDispatch } from 'react-redux';
import { reveleNavig } from '../../store/admin.reducer';

const Header = (props) => {
    const dispatch = useDispatch();
    return (
        <div className='fixed w-full py-1 px-3 text-slate-700'>
            <FontAwesomeIcon icon={faList} className="text-xl cursor-pointer" onClick={()=>dispatch(reveleNavig())}/>
        </div>
    );
};

export default Header;