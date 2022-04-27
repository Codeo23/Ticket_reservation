import React,{useState,useEffect, Fragment} from 'react'
import Authform from '../../components/form/authForm';
import Layout from '../Layout';

const Signin=()=>{
    return(
        <Fragment>
            <Layout>
                <Authform/>
            </Layout>
        </Fragment>
    )
}

export default Signin;