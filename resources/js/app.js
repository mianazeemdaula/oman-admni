import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css'
import Chart from 'chart.js/auto';
window.Chart = Chart;

import DataTable from 'datatables.net-dt';
window.DataTable = DataTable;
import 'datatables.net-buttons'
import JSZip from 'jszip'; // For Excel export
import * as pdfFonts from "pdfmake/build/vfs_fonts.js"; // <-- vfs_fonts has to be imported before pdfmake
import pdfMake from 'pdfmake';
pdfMake.vfs = pdfFonts.pdfMake.vfs;

import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-buttons/js/buttons.colVis.mjs';



window.DataTable.Buttons.jszip(JSZip);
window.DataTable.Buttons.pdfMake(pdfMake);

