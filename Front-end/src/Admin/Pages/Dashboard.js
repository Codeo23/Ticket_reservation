import React from "react";
import Header from "../Components/Header";
import Navigation from "../Components/navigation/Navigation";
import "../admin.css";
import { ChartCA } from "../Components/dashboard/ChartCA";
import ListResume from "../Components/dashboard/ListResume";

const Dashboard = (props) => {
  return (
    <div className="flex flex-row">
      <Navigation />
      <div className="grow w-full max-h-screen overflow-y-scroll scroll relative">
        <Header />
        <div>
          <ListResume/>
          <ChartCA/>
        </div>
      </div>
    </div>
  );
};

export default Dashboard;
