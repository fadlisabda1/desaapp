$(document).ready(function () {
  $("#sample_table").DataTable({
    dom: "Bfrtip",
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [1, 2, 3],
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
  $("#sample_table2").DataTable({
    dom: "Bfrtip",
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: true,
        },
      },
    ],
    order: [],
    serverSide: true,
    ajax: {
      url: "ambilData",
      type: "POST",
    },
  });
  $("#sample_table3").DataTable({
    dom: "Bfrtip",
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [1, 2, 3],
        },
      },
    ],
    order: [],
    serverSide: true,
    columnDefs: [
      {
        targets: 4,
        render: function (data) {
          if (data == null) {
            return null;
          }
          let str = data.split("|");
          let hasil = "";
          for (let i = 0; i < str.length; i++) {
            hasil += "<a href=" + window.location.origin + "/file/fileSyaratSurat/" + str[i] + " target=_blank>" + str[i] + "</a><br>";
          }
          return hasil;
        },
      },
    ],
    ajax: {
      url: "ambilData",
      type: "POST",
    },
  });

  $("#sample_table4").DataTable({
    dom: "Bfrtip",
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
        },
      },
    ],
    order: [],
    serverSide: true,
    columnDefs: [
      {
        targets: 6,
        render: function (data) {
          if (data == null) {
            return null;
          }
          return "<a href=" + window.location.origin + "/gambar/buktipembayaran/" + data + " target=_blank>" + data + "</a><br>";
        },
      },
    ],
    ajax: {
      url: "ambilData",
      type: "POST",
    },
  });

  $("#sample_table5").DataTable({
    dom: "Bfrtip",
    lengthMenu: [5, 10, 20, 50, 100, 200, 500],
    buttons: [
      "pageLength",
      {
        extend: "copyHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
      },
      {
        extend: "csvHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
      },
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
      },
    ],
    order: [],
    serverSide: true,
    columnDefs: [
      {
        targets: 10,
        render: function (data) {
          if (data == null) {
            return null;
          }
          return "<a href=" + window.location.origin + "/gambar/bantuansosial/" + data + " target=_blank>" + data + "</a><br>";
        },
      },
    ],
    ajax: {
      url: "ambilData",
      type: "POST",
    },
  });
});

$(".tombolTambahData").click(function () {
  $("#bantuansosial_form").val("");
  $("#nomorktp").val("");
  $("#namapenerima").val("");
  $("#jenisbantuan").prop("selectedIndex", 0);
  $("#statuspenerimaan").prop("selectedIndex", 0);
  $('input[id="pria"]').prop("checked", true);
  $("#alamat").val("");
  $("#pekerjaan").val("");
  $("#tgllahir").val("");
  $("#tglpenerimaan").val("");
  $("#file").val("");
  $(".modal-title").text("Add Data");
  $("#nomorktp_error").text("");
  $("#namapenerima_error").text("");
  $("#jenisbantuan_error").text("");
  $("#statuspenerimaan_error").text("");
  $("#alamat_error").text("");
  $("#pekerjaan_error").text("");
  $("#tgllahir_error").text("");
  $("#tglpenerimaan_error").text("");
  $("#file_error").text("");
  $("#formModal").modal("show");
  $("#action").val("Add");
  $("#submit_button").val("Add");
});
$("#bantuansosial_form").on("submit", function (event) {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: "action",
    method: "POST",
    processData: false,
    contentType: false,
    data: formData,
    dataType: "JSON",
    beforeSend: function () {
      $("#submit_button").val("loading...");
      $("#submit_button").attr("disabled", "disabled");
    },
    success: function (data) {
      $("#submit_button").val("Add");
      $("#submit_button").attr("disabled", false);
      if (data.error == "yes") {
        $("#nomorktp_error").text(data.nomorktp_error);
        $("#namapenerima_error").text(data.namapenerima_error);
        $("#alamat_error").text(data.alamat_error);
        $("#pekerjaan_error").text(data.pekerjaan_error);
        $("#tgllahir_error").text(data.tgllahir_error);
        $("#tglpenerimaan_error").text(data.tglpenerimaan_error);
        $("#file_error").text(data.file_error);
      } else {
        $("#formModal").modal("hide");
        const flashData = data.message;
        if (flashData) {
          Swal.fire({
            title: "Data Bantuan Sosial ",
            text: "Berhasil " + flashData,
            icon: "success",
          });
        }
        $("#sample_table5").DataTable().ajax.reload();
      }
    },
  });
});

