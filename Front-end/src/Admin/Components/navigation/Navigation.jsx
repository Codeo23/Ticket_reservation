import React from "react";
import { NavLink } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCalendar, faMoon, faSun } from "@fortawesome/free-regular-svg-icons";
import {
  faCalendarWeek,
  faCog,
  faHome,
  faTicketSimple,
  faUser,
} from "@fortawesome/free-solid-svg-icons";
import { useSelector } from "react-redux";
import Lien from "./TemplateLien";

const Navigation = () => {
  const revele = useSelector((state) => state.admin);
  return (
    <div
      className={
        !revele
          ? "h-screen bg-white grow w-1/5 flex flex-col relative text-slate-500 font-semibold text-sm border border-r-2"
          : "h-screen bg-white grow w-10 flex flex-col items-center relative text-slate-700  text-sm border border-r-2"
      }
    >
      {!revele ? (
          <span className="py-5 pl-4">
            TechArmy-CINE
          </span>
      ):(<span className="mb-5">
            <img
              src="images/canv2.png"
              alt="logo"
              className="w-10 h-10 object-cover"
            />
          </span>)}

      <div className="w-full flex flex-col">
        <Lien lien="/admin" icone={faHome} text="Tableau de bord" />
        <Lien lien="/evenement" icone={faCalendar} text="Evénements" />
        <Lien lien="/calendrier" icone={faCalendarWeek} text="Calendrier" />
        <Lien lien="/clients" icone={faUser} text="Clients" />
        <Lien lien="/reservation" icone={faTicketSimple} text="Réservation" />
      </div>
    </div>
  );
};

export default Navigation;
