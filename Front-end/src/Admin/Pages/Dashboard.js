import React from "react";
import Navigation from "../Components/Navigation";

const Dashboard = (props) => {
  return (
    <div className="flex flex-row max-h-screen">
      <Navigation />
      <div className="grow w-10/12">
        <h1>Dashboard</h1>
      </div>
    </div>
  );
};

export default Dashboard;
