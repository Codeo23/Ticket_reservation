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
            nav.isActive ? "text-red-900 py-2.5 tracking-wider uppercase " : "py-2.5 tracking-wider uppercase  hover:text-slate-600"
          }
        >
      {revele ? (
        <span className="flex justify-center"><FontAwesomeIcon icon={icone}/></span>
      ) : (
        <span>
          <FontAwesomeIcon icon={icone} className="pl-4"/> {text}
        </span>
      )}
    </NavLink>
  );
};

export default Lien;
