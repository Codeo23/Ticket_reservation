import React, { useState } from "react";
import { useDispatch } from "react-redux";
import { addEvent } from "../../actions/event.action";
import DropFile from "./DropFile";

const AddEventForm = ({closeModal}) => {
  const dispatch = useDispatch();
  const [title, setTitle] = useState("");
  const [categorie, setCategorie] = useState("");
  const [age, setAge] = useState("");
  const [prix, setPrix] = useState("");
  const [date, setDate] = useState("");
  const [file, setFile] = useState("");

  const onFileChange = (files)=>{
    console.log(files);
  }
  const envoyeDonnee = (e) => {
    e.preventDefault();
    let formData = new FormData();
    formData.append("title",title);
    formData.append("category", categorie);
    formData.append("categoryAge", age);
    formData.append("costToString", prix);
    formData.append("dateEventString", date);
    formData.append("filePath", file);
    dispatch(addEvent(formData));
  };
  return (
    <div className="w-2/4">
      <button onClick={()=>closeModal(false)}>X</button>
      <h1 className="text-2xl font-semibold">Nouvel événement</h1>
      <form
        className="grid auto-cols-auto gap-y-1"
        onSubmit={(e) => envoyeDonnee(e)}
      >
        <input
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
        
        
        <DropFile onFileChange={(files)=> onFileChange(files)}/>
        
        <button
          type="submit"
          className="bg-sky-500 py-1 text-white tracking-widest rounded"
        >
          Ajouter
        </button>
      </form>
    </div>
  );
};

export default AddEventForm;
