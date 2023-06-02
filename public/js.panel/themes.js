const forms = document.querySelectorAll(".needs-validation");
const $form = document.getElementById("element-form");
const $element_table = document.getElementById("element-table");

// bootstrap instances
const bootstrap_modalform = new bootstrap.Modal(document.getElementById("element-modalform"), {
    keyboard: false,
});
const bootstrap_modalconfirm = new bootstrap.Modal(document.getElementById("element-modalconfirm"), {
    keyboard: false,
});

async function main() {
    await crudFunction.select();
    $form.addEventListener(
        "submit",
        function (event) {
            if (!$form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            if ($form.checkValidity()) {
                event.preventDefault();
                crudFunction.insertUpdate($form);
            }

            $form.classList.add("was-validated");
        },
        false
    );

    $form.querySelectorAll("input").forEach((input) => {
        const name = input.name;
        if (!name.includes("color")) return;
        input.addEventListener("change", function () {
            const key = input.getAttribute("ancla");
            const input2 = $form[key];
            input2.value = input.value;
        });
    });
}
//functions
const handleFunction = {
    new: function () {
        // uiFunction.modalForm_clear();
        $form["theme_id"].value = 0;
        bootstrap_modalform.show();
    },
    edit: function ($register_id) {
        const register = uiFunction.database.find((el) => el["theme_id"] == $register_id);

        Object.entries(register).forEach(([key, value]) => {
            if (key.includes("color")) {
                const new_key = `${key}_picker`;
                register[new_key] = value;
            }
        });
        setValuesForm(register, $form);
        bootstrap_modalform.show();
    },
    delete: function (register_id) {
        $form["theme_id"].value = register_id;
        bootstrap_modalconfirm.show();
    },

    // gift functions
    giftTrButton: function (register_id) {
        $form_gift["theme_id"].value = register_id;
        uiFunction.refreshTableGift(register_id);
        element_modalgift.show();
    },
};

const crudFunction = {
    select: async function () {
        await fetch_query(new FormData($form), "theme", "select").then((res) => {
            if (res.response) {
                uiFunction.database = res.data;
                uiFunction.refreshTable();
            }
        });
    },
    insertUpdate: function (form) {
        const action = $form["theme_id"].value == 0 ? "insert" : "update";
        fetch_query(new FormData(form), "theme", action).then((res) => {
            console.log(res);
            uiFunction.modalForm_hide();
            this.select();
        });
    },
    delete: function () {
        fetch_query(new FormData($form), "theme", "delete").then((res) => {
            uiFunction.modalForm_hide();
            this.select();
            uiFunction.modalConfirm_hide();
        });
    },
};

const uiFunction = {
    database: [],
    giftDatabase: [],
    getTr: function ({ theme_id, theme_name, ...rest }) {
        const dark_colors = Object.entries(rest)
            .map(([key, value]) => (key.includes("color") && key.includes("dark") ? value : false))
            .filter((el) => el);

        const light_colors = Object.entries(rest)
            .map(([key, value]) => (key.includes("color") && !key.includes("dark") ? value : false))
            .filter((el) => el);
        return `
            <tr>
                <td class="d-none d-md-table-cell fw-bold">${theme_id}</td>
                <td class="text-center text-md-left">${theme_name}</td>
                <td class="d-none d-md-table-cell text-center text-md-left">
                    <div class="template-color">
                        ${dark_colors.map((color) => `<span class="color" style="--color:${color}"></span>`).join("")}
                    </div>
                </td>
                <td class="d-none d-md-table-cell text-center text-md-left">
                    <div class="template-color">
                        ${light_colors.map((color) => `<span class="color" style="--color:${color}"></span>`).join("")}
                    </div>
                </td>
                <td class="text-center">
                    <button class="btn btn-outline-primary" onclick="handleFunction.edit(${theme_id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-outline-danger" onclick="handleFunction.delete(${theme_id})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        `;
    },
    refreshTable: function () {
        let html = "";
        for (let item of this.database) {
            html += this.getTr(item);
        }
        $element_table.innerHTML = html;
    },
    modalForm_hide: function () {
        bootstrap_modalform.hide();
        this.modalForm_clear();
    },
    modalForm_clear: function () {
        $form.reset();
        $form.classList.remove("was-validated");
    },
    modalConfirm_hide: function () {
        bootstrap_modalconfirm.hide();
    },
};

main();
