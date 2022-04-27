import {
  faCalendarDay,
  faDollar,
  faUsers,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";

const ListResume = (props) => {
  return (
    <div className="w-full flex gap-2 px-8 absolute top-1/4 -translate-y-2/4">
      <div className="text-sm w-full bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg">
          <FontAwesomeIcon icon={faCalendarDay} />
        </span>
        <span className="text-slate-400 font-semibold">PROCHAIN EVENEMENT</span>
        <p>Wrath of Man</p>
        <span>150 Places disponibles</span>
      </div>
      <div className="text-sm w-full bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-yellow-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg">
          <FontAwesomeIcon icon={faDollar} />
        </span>
        <span className="text-slate-400 font-semibold">CHIFFRES D'AFFAIRES</span>
        <p>1.500.000 Ar</p>
        <span>4 années cumulées</span>
      </div>
      <div className="text-sm w-full bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-green-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg">
          <FontAwesomeIcon icon={faUsers} />
        </span>
        <span className="text-slate-400 font-semibold">TOTAL CLIENTS</span>
        <p>850</p>
        <span>5.2% registration/jour</span>
      </div>
      <div className="text-sm w-full bg-white p-2 rounded relative">
        <span className="absolute top-2 right-2 bg-sky-500 h-8 w-8 rounded-full flex justify-center items-center text-white text-lg">
          <FontAwesomeIcon icon={faCalendarDay} />
        </span>
        <span className="text-slate-400 font-semibold">PROCHAIN EVENEMENT</span>
        <p>Wrath of Man</p>
        <span>3.18% Places disponibles</span>
      </div>
    </div>
  );
};

export default ListResume;
