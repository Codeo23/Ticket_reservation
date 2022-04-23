import { faCalendar, faFileVideo } from "@fortawesome/free-regular-svg-icons";
import { faClock } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useState } from "react";
import AddEventForm from "../Components/AddEventForm";
import { ChartEvents } from "../Components/Chart";
import Header from "../Components/Header";
import ListEvent from "../Components/ListEvent";
import Navigation from "../Components/Navigation";
import "./../admin.css";

const Evenement = (props) => {
  const [openModal,setOpenModal] = useState(false);

  return (
    <div className="flex flex-row">
      <Navigation />
      <div className="grow w-10/12 max-h-screen relative overflow-y-scroll scroll">
        <Header />
        <div className="px-5 mt-10">
          <div className="futur bg-red-900 w-1/5 p-2 mb-5 rounded text-slate-300">
            <FontAwesomeIcon icon={faCalendar} /> <span> 22-05-1988</span>&nbsp;
            <FontAwesomeIcon icon={faClock} />
            <span>15:00</span><br/>
            <FontAwesomeIcon icon={faFileVideo} /> Wrath of Man
          </div>
          <button onClick={()=>setOpenModal(true)}>Open</button>
          {openModal && <AddEventForm closeModal={setOpenModal}/>}
          <div>
            <ChartEvents/>
          </div>
          <ListEvent />
        </div>
      </div>
    </div>
  );
};

export default Evenement;
