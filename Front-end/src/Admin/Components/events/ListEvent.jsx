import { faCircleInfo, faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { deleteEvent } from "../../../store/event.reducer";


const ListEvent = (props) => {
  const events = useSelector((state) => state.events);
  const dispatch = useDispatch();
  const pathImage = (path)=>{
    const vraiPath =path.split("/API");
    vraiPath.splice(1,0,'/API/public');
    console.log(vraiPath.join(''));
    return vraiPath.join('');
  }
  console.log(events)                                          
  return (
    <div className="w-full">
      <h3>Evénement passé</h3> 
      <img src="http://localhost:8000/images/uploads/62679952dc402_1648306178931.jpg" alt="test" className="w-full h-full"/>
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
              <img src="/media/safidy/SAFIDY/1648306178931.jpg" alt="test" className="w-full h-full"/>
              <div className="table-cell px-2 py-1">{event.num_Event}</div>
              <div className="table-cell px-2 py-1">{event.title}</div>
              <div className="table-cell px-2 py-1">{event.category}</div>
              <div className="table-cell px-2 py-1">{event.categoryAge}</div>
              <div className="table-cell px-2 py-1"></div>
              <div className="table-cell px-2 py-1 text-center text-lg space-x-1.5">
                <FontAwesomeIcon icon={faCircleInfo} onClick={()=>pathImage(event.contentUrl)}/>
                <FontAwesomeIcon icon={faTrash} /*onClick={()=>dispatch(deleteEvent(event.num_Event))}*//>
              </div>
            </div>
          )): <span>En cours de reception des données</span>}
        </div>
      </div>
    </div>
  );
};

export default ListEvent;
