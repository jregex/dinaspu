$(document).ready(function () {
    $("#modalTambah").on("hidden.bs.modal", function () {
        $(this).find("form").trigger("reset");
    });
    $("#modalEdit").on("hidden.bs.modal", function () {
        $(this).find("#categoryEdit").val("");
    });
    $("#btnTambah").click(function () {
        $("#modalEdit").modal("show");
        $("#btnAction").text("Tambah");
        $("#modalEditTitle").text("Tambah Kategori");
        if ($('input[value="patch"]').length > 0) {
            $('input[value="patch"]').remove();
        }
        $("#formEdit").attr("action", "/admin/categories");
    });
    $(".btnEdit").click(function () {
        const id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: `/admin/categories/${id}/edit`,
            data: {
                category: id,
            },
            beforeSend: function () {},
            success: (response) => {
                $("#modalEdit").modal("show");
                $("#modalEditTitle").text("Edit Kategori");
                $("#formEdit").attr("action", "/admin/categories/" + id);
                $("#formEdit").append(
                    `<input type="hidden" name="_method" value="patch">`,
                );
                $("#categoryEdit").val(response.data.category);
            },
        });
    });
});
