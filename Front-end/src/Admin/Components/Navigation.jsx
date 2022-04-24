import React from "react";
import { NavLink } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCalendar, faMoon, faSun } from "@fortawesome/free-regular-svg-icons";
import { faThLarge, faTicketSimple, faUser } from "@fortawesome/free-solid-svg-icons";

const Navigation = ({ open }) => {
  return (
    <div
      className={
        !open
          ? "h-screen bg-gradient-to-b from-slate-900 to-slate-700 grow w-2/12 flex flex-col items-center py-3 relative text-slate-100"
          : "h-screen bg-gradient-to-b from-slate-900 to-slate-700 grow w-2/12 flex flex-col items-center py-3 relative text-slate-100 opacity-30"
      }
    >
      <div className="bg-slate-100 text-slate-800 w-24 h-24 rounded-full flex justify-center items-center">
        <h2>Logo</h2>
      </div>

      <div className="m-10 w-full flex flex-col divide-y divide-slate-100">
        <NavLink
          to="/admin"
          className={(nav) =>
            nav.isActive ? "nav-active btn-navig" : "btn-navig"
          }
        >
          <FontAwesomeIcon icon={faThLarge} /> <span>Tableau de bord</span>
        </NavLink>

        <NavLink
          to="/evenement"
          className={(nav) =>
            nav.isActive ? "nav-active btn-navig" : "btn-navig"
          }
        >
          <FontAwesomeIcon icon={faCalendar} /> <span>Evénements</span>
        </NavLink>
        <NavLink to="" className="btn-navig">
          <FontAwesomeIcon icon={faUser} /> <span>Clients</span>
        </NavLink>
        <NavLink to="" className="btn-navig">
          <FontAwesomeIcon icon={faTicketSimple} /> <span>Réservation</span>
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
