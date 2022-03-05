<template lang="es">
    <input type="submit" class="btn btn-danger d-block mb-1 w-100" value='Eliminar' v-on:click='eliminarReceta'>
</template>
<script>
export default {
    props: ["recetaId"],
    // mounted() { //para mandar mensajes directos en consola
    //     console.log("Receta Actual", this.recetaId);
    // },
    methods: {
        eliminarReceta() {
            // this.$swal({
            //     title: "Probando alerta",
            //     text:'Hola',
            //     icon:'success',
            // });
            this.$swal
                .fire({
                    title: "Estas seguro que deseas eliminar la Receta?",
                    text: "Una vez eliminado no se puede recuperar la Receta!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si",
                    cancelButtonText: "Cancelar",
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.recetaId,
                        };
                        //usamos la comillas francesas para enviar datos por axios
                        //axxios trabaja con prop
                        axios
                            .post(`/recetas/${this.recetaId}`, {
                                params,
                                _method: "delete",
                            })
                            .then((respuesta) => {
                                // console.log(respuesta);
                                this.$swal({
                                    title: "Eliminada!",
                                    text: "Su Receta fue eliminada",
                                    icon: "success",
                                });
                                //eliminar receta
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch((error) => {});
                    }
                });
        },
    },
};
</script>
<style lang=""></style>
