import React from "react";
import { useSelector } from "react-redux";
import eventReducer from "../../Store/event.reducer";
import Header from "../Components/Header";
import Navigation from "../Components/Navigation";
import "./../admin.css";

const Evenement = (props) => {
  const events = useSelector((state) => state.eventReducer);

  console.log(events['hydra:member']);
  return (
    <div className="flex flex-row max-h-screen">
      <Navigation />
      <div className="grow w-10/12">
        <Header />
        <div className="p-3">
          <div className="border border-sky-400 rounded p-3 w-2/4">
            <h1 className="text-2xl font-semibold">Nouvel événement</h1>
            <form className="grid auto-cols-auto gap-y-1">
              <input type="" placeholder="Titre" className="input-event" />
              <div className="grid grid-cols-2 gap-2">
                <input
                  type="text"
                  placeholder="Catégorie"
                  className="input-event"
                />
                <select className="input-event">
                  <option>catégorie ...</option>
                  <option>Enfant</option>
                  <option>Jeune</option>
                  <option>Adulte</option>
                </select>
              </div>
              <input type="text" placeholder="Cost" className="input-event" />
              <input type="date" className="input-event" />
              <input type="file" className="input-event" />
              <button
                type="submit"
                className="bg-sky-500 py-1 text-white tracking-widest rounded"
              >
                Ajouter
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Evenement;
