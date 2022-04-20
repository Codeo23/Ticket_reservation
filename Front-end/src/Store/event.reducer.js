import { GET_EVENTS } from "../actions/event.action";

const initialState = {};

export default function eventReducer(state = initialState, action) {
  switch (action.type) {
    case GET_EVENTS:
      return action.payload;
    default:
      return state;
  }
}
