import { faCalendar, faFileVideo } from "@fortawesome/free-regular-svg-icons";
import { faClock } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import AddEventForm from "../Components/AddEventForm";
import Header from "../Components/Header";
import ListEvent from "../Components/ListEvent";
import Navigation from "../Components/Navigation";
import "./../admin.css";

const Evenement = (props) => {
  return (
    <div className="flex flex-row">
      <Navigation />
      <div className="grow w-10/12 max-h-screen overflow-y-scroll scroll">
        <Header />
        <div className="px-5 py-3">
          <div className="futur bg-sky-900 w-1/5 p-2 mb-5 rounded text-slate-300">
            <FontAwesomeIcon icon={faCalendar} /> <span> 22-05-1988</span>&nbsp;
            <FontAwesomeIcon icon={faClock} />
            <span>15:00</span><br/>
            <FontAwesomeIcon icon={faFileVideo} /> Wrath of Man
          </div>
          <AddEventForm/>
          <ListEvent />
        </div>
      </div>
    </div>
  );
};

export default Evenement;
