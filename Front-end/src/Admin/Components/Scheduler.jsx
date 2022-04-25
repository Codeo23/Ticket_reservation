import React from 'react';
import { ViewState,EditingState ,IntegratedEditing} from "@devexpress/dx-react-scheduler";
import {MonthView,Appointments,AppointmentForm, Scheduler} from "@devexpress/dx-react-scheduler-material-ui";


const Calendar = (props) => {
    return (
        <div>
            <Scheduler>
                <ViewState/>
                <EditingState/>
                <IntegratedEditing/>
                <MonthView/>
                <Appointments/>
                <AppointmentForm/>
            </Scheduler>
        </div>
    );
};

export default Calendar;