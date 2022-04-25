import { createSlice } from "@reduxjs/toolkit";
import axios from "axios";
const lien = "http://localhost:8000/api/events";

export const events = createSlice({
  name: "events",
  initialState: {
    data: []
  },
  reducers: {
    ADD_EVENT: (state, action) => {
      state.data.push(action.payload);
    },
    GET_EVENTS: (state, action) => {
      state.data = [action.payload];
    },
    DELETE_EVENT: (state,action) => {
      /*state.data = state.data[0].filter((event)=> event.num_Event != action.payload);
      console.log(state.data)*/
    }
  }
});

export const getEvents = () => async (dispatch) => {
    const res = await axios.get(`${lien}`);
    dispatch(GET_EVENTS(res.data["hydra:member"]));
};

export const addEvent = (data) => async (dispatch) => {
    const config = {
      headers: {
        "content-type": "multipart/form-data",
      },
    };
    const res = await axios.post(lien, data,config);
    dispatch(ADD_EVENT(res.data));
};

export const deleteEvent = (id) => async (dispatch) => {
  await axios.delete(`${lien}/${id}`);
  dispatch(DELETE_EVENT(id))
}

export const { ADD_EVENT, GET_EVENTS,DELETE_EVENT } = events.actions;
