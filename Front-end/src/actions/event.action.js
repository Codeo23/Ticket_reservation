import axios from "axios";

export const GET_EVENTS = "GET_EVENTS";

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
