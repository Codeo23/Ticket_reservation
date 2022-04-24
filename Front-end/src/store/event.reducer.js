import { createSlice } from "@reduxjs/toolkit";
import axios from "axios";
const lien = "http://localhost:8000/api/events";

export const events = createSlice({
  name: "todo",
  initialState: {
    data: []
  },
  reducers: {
    ADD_EVENT: (state, action) => {
      state.data.push(action.payload);
    },
    GET_EVENTS: (state, action) => {
      state.data = [action.payload];
    }
  }
});

export const getEvents = () => async (dispatch) => {
    const response = await axios.get(`${lien}?_sort=date_event&_order=desc`);
    dispatch(GET_EVENTS(response.data["hydra:member"]));
};

export const addEvent = (data) => async (dispatch) => {
    const config = {
      headers: {
        "content-type": "multipart/form-data",
      },
    };
    const response = await axios.post(lien, data,config);
    console.log(response)
    //dispatch(ADD_EVENT(response.data["hydra:member"]));
};

export const { ADD_EVENT, GET_EVENTS } = events.actions;
