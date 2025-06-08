const token = $('meta[name="csrf-token"]').attr("content");
ClassicEditor.create(document.querySelector("#editor"), {
    removePlugins: ["mediaEmbed", "link"],
    toolbar: [
        "heading",
        "|",
        "bold",
        "italic",
        "|",
        "link",
        "bulletedList",
        "numberedList",
        "blockQuote",
        "outdent",
        "indent",
        "|",
        "uploadImage",
        "insertTable",
        "|",
        "undo",
        "redo",
    ],
    ckfinder: {
        uploadUrl: `/admin/posts/upload?_token=${token}`,
    },
}).catch((error) => {
    console.log(error);
});
