import { faCalendarDay, faDollar, faUsers } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";

const ListResume = (props) => {
  return (
    <div className="w-full flex flex-auto gap-2 px-4">
      <div className="text-sm bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg"><FontAwesomeIcon icon={faCalendarDay}/></span>
        <h4>PROCHAIN EVENEMENT</h4>
        <p>Wrath of Man</p>
        <span>3.18% Places disponibles</span>
      </div>
      <div className="text-sm bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg"><FontAwesomeIcon icon={faCalendarDay}/></span>
        <h4>PROCHAIN EVENEMENT</h4>
        <p>Wrath of Man</p>
        <span>3.18% Places disponibles</span>
      </div>
      <div className="text-sm bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg"><FontAwesomeIcon icon={faCalendarDay}/></span>
        <h4>PROCHAIN EVENEMENT</h4>
        <p>Wrath of Man</p>
        <span>3.18% Places disponibles</span>
      </div>
      <div className="text-sm bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg"><FontAwesomeIcon icon={faCalendarDay}/></span>
        <h4>PROCHAIN EVENEMENT</h4>
        <p>Wrath of Man</p>
        <span>3.18% Places disponibles</span>
      </div>
    </div>
  );
};

export default ListResume;
