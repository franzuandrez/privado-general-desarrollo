class main {

    constructor() {
        this.data = []
    }

    addItem(id, id_medicamento, id_presentacion, cantidad, indicaciones, medicamento, presentacion, precio, total) {

        let find = this.findItem(id_medicamento, id_presentacion)
        console.log(precio, total)
        if (!find) {
            this.data.push({
                'id': id,
                'id_medicamento': id_medicamento,
                'id_presentacion': id_presentacion,
                'cantidad': cantidad,
                'indicaciones': indicaciones,
                'medicamento': medicamento,
                'presentacion': presentacion,
                'precio': precio,
                'total': total
            });
        }
    }

    findItem(id_medicamento, id_presentacion) {

        let response = false;

        this.data.forEach(function (element) {
            if (element.id_medicamento == id_medicamento && element.id_presentacion == id_presentacion) {
                response = true;
            }
        });

        return response;
    }

    findForDelete(id) {
        let response = [];

        this.data.forEach(function (element) {
            if (element.id == id) {
                response = element
            }
        });

        return response;
    }

    deleteItemInArray(id) {
        let index = this.data.indexOf(this.findForDelete(id))
        this.data.splice(index, 1);
    }

    getAll() {
        return this.data;
    }

    getTotalItems() {
        return Object.keys(this.getAll()).length
    }
}
