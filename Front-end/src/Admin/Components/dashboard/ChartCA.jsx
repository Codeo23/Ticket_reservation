import React from 'react';
import { Line } from 'react-chartjs-2';
import {faker} from '@faker-js/faker';

export const options = {
  responsive: true,
  plugins: {
    legend: {
      display: 'none',
      position: 'bottom',
    },
    title: {
      display: true,
      text: 'Chiffres d affaires',
    },
  },
};

const labels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Août','Septembre','Novembre','Décembre'];

export const data = {
  labels,
  datasets: [
    {
      label: '',
      data: labels.map(() => faker.datatype.number({ min: -1000, max: 1000 })),
      borderColor: 'rgb(220, 30, 30)',
      backgroundColor: 'rgb(220, 30, 30)',
    },
  ],
};

export function ChartCA() {
  return <Line options={options} data={data} />;
}
