$(document).ready(function () {
    $(".konfirmasi").click(function (event) {
        event.preventDefault();
        let form = $(this).parent("form");
        // let name = $(this).data("name");
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "anda akan menghapus data ini",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                toastMixin.fire({
                    title: "Data tidak dihapus",
                    icon: "success",
                });
            }
        });
    });
});
