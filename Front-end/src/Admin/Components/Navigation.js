import React from "react";
import { NavLink } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faMoon, faSun } from "@fortawesome/free-regular-svg-icons";
import { faThLarge } from "@fortawesome/free-solid-svg-icons";

const Navigation = () => {
  return (
    <div className="h-screen bg-gradient-to-br from-red-600 to-red-900 grow w-2/12 flex flex-col items-center py-3 relative text-slate-100">
      <div className="bg-slate-100 text-slate-800 w-24 h-24 rounded-full flex justify-center items-center">
        <h2>Logo</h2>
      </div>

      <div className="m-10 w-full flex flex-col divide-y divide-slate-800">
        <NavLink
          to="/admin"
          className="bg-gradient-to-r from-red-600 to-red-500 px-4 py-2"
        >
          <FontAwesomeIcon icon={faThLarge} /> <span>Tableau de bord</span>
        </NavLink>
        <NavLink
          to="/admin"
          className="bg-gradient-to-r from-red-600 to-red-500 px-4 py-2"
        >
          <FontAwesomeIcon icon={faThLarge} /> <span>Dashboard</span>
        </NavLink>
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
