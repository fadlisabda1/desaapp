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
  $('input[id="baik"]').prop('checked', true);
  $("#akhir").prop('selectedIndex',0);
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
      $("input[name=awal][value=" + data.keadaan_barang_bangunan_awal_tahun + "]").prop('checked', true);
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

function previewImg() {
  const user_image = document.querySelector("#user_image");
  const imgPreview = document.querySelector(".img-preview");

  const fileUserImage = new FileReader();
  fileUserImage.readAsDataURL(user_image.files[0]);

  fileUserImage.onload = function (e) {
    imgPreview.src = e.target.result;
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
  if(penyebabdihapus!=null){
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
