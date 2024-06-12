<div class="vh-10 d-print-none"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script>
    $(function() {
        $('.datatable').DataTable();

        $('.status').change(function(){
            let id = $(this).data('id');
            let status = $(this).val();
            $.ajax({
                url: '../ajax/ubah_status.php',
                method: 'POST',
                data: {
                    id_pesanan: id,
                    status: status
                },
                success: function(data) {
                    alert('Status Berhasil diubah');
                }
            })
        });
    })
</script>
</body>

</html>
