import React from "react";
import Header from "../Components/Header";
import Navigation from "../Components/Navigation";
import "../admin.css";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {} from "@fortawesome/free-regular-svg-icons";
import { faCog } from "@fortawesome/free-solid-svg-icons";
import { useSelector } from "react-redux";
import Calendar from "../Components/Scheduler";

const Dashboard = (props) => {
  const events = useSelector((state) => state.eventReducer);
  return (
    <div className="flex flex-row max-h-screen">
      <Navigation />
      <div className="grow w-10/12">
        <Header />
        <div className="p-3 flex gap-x-4 justify-center">
          <div className="bg-slate-500 p-5 grow w-1/12 text-slate-100 rounded-xl">
            <FontAwesomeIcon icon={faCog} className="text-3xl" />
            <span className="text-lg">Personnaliser le Ticket</span>
          </div>
          <div className="bg-slate-500 p-5 grow w-1/12 text-slate-100 rounded-xl">
            <FontAwesomeIcon icon={faCog} className="text-3xl" />
            <span className="text-lg">Personnaliser le Ticket</span>
          </div>
          <div className="bg-slate-500 p-5 grow w-1/12 text-slate-100 rounded-xl">
            <FontAwesomeIcon icon={faCog} className="text-3xl" />
            <span className="text-lg">Personnaliser le Ticket</span>
          </div>
          <div className="bg-slate-500 p-5 grow w-1/12 text-slate-100 rounded-xl">
            <FontAwesomeIcon icon={faCog} className="text-3xl" />
            <span className="text-lg">Personnaliser le Ticket</span>
          </div>
        </div>
        <div>
        </div>
        <Calendar/>
      </div>
      
    </div>
  );
};

export default Dashboard;
