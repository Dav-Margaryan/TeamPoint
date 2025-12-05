import { jsPDF } from "jspdf"
var font = 'undefined';
var callAddFont = function () {
this.addFileToVFS('NotoSansArmenian-Regular-normal.ttf', font);
this.addFont('NotoSansArmenian-Regular-normal.ttf', 'NotoSansArmenian-Regular', 'normal');
};
jsPDF.API.events.push(['addFonts', callAddFont])
