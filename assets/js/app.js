$(function () {
  const images = [
    "assets/img/hero.jpg",
    "assets/img/hero1.jpg",
    "assets/img/hero2.jpg",
    "assets/img/hero3.jpg",
  ];

  let currentIndex = 0;
  const hero = $(".hero");
  const totalheros = images.length;

  function showNexthero() {
    hero.removeClass("active");
    hero.css("background-image", `url(${images[currentIndex]})`);
    hero.addClass("active");
    currentIndex = (currentIndex + 1) % totalheros;
  }

  // Tampilkan hero pertama
  hero.css("background-image", `url(${images[currentIndex]})`);
  hero.addClass("active");

  // Ganti hero setiap 3 detik
  setInterval(showNexthero, 3000);

  // cari menu
  let typingTimer;
  const waktuMengetik = 500; // Waktu dalam milidetik (500ms = 0.5 detik)
  $input = $(".cari-menu");

  $input.on("keyup", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(cariMenu, waktuMengetik);
  });

  $input.on("keydown", function () {
    clearTimeout(typingTimer);
  });

  function formatRupiah(amount, prefix = "Rp. ") {
    let number_string = amount.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      let separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
    return prefix + rupiah;
  }

  function cariMenu() {
    $(".menu-container").html(`
        <div class="col-md-12 mt-5 pt-5">
            <p class="text-center text-white fs-2">Loading...</p>
        </div>
    `);

    const query = $(".cari-menu").val();

    $.get("ajax/cari.php?query=" + query, function (response) {
      let data = JSON.parse(response);
      let datas = "";

      $.each(data, function (key, value) {
        datas += `
             <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                <div class="card">
                    <img src="assets/img/menu/${
                      value.gambar
                    }" class="card-img-top" alt="${value.nama_menu}">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">${value.nama_menu}</h5>
                        <h5 class="card-title">${formatRupiah(value.harga)}</h5>
                        <p class="card-text">${value.keterangan}</p>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" autocomplete="off" name="qty" id="qty" value="1" class="form-control qty mt-3">
                            </div>
                            <div class="col-6 d-grid">
                                <label for=""></label>
                                <button data-id="${
                                  value.id_menu
                                }" class="btn my-color text-white add-to-cart mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M12.5 17h-6.5v-14h-2" />
                                        <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;
      });

      if (datas == "") {
        $(".menu-container").html(`
        <div class="col-md-12 mt-5 pt-5">
            <p class="text-center text-white fs-2">Menu tidak ditemukan atau tidak tersedia</p>
        </div>
    `);
      } else {
        $(".menu-container").html(datas);
      }
    });
  }

  //   tambah ke keranjang
  $(document).on("click", ".add-to-cart", function () {
    const id_menu = $(this).data("id");

    $.ajax({
      url: "ajax/tambah_keranjang.php",
      method: "POST",
      data: {
        id_menu: id_menu,
        qty: $(this).closest(".row").find(".qty").val(),
      },
      success: function (response) {
        Swal.fire({
          title: "Berhasil",
          text: "Menu berhasil ditambahkan ke keranjang",
          icon: "success",
          timer: 1500,
        });

        $.get('ajax/jumlah_keranjang.php', function(data){
            $('.jumlah-keranjang').text(data);
        })
      },
    });
  });

  //   hapus keranjang
  $(document).on("click", ".delete-cart", function () {
    const id_menu = $(this).data("id");
    Swal.fire({
      text: "Apakah anda yakin?",
      title: "Hapus keranjang",
      showDenyButton: true,
      confirmButtonText: "Hapus",
      denyButtonText: `batal`,
      icon: "warning",
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/hapus_keranjang.php",
          method: "POST",
          data: {
            id_menu: id_menu,
          },
          success: function (response) {
            Swal.fire({
              title: "Berhasil",
              text: "Menu berhasil dihapus dari keranjang",
              icon: "success",
              timer: 1500,
            });
            setTimeout(() => {
              location.reload();
            }, 1500);
          },
        });
      }
    });
  });

  function get_subtotal() {
    let subtotal = 0;
    $(".subtotal").each(function () {
      subtotal += parseInt($(this).text().replace(/\./g, ''));
    });
    $(".total").text(formatRupiah(subtotal.toString(), ' '));
  }

  //   qty keranjang
  $(document).on("change keyup", ".qty-keranjang", function () {
    const id_menu = $(this).data("id");
    const qty = $(this).val();
    const harga = $(this).closest("tr").find(".harga").text().replace(/\./g, "");
    let subtotal = qty * harga;
    $(this).closest('tr').find('.subtotal').text(formatRupiah(subtotal.toString(), ' '));

    $.ajax({
      url: "ajax/tambah_keranjang.php",
      method: "POST",
      data: {
        id_menu: id_menu,
        qty: 1,
      },
      success: function (response) {
        get_subtotal();
      },
    });
  });
});
