import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import { useSelector } from "react-redux";
import { NavLink } from "react-router-dom";

const Lien = ({lien,icone,text}) => {
  const revele = useSelector((state) => state.admin);
  return (
    <NavLink
          to={lien}
          className={(nav) =>
            nav.isActive ? "bg-slate-600 bg-opacity-30 py-3" : "py-3"
          }
        >
      {revele ? (
        <span className="flex justify-center text-xl"><FontAwesomeIcon icon={icone}/></span>
      ) : (
        <span>
          <FontAwesomeIcon icon={icone} className="pl-4"/> {text}
        </span>
      )}
    </NavLink>
  );
};

export default Lien;
