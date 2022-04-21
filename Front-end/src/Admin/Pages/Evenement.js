import axios from "axios";
import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { addEvent } from "../../actions/event.action";
import eventReducer from "../../Store/event.reducer";
import Header from "../Components/Header";
import Navigation from "../Components/Navigation";
import "./../admin.css";

const Evenement = (props) => {
  const events = useSelector((state) => state.eventReducer);
  const dispatch = useDispatch();
  const [title, setTitle] = useState("Bonjour2");
  const [categorie, setCategorie] = useState("Hello2");
  const [age, setAge] = useState("Enfant");
  const [prix, setPrix] = useState("5000");
  const [date, setDate] = useState("1988-02-06");
  const [file, setFile] = useState("text");

  const envoyeDonnee = (e) => {
    e.preventDefault();
    let formData = new FormData();

    formData.append('title',title);
    formData.append('category', categorie);
    formData.append("categoryAge", age);
    formData.append("costToString", prix);
    formData.append("date_event_string", date);
    formData.append("filePath", file);

    const config = {
      headers: {
        'content-type': 'multipart/form-data'
      }
    }
    axios
      .post("http://localhost:8000/api/events", formData,config)
      .then((res) => console.log(res))
      .catch((err) => console.log(err));
    //dispatch(addEvent(data));
  };
  console.log(events["hydra:member"]);
  return (
    <div className="flex flex-row max-h-screen">
      <Navigation />
      <div className="grow w-10/12">
        <Header />
        <div className="p-3">
          <div className="border border-sky-400 rounded p-3 w-2/4">
            <h1 className="text-2xl font-semibold">Nouvel événement</h1>
            <form
              className="grid auto-cols-auto gap-y-1"
              onSubmit={(e) => envoyeDonnee(e)}
            >
              {/*<input
                type=""
                placeholder="Titre"
                className="input-event"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
              />
              <div className="grid grid-cols-2 gap-2">
                <input
                  type="text"
                  placeholder="Catégorie"
                  className="input-event"
                  value={categorie}
                  onChange={(e) => setCategorie(e.target.value)}
                />
                <select
                  className="input-event"
                  value={age}
                  onChange={(e) => setAge(e.target.value)}
                >
                  <option>Enfant</option>
                  <option>Jeune</option>
                  <option>Adulte</option>
                </select>
              </div>
              <input
                type="text"
                placeholder="Cost"
                className="input-event"
                value={prix}
                onChange={(e) => setPrix(e.target.value)}
              />
              <input
                type="date"
                className="input-event"
                value={date}
                onChange={(e) => setDate(e.target.value)}
              />
              <input
                type="file"
                className="input-event"
                value={file}
                onChange={(e) => setFile(e.target.value)}
              />*/}
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
