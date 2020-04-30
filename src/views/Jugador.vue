<template>
    <div class="mt-5 text-center">
        <h1>Rellena este formulario</h1>
        <h2>¡y únete a nuestro equipo!</h2>  

        <b-container class="mt-5">
            <!-- línea 1: categoría -->
            <b-form-row class="mb-3">
                <b-col no-gutters>
                    <label for="categorias">Categoría:</label>
                </b-col>
                <b-col>
                    <b-form-select v-model="categoria" :options="categorias"></b-form-select>
                </b-col>
            </b-form-row>

            <!-- línea 2: talla de camiseta -->
            <b-form-row class="mb-3">
                <b-col>
                    <label for="tallaCamiseta">Talla de camiseta:</label>
                </b-col>
                <b-col>
                    <b-form-select v-model="tallaCamiseta" :options="tallas"></b-form-select>
                </b-col>
            </b-form-row>

            <!-- línea 3: talla de pantalón -->
            <b-form-row class="mb-3">
                <b-col>
                    <label for="tallaPantalon">Talla de pantalón:</label>
                </b-col>
                <b-col>
                    <b-form-select v-model="tallaPantalon" :options="tallas"></b-form-select>
                </b-col>
            </b-form-row>

            <!-- línea 4: talla de medias -->
            <b-form-row class="mb-3">
                <b-col>
                    <label for="tallaMedias">Talla de medias:</label>
                </b-col>
                <b-col>
                    <b-form-select v-model="tallaMedias" :options="tallas"></b-form-select>
                </b-col>
            </b-form-row>

            <!-- línea 5: talla de abrigo -->
            <b-form-row class="mb-3">
                <b-col>
                    <label for="tallaAbrigo">Talla de abrigo:</label>
                </b-col>
                <b-col>
                    <b-form-select v-model="tallaAbrigo" :options="tallas"></b-form-select>
                </b-col>
            </b-form-row>

            <!-- línea 6: método de pago -->
            <b-form-row class="mb-3">
                <b-col>
                    <label for="metodoPago">Método de pago:</label>
                </b-col>
                <b-col>
                    <b-button variant="outline-info" class="mr-2 mb-2" v-on:click="pagoPaypal()">Paypal</b-button>
                    <b-button variant="outline-success" class="mr-2 mb-2" v-on:click="pagoTarjeta()">Tarjeta crédito/débito</b-button>
                    <b-button variant="outline-danger" class="mr-2 mb-2" v-on:click="pagoDomiciliacion()">Domiciliación bancaria</b-button>
                </b-col>
            </b-form-row>

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
                <b-form-row>
                    <b-col>
                        Correo electrónico:
                    </b-col>
                    <b-col>
                        <b-form-input type="email" placeholder="Introduce email"></b-form-input>
                    </b-col>
                </b-form-row>
                <!-- Contraseña paypal-->
                <b-form-row class="mt-4">
                    <b-col>
                        <b-card-text>Contraseña:</b-card-text>
                    </b-col>
                    <b-col>
                        <b-form-input type="password" placeholder="Introduce contraseña"></b-form-input>
                    </b-col>
                </b-form-row>
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
                    <b-col>
                        Número de tarjeta:
                    </b-col>
                    <b-col>
                        <b-form-input type="number" placeholder="Introduce el número de la tarjeta" :state="comprobarNumeroTarjeta" v-model="numeroTarjeta"></b-form-input>  
                        <small class="text-success">16 dígitos</small>                          
                    </b-col>
                </b-row>
                <!-- Caducidad tarjeta-->
                <b-row class="mt-4">
                    <b-col class="col-6">
                        Caducidad:
                    </b-col>
                    <b-col class="col-md-sm-lg-2">
                        <b-form-input type="number" class="mb-2" placeholder="Mes" :state="comprobarMesTarjeta" v-model="mesTarjeta"></b-form-input>
                        <small class="text-success">2 dígitos</small> 
                    </b-col>
                    <label for="/" class="col-md-sm-lg-2">/</label>
                    <b-col class="col-md-sm-lg-2">
                        <b-form-input type="number" class="mb-2" placeholder="Año" :state="comprobarAñoTarjeta" v-model="añoTarjeta"></b-form-input>
                        <small class="text-success">4 dígitos</small> 
                    </b-col>
                </b-row>
                <!-- CVV tarjeta-->
                <b-row class="mt-4">
                    <b-col>
                        Código de seguridad / CVV:
                    </b-col>
                    <b-col>
                        <b-form-input type="number" placeholder="Introduce CVV" :state="comprobarCVVTarjeta" v-model="cvvTarjeta"></b-form-input>
                        <small class="text-success">3 dígitos</small> 
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
                <b-form-row>
                    <b-col class="col-3">
                        Titular de la cuenta:
                    </b-col>
                    <b-col>
                        <b-form-input type="text" placeholder="Introduce el titular de la cuenta"></b-form-input>
                    </b-col>
                </b-form-row>
                <!-- Cuenta Domiciliación bancaria -->
                <b-form-row class="mt-4">
                    <b-col class="col-3">
                        <b-card-text>Cuenta bancaria:</b-card-text>
                    </b-col>
                    <b-col class="col-2">
                        <b-form-input type="number" class="mb-2" placeholder="Entidad" :state="comprobarEntidadDomiciliacion" v-model="entidadDomiciliacion"></b-form-input>
                        <small class="text-danger">4 dígitos</small>
                    </b-col>
                    <b-col class="col-2">
                        <b-form-input type="number" class="mb-2" placeholder="Oficina" :state="comprobarOficinaDomiciliacion" v-model="oficinaDomiciliacion"></b-form-input>
                        <small class="text-danger">4 dígitos</small>
                    </b-col>
                    <b-col class="col-2">
                        <b-form-input type="number" class="mb-2" placeholder="DC" :state="comprobarDcDomiciliacion" v-model="dcDomiciliacion"></b-form-input>
                        <small class="text-danger">2 dígitos</small>
                    </b-col>
                    <b-col class="col-3">
                        <b-form-input type="number" class="mb-2" placeholder="Nº de cuenta" :state="comprobarCuentaDomiciliacion" v-model="cuentaDomiciliacion"></b-form-input>                                                   
                        <small class="text-danger">10 dígitos</small>
                    </b-col>
                </b-form-row>
            </b-card>

            <!-- línea 7: enviar -->
            <b-form-row class="mt-2">
                <b-col>
                    <b-button variant="primary">Enviar</b-button>                 
                </b-col>                    
            </b-form-row>
        </b-container>
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
            entidadDomiciliacion: '',
            oficinaDomiciliacion: '',
            dcDomiciliacion: '',
            cuentaDomiciliacion: '',
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
        },
        comprobarEntidadDomiciliacion(){
            return  this.entidadDomiciliacion.length === 4 ? true : false &&
                    document.getElementById("entidad").className == 'text-success'
        },
        comprobarOficinaDomiciliacion(){
            return  this.oficinaDomiciliacion.length === 4 ? true : false
        },
        comprobarDcDomiciliacion(){
            return  this.dcDomiciliacion.length === 2 ? true : false
        },
        comprobarCuentaDomiciliacion(){
            return  this.cuentaDomiciliacion.length === 10 ? true : false
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