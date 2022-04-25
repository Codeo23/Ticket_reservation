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
          ? "h-screen bg-slate-900 grow w-2/12 flex flex-col items-center relative text-slate-100 text-opacity-70"
          : "h-screen bg-slate-900 grow w-10 flex flex-col items-center relative text-slate-100 text-opacity-70"
      }
    >
      {!revele ? (
        <>
          <span className="bg-black bg-opacity-50 w-full text-center font-bold text-2xl py-1">
            E-Ticket
          </span>
          <span className="my-4">
            <img
              src="images/canv2.png"
              alt="admin"
              className="h-20 w-20 object-cover rounded-full"
            />
            <p>Kara Smith</p>
          </span>
        </>
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
        <Lien lien="/settings" icone={faCog} text="Paramètres" />
      </div>
    </div>
  );
};

export default Navigation;
