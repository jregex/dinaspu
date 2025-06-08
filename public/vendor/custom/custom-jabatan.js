$(document).ready(function () {
    $("#modalTambah").on("hidden.bs.modal", function () {
        $(this).find("form").trigger("reset");
    });
    $("#modalEdit").on("hidden.bs.modal", function () {
        $(this).find("#jabatanEdit").val("");
    });
    $("#btnTambah").click(function () {
        $("#modalEdit").modal("show");
        $("#btnAction").text("Tambah");
        $("#modalEditTitle").text("Tambah Jabatan");
        if ($('input[value="patch"]').length > 0) {
            $('input[value="patch"]').remove();
        }
        $("#formEdit").attr("action", "/admin/jabatan");
    });
    $(".btnEdit").click(function () {
        const id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: `/admin/jabatan/${id}/edit`,
            data: {
                jabatan: id,
            },
            beforeSend: function () {},
            success: (response) => {
                $("#modalEdit").modal("show");
                $("#modalEditTitle").text("Edit Jabatan");
                $("#formEdit").attr("action", "/admin/jabatan/" + id);
                $("#formEdit").append(
                    `<input type="hidden" name="_method" value="patch">`,
                );
                $("#jabatanEdit").val(response.data.jabatan);
            },
        });
    });
});
