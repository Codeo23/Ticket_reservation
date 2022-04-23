import React, { useState } from "react";
import { NavLink } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faMoon, faSun } from "@fortawesome/free-regular-svg-icons";
import {
  faChevronDown,
  faThLarge,
  faUserAlt,
} from "@fortawesome/free-solid-svg-icons";

const Navigation = () => {
  const [pilotage, setPilotage] = useState(false);
  const [personnalisation, setPersonnalisation] = useState(false);
  const listeNavig = [setPilotage, setPersonnalisation];
  const affichage = (set = null, valeur = true) => {
    if (set) set(!valeur);
    listeNavig.forEach((element) => {
      if (element !== set) {
        element(false);
      }
    });
  };
  return (
    <div className="h-screen bg-gradient-to-b from-slate-900 to-slate-700 grow w-2/12 flex flex-col items-center py-3 relative text-slate-100">
      <div className="bg-slate-100 text-slate-800 w-24 h-24 rounded-full flex justify-center items-center">
        <h2>Logo</h2>
      </div>

      <div className="m-10 w-full flex flex-col divide-y divide-slate-100">
        <NavLink
          to="/admin"
          className={(nav)=>(nav.isActive ? "nav-active btn-1-navig": "btn-1-navig")}
          onClick={() => affichage()}
        >
          <FontAwesomeIcon icon={faThLarge} /> <span>Tableau de bord</span>
        </NavLink>
        {/*Pilotage*/}
        <div className="">
          <button
            className="btn-1-navig w-full text-left relative"
            onClick={() => affichage(setPilotage, pilotage)}
          >
            <FontAwesomeIcon icon={faUserAlt} /> Pilotage
            <FontAwesomeIcon
              icon={faChevronDown}
              className="absolute top-1/2 -translate-y-1/2 right-4 text-xs"
            />
          </button>
          <div className={pilotage ? "grid auto-rows-auto divide-y" : "hidden"}>
            <NavLink to="/evenement" className={(nav)=>(nav.isActive ? "nav-active btn-2-navig": "btn-2-navig")}>
              <FontAwesomeIcon icon={faThLarge} /> <span>Evénements</span>
            </NavLink>
            <NavLink to="/admin" className={(nav)=>(nav.isActive ? "nav-active btn-2-navig": "btn-2-navig")}>
              <FontAwesomeIcon icon={faThLarge} /> <span>Administration</span>
            </NavLink>
          </div>
        </div>
        {/*Personnalisation*/}
        <div className="">
          <button
            className="btn-1-navig w-full text-left relative"
            onClick={() => affichage(setPersonnalisation, personnalisation)}
          >
            <FontAwesomeIcon icon={faUserAlt} /> Personnalisation
            <FontAwesomeIcon
              icon={faChevronDown}
              className="absolute top-1/2 -translate-y-1/2 right-4 text-xs"
            />
          </button>
          <div className={personnalisation ? "grid auto-rows-auto" : "hidden"}>
            <NavLink to="/admin" className="btn-2-navig">
              <FontAwesomeIcon icon={faThLarge} /> <span>Administration</span>
            </NavLink>
            <NavLink to="/" className="btn-2-navig">
              <FontAwesomeIcon icon={faThLarge} /> <span>Administration</span>
            </NavLink>
          </div>
        </div>
      </div>

      <div className="absolute bottom-3 text-center">
        <h4>Thèmes</h4>
        <FontAwesomeIcon icon={faMoon} />
        <FontAwesomeIcon icon={faSun} />
      </div>
    </div>
  );
};

export default Navigation;
