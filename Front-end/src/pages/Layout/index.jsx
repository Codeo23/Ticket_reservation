import React,{Fragment, useState} from "react"
import Indexnavbar from "../../components/Navbar/Indexnavbar";
import Footer from "../../components/footer/Indexfooter";



const Layout=({children})=>{
    return(
        <Fragment>
            <Indexnavbar/>
            {children}
            <Footer/>
        </Fragment>
    )

}

export default Layout;