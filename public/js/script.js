const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    title: "Data",
    text: "Berhasil " + flashData,
    icon: "success",
  });
}

function selects() {
  var ele = document.getElementsByName("checkbox_value[]");
  for (var i = 0; i < ele.length; i++) {
    if (ele[i]) ele[i].checked = true;
  }
}

$(".page-scroll").on("click", function (e) {
  // ambil isi href
  var tujuan = $(this).attr("href");
  // tangkap elemen yang bersangkutan
  var elemenTujuan = $(tujuan.replace("/profil", ""));
  console.log(elemenTujuan);
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
