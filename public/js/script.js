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
