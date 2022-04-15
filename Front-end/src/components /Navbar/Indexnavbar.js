import { Fragment } from "react"

const  Indexnavbar=()=>{
     return(
          <Fragment>
               <div>
                    <div className="bg-red-900 text-white p-4 flex sm:justify-center lg:justify-between">
                         <div>
                              <h1 className="font-bold text-2xl">RESERVATION</h1>
                         </div>
                         <div>
                              <a href='#' >Login</a>
                              <a href='#' className="ml-2">SignUp</a>
                         </div>
                    </div>
               </div>
          </Fragment>
     )
}
export default Indexnavbar;

