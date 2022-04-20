import React from "react";
import Header from "../Components/Header";
import Navigation from "../Components/Navigation";
import "./../admin.css"

const Dashboard = (props) => {
  return (
    <div className="flex flex-row max-h-screen">
      <Navigation /> 
      <div className="grow w-10/12">
        <Header/>
        <h1>Dashboard</h1>
      </div>
    </div>
  );
};

export default Dashboard;
