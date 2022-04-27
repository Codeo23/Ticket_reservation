import { createSlice } from "@reduxjs/toolkit";

export const admin = createSlice({
    name:"admin",
    initialState: false,
    reducers:{
        reveleNavig: (state,action)=>{
            return !state;
        }
    }
})

export const {reveleNavig} = admin.actions;