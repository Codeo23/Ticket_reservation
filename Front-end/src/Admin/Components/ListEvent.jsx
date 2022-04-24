import { faCircleInfo, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import { useSelector } from "react-redux";

const ListEvent = (props) => {
  const events = useSelector((state) => state.events);
  console.log(events.data[0])                                          
  return (
    <div className="w-full">
      <h3>Evénnement passé</h3>
      <div className="table border-collapse border border-slate-600 w-full">
        <div className="table-header-group bg-slate-300 text-lg">
          <div className="table-row rounded">
            <div className="col-list-event">Num-Event</div>
            <div className="col-list-event">Titre</div>
            <div className="col-list-event">Catégorie</div>
            <div className="col-list-event">Catégorie Age</div>
            <div className="col-list-event">Date</div>
            <div className="col-list-event">Actions</div>
          </div>
        </div>
        <div className="table-row-group text-sm">
          {events.data[0]?events.data[0].map((event) => (
            <div
              key={event.num_Event}
              className="table-row border-b border-slate-400"
            >
              <div className="table-cell px-2 py-1">{event.num_Event}</div>
              <div className="table-cell px-2 py-1">{event.title}</div>
              <div className="table-cell px-2 py-1">{event.category}</div>
              <div className="table-cell px-2 py-1">{event.categoryAge}</div>
              <div className="table-cell px-2 py-1">{event.date_event}</div>
              <div className="table-cell px-2 py-1 text-center text-lg space-x-1.5">
                <FontAwesomeIcon icon={faCircleInfo}/>
                <FontAwesomeIcon icon={faTrash}/>
              </div>
            </div>
          )): <span>En cours de reception des données</span>}
        </div>
      </div>
    </div>
  );
};

export default ListEvent;