$(".tombolTambahData").click(function () {
  $("#perpajakan_form").val("");
  $("#nop").val("");
  $("#nohp").val("");
  $("#nama").val("");
  $("#tahun").val("");
  $("#totalyangdibayar").val("");
  $(".tampilanfile").attr("src", "");
  $("#file").val("");
  $(".modal-title").text("Add Data");
  $("#nop_error").text("");
  $("#nohp_error").text("");
  $("#nama_error").text("");
  $("#tahun_error").text("");
  $("#totalyangdibayar_error").text("");
  $("#file_error").text("");
  $("#formModal").modal("show");
  $("#action").val("Add");
  $("#submit_button").val("Add");
});
$("#perpajakan_form").on("submit", function (event) {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: "action",
    method: "POST",
    processData: false,
    contentType: false,
    data: formData,
    dataType: "JSON",
    beforeSend: function () {
      $("#submit_button").val("loading...");
      $("#submit_button").attr("disabled", "disabled");
    },
    success: function (data) {
      $("#submit_button").val("Add");
      $("#submit_button").attr("disabled", false);
      if (data.error == "yes") {
        $("#nop_error").text(data.nop_error);
        $("#nohp_error").text(data.nohp_error);
        $("#nama_error").text(data.nama_error);
        $("#tahun_error").text(data.tahun_error);
        $("#totalyangdibayar_error").text(data.totalyangdibayar_error);
        $("#file_error").text(data.file_error);
      } else {
        $("#formModal").modal("hide");
        const flashData = data.message;
        if (flashData) {
          Swal.fire({
            title: "Data Perpajakan ",
            text: "Berhasil " + flashData,
            icon: "success",
          });
        }
        $("#sample_table4").DataTable().ajax.reload();
      }
    },
  });
});

$(".tombolTambahData").click(function () {
  $("#layananumum_form").val("");
  $("#judul").val("");
  $("#nohp").val("");
  $("#usernameoremail").val("");
  $("#file").val("");
  $(".modal-title").text("Add Data");
  $("#judul_error").text("");
  $("#nohp_error").text("");
  $("#usernameoremail_error").text("");
  $("#formModal").modal("show");
  $("#action").val("Add");
  $("#submit_button").val("Add");
});

$("#layananumum_form").on("submit", function (event) {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: "action",
    method: "POST",
    processData: false,
    contentType: false,
    data: formData,
    dataType: "JSON",
    beforeSend: function () {
      $("#submit_button").val("loading...");
      $("#submit_button").attr("disabled", "disabled");
    },
    success: function (data) {
      $("#submit_button").val("Add");
      $("#submit_button").attr("disabled", false);
      if (data.error == "yes") {
        $("#judul_error").text(data.judul_error);
        $("#nohp_error").text(data.nohp_error);
        $("#usernameoremail_error").text(data.usernameoremail_error);
      } else {
        $("#formModal").modal("hide");
        const flashData = data.message;
        if (flashData) {
          Swal.fire({
            title: "Data Layanan Umum ",
            text: "Berhasil " + flashData,
            icon: "success",
          });
        }
        $("#sample_table3").DataTable().ajax.reload();
      }
    },
  });
});

