import { faClose, faUpload } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useRef, useState } from "react";
import { useDispatch } from "react-redux";
import { addEvent, getEvents } from "../../../store/event.reducer";

const AddEventForm = ({ close }) => {
  const dispatch = useDispatch();
  const [newEvent, setNewEvent] = useState({
    title: "",
    categorie: "",
    age: "Enfant",
    prix: "",
    date: "",
    file: "",
  });
  const reference = useRef(null);
  const onDragEnter = () => reference.current.classList.add("dragover");
  const onDragLeave = () => reference.current.classList.remove("dragover");
  const onDrop = () => reference.current.classList.remove("dragover");

  const envoyeDonnee = (e) => {
    e.preventDefault();
    let formData = new FormData();
    formData.append("title", newEvent.title);
    formData.append("category", newEvent.categorie);
    formData.append("categoryAge", newEvent.age);
    formData.append("costToString", newEvent.prix);
    formData.append("dateEventString", newEvent.date);
    formData.append("filePath", "test");
    dispatch(addEvent(formData));
    dispatch(getEvents());
  };
  return (
    <div className="w-auto absolute bg-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 p-3 rounded">
      <button
        onClick={() => close(false)}
        className="bg-red-600 w-5 h-5 rounded-full text-white flex justify-center items-center float-right"
      >
        <FontAwesomeIcon icon={faClose} />
      </button>
      <h1 className="text-2xl font-semibold">Nouvel événement</h1>
      <form
        className="grid auto-cols-auto gap-y-1"
        onSubmit={(e) => envoyeDonnee(e)}
      >
        <input
          type=""
          placeholder="Titre"
          className="input-event"
          required
          value={newEvent.title}
          onChange={(e) => setNewEvent({ ...newEvent, title: e.target.value })}
        />
        <div className="grid grid-cols-2 gap-2">
          <input
            type="text"
            placeholder="Catégorie"
            className="input-event"
            required
            value={newEvent.categorie}
            onChange={(e) =>
              setNewEvent({ ...newEvent, categorie: e.target.value })
            }
          />
          <select
            className="input-event"
            value={newEvent.age}
            onChange={(e) => setNewEvent({ ...newEvent, age: e.target.value })}
          >
            <option>Enfant</option>
            <option>Jeune</option>
            <option>Adulte</option>
          </select>
        </div>
        <input
          type="text"
          placeholder="P.A.F"
          className="input-event"
          required
          value={newEvent.prix}
          onChange={(e) => setNewEvent({ ...newEvent, prix: e.target.value })}
        />
        <input
          type="date"
          className="input-event"
          value={newEvent.date}
          required
          onChange={(e) => setNewEvent({ ...newEvent, date: e.target.value })}
        />
        <div
          ref={reference}
          className="relative w-full h-48 border-2 border-dashed flex justify-center items-center"
          onDragEnter={onDragEnter}
          onDragLeave={onDragLeave}
          onDrop={onDrop}
        >
          <div className="text-center font-bold">
            <FontAwesomeIcon icon={faUpload} />
            <p>Drag & Drop your files here</p>
          </div>
          <input
            type="file"
            value={newEvent.file}
            required
            onChange={(e) => setNewEvent({ ...newEvent, file: e.target.value })}
            className="absolute w-full h-full top-0 left-0 opacity-0 cursor-pointer"
          />
        </div>
        <div className="w-full grid grid-cols-2 gap-x-1">
          <button
            type="submit"
            className="border border-sky-900 py-1 text-sky-700 tracking-widest rounded"
          >
            Ajouter
          </button>
          <button
            className="bg-red-700 py-1 text-white tracking-widest rounded"
            onClick={() => close(false)}
          >
            Annuler
          </button>
        </div>
      </form>
    </div>
  );
};

export default AddEventForm;
