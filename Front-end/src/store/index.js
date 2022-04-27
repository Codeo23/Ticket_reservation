import { configureStore } from "@reduxjs/toolkit";
import { admin } from "./admin.reducer";
import { events } from "./event.reducer";

export const store = configureStore({
  reducer: { events: events.reducer, admin: admin.reducer },
});
