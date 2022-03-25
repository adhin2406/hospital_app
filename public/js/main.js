$("#showPass").on("input", function () {
    let pass = $("#password");
    if ($("#showPass").is(":checked")) {
        pass.prop("type", "text");
    } else {
        pass.prop("type", "password");
    }
});
