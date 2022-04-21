import axios from "axios";

export const GET_EVENTS = "GET_EVENTS";
export const ADD_EVENT = "ADD_EVENT";

export const getEvents = () => {
  return (dispatch) => {
    return axios
      .get("http://localhost:8000/api/events?_sort=date_event&_order=desc")
      .then((events) => {
        dispatch({ type: GET_EVENTS, payload: events.data });
      })
      .catch((erreur) => console.log(erreur));
  };
};

export const addEvent = (event) => {
  return (dispatch) => {
    return axios
      .post("http://localhost:8000/api/events",event)
      .then((events) => {
        dispatch({ type: ADD_EVENT, payload: event });
      })
      .catch((erreur) => console.log(erreur));
  };
};