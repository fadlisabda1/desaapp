$(document).ready(function () {
  $("#sample_table").DataTable({
    dom: "Bfrtip",
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [1, 2, 3, 4],
        },
      },
    ],
    order: [],
    serverSide: true,
    ajax: {
      url: "peraturanDesaController/ambilData",
      type: "POST",
    },
  });
  $(".tombolTambahData").click(function () {
    $("#peraturan_form").val("");
    $(".modal-title").text("Add Data");
    $("#nomorTglPeraturanDesa_error").text("");
    $("#tentang_error").text("");
    $("#uraiansingkat_error").text("");
    $("#formModal").modal("show");
    $("#action").val("Add");
    $("#submit_button").val("Add");
  });
  $("#peraturan_form").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "peraturanDesaController/action",
      method: "POST",
      data: $(this).serialize(),
      dataType: "JSON",
      beforeSend: function () {
        $("#submit_button").val("loading...");
        $("#submit_button").attr("disabled", "disabled");
      },
      success: function (data) {
        $("#submit_button").val("Add");
        $("#submit_button").attr("disabled", false);
        if (data.error == "yes") {
          $("#nomorTglPeraturanDesa_error").text(data.nomorTglPeraturanDesa_error);
          $("#tentang_error").text(data.tentang_error);
          $("#uraiansingkat_error").text(data.uraiansingkat_error);
        } else {
          $("#formModal").modal("hide");
          const flashData = data.message;
          if (flashData) {
            Swal.fire({
              title: "Data Peraturan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table").DataTable().ajax.reload();
        }
      },
    });
  });
});

$(document).on("click", ".edit", function () {
  let id = $(this).data("id");
  $.ajax({
    url: "peraturanDesaController/edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $("#nomorTglPeraturanDesa").val(data.nomor_tgl_peraturan);
      $("#tentang").val(data.tentang);
      $("#uraiansingkat").val(data.uraiansingkat);
      $(".modal-header").text("Edit Data");
      $("#nomorTglPeraturanDesa_error").text("");
      $("#tentang_error").text("");
      $("#uraiansingkat_error").text("");
      $("#action").val("Edit");
      $("#submit_button").val("Edit");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

$(document).on("click", ".delete", function () {
  let id = $(this).data("id");
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
      $.ajax({
        type: "POST",
        data: {
          id: id,
          _method: "DELETE",
        },
        url: "peraturanDesaController/delete",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Peraturan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".deleteAllButton", function () {
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
      let checkboxes = document.querySelectorAll('input[name="checkbox_value[]"]:checked');
      var vals = [];
      for (var i = 0, n = checkboxes.length; i < n; i++) {
        vals.push(checkboxes[i].value);
      }
      $.ajax({
        type: "POST",
        data: {
          id: vals,
          _method: "DELETE",
        },
        url: "peraturanDesaController/ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Peraturan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table").DataTable().ajax.reload();
        },
      });
    }
  });
});

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
  var elemenTujuan = $(tujuan.replace("/", ""));
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
