<template>
    <div class="mt-5 text-center">
        <h1>Rellena este formulario</h1>
        <h2>¡y únete a nuestro equipo!</h2>  

        <b-form inline class="mt-5">
            <b-container>
                <!-- línea 1: categoría -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="categorias">Categoría:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="categoria" :options="categorias"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 2: talla de camiseta -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="tallaCamiseta">Talla de camiseta:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaCamiseta" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 3: talla de pantalón -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="tallaPantalon">Talla de pantalón:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaPantalon" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 4: talla de medias -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="tallaMedias">Talla de medias:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaMedias" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 5: talla de abrigo -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="tallaAbrigo">Talla de abrigo:</label>
                    </b-col>
                    <b-col>
                        <b-form-select v-model="tallaAbrigo" :options="tallas"></b-form-select>
                    </b-col>
                </b-row>

                <!-- línea 6: método de pago -->
                <b-row class="mb-3">
                    <b-col>
                        <label for="metodoPago">Método de pago:</label>
                    </b-col>
                    <b-col>
                        <b-button variant="outline-info" class="mr-2 mb-2" v-on:click="pagoPaypal()">Paypal</b-button>
                        <b-button variant="outline-success" class="mr-2 mb-2" v-on:click="pagoTarjeta()">Tarjeta crédito/débito</b-button>
                        <b-button variant="outline-danger" class="mr-2 mb-2" v-on:click="pagoDomiciliacion()">Domiciliación bancaria</b-button>
                    </b-col>
                </b-row>

                <!-- método de pago: Paypal -->                
                <b-card
                    id="paypal"
                    v-show="false"
                    header="Paypal"
                    border-variant="primary"
                    header-bg-variant="primary"
                    header-text-variant="white"
                    align="center">
                    <!-- Correo electrónico paypal-->
                    <b-row>
                        <b-col>
                            Correo electrónico:
                        </b-col>
                        <b-col>
                            <b-form-input type="email" placeholder="Introduce email"></b-form-input>
                        </b-col>
                    </b-row>
                    <!-- Contraseña paypal-->
                    <b-row class="mt-4">
                        <b-col>
                            <b-card-text>Contraseña:</b-card-text>
                        </b-col>
                        <b-col>
                            <b-form-input type="password" placeholder="Introduce contraseña"></b-form-input>
                        </b-col>
                    </b-row>
                </b-card>

                <!-- método de pago: Tarjeta -->                                
                <b-card
                    id="tarjeta"
                    v-show="false"
                    header="Tarjeta crédito/débito"
                    border-variant="success"
                    header-bg-variant="success"
                    header-text-variant="white"
                    align="center">
                    <!-- Número de tarjeta-->
                    <b-row>
                        <b-col class="col-4">
                            Número de tarjeta:
                        </b-col>
                        <b-col class="col-8">
                            <b-form-input type="number" placeholder="Introduce el número" :state="comprobarNumeroTarjeta" v-model="numeroTarjeta"></b-form-input>                            
                        </b-col>
                    </b-row>
                    <!-- Caducidad tarjeta-->
                    <b-row class="mt-4">
                        <b-col class="col-4">
                            Caducidad:
                        </b-col>
                        
                        <b-col class="col-8">
                            <b-form-input type="number" class="mb-2" placeholder="Mes" :state="comprobarMesTarjeta" v-model="mesTarjeta"></b-form-input> 
                            <span class=""> / </span>
                            <b-form-input type="number" class="mb-2" placeholder="Año" :state="comprobarAñoTarjeta" v-model="añoTarjeta"></b-form-input> 
                        </b-col>                      
                    </b-row>
                    <!-- CVV tarjeta-->
                    <b-row class="mt-4">
                        <b-col class="col-4">
                            Código de seguridad / CVV:
                        </b-col>
                        <b-col class="col-8"> 
                            <b-form-input type="number" placeholder="Introduce CVV" :state="comprobarCVVTarjeta" v-model="cvvTarjeta"></b-form-input>
                        </b-col>
                    </b-row>
                </b-card>

                <!-- método de pago: Domiciliación -->                
                <b-card
                    id="domiciliacion"
                    v-show="false"
                    header="Domiciliación bancaria"
                    border-variant="danger"
                    header-bg-variant="danger"
                    header-text-variant="white"
                    align="center">
                    <!-- nombre Domiciliación bancaria-->
                    <b-row>
                        <b-col>
                            Titular de la cuenta:
                        </b-col>
                        <b-col>
                            <b-form-input type="text" placeholder="Introduce titular cuenta"></b-form-input>
                        </b-col>
                    </b-row>
                    <!-- Cuenta Domiciliación bancaria -->
                    <b-row class="mt-4">
                        <b-col>
                            <b-card-text>Cuenta bancaria:</b-card-text>
                        </b-col>
                        <b-col>
                            <input type="text" size="4" placeholder="Entidad" class="mb-2"> - 
                            <input type="text" size="4" placeholder="Oficina" class="mb-2"> - 
                            <input type="text" size="1" placeholder="DC" class="mb-2"> - 
                            <input type="text" size="10" placeholder="Nº de cuenta" class="mb-2">                             
                        </b-col>
                    </b-row>
                </b-card>

                <!-- línea 7: enviar -->
                <b-row class="mt-2">
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
            numeroTarjeta: '',
            mesTarjeta: '',
            añoTarjeta: '',
            cvvTarjeta: '',
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
        comprobarNumeroTarjeta(){
            return this.numeroTarjeta.length === 16 ? true : false
        },
        comprobarMesTarjeta(){
            return  this.mesTarjeta.length === 2 && 
                    this.mesTarjeta >= 1 &&
                    this.mesTarjeta <= 12 ? true : false
        },
        comprobarAñoTarjeta(){
            return  this.añoTarjeta.length === 4 && 
                    this.añoTarjeta >= 2021 ? true : false
        },
        comprobarCVVTarjeta(){
            return  this.cvvTarjeta.length === 3 ? true : false
        }
    },
    methods: {
        pagoPaypal() {
            if(document.getElementById("paypal").style.display == 'block'){
                return document.getElementById("paypal").style.display = 'none';                 
            } else {
                return (document.getElementById("paypal").style.display = 'block',
                        document.getElementById("tarjeta").style.display = 'none',
                        document.getElementById("domiciliacion").style.display = 'none');
            }            
        },
        pagoTarjeta() {
            if(document.getElementById("tarjeta").style.display == 'block'){
                return document.getElementById("tarjeta").style.display = 'none';
            } else {
                return (document.getElementById("tarjeta").style.display = 'block',
                        document.getElementById("paypal").style.display = 'none',
                        document.getElementById("domiciliacion").style.display = 'none');
            }  
        },
        pagoDomiciliacion() {
            if(document.getElementById("domiciliacion").style.display == 'block'){
                return document.getElementById("domiciliacion").style.display = 'none';
            } else {
                return (document.getElementById("domiciliacion").style.display = 'block',
                        document.getElementById("paypal").style.display = 'none',
                        document.getElementById("tarjeta").style.display = 'none');
            } 
        }        
    }
}
</script>