$(".tombolTambahData").click(function () {
  $("#peraturan_form").val("");
  $("#nomorTglPeraturanDesa").val("");
  $("#tentang").val("");
  $("#uraiansingkat").val("");
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

$(".tombolTambahData2").click(function () {
  $("#inventarisKekayaan_form").val("");
  $("#jenisbarang").val("");
  $("#lokasi").val("");
  $("#jumlah").val("");
  $("#sumberpembiayaan").val("");
  $('input[id="baik"]').prop("checked", true);
  $("#akhir").prop("selectedIndex", 0);
  $("#perkiraanbiaya").val("");
  $("#ket").val("");
  $(".modal-title").text("Add Data");
  $("#jenisbarang_error").text("");
  $("#lokasi_error").text("");
  $("#jumlah_error").text("");
  $("#sumberpembiayaan_error").text("");
  $("#perkiraanbiaya_error").text("");
  $("#ket_error").text("");
  $("#formModal").modal("show");
  $("#action").val("Add");
  $("#submit_button").val("Add");
});
$("#inventarisKekayaan_form").on("submit", function (event) {
  event.preventDefault();
  $.ajax({
    url: "action",
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
        $("#jenisbarang_error").text(data.jenisbarang_error);
        $("#lokasi_error").text(data.lokasi_error);
        $("#jumlah_error").text(data.jumlah_error);
        $("#sumberpembiayaan_error").text(data.sumberpembiayaan_error);
        $("#perkiraanbiaya_error").text(data.perkiraanbiaya_error);
        $("#ket_error").text(data.ket_error);
      } else {
        $("#formModal").modal("hide");
        const flashData = data.message;
        if (flashData) {
          Swal.fire({
            title: "Data Inventaris Kekayaan",
            text: "Berhasil " + flashData,
            icon: "success",
          });
        }
        $("#sample_table2").DataTable().ajax.reload();
      }
    },
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

$(document).on("click", ".edit2", function () {
  let id = $(this).data("id");
  $.ajax({
    url: "edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $("#jenisbarang").val(data.jenis_barang);
      $("#lokasi").val(data.lokasi);
      $("#jumlah").val(data.jumlah);
      $("#sumberpembiayaan").val(data.sumber_pembiayaan);
      $("input[name=awal][value=" + data.keadaan_barang_bangunan_awal_tahun + "]").prop("checked", true);
      $("#akhir").val(data.keadaan_barang_bangunan_akhir_tahun);
      $("#perkiraanbiaya").val(data.perkiraan_biaya);
      $("#ket").val(data.ket);
      $(".modal-header").text("Edit Data");
      $("#jenisbarang_error").text("");
      $("#lokasi_error").text("");
      $("#jumlah_error").text("");
      $("#sumberpembiayaan_error").text("");
      $("#perkiraanbiaya_error").text("");
      $("#ket_error").text("");
      $("#action").val("Edit");
      $("#submit_button").val("Edit");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

$(document).on("click", ".edit3", function () {
  let id = $(this).data("id");
  $.ajax({
    url: "edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $("#file_lama").val(data.file);
      $("#judul").val(data.judul);
      $("#nohp").val(data.nohp);
      $("#usernameoremail").val(data.usernameoremail);
      $(".modal-header").text("Edit Data");
      $("#judul_error").text("");
      $("#nohp_error").text("");
      $("#usernameoremail_error").text("");
      $("#action").val("Edit");
      $("#submit_button").val("Edit");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

$(document).on("click", ".edit4", function () {
  let id = $(this).data("id");
  $.ajax({
    url: "edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $(".tampilanfile").attr("src", window.location.origin + "/gambar/buktipembayaran/" + data.gambar);
      $("#gambar_lama").val(data.gambar);
      $("#nop").val(data.nomor_objek_pajak);
      $("#nohp").val(data.nohp);
      $("#nama").val(data.nama_wajib_pajak);
      $("#tahun").val(data.tahun);
      $("#totalyangdibayar").val(data.total_pbb_dibayar);
      $(".modal-header").text("Edit Data");
      $("#nop_error").text("");
      $("#nohp_error").text("");
      $("#nama_error").text("");
      $("#tahun_error").text("");
      $("#totalyangdibayar_error").text("");
      $("#file_error").text("");
      $("#action").val("Edit");
      $("#submit_button").val("Edit");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

$(document).on("click", ".edit5", function () {
  let id = $(this).data("id");
  $.ajax({
    url: "edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $(".tampilanfile").attr("src", window.location.origin + "/gambar/bantuansosial/" + data.gambar);
      $("#gambar_lama").val(data.gambar);
      $("#nomorktp").val(data.nomorktp);
      $("#namapenerima").val(data.namapenerima);
      $("#jenisbantuan").val(data.jenisbantuan);
      $("#statuspenerimaan").val(data.statuspenerimaan);
      $("input[name=jeniskelamin][value=" + data.jeniskelamin + "]").prop("checked", true);
      $("#alamat").val(data.alamat);
      $("#pekerjaan").val(data.pekerjaan);
      $("#tgllahir").val(data.tanggallahir);
      $("#tglpenerimaan").val(data.tanggalpenerimaan);
      $("#tglpenerimaan").val(data.tanggalpenerimaan);
      $(".modal-header").text("Edit Data");
      $("#nomorktp_error").text("");
      $("#namapenerima_error").text("");
      $("#jenisbantuan_error").text("");
      $("#statuspenerimaan_error").text("");
      $("#alamat_error").text("");
      $("#pekerjaan_error").text("");
      $("#tgllahir_error").text("");
      $("#tglpenerimaan_error").text("");
      $("#file_error").text("");
      $("#action").val("Edit");
      $("#submit_button").val("Edit");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

function previewFile() {
  const file = document.querySelector("#file");
  const filePreview = document.querySelector(".file-preview");

  const file2 = new FileReader();
  file2.readAsDataURL(file.files[0]);

  file2.onload = function (e) {
    filePreview.src = e.target.result;
  };
}

$("#user_form").on("submit", function (event) {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: "user/action",
    processData: false,
    contentType: false,
    method: "POST",
    data: formData,
    dataType: "JSON",
    beforeSend: function () {
      $("#submit_button").val("loading...");
      $("#submit_button").attr("disabled", "disabled");
    },
    success: function (data) {
      $("#submit_button").val("Edit");
      $("#submit_button").attr("disabled", false);
      if (data.error == "yes") {
        $("#email_error").text(data.email_error);
        $("#username_error").text(data.username_error);
        $("#user_image_error").text(data.user_image_error);
      } else {
        $("#formModal").modal("hide");
        const flashData = data.message;
        if (flashData) {
          Swal.fire({
            title: "Data User ",
            text: "Berhasil " + flashData,
            icon: "success",
          });
        }
        window.location.reload();
      }
    },
  });
});

$(document).on("click", ".editUser", function () {
  let id = $(this).data("id").replace(/\D/g, "");
  $.ajax({
    url: "user/edit",
    method: "POST",
    data: { id: id },
    dataType: "JSON",
    success: function (data) {
      $("#email").val(data.email);
      $("#username").val(data.username);
      $("#fullname").val(data.fullname);
      $(".modal-header").text("Edit Data");
      $("#email_error").text("");
      $("#username_error").text("");
      $("#user_image_error").text("");
      $("#formModal").modal("show");
      $("#hidden_id").val(id);
    },
  });
});

$(document).on("click", ".deleteUser", function () {
  let id = $(this).data("id");
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data user akan dihapus",
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
        url: "adminController/delete",
        success: function (data) {
          console.log(data);
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data User ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          window.location.reload();
        },
      });
    }
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

$(document).on("click", ".delete2", function () {
  let penyebabdihapus = prompt("Kenapa Dihapus ?");
  if (penyebabdihapus != null) {
    let id = $(this).data("id");
    Swal.fire({
      title: "Apakah anda yakin",
      text: "data inventaris kekayaan akan dihapus",
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
            penyebabdihapus: penyebabdihapus,
            _method: "DELETE",
          },
          url: "delete",
          success: function (data) {
            const flashData = data;
            if (flashData) {
              Swal.fire({
                title: "Data Inventaris Kekayaan ",
                text: "Berhasil " + flashData,
                icon: "success",
              });
            }
            $("#sample_table2").DataTable().ajax.reload();
          },
        });
      }
    });
  }
});

$(document).on("click", ".delete3", function () {
  let id = $(this).data("id");
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data layanan umum akan dihapus",
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
        url: "delete",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Layanan Umum ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table3").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".delete4", function () {
  let id = $(this).data("id");
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data perpajakan akan dihapus",
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
        url: "delete",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Perpajakan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table4").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".delete5", function () {
  let id = $(this).data("id");
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data bantuan sosial akan dihapus",
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
        url: "delete",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Bantuan Sosial ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table5").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".delete4user", function () {
  let id = $(this).data("id");
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data perpajakan akan dihapus",
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
        url: "deleteUser",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Perpajakan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          window.location.reload();
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

$(document).on("click", ".deleteAllButton2", function () {
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data inventaris kekayaan akan dihapus",
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
        url: "ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Inventaris Kekayaan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table2").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".deleteAllButton3", function () {
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data layanan umum akan dihapus",
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
        url: "ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Layanan Umum ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table3").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".deleteAllButton4", function () {
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data perpajakan akan dihapus",
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
        url: "ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Perpajakan ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table4").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".deleteAllButton5", function () {
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data bantuan sosial akan dihapus",
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
        url: "ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data Bantuan Sosial ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          $("#sample_table5").DataTable().ajax.reload();
        },
      });
    }
  });
});

$(document).on("click", ".deleteAllUser", function () {
  Swal.fire({
    title: "Apakah anda yakin",
    text: "data user akan dihapus",
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
        url: "adminController/ceklisDeleteButton",
        success: function (data) {
          const flashData = data;
          if (flashData) {
            Swal.fire({
              title: "Data User ",
              text: "Berhasil " + flashData,
              icon: "success",
            });
          }
          window.location.reload();
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
