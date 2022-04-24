import { configureStore } from "@reduxjs/toolkit";
import { events } from "./event.reducer";

export const store = configureStore({
  reducer: { events: events.reducer },
});
