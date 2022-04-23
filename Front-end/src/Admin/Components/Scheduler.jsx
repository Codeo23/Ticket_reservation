import React from 'react';
import { ViewState,EditingState ,IntegratedEditing} from "@devexpress/dx-react-scheduler";
import {DayView,Appointments,AppointmentForm, Scheduler} from "@devexpress/dx-react-scheduler-material-ui";


const Calendar = (props) => {
    return (
        <div>
            <Scheduler>
                <ViewState/>
                <EditingState/>
                <IntegratedEditing/>
                <DayView/>
                <Appointments/>
                <AppointmentForm/>
            </Scheduler>
        </div>
    );
};

export default Calendar;