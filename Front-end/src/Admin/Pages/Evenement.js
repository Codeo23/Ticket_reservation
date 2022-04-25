import { faCalendar, faFileVideo } from "@fortawesome/free-regular-svg-icons";
import { faClock } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useState } from "react";
import AddEventForm from "../Components/events/AddEventForm";
import { ChartEvents } from "../Components/events/Chart";
import Header from "../Components/Header";
import ListEvent from "../Components/events/ListEvent";
import Navigation from "../Components/navigation/Navigation";
import "./../admin.css";

const Evenement = (props) => {
  const [modal, setModal] = useState(false);

  return (
    <div className="flex flex-row">
      <Navigation/>
      {modal &&<div className="fixed w-screen h-screen bg-black bg-opacity-80 z-10" onClick={()=>setModal(false)}></div>}
      {modal && <AddEventForm close={setModal} />}
      <div
        className="grow w-full max-h-screen relative overflow-y-scroll scroll"
      >
        <Header />
        <div className="px-5 mt-10">
          <button
            onClick={() => setModal(true)}
            className="bg-red-900 p-2 rounded text-white"
          >
            Nouvel événement
          </button>
          <div className="flex">
            <div className="futur grow w-2/6 p-2 mb-5 rounded grid row-auto mt-5 border border-slate-200">
              <span><FontAwesomeIcon icon={faCalendar} /> 22-05-1988</span>
              <span><FontAwesomeIcon icon={faClock} /> 15:00</span>
              <span><FontAwesomeIcon icon={faFileVideo} /> Wrath of Man</span>
              <img src="images/img1.jpg" alt=""/>
            </div>
            <div className="grow w-4/6 mb-5 pl-6">
              <ChartEvents />
            </div>
          </div>

          <ListEvent />
        </div>
      </div>
    </div>
  );
};

export default Evenement;
