// let ask = confirm("Ingin bermain suit?");
// let result = "";

// while (ask == true) {
//   const player = prompt("Pilih : Batu ,Gunting, Kertas");
//   let comp = Math.floor(Math.random() * 3 + 1);
//   if (comp == 1) {
//     comp = "Batu";
//   } else if (comp == 2) {
//     comp = "Kertas";
//   } else {
//     comp = "Gunting";
//   }
//   if (player == comp) {
//     result = "SERI";
//   } else if (player == "Gunting") {
//     if (comp == "Kertas") {
//       result = "Menang";
//     } else {
//       result = "Kalah";
//     }
//     result = comp == "Kertas" ? "Menang" : "Kalah";
//   } else if (player == "Batu") {
//     if (comp == "Gunting") {
//       result = "Menang";
//     } else {
//       result = "Kalah";
//     }
//     result = comp == "Gunting" ? "Menang" : "Kalah";
//   } else if (player == "Kertas") {
//     if (comp == "Batu") {
//       result = "Menang";
//     } else {
//       result = "Kalah";
//     }
//     result = comp == "Batu" ? "Menang" : "Kalah";
//   } else {
//     alert("Anda tidak memasukkan nilai");
//   }
//   alert(`Kamu memilih: ${player} ,Komputer memilih: ${comp} \nHasilnya kamu: ${result}`);
//   ask = confirm("Ingin bermain lagi?");
// }

// GAME TEBAK ANGKA
// let player = prompt("Tebak angka dari 1-10:");
// let comp = Math.floor(Math.random() * 10 + 1);
// let kesempatan = 5;

// while (kesempatan >= 1) {
//   if (player == comp) {
//     alert(`Jawaban anda benar yaitu :${comp} `);
//     break;
//   } else if (player < comp) {
//     alert("Anda memasukkan angka terlalu kecil");
//     prompt(`anda memiliki kesempatan ${kesempatan}`);
//     kesempatan--;
//   } else if (player > comp) {
//     alert("anda memasukkan angka terlalu besar");
//     prompt(`anda memiliki kesempatan ${kesempatan}`);
//     kesempatan--;
//   } else {
//     alert("Kesempatan anda habis");
//     break;
//   }

//   // test = confirm('ingin bermain lagi')
// }
// console.log(comp);
