$(document).ready(function () {
  $("#sample_table").DataTable({
    order: [],
    serverSide: true,
    ajax: {
      url: "peraturanDesaController/ambilData",
      type: "POST",
    },
  });
});

const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    title: "Data Peraturan ",
    text: "Berhasil " + flashData,
    icon: "success",
  });
}

// tombol-hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data peraturan akan dihapus",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus Data!",
  }).then((result) => {
    if (result.isConfirmed) {
      $(this).submit();
    }
  });
});

$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#judulModalLabel").html("Tambah Data");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });
  $(".tampilModalUbah").on("click", function () {
    $("#judulModalLabel").html("Ubah Data");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    const namaController = $(this).data("namacontroller");
    $(".modal-body form").attr("action", namaController + "/update");
    const id = $(this).data("id");

    $.ajax({
      url: "/" + namaController + "/edit",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        var inputPeraturan = document.getElementsByClassName("inputPeraturan");
        const isi = Object.values(data);
        for (let i = 0; i < inputPeraturan.length; i++) {
          $(inputPeraturan[i]).val(isi[i]);
        }
      },
    });
  });
});

$(".page-scroll").on("click", function (e) {
  // ambil isi href
  var tujuan = $(this).attr("href");
  // tangkap elemen yang bersangkutan
  var elemenTujuan = $(tujuan);
  // pindahkan scroll
  $("html").animate(
    {
      scrollTop: elemenTujuan.offset().top,
    },
    1250,
    "easeInOutExpo"
  );
  e.preventDefault();
});

const surat = document.querySelectorAll(".syaratsurat");
surat.forEach((syarat, i) => {
  syarat.dataset.aos = "fade-down";
  syarat.dataset.aosDelay = i * 100;
  syarat.dataset.aosDuration = 1000;
});
AOS.init({
  once: true,
  duration: 2000,
});

gsap.registerPlugin(TextPlugin);
gsap.to(".lead", {
  duration: 2,
  delay: 1.5,
  text: "Di Website Desa Tanah Merah",
});
gsap.from(".jumbotron img", {
  duration: 1,
  rotateY: 360,
  opacity: 0,
});
gsap.from(".navbar", {
  duration: 1.5,
  y: "-100",
  opacity: 0,
  ease: "bounce",
});
gsap.from(".display-4", {
  duration: 1,
  x: "-50",
  opacity: 0,
  delay: 0.5,
  ease: "back",
});

VanillaTilt.init(document.querySelectorAll(".berita-box"), {
  max: 25,
  speed: 400,
  glare: true,
});

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));
