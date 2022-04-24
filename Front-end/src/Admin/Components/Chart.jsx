import React, { useRef, useEffect } from "react";
import {
  Chart as ChartJS,
  LinearScale,
  CategoryScale,
  BarElement,
  PointElement,
  LineElement,
  Legend,
  Tooltip,
} from "chart.js";
import { Chart } from "react-chartjs-2";

ChartJS.register(
  LinearScale,
  CategoryScale,
  BarElement,
  PointElement,
  LineElement,
  Legend,
  Tooltip
);

const labels = ["January", "February", "March", "April", "May", "June", "July"];

export const data = {
  labels,
  datasets: [
    {
      type: "line",
      label: "maximum",
      borderColor: "rgb(127,29,29)",
      borderWidth: 2,
      fill: false,
      data: [40,60,90,80,40,80,90,60],
    },
    {
      type: "bar",
      label: "1st",
      backgroundColor: "rgb(75, 192, 192)",
      data: [20,50,20,70,40,80,90,60],
      borderColor: "white",
      borderWidth: 2,
    },
    {
      type: "bar",
      label: "2nd",
      backgroundColor: "rgb(127,29,29)",
      data: [40,60,90,80,40,80,90,60],
    },
    {
      type: "bar",
      label: "3rd",
      backgroundColor: "rgb(53, 162, 235)",
      data: [40,50,70,40],
    },
  ],
};

function triggerTooltip(chart) {
  const tooltip = chart?.tooltip;

  if (!tooltip) {
    return;
  }

  if (tooltip.getActiveElements().length > 0) {
    tooltip.setActiveElements([], { x: 0, y: 0 });
  } else {
    const { chartArea } = chart;

    tooltip.setActiveElements(
      [
        {
          datasetIndex: 0,
          index: 2,
        },
        {
          datasetIndex: 1,
          index: 2,
        },
      ],
      {
        x: (chartArea.left + chartArea.right) / 2,
        y: (chartArea.top + chartArea.bottom) / 2,
      }
    );
  }

  chart.update();
}

export function ChartEvents() {
  const chartRef = useRef(ChartJS);
  useEffect(() => {
    const chart = chartRef.current;

    triggerTooltip(chart);
  }, []);

  return <Chart ref={chartRef} type="bar" data={data}/>;
}
