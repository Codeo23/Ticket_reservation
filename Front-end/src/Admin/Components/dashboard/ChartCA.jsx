import React from "react";
import { Line } from "react-chartjs-2";
import { faker } from "@faker-js/faker";

export const options = {
  responsive: true,
  plugins: {
    legend: {
      position: "top",
    },
    title: {
      display: true,
      text: "Chiffres d affaires",
    },
  },
};

const labels = [
  "Janvier",
  "Février",
  "Mars",
  "Avril",
  "Mai",
  "Juin",
  "Juillet",
  "Août",
  "Septembre",
  "Novembre",
  "Décembre",
];

export const data = {
  labels,
  datasets: [
    {
      label: "2020",
      data: labels.map(() => faker.datatype.number({ min: 0, max: 1000 })),
      borderColor: "rgb(255, 255, 255)",
      backgroundColor: "rgb(255, 255, 255)",
    },
    {
      label: "2021",
      data: labels.map(() => faker.datatype.number({ min: 0, max: 1000 })),
      borderColor: "rgb(14,165, 223)",
      backgroundColor: "rgb(14,165,233)",
    },
    {
      label: "2022",
      data: labels.map(() => faker.datatype.number({ min: 0, max: 1000 })),
      borderColor: "rgb(234, 179, 8)",
      backgroundColor: "rgb(234,179,8)",
    },
  ],
};

export function ChartCA() {
  return (
    <div className="w-2/3 -translate-y-14 pl-8 text-sm">
      <h4 className="text-white w-full p-1 bg-slate-800">CA chaque année</h4>
      <Line
        options={options}
        data={data}
        className="bg-slate-900"
      />
    </div>
  );
}
