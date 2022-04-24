import React, { useRef, useState } from "react";
import "../admin.css";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faUpload } from "@fortawesome/free-solid-svg-icons";

const DropFile = (props) => {
  const reference = useRef(null);
  const [fileList, setFileList] = useState("");
  const onDragEnter = () => reference.current.classList.add("dragover");
  const onDragLeave = () => reference.current.classList.remove("dragover");
  const onDrop = () => reference.current.classList.remove("dragover");
  console.log(fileList);
  return (
    <>
      <div
        ref={reference}
        className="relative w-full h-48 border-2 border-dashed flex justify-center items-center"
        onDragEnter={onDragEnter}
        onDragLeave={onDragLeave}
        onDrop={onDrop}
      >
        <div className="text-center font-bold">
          <FontAwesomeIcon icon={faUpload}/>
          <p>Drag & Drop your files here</p>
        </div>
        <input type="file" value={fileList} onChange={(e)=>console.log(e)} className="absolute w-full h-full top-0 left-0 opacity-0 cursor-pointer"/>
      </div>
    </>
  );
};


export default DropFile;
