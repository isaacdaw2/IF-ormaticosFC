<template>
    <div class="mt-5 text-center">
        <h1>Rellena este formulario</h1>
        <h2>¡y únete a nuestro equipo!</h2>  

        <b-form inline class="mt-5">
            <b-container>
                <!-- línea 1: categoría -->
                <b-row class="mb-3">
                    <b-col>
                        <label class="mr-sm-2" for="categorias">Categoría:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="categoria" :options="categorias"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 2: talla de camiseta -->
                <b-row class="mb-3">
                    <b-col>
                        <label class="mr-sm-2" for="tallaCamiseta">Talla de camiseta:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaCamiseta" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 3: talla de pantalón -->
                <b-row class="mb-3">
                    <b-col>
                        <label class="mr-sm-2" for="tallaPantalon">Talla de pantalón:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaPantalon" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 4: talla de medias -->
                <b-row class="mb-3">
                    <b-col>
                        <label class="mr-sm-2" for="tallaMedias">Talla de medias:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaMedias" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 5: talla de abrigo -->
                <b-row class="mb-3">
                    <b-col>
                        <label class="mr-sm-2" for="tallaAbrigo">Talla de abrigo:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaAbrigo" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 6: método de pago -->
                <b-row class="mb-3">
                    <b-col class="sm-10">
                        <label class="mr-2" for="metodoPago">Método de pago:</label>
                    </b-col>
                    <b-col class="sm-2">
                        <b-button variant="outline-info" class="mr-2" v-on="eleccion">Paypal</b-button>
                        <b-button variant="outline-success" class="mr-2">Tarjeta crédito/débito</b-button>
                        <b-button variant="outline-danger">Transferencia bancaria</b-button>
                    </b-col>
                </b-row>

                <!-- línea 7: enviar -->
                <b-row>
                    <b-col>
                        <b-button variant="primary">Enviar</b-button>                 
                    </b-col>                    
                </b-row>
            </b-container>
            
        </b-form> 
    </div>
</template>

<script>
export default {
    name: 'Jugador',
    data(){
        return {
            texto: '',
            check: [],
            radio: null,
            categoria: null,
            tallaCamiseta: null,
            tallaPantalon: null,
            tallaMedias: null,
            tallaAbrigo: null,
            metodoPago: null,
            categorias:[
                {value: null, text: 'Seleccione un categoría'},
                {value: 'Benjamin', text: 'Benjamín'},
                {value: 'Alevin', text: 'Alevín'},
                {value: 'Infantil', text: 'Infantil'},
                {value: 'Cadete', text: 'Cadete'},
                {value: 'Juvenil', text: 'Juvenil'},
                {value: 'Aficionado', text: 'Aficionado'},
                {value: 'Veterano', text: 'Veterano'}
            ],
            tallas:[
                {value: null, text: 'Seleccione una talla'},
                {value: 'S', text: 'S'},
                {value: 'M', text: 'M'},
                {value: 'L', text: 'L'},
                {value: 'XL', text: 'XL'}
            ],
             pago:[
                {value: null, text: 'Seleccione un método de pago'},
                {value: 'Paypal', text: 'Paypal'},
                {value: 'Tarjeta', text: 'Tarjeta crédito/débito'},
                {value: 'Transferencia', text: 'Transferencia bancaria'}
            ],
        }
    },
    computed: {
        comprobar(){
            return this.texto.length > 2 ? true : false
        }
    },
    methods: {
        
    }
}
</script>