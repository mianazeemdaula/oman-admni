import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css'
import Chart from 'chart.js/auto';
window.Chart = Chart;

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;
import 'datatables.net-buttons'

import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-buttons/js/buttons.colVis.mjs';

import JSZip from 'jszip';
import * as pdfFonts from "pdfmake/build/vfs_fonts.js";
// import pdfFonts from "pdfmake/build/vfs_fonts";

// import "pdfmake/build/pdfmake";
// const pdfMake = window["pdfMake"];

// pdfMake.fonts = {
//     Roboto: {
//         normal: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Regular.ttf",
//         bold: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Medium.ttf",
//         italics: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-Italic.ttf",
//         bolditalics: "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/fonts/Roboto/Roboto-MediumItalic.ttf",
//     },
// };


import Swal from 'sweetalert2';

window.Swal = Swal;

import pdfMake from 'pdfmake';
pdfMake.vfs = pdfFonts.pdfMake.vfs;


window.DataTable.Buttons.jszip(JSZip);
window.DataTable.Buttons.pdfMake(pdfMake);

