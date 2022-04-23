import React from "react";
import ReactDOM from "react-dom";
import { Provider} from "react-redux";
import { applyMiddleware, createStore } from "redux";
import { composeWithDevTools} from "redux-devtools-extension";
import thunk from "redux-thunk";
import { getEvents } from "./actions/event.action";
import App from "./App";
import "./index.css";
import reportWebVitals from "./reportWebVitals";
import rootReducer from "./Store";

const store = createStore(
    rootReducer,
    composeWithDevTools(applyMiddleware(thunk))
)

store.dispatch(getEvents())

ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById("root")
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
